@extends('layouts.app-layout')
@section('content')
    <div class="mx-auto md:w-8/12 lg:w-8/12 mt-8">
        <div class=" bg-white text-app-text rounded-lg p-8">
            <div class="mb-8">

            Willkommen auf unserer Wahlplattform!<br><br>

            Hier haben Sie die Möglichkeit, Ihre Stimme zu Gehör zu bringen und an einer bedeutenden demokratischen
            Entscheidung teilzunehmen. Wir bieten Ihnen eine benutzerfreundliche und sichere Umgebung, um Ihre Wahl zu
            treffen und aktiv an der Gestaltung unserer Gemeinschaft mitzuwirken.<br><br>

{{--            Bitte beachten Sie, dass bei unserer Wahlplattform das Prinzip der Einmalwahl gilt. Jede Person hat die--}}
{{--            Chance,--}}
{{--            ihre Stimme genau einmal abzugeben. Dies gewährleistet Fairness und Gleichberechtigung für alle--}}
{{--            Teilnehmerinnen--}}
{{--            und Teilnehmer. --}}
                Wir legen großen Wert auf die Transparenz und Integrität des Wahlprozesses und bitten Sie
            daher,
            Ihre Stimme verantwortungsbewusst und respektvoll abzugeben.<br><br>

            Nutzen Sie diese Gelegenheit, um Ihre Überzeugungen und Interessen zu vertreten. Ihre Stimme ist wichtig und
            trägt dazu bei, die Richtung unserer Gemeinschaft zu bestimmen. Wir danken Ihnen für Ihre Teilnahme und
            wünschen
            Ihnen viel Erfolg bei der Wahl!<br><br>

            Gemeinsam können wir positive Veränderungen bewirken und eine starke demokratische Gesellschaft aufbauen.<br>
            Vielen
            Dank, dass Sie Teil dieser wichtigen Entscheidung sind.
            </div>
            <x-nav-button  href="{{route('vote')}}" text="Zur Wahl"/>
        </div>

    </div>
@endsection
