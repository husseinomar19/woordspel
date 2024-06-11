@extends('layout')
    @section('content')
    <div class="hero gebruiker_porfolio">
        <h2>Welcom.</h2>
     </div>


        <div class="vrind_list">
            <h2>Vrienden Die je kan uitnodigen!</h2>
            <div class="vriendenlijst_item">
            <ul>
        @foreach($users as $user)
            <li><h4>{{ $user->name }}</h4>
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
     
    @endsection