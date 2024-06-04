
    @extends('layout')
    @section('content')
     <div class="hero">
        <h2>Inloggen om spel te starten.</h2>
     </div>
     <div class="info">
       <div class="spelinfo">
        <h2>Woordenspel</h2>
        <p>Worden spel" kan verschillende betekenissen hebben. Bedoel je een spel over het worden van iets, zoals een beroep, of bedoel je een spel dat gespeeld wordt om iets te bereiken? Kun je wat meer context geven?</p>
       </div>
       <div class="infoimg">
        <img src="/asste/img/woordenspel.jpg" alt="woordenspel">
       </div>
     </div>
      
     <div class="Game-re">
       <h2>Gespeelde Games </h2>
       @foreach ($games as $item)
           <div class="game_items">
               <h2>{{ $item['name'] }}</h2>
               <p>{{ $item['massage'] }}</p>
               <p>{{ $item['resualt'] }}</p>
               <p>{{ $item['created_at'] }}</p>
           </div>
       @endforeach
   
   
   
           </div>
    @endsection
