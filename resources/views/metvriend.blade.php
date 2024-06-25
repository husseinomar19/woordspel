<!-- resources/views/spelen.blade.php -->

@extends('layout')

@section('content')
<div class="hero_spelen">
    <h2>Spelen</h2>
</div>
<h1>Woordenspel</h1>
<div class="vriend_item">
    <ul>
        @foreach($friends as $friend)
            <li>{{ $friend->name }} 
                <form action="{{ route('spelen.startWithFriend', $friend->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Spelen met deze vriend</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

@if (session('bericht'))
    <p>{{ session('bericht') }}</p>
@endif

<div class="games">
    @foreach($games as $game)
        <div class="game">
            <h3>Spel met {{ $game->friend_id == $user->id ? $game->user->name : $game->friend->name }}</h3>
            <p>Beurten over: {{ $game->user_id == $user->id ? $game->user_pogingen : $game->friend_pogingen }}</p>
            <p>{{ $game->is_friend_turn ? 'Beurt van je vriend' : 'Jouw beurt' }}</p>

            @if (!$game->is_over && ($game->is_friend_turn && $game->friend_id == $user->id || !$game->is_friend_turn && $game->user_id == $user->id))
                <form action="{{ route('spelen.raadWithFriend', $game->id) }}" method="POST">
                    @csrf
                    <input type="text" name="woord" required>
                    <button type="submit">Raad</button>
                </form>
            @elseif ($game->is_over)
                <p>Het spel is afgelopen. Het woord was: {{ $game->woord }}</p>
            @else
                <p>Wachten op de beurt van je vriend.</p>
            @endif
        </div>
    @endforeach
</div>

@endsection
