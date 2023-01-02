@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Project</div>

                    <div class="card-body">
                        <form role="form" method="POST" action="{{route('projects.store')}}" enctype='multipart/form-data'>
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="title">
                                <div id="titleHelp" class="form-text">Title of the project</div>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Image</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="logo" aria-describedby="image">
                                <div id="titleHelp" class="form-text">Image of the project</div>
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">App link</label>
                                <input type="text" class="form-control  @error('app_link') is-invalid @enderror" name="app_link" id="app_link" aria-describedby="app_link">
                                <div id="app_linkHelp" class="form-text">Application link of the project</div>
                                @error('app_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">GitHub link</label>
                                <input type="text" class="form-control @error('github_link') is-invalid @enderror" name="github_link" id="github_link" aria-describedby="github_link">
                                <div id="github_linkHelp" class="form-text">Github link of the project</div>
                                @error('github_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Tags</label>
                                <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" id="tags" aria-describedby="tags">
                                <div id="tags_help" class="form-text">Tags of the project, separate with ','</div>
                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Order</label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" name="order" id="order" aria-describedby="order" value="0">
                                <div id="order_help" class="form-text">Order of the project, how to display in top project</div>
                                @error('order')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

