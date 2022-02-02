@extends('layouts.app')
@section('content')
<h3 class="text-center">Airplane Model : {{$airplane->model}}</h3>
    <p class="text-center">Airplane Name : {{$airplane->name}}</p>
    <p class="text-center">Airplane Parts : {{$airplane->parts}}</p>
    <p class="text-center">Airplane Createion Date : {{$airplane->built}}</p>
    
    <p class="text-center">Airplane Original Outright Buy Price : {{$airplane->outright2}}</p>
   
    <p class="text-center">Airplane Current Top Bid : {{$airplane->current2}}</p>
    
    <br>
    <a href="{{route('airplanes.edit',$airplane->id)}}" class="btn btn-primary float-left">Update</a>
    <a href="#" class="btn btn-danger float-right" data-toggle="modal" data-target="#delete-modal">Delete</a>
    <a href="{{route('bids.create',$airplane->id)}}" class="btn btn-primary float-left">Bid</a>

    <div class="clearfix"></div>
    <div class="modal fade" id="delete-modal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-model">Delete Airplane</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="document.querySelector('#delete-form').submit()">Proceed</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        </div>
    </div>
    <form method="POST" id="delete-form" action="{{route('airplanes.destroy',$airplane->id)}}">
        @csrf
        @method('DELETE')
    </form>
@endsection