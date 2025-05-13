@extends('layout')

@section('body')

    <div class="d-flex justify-content-between">
        <h3 class="mb-9">type_fonction</h3>
        <p>
            <a href="{{ route('configuration.type_fonction.add-form') }}" class="btn btn-primary">Nouveau <i class="ti ti-plus"></i></a>
        </p>
    </div>

    <div class="text-nowrap">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>type_fonction</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">

            @foreach($type_fonctions as $type_fonction)
                <tr>
                    <td>{{ $type_fonction->id }}</td>
                    <td>{{ $type_fonction->libelle }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="">

                                <a class="dropdown-item" href="{{ route('configuration.type_fonction.edit-form', $type_fonction) }}"><i
                                        class="ti ti-edit me-1"></i> Modifier</a>

                                <form class="delete_form" action="{{ route('configuration.type_fonction.delete', $type_fonction) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item" type="submit"><i class="ti ti-trash me-1"></i>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
