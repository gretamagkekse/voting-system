@extends('layouts.app-layout')

@section('content')

    <div
        class="mx-auto md:w-8/12 lg:w-6/12 text-app-text bg-white border-2 border-gray-200 py-6 px-16 rounded-xl mt-8 shadow-md">

        @if(session('success'))
            <div class="alert alert-success my-8 text-lg text-center">Eine neue Person wurde angelegt.</div>
        @elseif(session('error'))
            <div class="alert alert-success my-8 text-lg text-center">Diese Person existiert bereits.</div>
            <div class="flex justify-center mb-8">
                <x-nav-button href="{{route('create-person')}}" text="Neue Person anlegen"/>
            </div>
        @else
            <div class="text-app-text text-2xl mb-4">
                Registrierung
            </div>
            <div>
                Hier kannst du eine neue Person für die Wahl nominieren oder eine Person anlegen, die im System registriert wird, aber nicht wählbar ist. Achte darauf, dass jede Person nur einmal registriert werden kann.
            </div>
            <form method="POST"
                  action="{{ url('/create-person') }}">

                @csrf
                <div class=" mt-4">
                    <div>Vorname:</div>
                    <input type="text" name="first_name" id="first_name"
                           class="form-control rounded-lg w-full border-2 border-app-text"
                           required>
                </div>

                <div class=" mt-4">
                    <div>Nachname:</div>
                    <input name="last_name" id="last_name"
                           class="form-control rounded-lg w-full border-2 border-app-text" required>
                </div>
                <div class=" mt-4">
                    <div>Kurzbeschreibung:</div>
                    <input type="text" name="bio" id="bio"
                           class="form-control rounded-lg w-full border-2 border-app-text" required>
                </div>

                <div class=" mt-4">
                    <div>Wählbar:</div>
                    <div class="mb-2 w-full">
                        <input
                            type="radio" name="votable"
                            value="true"
                            id="votable"
                            class="form-check-input" checked>
                        <label class="text-gray-600 text-bold" for="votable">
                            Die Person stellt sich zur Wahl.
                        </label>
                    </div>
                    <div class="mt-2 w-full">
                        <input
                            type="radio" name="votable"
                            value="false"
                            id="votable"
                            class="form-check-input">
                        <label class="text-gray-600 text-bold" for="votable">
                            Die Person stellt sich NICHT zur Wahl.
                        </label>
                    </div>
                </div>
                <x-submit-button text="Neue Person erstellen"/>
            </form>
        @endif
    </div>

@endsection

