@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="fs-4 text-secondary my-4">{{isset($project)?'Modify project':'Add new project'}}</h2>

    <form action="{{isset($project)? route('admin.projects.update', $project) : route('admin.projects.store')}}" method="post">
        @csrf
        @if(isset($project))
            @method('patch')
        @endif

        <div class="row g-2">
            <div class="col-12 col-lg-6">
                <div class="card p-2 mb-2">
                    <label for="title" class="form-label">project title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{isset($project)? $project['title']:''}}">
                </div>
                <div class="card p-2">
                    <label for="imageUrl" class="form-label">project image url</label>
                    <input type="url" id="imageUrl" name="imageUrl" class="form-control" value="{{isset($project)? $project['imageUrl']:''}}">
                </div>
            </div>
            
            <div class="col-12 col-lg-6">
                <div class="card p-2">
                    <label for="description" class="form-label">project description</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{isset($project)? $project['description']:''}}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-2">
                    <label for="link" class="form-label">project GitHub link</label>
                    <input type="url" id="link" name="link" class="form-control" value="{{isset($project)? $project['link']:''}}">
                </div>
                <button class="btn btn-primary w-100 mt-2">Save project</button>
            </div>
        </div>
    </form>
  </div>
@endsection
