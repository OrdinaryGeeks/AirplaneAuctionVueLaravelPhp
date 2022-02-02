@extends('layouts.app')
@section('content')
    <h3 class="text-center">Edit Airplane</h3>
    <form action="{{route('airplanes.update',$airplane->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="model">Airplane Model</label>
            <input type="text" name="model" id="model" class="form-control 
            {{ $errors->has('model') ? 'is-invalid' : '' }}" 
            value="{{ old('model') ? : $airplane->model }}" placeholder="Enter Model">
            @if($errors->has('model')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('model')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Airplane Identifier</label>
            <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 
            'is-invalid' : '' }}" value="{{old('name') ? : 
            $airplane->name}}" placeholder="Enter Name">
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="built">Airplane Creation Date</label>
            <input name="built" type="date" id="built"  value=""
        min="1997-01-01" max="2030-12-31" class="form-control
             {{ $errors->has('built') ? 'is-invalid' : '' }}" 
             placeholder="Enter Airplane Description"
             value="{{ old('built') ? : $airplane->built }}"></textarea>
            @if($errors->has('built')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('built')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="parts">Airplane Parts</label>
            <textarea name="parts" id="parts" rows="4" class="form-control
             {{ $errors->has('parts') ? 'is-invalid' : '' }}" 
             placeholder="Enter Airplane Description">
             {{ old('parts') ? : $airplane->parts }}</textarea>
            @if($errors->has('parts')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('parts')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
      
        <div class="form-group">
            <label for="outright2">Outright Cost To Buy</label>
            <input name="outright2" type="number" id="outright2" class="form-control
             {{ $errors->has('outright2') ? 'is-invalid' : '' }}" 
             placeholder="Enter outright price to buy">
             {{ old('outright2') }}</input>
            @if($errors->has('outright2')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('outright2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="current2">Current Bid</label>
            <input name="current2" type="number"  id="current2" class="form-control
             {{ $errors->has('current2') ? 'is-invalid' : '' }}" 
             placeholder="This is the current bid">
             {{ old('current2') }}</input>
            @if($errors->has('current2')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('current2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="increment2">Minimum Increase Each Bid</label>
            <input name="increment2" type="number" id="increment2" class="form-control
             {{ $errors->has('increment2') ? 'is-invalid' : '' }}" 
             placeholder="This is the minimum Increase Each Bid">
             {{ old('increment2') }}</input>
            @if($errors->has('increment2')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('increment2')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection