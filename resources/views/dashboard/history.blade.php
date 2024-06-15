@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-8">
                    <h1>Imfeelinglucky History</h1>

                    <ul>
                        @foreach ($history as $item)
                            <li>
                                <p>Number: {{ $item['number'] }}</p>
                                <p>Result: {{ $item['result'] }}</p>
                                <p>Win Amount: {{ $item['win_amount'] }}</p>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ url()->previous() }}">Back to Dashboard</a>

                </div>
            </div>
        </div>
    </div>
@endsection
