@extends('layout')

@section('content')
<div class="hero_spelen">
    <h2>Spelen</h2>
</div>
<div class="spelen">
    <h1>Woordenspel</h1>
    <p>{{ session('bericht') }}</p>

    @if (session('geraden'))
        <form action="{{ route('item.store') }}" method="post">
            @csrf
            <label for="text">Opslaan game</label>
            <label for="text">Game Speler :</label>
            <input class="game" type="text" id="text" name="name" value="{{ $user->name }}" required>
            <input class="game" type="text" id="text" name="massage"placeholder="Game Message" required >
            <input type="text" id="text" name="resualt"value="{{ session('bericht') }}" required >
            <button type="submit">Opslaan</button>
        </form>
        <br>
        <form method="post" action="{{ route('nieuwSpel') }}">
            @csrf
            <button type="submit">Start Nieuw Spel</button>
        </form>
    @elseif (session('pogingen') <= 0)
        <form method="post" action="{{ route('nieuwSpel') }}">
            @csrf
            <button type="submit">Start Nieuw Spel</button>
        </form>
    @else
        <form method="post" action="{{ route('raad') }}">
            @csrf
            <label for="woord">Raad het woord:</label>
            <input type="text" id="woord" name="woord" required>
            <button type="submit">Raad</button>
        </form>
    @endif
</div>
@endsection
