{{-- <link rel="stylesheet" href="{{ asset('login.css')}}"> --}}
@extends('layouts.app')
@section('content')
@include('layouts.navigation')

<div class="">
    <section class="container mt-3 mb-3">
        <div class="custom-flex">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Project
            </button>
        </div>
        <div class="row">
                @foreach($projects as $project)
                <div class="card col-md-3 m-2" style="width: 18rem;">
                    <div class="card-body">
                        <a href="/project/{{ $project->slug }}" class="card-title text-info text-decoration-none custom-title">{{ $project->title}} </a>
                        <div class="custom-flex mt-5">
                            <form action="/project/{{$project->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link link text-info text-decoration-none">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
        </section>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/project" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Project Title</label>
                            <input required name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea required name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Project</button>
                    </div>
            </form>
            </div>
        </div>
    </div>

    @endsection
