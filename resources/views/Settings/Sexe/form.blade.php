@extends('layout')


@section('body')

    @error('libelle')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('configuration.sexe') }}">sexe</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{  !$sexe->id ? 'Nouvel sexe' : 'Modification sexe' }}
            </li>
        </ol>
    </nav>

    <div class="card mt-9">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> sexe</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ $sexe->id ? route('configuration.sexe.edit-form', $sexe) : route('configuration.sexe.add-form') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        @include('Components.input', ['type' => 'string', 'label' => 'Sexe', 'name' => 'libelle' , 'value' => $sexe->libelle])
                        <button type="submit" class="btn btn-primary">{{  $sexe->id ? 'Modifier' : 'Enregistrer' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
