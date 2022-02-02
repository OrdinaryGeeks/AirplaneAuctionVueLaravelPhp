@extends('layouts.app')
@section('content')
    <h3 class="text-center">Create Airplane Bid</h3>
    <form action="{{route('bids.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="bidValue">New Bid</label>
            <input type="text" name="bidValue" id="bidValue" class="form-control {{$errors->has('bidValue') ? 'is-invalid' : '' }}" value="{{old('model')}}" placeholder="Enter Bid">
            @if($errors->has('model'))
                <span class="invalid-feedback">
                    {{$errors->first('model')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="airplaneID">Airplane ID</label>
            <input name="airplaneID" id="airplaneID"  value="{{ old('airplaneID') ? : $airplaneID}}" readonly class="form-control {{$errors->has('airplaneID') ? 
            'is-invalid' : '' }}" >
            @if($errors->has('airplaneID'))
                <span class="invalid-feedback">
                    {{$errors->first('airplaneID')}}
                </span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="name">Airplane Name</label>
            <input name="name" id="name"  value="{{ old('name') ? : $airplane->name}}" readonly class="form-control {{$errors->has('name') ? 
            'is-invalid' : '' }}" >
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
        
        <div class="form-group">
            <label for="model">Airplane Model</label>
            <input name="model" id="model"  value="{{ old('model') ? : $airplane->model}}" readonly class="form-control {{$errors->has('model') ? 
            'is-invalid' : '' }}" >
            @if($errors->has('model'))
                <span class="invalid-feedback">
                    {{$errors->first('model')}}
                </span>
            @endif
        </div>
                
        <div class="form-group">
            <label for="current2">Airplane Current High Bid</label>
            <input name="current2" id="current2"  value="{{ old('current2') ?
             : $airplane->current2}}" readonly class="form-control 
             {{$errors->has('current2') ? 
            'is-invalid' : '' }}" >
            @if($errors->has('current2'))
                <span class="invalid-feedback">
                    {{$errors->first('current2')}}
                </span>
            @endif
        </div>
                
        <div class="form-group">
            <label for="increment2">Airplane Minimum Increase</label>
            <input name="increment2" id="increment2"  value="{{ old('increment2')
             ? : $airplane->increment2}}" readonly class="form-control 
             {{$errors->has('increment2') ? 
            'is-invalid' : '' }}" >
            @if($errors->has('increment2'))
                <span class="invalid-feedback">
                    {{$errors->first('increment2')}}
                </span>
            @endif
        </div>
                
        <div class="form-group">
            <label for="outright2">Airplane Outright Buy</label>
            <input name="outright2" id="outright2"  value="{{ old('outright2') ? : $airplane->outright2}}" readonly class="form-control {{$errors->has('outright2') ? 
            'is-invalid' : '' }}" >
            @if($errors->has('outright2'))
                <span class="invalid-feedback">
                    {{$errors->first('outright2')}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection