@extends('layouts.admin')

@section('content')
    <h1>Projects</h1>
    <div class="container mt-5">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Nuovo progetto</a>
        </div>
        <div class="card">
            
            <div class="card-header bg-primary text-white">
                
                <h2 class="mb-0">Listato dei projects</h2>
                
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">CLIENT NAME</th>
                            <th scope="col">CREATED AT</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead> 
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->client_name }}</td>
                            <td>{{ $project->created_at }}</td>
                            <td class="d-flex justify-content-around">
                                <div><a href="{{route('admin.projects.show', ['project'=> $project->id]) }}" class="btn btn-info">Apri</a></div>
                                <div><a href="{{route('admin.projects.edit', ['project'=> $project->id]) }}" class="btn btn-primary">Modica</a></div>
                                <div>
                                    <form action="{{route('admin.projects.destroy', ['project'=> $project->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Elimina
                                        </button>
                                    </form>
                                </div>

                                
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            
        </div>
        
    </div>
@endsection
