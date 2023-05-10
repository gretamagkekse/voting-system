@props(['person','votable','votes'])
<div class="flex flex-col w-full bg-white border-2 border-gray-200 text-app-text rounded-xl shadow-lg w-1/3 p-5">
    <div class="font-bold">
        {{$person['first_name'].' '.$person['last_name']}}
    </div>
    <div>
        {{$person['bio']}}
    </div>

    @if($votable)

        @if(session('voted'))
            <div class="bg-app-text opacity-50 text-white mt-4 rounded-full p-2 ">Du kannst nicht erneut wählen.</div>
        @else
            <form id="voting" method="POST" action="{{ url('/vote') }}">
                @csrf
                <input type="hidden" name="first_name" value="{{ $person['first_name'] }}">
                <input type="hidden" name="last_name" value="{{ $person['last_name'] }}">
                <input type="hidden" name="bio" value="{{ $person['bio'] }}">
                <input type="hidden" name="votable" value="{{ $person['votable'] }}">
                <x-submit-button text="Wählen"/>
            </form>
        @endif

    @endif
    @if($votes !='')
        <div class="text-app-primary-3">
            Prozentualer Anteil an Stimmen: @if(\App\Http\Controllers\AppController::$stimmenGesamt !=0)
                {{round(($votes/\App\Http\Controllers\AppController::$stimmenGesamt)*100,2)}} %
            @endif
        </div>
    @endif

</div>
