@extends('layouts.app')

@section('title', 'Bienvenue | ' . config('app.name'))

@push('stylesheet', '/app.css')

@section('content')

    <form method="POST" action="{{ route('calendars.store') }}">
        @csrf

        <div class="text-center bg-body-tertiary p-4 rounded">

            <h1 class="p-4">{{ config('app.name') . ' !' }}</h1>

            <div class="text-center py-4">

                <label for="name" class="form-label lead">Nom de calendrier</label>
                <div class="input-group w-75 m-auto">
                    <span class="input-group-text">@</span>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nom "
                           aria-label="name" aria-describedby="name">
                </div>
                {!! $errors->first('name', '<span class="col-lg-8 mx-auto fs-5" style="color: red">:message</span>') !!}
                <br>
                <label for="url" class="form-label lead">Calendrier 1</label>
                <br>
                <div class="input-group">
                    <span class="input-group-text">#</span>
                    <input type="text" id="url" name="url[]" class="form-control"
                           placeholder="https://monpremierliendecalenedrier" aria-label="url"
                           aria-describedby="link1"><br>
                </div>
                {!! $errors->first('url', '<span class="col-lg-8 mx-auto fs-5" style="color: red">:message</span>') !!}
                <br>
                <label for="url" class="form-label lead">Calendrier 2</label>
                <div class="input-group">
                    <span class="input-group-text">#</span>
                    <input type="text" id="url" name="url[]" class="form-control"
                           placeholder="https://monsecondliendecalenedrier" aria-label="url"
                           aria-describedby="url">
                </div>
                {!! $errors->first('url', '<span class="col-lg-8 mx-auto fs-5" style="color: red">:message</span>') !!}
                <br>
                <input class="btn btn-lg btn-primary btn-block m-4" type="submit" name="submit" value="Fusioner"/>

            </div>

        </div>
    </form>

@endsection

