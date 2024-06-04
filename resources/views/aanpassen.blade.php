@extends('layout')
    @section('content') 
    <div class="hero">
<div class="toevoegen-form">
<form action="{{ route('item.update', ['id' => $item->id]) }}" class="form_main" method="POST">
 @csrf
 @method('PUT')
 <p class="titel">User Aanpassen</p>
    <div class="inputContainer">
        
    <input type="text" class="inputField" id="naamitem" placeholder="Naam Item" value="{{$item['name']}}" name="naamitem">
    </div>
    
<div class="inputContainer">
    
    <input type="text" class="inputField" id="prijs" placeholder="Prijs" value="{{$item['email']}}" name="prijs">
</div>
           
<button id="button" name="toevoegen">Aanpassen</button>
<a href="/userdash">Admin  dashboard</a>
   
</form>
</div>
   </div>

@endsection