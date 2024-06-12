@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card border-0 rounded-3 shadow-lg">
            <div class="card-header bg-primary text-white py-3">
                <h1 class="mb-0">Crea un Nuovo Progetto</h1>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
          @endif
            </div>
            <div class="card-body">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome del Progetto</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome del progetto" value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="client_name" class="form-label">Nome del Cliente</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Inserisci il nome del cliente" value="{{old('client_name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Immagine del Progetto</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image">
                    </div>

                    <div class="mb-3">
                        <label for="summary" class="form-label">Sommario</label>
                        <textarea class="form-control" id="summary" name="summary" rows="10" placeholder="Inserisci un sommario del progetto"{{old('summary')}}></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="type_id" >Tipo di Progetto</label>
                        <select name="type_id" id="type_id" class="form-select">
                            <option value="1">Seleziona un tipo</option>
                            @foreach ($types as $type)
                                <option @selected($type->id == old('type_id')) value="{{ $type->id}}">{{ $type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="type_id">Tipo di Tecnologia</label>
                        <div class="row">
                            @foreach ($technologies as $technology)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $technology->id }}" id="tag-{{ $technology->id }}">
                                                <label class="form-check-label" for="tag-{{ $technology->id }}">
                                                    {{ $technology->name }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">Crea Progetto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
