@extends('layout')


@section('body')

    @error('libelle')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('configuration.fonction') }}">type_fonction</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{  !$type_fonction->id ? 'Nouvel type_fonction' : 'Modification type_fonction' }}
            </li>
        </ol>
    </nav>

    <div class="card mt-9">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"> type_fonction</h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ $type_fonction->id ? route('configuration.type_fonction.edit-form', $type_fonction) : route('configuration.type_fonction.add-form') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        @include('Components.input', ['type' => 'string', 'label' => 'type_fonction', 'name' => 'libelle' , 'value' => $type_fonction->libelle])
                        <button type="submit" class="btn btn-primary">{{  $type_fonction->id ? 'Modifier' : 'Enregistrer' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
