@extends('layouts.app')

@section('content')
    <h2 class="mt-5 mb-3 text-center">Nathaniel S Airplane Auction Demo</h2>
    <p class="text-center">Welcome to Ordinary Geeks Airplane Auction Demo.  This will feature a page that lists parts on an airplane, allows people to bid for them in auctions, and allow people to place their airplanes for sale on the site.</p>


    <h2 class="text-center">All Airplanes</h2>
    <ul class="list-group py-3 mb-3">
        @forelse($airplanes as $airplane)
            <li class="list-group-item my-2">
            <h3 class="text-center">Airplane Model : {{$airplane->model}}</h3>
    <p class="text-center">Airplane Name : {{$airplane->name}}</p>
    <p class="text-center">Airplane Parts : {{$airplane->parts}}</p>
    <p class="text-center">Airplane Createion Date : {{$airplane->built}}</p>
    
    <p class="text-center">Airplane Original Outright Buy Price : {{$airplane->outright2}}</p>
   
    <p class="text-center">Airplane Current Top Bid : {{$airplane->current2}}</p>
                <small class="float-right">Airplane Listed Date : {{$airplane->created_at->diffForHumans()}}</small>
                <a href="{{route('airplanes.show',$airplane->id)}}">See More Info And Bid</a>
            </li>
        @empty
            <h4 class="text-center">No Airplanes Found!</h4>
        @endforelse
    </ul>
    <div class="d-flex justify-content-center">
        {{$airplanes->links()}}
    </div>
@endsection