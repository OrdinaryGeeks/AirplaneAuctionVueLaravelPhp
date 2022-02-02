@extends('layouts.app')
@section('content')
   
<h5  class="text-center">Airplane ID : {{$bid->airplaneID}}</h5>
                <p class="text-center">User Bid Value : {{$bid->bidValue}}</p>
                <h3 class="text-center">Airplane Model : {{$airplane->model}}</h3>
    <p class="text-center">Airplane Name : {{$airplane->name}}</p>
    <p class="text-center">Airplane Parts : {{$airplane->parts}}</p>
    <p class="text-center">Airplane Createion Date : {{$airplane->built}}</p>
    
    <p class="text-center">Airplane Original Outright Buy Price : {{$airplane->outright2}}</p>
    <br>
 
@endsection