@extends('layouts.app')

@section('title', 'Formulaire de création')

@push('stylesheet', '/app.css')

@section('content')

    <form method="POST" action="{{ route('calendar.store') }}">
        @csrf

        <div class="text-center bg-body-tertiary p-4 rounded">

            <h1 class="">{{ config('app.name') }}</h1>
            <hr>

            <div class="text-center py-4">

                <label for="name" class="form-label lead">Nom de calendrier</label>
                <div class="input-group w-75 mx-auto mb-4">
                    <span class="input-group-text">@</span>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nom " aria-label="name" aria-describedby="name">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @for($i = 1; $i <= 2; $i++)
                    <label for="url" class="form-label lead">Calendrier {{ $i }}</label>
                    <div class="input-group mx-auto mb-4">
                        <span class="input-group-text">#</span>
                        <input type="text" id="url" name="url[]" class="form-control" placeholder="https://un-lien-de-calenedrier" aria-label="url" aria-describedby="link1">
                    </div>
                    @error('url')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                @endfor

                <input class="btn btn-lg btn-primary btn-block mb-0 mt-4" type="submit" name="submit" value="Fusioner"/>

            </div>

        </div>
    </form>

@endsection
