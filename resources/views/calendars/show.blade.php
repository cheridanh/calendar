@extends('layouts.app')

@section('title', 'Gestion | ' . config('app.name'))

@section('content')

    <h1 class="mb-5 text-body-emphasis">{{ $calendar->name }}</h1>
    <hr>
    <p class="mt-5 col-lg-8 mx-auto fs-5">
        Lien transmis
    </p>
    @foreach($calendar->links as $links)
        <figure class="">
            <blockquote class="blockquote">
                <p class="text-muted">
                    {{ file_get_contents($links->url) }}
                </p>
            </blockquote>
        </figure>
    @endforeach
    <br>
    <p class="mt-2 col-lg-8 mx-auto fs-5">
        Lien de calendrier fusionner !
    </p>
    <div class="d-inline-flex gap-2 mb-3">
        <button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button">
            <i class="bi-arrow-counterclockwise"></i>
        </button>
        <button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button">
            <i class="bi-arrow-counterclockwise"></i>
        </button>
        <p>
            <a class="btn btn-lg btn-success rounded-pill" href="{{ route('calendars.edit', $calendar) }}"
               role="button">Gérer</a>
        </p>
    </div>

@endsection
