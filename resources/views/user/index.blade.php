@extends('layouts.app')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="py-4 d-flex justify-content-end align-items-center">
                    <h1 class="mr-auto">User List</h1>
                    <a class="btn btn-primary" href="{{ route('users.create')}}">Add</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                {{-- <td><a href="{{route('users.detail', ['user' => $user->name])}}">{{$user->name}}</a></td> --}}
                                <td><a href="#">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>
                                    {{-- <div class="btn-group" role="group" aria-label="Basic example">
                                        <a role="button" class='btn btn-warning btn-sm' href="{{route('users.edit', ['user' => $user->id])}}">edit</a>
                                        <form action="{{route('users.destroy', ['user' => $user->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm" onclick="alert('yakin?')" type="submit">delete</button>
                                        </form>
                                    </div> --}}
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
