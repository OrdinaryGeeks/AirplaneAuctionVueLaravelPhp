@extends('layouts.app')
@section('content')
    <h3 class="text-center">Create Airplane</h3>
    <form action="{{route('airplanes.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="model">New Airplane</label>
            <input type="text" name="model" id="model" class="form-control {{$errors->has('model') ? 'is-invalid' : '' }}" value="{{old('model')}}" placeholder="Enter Model">
            @if($errors->has('model'))
                <span class="invalid-feedback">
                    {{$errors->first('model')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Airplane Identifier</label>
            <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 
            'is-invalid' : '' }}" value="{{old('name')}}" placeholder="Enter Name">
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="built">Airplane Creation Date</label>
            <input type="date" name="built" id="built" class="form-control 
            {{$errors->has('built') ? 'is-invalid' : '' }}" value="{{old('built')}}" 
            placeholder="Enter Date Built">
            @if($errors->has('built'))
                <span class="invalid-feedback">
                    {{$errors->first('built')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="parts">Airplane Parts</label>
            <textarea name="parts" id="parts" rows="4" class="form-control {{$errors->has('parts') ? 
            'is-invalid' : ''}}" placeholder="Enter Airplane Parts">{{old('parts')}}</textarea>
            @if($errors->has('parts')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('parts')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="outright2">Outright Cost To Buy</label>
            <input name="outright2" type="text" id="outright2" class="form-control
             {{ $errors->has('outright2') ? 'is-invalid' : '' }}" 
             placeholder="Enter outright price to buy">
             {{ old('outright2') }}</input>
            @if($errors->has('built')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('outright2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="current2">Current Bid</label>
            <input name="current2" type="text"  id="current2" class="form-control
             {{ $errors->has('current2') ? 'is-invalid' : '' }}" 
             placeholder="This is the Current bid">
             {{ old('current2') }}</input>
            @if($errors->has('current2')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('current2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="increment2">Minimum Increase Each Bid</label>
            <input type="text" name="increment2" id="increment2" class="form-control
             {{ $errors->has('increment2') ? 'is-invalid' : '' }}" 
             placeholder="This is the minimum Increase Each Bid">
             {{ old('increment2') }}</input>
            @if($errors->has('increment2')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('increment2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection