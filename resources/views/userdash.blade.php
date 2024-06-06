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
                <form action="" method="POST" style="display:inline;">
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
            <h2>Vrienden Die je kan uitnodigen!</h2>
            <div class="vriendenlijst_item">
            <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}
                <form action="{{ route('addFriend') }}" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="friend_id" value="{{ $user->id }}">
                    <button type="submit">Add Friend</button>
                </form>
            </li>
        @endforeach
    </ul>
            </div>
             




        </div>
     </div>
     </div>
     
    @endsection