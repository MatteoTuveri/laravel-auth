@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex flex-column align-items-center">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('storage/'. $project->image)}}" class="card-img-top" alt="{{ $project->title }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $project->title }}</h5>
                  <p class="card-text">{{ $project->description }}</p>
                </div>
            </div>
            <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Return to the Dashboard</a>
        </div>
    </div>
@endsection