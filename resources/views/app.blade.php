@extends('layout')

@section('title', 'Bienvenue | ' . config('app.name'))

@push('stylesheet', '/app.css')

@section('content')

    <div class="text-center bg-body-tertiary p-4 rounded">

        <h1 class="p-4">{{ config('app.name') . ' !' }}</h1>

        <div class="text-center py-4">

            <label for="name" class="form-label lead">Nom</label>
            <div class="input-group mb-3 w-75 m-auto">
                <span class="input-group-text" id="name">@</span>
                <input type="text" class="form-control" placeholder="Votre nom" aria-label="name" aria-describedby="name">
            </div>

            <label for="seconLink" class="form-label lead">Calendrier 1</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="seconLink">#</span>
                <input type="text" class="form-control" placeholder="https://monpremierliendecalenedrier" aria-label="seconLink" aria-describedby="seconLink">
            </div>

            <label for="seconLink" class="form-label lead">Calendrier 2</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="seconLink">#</span>
                <input type="text" class="form-control" placeholder="https://monsecondliendecalenedrier" aria-label="seconLink" aria-describedby="seconLink">
            </div>

            <p class="m-4">
                <a class="btn btn-lg btn-primary btn-block" href="{{ route('app_confirm') }}" role="button">Fusioner</a>
            </p>

            <!-- <button class="btn btn-lg btn-primary btn-block" type="submit"><a href="./confirm">Envoyer</a></button> */ -->

        </div>

    </div>

@endsection
