@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card border-0 rounded-3 shadow-lg">
            <div class="card-header bg-primary text-white py-3">
                <h1 class="mb-0">Modifica Progetto: {{ $project->name }}</h1>
            </div>
            <div class="card-body">
                <form  action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del Progetto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Immagine</label>

                        <input type="file" class="form-control" id="cover_image" name="cover_image">
                        @if ($project->cover_image)

                        <img width="100" src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->name }}" class="img-fluid hover-shadow rounded">
                            
                        @else
                        <small>
                            Nessuna immagine selezionata
                        </small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="type_id" >Tipo di Progetto</label>
                        <select name="type_id" id="type_id" class="form-select">
                            <option value="1">Seleziona un tipo</option>
                            @foreach ($types as $type)
                                <option @selected($type->id == old('type_id', $project->type_id)) value="{{ $type->id}}">{{ $type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="client_name" class="form-label">Nome del Cliente</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('client_name', $project->client_name) }}">
                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label">Descrizione</label>
                        <textarea class="form-control" id="summary" name="summary" rows="10">{{ old('summary', $project->summary) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">Salva Modifiche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
