@extends('layouts.app')

@section('title', 'Confirmation | ' . config('app.name'))

@section('content')

    <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
            <h1 class="text-body-emphasis">Vos " {{ $calendar->links->count() }} " liens ont été envoyés avec succès !</h1>
            <br>
            <p class="col-lg-8 mx-auto fs-5">
                {{ $calendar->name }}
            </p>
            <figure>
                <blockquote class="blockquote">
                    <p class="text-muted">
                        https://calendar.google.com/calendar/ical/ke4clct1v2n1n2hmqih6i4pj5re45kg0%40import.calendar.google.com/public/basic.ics
                    </p>
                </blockquote>
            </figure>
            <br>
            <p class="col-lg-8 mx-auto fs-5">
                Liens envoyées
            </p>
            @foreach($calendar->links as $links)
                <figure>
                    <blockquote class="blockquote">
                        <p class="text-muted">
                           {{ $links->url }}
                        </p>
                    </blockquote>
                </figure>
            @endforeach
            <p><a class="btn btn-lg btn-success rounded-pill" href="{{ route('calendars.show', $calendar) }}"
                  role="button">Gérer</a></p>
        </div>
    </div>

@endsection
