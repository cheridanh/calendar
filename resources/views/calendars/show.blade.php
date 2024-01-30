@extends('layouts.app')

@section('title', 'Gestion | ' . config('app.name'))

@section('content')

    <div class="container my-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
            <h1 class="text-body-emphasis">Gestion du calendrier</h1>
            <br>
            <p class="col-lg-8 mx-auto fs-5">
                Lien transmis
            </p>
            <figure>
                <blockquote class="blockquote">
                    <p class="text-muted">
                        https://calendar.google.com/calendar/ical/ke4clct1v2n1n2hmqih6i4pj5re45kg0%40import.calendar.google.com/public/basic.ics
                    </p>
                    <p class="text-muted">
                        https://calendar.google.com/calendar/ical/ke4clct1v2n1n2hmqih6i4pj5re45kg0%40import.calendar.google.com/public/basic.ics
                    </p>
                </blockquote>
            </figure>
            <br>
            <p class="col-lg-8 mx-auto fs-5">
                Régénérer un nouveau lien de calendrier ?
            </p>
            <div class="d-inline-flex gap-2 mb-3">
                <button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button">
                    <i class="bi-arrow-counterclockwise"></i>
                </button>
            </div>
        </div>
    </div>

@endsection
