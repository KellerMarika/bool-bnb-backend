<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function create($id)
    {
        $apartmentId = $id;

        if (Auth::check()) {
            $user = Auth::user();

            return view('apartments.messageForm', compact('user', 'apartmentId'));
        } else {
            return view('apartments.messageForm', compact('apartmentId'));
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request['apartment_id'] = $id;

        $data = $request->validate(
            [
                'apartment_id' => 'required|exists:apartments,id',
                'sender' => 'required|string',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string',
                'read' => 'default:false'
            ]
        );

        $message = Message::create($data);

        return Redirect::to(env('MY_FRONTEND_URL')  . '/apartments/' . $id . '?confirm=messaggio inviato con successo', 302, ['confirm' => 'messaggio mandato con successo']);
    }

    public function checkRead($messageId)
    {
        $message = Message::findOrFail($messageId);

        $message->read = true;

        $message->save();

        return redirect()->back();
    }
}
