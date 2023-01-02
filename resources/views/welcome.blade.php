@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Top Projects</h3></div>

                    <div class="card-body row align-content-center">
                        @foreach($projects as $project)
                            <div class="card col-md-4 card-size">
                                <img class="card-img-top" src="{{$project->imagePath()}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$project->title}}</h5>
                                    <p class="card-text">{{$project->description}}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        @foreach($project->tags as $tag)
                                            <span class="badge rounded-pill"
                                                  style="background-color: {{$tag->bg_color}}">{{$tag->title}}</span>
                                        @endforeach
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <a href="{{$project->link_app}}" class="card-link" target="_blank">
                                        Application link
                                    </a>
                                    <a href="{{$project->link_github}}" class="card-link" target="_blank">
                                        GitHub link
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .card-size {
        / / width: 20 rem;
            padding: 2rem 2rem;
            align-content: center;
        }
    </style>
@endpush
