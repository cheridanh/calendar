@extends('layout')

@section('title', 'Bienvenue | ' . config('app.name'))

@push('stylesheet', '/app.css')

@section('content')

    <form method="POST" action="{{ route('calendars.store') }}">
        @csrf

        <div class="text-center bg-body-tertiary p-4 rounded">

            <h1 class="p-4">{{ config('app.name') . ' !' }}</h1>

            <div class="text-center py-4">

                <label for="nom" class="form-label lead">Nom</label>
                <div class="input-group mb-3 w-75 m-auto">
                    <span class="input-group-text">@</span>
                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom" aria-label="name" aria-describedby="name">
                </div>

                <label for="link1" class="form-label lead">Calendrier 1</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">#</span>
                    <input type="text" id="link1" name="link1" class="form-control" placeholder="https://monpremierliendecalenedrier" aria-label="link" aria-describedby="seconLink">
                </div>

                <label for="link2" class="form-label lead">Calendrier 2</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">#</span>
                    <input type="text" id="link2" name="link2" class="form-control" placeholder="https://monsecondliendecalenedrier" aria-label="link" aria-describedby="seconLink">
                </div>

                <input class="btn btn-lg btn-primary btn-block m-4" type="submit" name="submit" value="Fusioner" />

            </div>

        </div>
    </form>

@endsection
