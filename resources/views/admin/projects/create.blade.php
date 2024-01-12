@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Post create</h1>
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control @error ('title') is-invalid @enderror" placeholder="title" name="title" maxlength="200" minlength="5" required>
                @error('title')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <textarea class="form-control @error ('body') is-invalid @enderror" placeholder="description" name="description" cols="30" rows="10"></textarea>
                @error('description')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" class="form-control @error ('technologies') is-invalid @enderror" placeholder="technologies" name="technologies">
                @error('technologies')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="text" class="form-control @error ('authors') is-invalid @enderror" placeholder="authors" name="authors">
                @error('authors')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="date" class="form-control @error ('release_date') is-invalid @enderror" placeholder="release_date" name="release_date">
                @error('release_date')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">submit</button>
            <button type="reset">reset</button>
            <a href="{{ route('admin.projects.index') }}">Back to Home</a>
            
        </form>
    </section>
    
@endsection