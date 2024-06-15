@extends('layouts.app')

@section('title', 'Registration Successful')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-8">
                    <h1>Deactivate Link Success</h1>
                    <p>Link deactivated successfully.</p>
                    <div class="link-container">
                        <div class="link-box">
                            <a href="{{ route('home') }}">Back to Registration</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
