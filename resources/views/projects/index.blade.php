@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">All Projects</div>
                    <div class="card-body">
                        <a href="{{route('projects.show-create')}}" class="btn btn-primary mb-2">Create Project</a>
                        <table class="table table-primary table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Link App</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $key=>$project)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->link_app}}</td>
                                    <td><img style="max-height:150px;" src="{{$project->imagePath()}}" /></td>
                                    <td>
                                        <a class="btn btn-primary" href="#">Update</a>
                                        <a class="btn btn-danger" href="#">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



