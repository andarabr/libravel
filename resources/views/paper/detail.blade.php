@extends('layout.master')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <h1>Detail Paper</h1>
                <form action="{{ route('papers.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="papid">Paper ID</label>
                        <input type="text" class="form-control" name="papid" value="{{$papers->papid}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="title">Paper Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$papers->title}}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="papid">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{$papers->author}}">
                        @error('author')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
