@extends('layout')


@section('body')

    @error('libelle')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('configuration.type_contrat') }}">type_contrat</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{  !$type_contrat->id ? 'Nouvel type_contrat' : 'Modification type_contrat' }}
            </li>
        </ol>
    </nav>

    <div class="card mt-9">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> type_contrat</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ $type_contrat->id ? route('configuration.type_contrat.edit-form', $type_contrat) : route('configuration.type_contrat.add-form') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        @include('Components.input', ['type' => 'string', 'label' => 'type_contrat', 'name' => 'libelle' , 'value' => $type_contrat->libelle])
                        <button type="submit" class="btn btn-primary">{{  $type_contrat->id ? 'Modifier' : 'Enregistrer' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
