<div class="flex justify-between items-center bg-white h-20 text-app-text shadow-md  p-5">
    <a href="{{route('welcome')}}">
        <div class="text-3xl">
            PollPulse.com
        </div>
    </a>

    <div class="flex flex-row " >
        <x-nav-button href="{{route('vote')}}" text="Zur Wahl"/>

        <x-nav-button href="{{route('results')}}" text="Wahlergebnisse"/>
        <x-nav-button href="{{route('create-person')}}" text="Neue Person anlegen"/>

    </div>
</div>
