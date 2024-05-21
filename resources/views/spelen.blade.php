@extends('layout')
    @section('content')
    <div class="hero_spelen">
        <h2>Spelen</h2>
     </div>
     <div class="spelen">
     <h1>Woordenspel</h1>
    <p>{{ session('bericht') }}</p>


    @if (session('geraden') || session('pogingen') <= 0)
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