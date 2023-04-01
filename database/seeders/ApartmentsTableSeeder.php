<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        
        //milano

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'45.493045',
                'longitude'=>'9.196613',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'45.451635',
                'longitude'=>'9.205539',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'45.443445',
                'longitude'=>'9.165371',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'45.460064',
                'longitude'=>'9.152668',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'45.475473',
                'longitude'=>'9.155414',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'45.487028',
                'longitude'=>'9.148891',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'45.499302',
                'longitude'=>'9.172237',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'45.496414',
                'longitude'=>'9.200390',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'45.489194',
                'longitude'=>'9.171894',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];

        //torino

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'45.036063',
                'longitude'=>'7.616682',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'45.041492',
                'longitude'=>'7.650398',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'45.062296',
                'longitude'=>'7.629059',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'45.058079',
                'longitude'=>'7.679420',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'45.079779',
                'longitude'=>'7.622657',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'45.077368',
                'longitude'=>'7.719966',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'45.105992',
                'longitude'=>'7.677286',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'45.104493',
                'longitude'=>'7.627883',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'45.060858',
                'longitude'=>'7.701354',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];

        //modena

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'44.659819',
                'longitude'=>'10.932546',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'44.649805',
                'longitude'=>'10.943189',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'44.640157',
                'longitude'=>'10.923277',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'44.629285',
                'longitude'=>'10.918470',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'44.624521',
                'longitude'=>'10.936323',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'44.649561',
                'longitude'=>'10.887914',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'44.630751',
                'longitude'=>'10.898729',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'44.653469',
                'longitude'=>'10.898729',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'44.663604',
                'longitude'=>'10.923729',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];

        //napoli

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'40.864750',
                'longitude'=>'14.272335',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'40.840340',
                'longitude'=>'14.221180',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'40.856182',
                'longitude'=>'14.308727',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'40.877471',
                'longitude'=>'14.270961',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'40.835924',
                'longitude'=>'14.320743',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'40.885259',
                'longitude'=>'14.330013',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'40.844495',
                'longitude'=>'14.349582',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'40.897.197',
                'longitude'=>'14.214657',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'40.871760',
                'longitude'=>'14.203670',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];

        //bari

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'41.095316',
                'longitude'=>'16.831610',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'41.118598',
                'longitude'=>'16.831746',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'41.115494',
                'longitude'=>'16.899244',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'41.135925',
                'longitude'=>'16.824400',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'41.111615',
                'longitude'=>'16.871778',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'41.126099',
                'longitude'=>'16.857359',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'41.113684',
                'longitude'=>'16.845686',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'41.080049',
                'longitude'=>'16.886198',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'41.098939',
                'longitude'=>'16.882421',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];

        //taranto

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'40.473005',
                'longitude'=>'17.239344',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'40.466737',
                'longitude'=>'117.263720',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'40.436693',
                'longitude'=>'17.262003',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'40.418399',
                'longitude'=>'17.211878',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'40.409511',
                'longitude'=>'17.257540',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'40.393040',
                'longitude'=>'17.284662',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'40.416046',
                'longitude'=>'17.262346',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'40.434080',
                'longitude'=>'17.246897',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'40.454199',
                'longitude'=>'17.261660',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];

        //caltanissetta

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'37.489184',
                'longitude'=>'14.017288',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'47.480398',
                'longitude'=>'14.028361',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'37.472916',
                'longitude'=>'14.044916',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'37.506321',
                'longitude'=>'14.083768',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'37.486671',
                'longitude'=>'14.063032',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'37.498406',
                'longitude'=>'14.038996',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'37.488576',
                'longitude'=>'14.044478',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'37.495100',
                'longitude'=>'14.055222',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'37.503016',
                'longitude'=>'14.070242',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];

        //palermo


        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'38.203951',
                'longitude'=>'13.321258',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'38.140532',
                'longitude'=>'13.361750',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'38.096776',
                'longitude'=>'13.400888',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'38.080013',
                'longitude'=>'13.357630',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'38.113516',
                'longitude'=>'13.342867',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'38.131882',
                'longitude'=>'13.296175',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'38.164824',
                'longitude'=>'13.305445',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'38.181825',
                'longitude'=>'13.297892',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'38.139173',
                'longitude'=>'13.343897',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];


        //catania

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'37.544608',
                'longitude'=>'15.114595',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'37.522556',
                'longitude'=>'15.055200',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'37.449545',
                'longitude'=>'15.078889',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'37.507850',
                'longitude'=>'15.052453',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'37.505580',
                'longitude'=>'15.0794444',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'37.522167',
                'longitude'=>'15.079444',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'37.440830',
                'longitude'=>'15.051603',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'37.548237',
                'longitude'=>'15.255367',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'37.401820',
                'longitude'=>'15.155200',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];

        //firenze

        $apartments=[
            [
                'user_id' =>'1',
                'title' =>'Monolocale indipendente con bagno privato',
                'address'=>'Via roma, 56',
                'latitude'=>'43.791834',
                'longitude'=>'11.16435',
                'description' =>'Tutti, senza distinzioni, siete i benvenuti nel mio monolocale con bagno privato in uno dei quartieri più vivaci e centrali della Roma popolare!',
                'rooms_qty' => '3',
                'beds_qty' =>'3',
                'bathrooms_qty' =>'1',
                'mq' =>'40',
                'daily_price'=>'36'
            ],

            [
                'user_id' =>'2',
                'title' =>'Appartamento al Colosseo',
                'address'=>'Via pescara, 56',
                'latitude'=>'43.769773',
                'longitude'=>'11.304824',
                'description' =>'Appartamento nel centro di Roma. Giardino privato, aria condizionata, riscaldamento, WiFi, Netflix, smart TV 50, colazione inclusi nel prezzo!',
                'rooms_qty' => '4',
                'beds_qty' =>'6',
                'bathrooms_qty' =>'2',
                'mq' =>'70',
                'daily_price'=>'50'
            ],

            [
                'user_id' =>'3',
                'title' =>'Suite Termini con Balcone, Wi-Fi e A/C',
                'address'=>'Via caio, 56',
                'latitude'=>'43.787125',
                'longitude'=>'11.235816',
                'description' =>'B&B nel cuore di Roma a soli 5 minuti a piedi dalla Stazione Termini. Bellissima camera con balcone, tv 32", luce per lettura, bagno in camera, materasso in Memory, appendiabiti!',
                'rooms_qty' => '2',
                'beds_qty' =>'2',
                'bathrooms_qty' =>'2',
                'mq' =>'45',
                'daily_price'=>'40'
            ],

            [
                'user_id' =>'4',
                'title' => 'Splendido Loft Appartamento',
                'address'=>'Via trieste, 6',
                'latitude'=>'43.738526',
                'longitude'=>'11.227576',
                'description' =>'Il mio loft e\' uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma unico e accogliente',
                'rooms_qty' => '2',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'2',
                'mq' =>'30',
                'daily_price'=>'25'
            ],

            [
                'user_id' =>'5',
                'title' => 'La Rosa dei Venti',
                'address'=>'Via Dante, 38',
                'latitude'=>'43.818594',
                'longitude'=>'11.229293',
                'description' =>'Bilocale vista mare molto spazioso con terrazzo e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'70'
            ],
            [
                'user_id' =>'6',
                'title' => 'La begonia',
                'address'=>'Via dei fiori, 12',
                'latitude'=>'43.792825',
                'longitude'=>'11.293032',
                'description' =>'appartamento situato a 10 minuti dal centro storico',
                'rooms_qty' => '4',
                'beds_qty' =>'7',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'65'
            ],
            [
                'user_id' =>'7',
                'title' => 'Il centro',
                'address'=>'Via mortise, 100',
                'latitude'=>'43.7764318',
                'longitude'=>'11.901414',
                'description' =>'Appartamento confortevole situato al centro storico',
                'rooms_qty' => '3',
                'beds_qty' =>'5',
                'bathrooms_qty' =>'1',
                'mq' =>'90',
                'daily_price'=>'94'
            ],
            [
                'user_id' =>'8',
                'title' => 'La spiaggia',
                'address'=>'Via del mare, 85',
                'latitude'=>'43.811905',
                'longitude'=>'11.277025',
                'description' =>'Villa con piscina e ampio solarium',
                'rooms_qty' => '5',
                'beds_qty' =>'9',
                'bathrooms_qty' =>'2',
                'mq' =>'90',
                'daily_price'=>'145'
            ],
            [
                'user_id' =>'9',
                'title' => 'casa quadrifoglio',
                'address'=>'Via garibaldi, 21',
                'latitude'=>'43.645015',
                'longitude'=>'11.287654',
                'description' =>'Trilocale situato in montagna con jacuzzi e zona relax',
                'rooms_qty' => '4',
                'beds_qty' =>'8',
                'bathrooms_qty' =>'4',
                'mq' =>'90',
                'daily_price'=>'102'
            ],
        ];
        for ($i=0; $i <14 ; $i++) { 
            foreach ($apartments as $apartment) {
                $newApartment = new Apartment();
    
                $newApartment->user_id = $apartment['user_id'];
                $newApartment->title = $apartment['title'];
                $newApartment->address = $apartment['address'];
                $newApartment->latitude = $apartment['latitude'];
                $newApartment->longitude = $apartment['longitude'];
                $newApartment->description = $apartment['description'];
                $newApartment->rooms_qty= $apartment['rooms_qty'];
                $newApartment->beds_qty = $apartment['beds_qty'];
                $newApartment->bathrooms_qty = $apartment['bathrooms_qty'];
                $newApartment->daily_price = $apartment['daily_price'];
                $newApartment->mq = $apartment['mq'];
                
                $newApartment->save();
            };
        }


    }
}
