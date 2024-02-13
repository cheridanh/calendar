@extends('layouts.app')

@section('title', 'Bienvenue | ' . config('app.name'))

@section('content')

    <h1 class="mb-5 text-body-emphasis">Bienvenue sur " {{ config('app.name') }} "</h1>

    <hr>

    <p class="col-lg-8 mx-auto fs-5">
        Pour commencer, dites nous combien de lien voulez-vous fusionner ?
    </p>

    <form method="GET" action="{{ route('calendars.create') }}" class="align-content-center text-center bg-body-tertiary p-4 rounded mx-auto">

        <div class="form-floating mx-auto">
            <select name="numberLinks" class="form-select mx-auto" id="floatingSelect" aria-label="Floating label select example">

                <option selected value="">Choisir un nombre</option>
                @for($i = 2; $i <= 10; $i++)
                    <option value="numberLinks">{{ $i }}</option>
                @endfor
            </select>
            <label for="numberLinks">Nombre de liens</label>
        </div>

        <input class="btn btn-lg btn-primary btn-block mb-0 mt-4" type="submit" name="Commencer" value="Commencer"/>

    </form>

@endsection
