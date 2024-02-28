@extends('layouts.app')

@section('title', 'Nouveau Calendrier')

@section('content')

    <h1 class="mb-5 text-body-emphasis">Nouveau calendrier " {{ $calendar->name }} "</h1>
    <hr>
    <div class="m-5">
        <p class="col-lg-8 mx-auto fs-5">
            Lien du nouveau calendrier : <br>
            <a href="{{ route('calendar.show', $calendar) }}">babab</a>
        </p>
    </div>
    <p class="col-lg-8 mx-auto fs-5">
        Lien transmis :
    </p>
    @foreach($calendar->links as $links)
        <figure class="">
            <blockquote class="blockquote">
                <p class="text-muted">
                    {{ $links->url }}
                </p>
            </blockquote>
        </figure>
    @endforeach
    <br>
{{--

    <div class="d-inline-flex gap-2 mb-3">
        <button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button">
            <i class="bi-arrow-counterclockwise"></i>
        </button>
        <button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button">
            <i class="bi-arrow-counterclockwise"></i>
        </button>
        <p>
            <a class="btn btn-lg btn-success rounded-pill" href="{{ route('calendar.edit', $calendar) }}"
               role="button">Gérer</a>
        </p>
    </div>
--}}

@endsection
