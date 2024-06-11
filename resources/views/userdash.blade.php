@extends('layout')
    @section('content')
    <div class="hero gebruiker_porfolio">
        <h2>Welcom.</h2>
     </div>
     <div class="gebruikerdash">
     <div class="mijngegens">
        <h1>Welkom, {{ $user->name }}</h1>
        <h3>Email: {{ $user->email }}</h3>
        <h4>Speler sinds: {{ $user->created_at }}</h4>
        <a href="{{ route('aanpassen', ['id' => $user->id]) }}">Gegevens aanpassen</a>
     </div>
     <div class="vrinden">
     <h2>Mijn Vrienden</h2>
        <div class="vriend_item">
        <ul>
        @foreach($friends as $friend)
            <li>{{ $friend->name }} 
                <form action="{{ route('removefriends', ['id' => $friend->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Remove Friend</button>
                </form>
            </li>
        @endforeach
    </ul>
        </div>
     </div>
     <div class="vriend_uitnodigen">
        <div class="vrindenlijst">
            <a  href="/vrienden">Vrienden uitnodigen</a>

        </div>
     </div>
     </div>
     
    @endsection