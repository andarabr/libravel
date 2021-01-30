@extends('layout.master')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="py-4 d-flex justify-content-end align-items-center">
                    <h1 class="mr-auto">Paper List</h1>
                    <a class="btn btn-primary" href="{{ route('papers.create')}}">Add</a>
                </div>


                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Paper ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($papers as $paper)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('papers.detail', ['papid' => $paper->papid])}}">{{$paper->papid}}</a></td>
                                <td>{{$paper->title}}</td>
                                <td>{{$paper->author}}</td>
                                <td><a href="{{route('papers.edit', ['papid' => $paper->papid])}}">edit</a> | <a href="{{route('papers.destroy', ['papid' => $paper->papid])}}">delete</a></td>
                                <td><form action="{{route('papers.destroy', ['papid' => $paper->papid])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="alert('yakin?')" type="submit">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
