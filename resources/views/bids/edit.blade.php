@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit Airplane</h3>
    <form action="{{route('airplanes.update',$airplane->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="bidValue">New Bid</label>
            <input type="text" name="bidValue" id="bidValue" class="form-control {{$errors->has('model') ? 'is-invalid' : '' }}" value="{{old('model')}}" placeholder="Enter Model">
            @if($errors->has('model'))
                <span class="invalid-feedback">
                    {{$errors->first('model')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="airplaneID">Airplane ID</label>
            <label name="airplaneID" id="airplaneID" class="form-control {{$errors->has('name') ? 
            'is-invalid' : '' }}" value="{{old('airplaneID')}}" placeholder="Enter Name">
            @if($errors->has('airplaneID'))
                <span class="invalid-feedback">
                    {{$errors->first('airplaneID')}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection