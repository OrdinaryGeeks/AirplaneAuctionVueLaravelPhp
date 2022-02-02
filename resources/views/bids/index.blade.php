@extends('layouts.app')

@section('content')


    <h2 class="text-center">All User Bids</h2>
    <ul class="list-group py-3 mb-3">
        @forelse($bids as $bid)
            <li class="list-group-item my-2">
                <h5 class="text-center"> Airplane name is : {{$bid->planeName}}</h5>
                <h5 class="text-center"> Airplane model is : {{$bid->planeModel}}</h5>
                <h5  class="text-center">Airplane ID is : {{$bid->airplaneID}}</h5>
                <p class="text-center">Your bid is : {{$bid->bidValue}}</p>
              
                <a href="{{route('bids.show',$bid->id, $bid->airplaneID)}}">See More Info</a>
            </li>
        @empty
            <h4 class="text-center">No User Bids Found!</h4>
        @endforelse
    </ul>
    <div class="d-flex justify-content-center">
        {{$bids->links()}}
    </div>
@endsection