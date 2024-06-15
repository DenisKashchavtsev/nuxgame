@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Registration</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('registration') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Enter your username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <div class="text-danger">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phonenumber">Phonenumber</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber"
                                       placeholder="Enter your phonenumber" value="{{ old('phonenumber') }}">
                                @if ($errors->has('phonenumber'))
                                    <div class="text-danger">
                                        {{ $errors->first('phonenumber') }}
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
