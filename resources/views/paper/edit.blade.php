@extends('layouts.app')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <h1>Edit Paper | <b>{{$paper->title}}</b></h1>
                <form action="{{ route('papers.update', $paper->papid) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="papid">Paper ID</label>
                        <input type="text" class="form-control" name="papid" value="{{$paper->papid}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="title">Paper Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$paper->title}}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="papid">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{$paper->author}}">
                        @error('author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <a class="btn btn-info" href="{{ url()->previous() }}">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
