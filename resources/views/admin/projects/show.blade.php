@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                
                <h1 class="mb-0">Progetto N.{{ $project->id }}</h1>
                <div><a href="{{route('admin.projects.edit', ['project'=> $project->id]) }}" class="btn btn-warning">Modica</a></div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="text-primary">Slug</h5>
                        <p class="border p-3 rounded bg-light">{{ $project->slug }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary">Type</h5>
                        <p class="border p-3 rounded bg-light">{{ $project->type ? $project->type->name : 'No type'}}</p>
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-primary">Technologies</h5>
                        @if (count($project->technologies) > 0)
                            @foreach ($project->technologies as $technology)
                                {{$technology->name}}
                            @endforeach
                            @else
                            No technology...
                        @endif
                    </div>


                    <div class="col-md-6">
                        <h5 class="text-primary">Nome del progetto</h5>
                        <p class="border p-3 rounded bg-light">{{ $project->name }}</p>
                    </div>

                    @if ($project->cover_image)
                    <div class="col-12 d-flex justify-content-center mb-4">
                        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->name }}" class="img-fluid hover-shadow rounded">
                    </div>
                @endif


                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="text-primary">Nome del cliente</h5>
                        <p class="border p-3 rounded bg-light">{{ $project->client_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-primary">Data di creazione</h5>
                        <p class="border p-3 rounded bg-light">{{ $project->created_at}}</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="text-primary">Data di aggiornamento</h5>
                        <p class="border p-3 rounded bg-light">{{ $project->updated_at}}</p>
                    </div>
                    <div class="col-md-12">
                        <h5 class="text-primary">Riassunto</h5>
                        <p class="border p-3 rounded bg-light">{{ $project->summary }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
