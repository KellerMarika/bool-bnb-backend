<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function userInfo()
    {

        //Recupera l'utente dall'Auth
        $user = Auth::user();

        //Recupera tutti gli appartamenti di quell'utente e lo converte in array
        $userApartments = Apartment::where('user_id', $user->id)->with('subscriptions')->orderBy('created_at', 'DESC')->get();

        // dd($userApartments);

        $userApartmentsCount = count($userApartments);

        if ($userApartmentsCount) {

            $lastApartments = [];
            $lastMessages = [];
            $toReadMessages = [];

            foreach ($userApartments as $apartment) {

                //ordina tutti i messaggi di quell'appartamento
                $lastMessagesDB = Message::where('apartment_id', $apartment->id)->orderBy('created_at', 'DESC')->get()->toArray();

                $lastMessages = array_merge($lastMessages, $lastMessagesDB);

                if (count($lastApartments) < 3) {
                    array_push($lastApartments, $apartment);
                }
            }

            // $msgSorted = asort($lastMessages);

            //ordina l'array dei messaggi in base alla data di creazione
            $creationDate = array_column($lastMessages, 'created_at');
            array_multisort($creationDate, SORT_DESC, $lastMessages);

            foreach ($lastMessages as $message) {

                array_push($creationDate, $message['created_at']);
                if (!$message['read']) {
                    array_push($toReadMessages, $message);
                }
            }

            $lastMsgToShow = array_slice($lastMessages, 0, 3);

            return view('Admin.dashboardUser', compact('user', 'userApartmentsCount', 'lastApartments', 'toReadMessages', 'lastMsgToShow'));
        } else {
            return view('Admin.dashboardUser', compact('user', 'userApartmentsCount'));
        }
    }

    public function userMessages()
    {
        //Recupera l'utente dall'Auth
        $user = Auth::user();


        //Recupera tutti gli appartamenti di quell'utente e lo converte in array
        $userApartments = Apartment::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get()->toArray();


        $new_messages = [];
        $read_messages = [];


        $count_total_messages = 0;

        foreach ($userApartments as $key => $apartment) {

            $apartmentId = $apartment["id"];


            $new_apartment_messages = Message::where('apartment_id', $apartmentId)->where('read', 0)->orderBy('created_at', 'DESC')->get()->toArray();
            $read_apartment_messages = Message::where('apartment_id', $apartmentId)->where('read', 1)->orderBy('created_at', 'DESC')->get()->toArray();

            if ($new_apartment_messages) {
                // array_push($messages, $apartment_messages);

                $new_messages[$apartment['title'] . ' ' . strval($key)] = $new_apartment_messages;
                $count_total_messages += count($new_apartment_messages);
            }

            if ($read_apartment_messages) {
                // array_push($messages, $apartment_messages);

                $read_messages[$apartment['title'] . ' ' . strval($key)] = $read_apartment_messages;
                $count_total_messages += count($read_apartment_messages);
            }
        }

        return view('Admin.dashboardMessages', compact('user', 'new_messages', 'read_messages'));
    }
}
