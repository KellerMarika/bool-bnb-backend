<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $messagesArray =
            [
                [
                    'message' => 'Buongiorno, sarei interessato all\'appartamento con vista sulle montagne. Potrebbe gentilmente fornirmi maggiori informazioni sulla disponibilità per il periodo dal 15 al 22 agosto? Grazie',
                    'email' => 'mario.rossi@gmail.com',
                    'sender' => 'Mario Rossi',
                    'subject' => 'Richiesta informazioni appartamento con vista sulle montagne',
                ],
                [
                    'message' => 'Salve, vorrei prenotare l\'appartamento al mare con accesso diretto alla spiaggia per la settimana dal 10 al 17 luglio. È disponibile in quelle date? Grazie',
                    'email' => 'lucia.bianchi@gmail.com',
                    'sender' => 'Lucia Bianchi',
                    'subject' => 'Prenotazione appartamento al mare con accesso diretto alla spiaggia',
                ],
                [
                    'message' => 'Buongiorno, ho visto l\'annuncio dell\'appartamento nel centro storico e sarei interessato a prenotarlo per la settimana dal 20 al 27 agosto. Potrebbe gentilmente dirmi se è disponibile in quelle date? Grazie',
                    'email' => 'francesco.verdi@gmail.com',
                    'sender' => 'Francesco Verdi',
                    'subject' => 'Richiesta informazioni appartamento nel centro storico',
                ],
                [
                    'message' => 'Salve, ho visto l\'annuncio dell\'appartamento moderno con vista sul mare e vorrei prenotarlo per il mese di settembre. Potrebbe gentilmente farmi sapere la disponibilità e il prezzo per il mese intero? Grazie',
                    'email' => 'paolo.neri@gmail.com',
                    'sender' => 'Paolo Neri',
                    'subject' => 'Prenotazione appartamento moderno con vista sul mare',
                ],
                [
                    'message' => 'Buongiorno, sono interessato all\'appartamento con giardino privato e vorrei prenotarlo per la settimana dal 3 al 10 luglio. Potrebbe gentilmente dirmi se è disponibile in quelle date e se il prezzo comprende il parcheggio? Grazie',
                    'email' => 'giuseppe.verdi@gmail.com',
                    'sender' => 'Giuseppe Verdi',
                    'subject' => 'Richiesta informazioni appartamento con giardino privato',
                ],
            ];

        $apartments_id = DB::table("apartments")->select("id")->pluck("id")->toArray();

        for ($i = 0; $i < 200; $i++) {
            $rand_key = array_rand($apartments_id, 1);
            $rand_key_messages = array_rand($messagesArray, 1);
            $apartment_id = $apartments_id[$rand_key];

            $message = new Message();

            $message->message = $messagesArray[$rand_key_messages]['message'];
            $message->email = $messagesArray[$rand_key_messages]['email'];
            $message->sender = $messagesArray[$rand_key_messages]['sender'];
            $message->subject = $messagesArray[$rand_key_messages]['subject'];

            $message->apartment_id = $apartment_id;

            $message->save();
        }
    }
}
