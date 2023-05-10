<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AppController extends Controller
{
    public static int $stimmenGesamt =0;

    public function welcome(){
        return view('welcome');
    }
    public function createPersonIndex()
    {
        return view('create-person');
    }

    public function voteIndex(){
        $persons = $this->getPersons();
        return view('vote')->with('persons', $persons);
    }

    public function resultsIndex(){
        $votings = $this->getVotings();
        return view('get-results')->with('votings',$votings);
    }

    public function storePerson(Request $request)
    {
        $newPerson = ['first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'bio' => $request->bio,
            'votable' => $request->votable,
        ];
        //Validation
        $persons= $this->getPersons();
        foreach ($persons as $person){
            if ($person['first_name'] === $newPerson['first_name'] && $person['last_name'] === $newPerson['last_name']){
                return redirect('/create-person')->with('error', 'Diese Person existiert bereits.');
            }
        }
        //Neue Person an API
        Http::withBody(json_encode($newPerson))
            ->post('http://127.0.0.1:8000/persons');
        return redirect('/create-person')->with('success', 'Neue Person wurde angelegt.');

    }


    public function vote(Request $request){

        $person = ['first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'bio' => $request->bio,
            'votable' => $request->votable,
        ];
        //Stimme an API senden
        Http::withBody(json_encode($person))
            ->post('http://127.0.0.1:8000/vote');
        //nur einmal Wählen pro Session (potentiell)
//        $request->session()->put('voted', true);
        return redirect('/vote')->with('success', 'Es wurde erfolgreich gewählt.');
    }

    public function getVotings()
    {
        // Wahlergebnisse von der API abrufen
        $votings = Http::get('http://127.0.0.1:8000/vote')->json();

        // Wahlergebnisse filtern und leere Werte entfernen
        $votingsFiltered = array_filter($votings, function ($voting) {
            return !empty($voting['person']['first_name'])
                && !empty($voting['person']['last_name'])
                && !empty($voting['person']['bio'])
                && !empty($voting['person']['votable']);
        });

        // Wahlergebnisse nach Stimmzahl absteigend sortieren
        usort($votingsFiltered, function ($a, $b) {
            return $b['Stimmzahl'] - $a['Stimmzahl'];
        });

        // Platzierungen und Gesamtstimmen aktualisieren
        $platz = 0;
        $vorherigeStimmzahl = null;

        foreach ($votingsFiltered as &$item) {
            AppController::$stimmenGesamt += $item['Stimmzahl'];

            if ($item['Stimmzahl'] !== $vorherigeStimmzahl) {
                $platz++;
            }

            $item['platz'] = $platz;
            $vorherigeStimmzahl = $item['Stimmzahl'];
        }
        return $votingsFiltered;
    }


    public function getPersons()
    {
        $persons = Http::get('http://127.0.0.1:8000/persons')->json();

        //erhaltene Personenliste filtern
        $personsFiltered = [];
        foreach ($persons as $key=>$person) {
            if (!empty($person) && !empty($person['first_name']) && !empty($person['last_name']) && !empty($person['bio']) && !empty($person['votable'])) {
                array_push($personsFiltered, $person);
            }
        }
        return $personsFiltered;
    }





}
