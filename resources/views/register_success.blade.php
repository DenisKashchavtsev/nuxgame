@extends('layouts.app')

@section('title', 'Registration Successful')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-8">
                    <div class="card-body">
                        <h1>Registration Successful</h1>
                        <p>Your registration was successful. Use the link below to access your special page:</p>
                        <div class="link-container">
                            <div class="link-box">
                                <a href="{{ $link }}">{{ $link }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
