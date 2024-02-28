@extends('layouts.app')

@section('title', 'Test | ' . config('app.name'))

@section('content')

    <div class="container">
        <h1>Test de base de données !!!</h1>

        <div>
            Notre base de données contient {{ Calendar::all() }}
        </div>
    </div>

@endsection
