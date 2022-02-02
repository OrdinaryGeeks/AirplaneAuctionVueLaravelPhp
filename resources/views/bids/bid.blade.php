@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit Airplane</h3>

<form action="{{route('airplanes.bidUpdate',$airplane->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="model">Airplane Model</label>
        <label  name="model" id="model" class="form-control 
            {{ $errors->has('model') ? 'is-invalid' : '' }}" 
            value="{{ old('model') ? : $airplane->model }}" 
            placeholder="Enter Model"></label>
            @if($errors->has('model')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('model')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Airplane Identifier</label>
            <label type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 
            'is-invalid' : '' }}" value="{{old('name') ? : 
            $airplane->name}}" placeholder="Enter Name"></label>
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="built">Airplane Creation Date</label>
            <label name="built" type="date" id="built"  value=""
        min="1997-01-01" max="2030-12-31" class="form-control
             {{ $errors->has('built') ? 'is-invalid' : '' }}" 
             placeholder="Enter Airplane Description"
             value="{{ old('built') ? : $airplane->built }}"></label>
            @if($errors->has('built')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('built')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="parts">Airplane Parts</label>
            <label name="parts" id="parts" rows="4" class="form-control
             {{ $errors->has('parts') ? 'is-invalid' : '' }}" 
             placeholder="Enter Airplane Description">
             {{ old('parts') ? : $airplane->parts }}</label>
            @if($errors->has('parts')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('parts')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
      
        <div class="form-group">
            <label for="outright2">Outright Cost To Buy</label>
            <label name="outright2"  id="outright2" class="form-control
             {{ $errors->has('outright2') ? 'is-invalid' : '' }}" 
             placeholder="Enter outright price to buy">
             {{ old('outright2') }}</label>
            @if($errors->has('outright2')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('outright2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="current2">Current Bid</label>
            <label name="current2" id="current2" class="form-control
             {{ $errors->has('current2') ? 'is-invalid' : '' }}" 
             placeholder="This is the current bid">
             {{ old('current2') }}</label>
            @if($errors->has('current2')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('current2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="increment2">Minimum Increase Each Bid</label>
            <label name="increment2" id="increment2" class="form-control
             {{ $errors->has('increment2') ? 'is-invalid' : '' }}" 
             placeholder="This is the minimum Increase Each Bid">
             {{ old('increment2') }}</label>
            @if($errors->has('increment2')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('increment2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="customerBid">Your Bid</label>
            <input
             name="customerBid" type='number' id="customerBid" class="form-control
             {{ $errors->has('customerBid') ? 'is-invalid' : '' }}" 
             placeholder="This is the minimum Increase Each Bid">
             {{ old('customerBid') }}</label>
            @if($errors->has('customerBid')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('customerBid')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @endsection