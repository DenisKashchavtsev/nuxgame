@extends('layouts.app')

@section('title', 'Registration')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-8">
                    <div class="card-header">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.generateLink', [ 'user' => $user->id ]) }}" method="POST">
                            @csrf
                            <button type="submit">Generate New Unique Link</button>
                        </form>

                        <form action="{{ route('dashboard.deactivateLink', [ 'user' => $user->id ]) }}" method="POST">
                            @csrf
                            <button type="submit">Deactivate Unique Link</button>
                        </form>

                        <form action="{{ route('dashboard.history', [ 'user' => $user->id ]) }}" method="GET">
                            <button type="submit">History</button>
                        </form>

                        <form action="{{ route('dashboard.imFeelingLucky', [ 'user' => $user->id ]) }}" method="POST">
                            @csrf
                            <button type="submit">Imfeelinglucky</button>
                        </form>

                        @if(session('luckyResult'))
                            <p>Random Number: {{ session('luckyResult.number') }}</p>
                            <p>Result: {{ session('luckyResult.result') }}</p>
                            <p>Win Amount: {{ session('luckyResult.win_amount') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
