@props(['persons'])
@extends('layouts.app-layout')
@section('content')
    <div class="mx-auto md:w-8/12 lg:w-8/12 mt-8">


            <div class=" bg-white rounded-lg p-8">
                @if(session('success'))
                    <div class="alert alert-success my-8 text-app-text text-lg text-center">Wir haben deine Wahl erhalten. Vielen Dank.</div>
                    <div class="flex justify-center mb-8">
                        <x-nav-button href="{{route('results')}}" text="Zu den Wahlergebnissen"/>
                    </div>
                @else
                <div class="text-app-text text-2xl mb-4">
                    Wählbare Personen:
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @foreach($persons as $person)
                        @if($person['votable'] === 'true')
                            <x-person-card :person="$person" :votable="true" votes=""/>
                        @endif
                    @endforeach
                </div>


            </div>
            <div class=" bg-white rounded-lg p-8 my-8">
                <div class="text-app-text text-2xl mb-4">
                    Sonstige Personen:
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @foreach($persons as $person)
                        @if($person['votable'] === 'false')
                            <x-person-card :person="$person" :votable="false" votes=""/>
                        @endif
                    @endforeach
                </div>

                @endif
            </div>


    </div>
@endsection
