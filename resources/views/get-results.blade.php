@props(['votings'])
@extends('layouts.app-layout')

@section('content')
    <div class="mx-auto md:w-8/12 lg:w-8/12 mt-8">

        <div class=" bg-white rounded-lg p-8">
            <div class="text-app-text text-2xl mb-4">
                Wahlergebnisse
            </div>

            <div class="grid grid-cols-1 gap-4 py-6 px-12">

                @foreach($votings as $vote)
                    <div class="font-bold text-app-text">Platz {{ $vote['platz'] }}:</div>
                    <x-person-card :person="$vote['person']" :votable="false" :votes="$vote['Stimmzahl']"/>

                @endforeach

            </div>


        </div>
    </div>

@endsection
