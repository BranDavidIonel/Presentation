@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Project</div>

                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="title">
                                <div id="titleHelp" class="form-text">Title of the project</div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="image" aria-describedby="image">
                                <div id="titleHelp" class="form-text">Image of the project</div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">App link</label>
                                <input type="text" class="form-control" name="app_link" id="app_link" aria-describedby="app_link">
                                <div id="app_linkHelp" class="form-text">Application link of the project</div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">GitHub link</label>
                                <input type="text" class="form-control" name="github_link" id="github_link" aria-describedby="github_link">
                                <div id="github_linkHelp" class="form-text">Github link of the project</div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Tags</label>
                                <input type="text" class="form-control" name="tags" id="tags" aria-describedby="tags">
                                <div id="tags_help" class="form-text">Tags of the project, separate with ','</div>
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Order</label>
                                <input type="number" class="form-control" name="order" id="order" aria-describedby="order" value="0">
                                <div id="order_help" class="form-text">Order of the project, how to display in top project</div>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

