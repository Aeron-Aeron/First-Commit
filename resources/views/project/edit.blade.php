{{-- <link rel="stylesheet" href="{{ asset('login.css')}}"> --}}
@extends('layouts.app')
@section('content')
@include('layouts.navigation')

<div class="">
    <section class="container mt-3 mb-3">
        <div class="">
            <a href="/" class="text-info text-decoration-none text-uppercase">Projects</a>
            <span>>></span>
            <a href="" class="text-info text-decoration-none text-uppercase"> Project Title</a>
        </div>



        <div class="row mt-4">
            <div class="col-md-8">
                @foreach($project->task()->get() as $task)
                <div class="mb-3">
                    <form method="POST" action="/project/{{ $project->slug }}/task/{{ $task->id }}">
                        @method('PATCH')
                        @csrf
                        <div style="display: flex">
                            <input class="m-1" name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>

                            <input name="body" value="{{ $task->body }}" class="form-control {{ $task->completed ? 'line-through text-muted' : '' }}">
                        </div>
                    </form>
                </div>
                @endforeach

                <div class="modal-body">
                    <div class="">
                        <form action="/project/{{$project->slug}}/task" method="POST">
                            @csrf
                            <label for="exampleFormControlTextarea1" class="form-label">Add Task</label>
                            <input placeholder="Add a new task..." class="form-control" name="body">
                        </form>
                    </div>
                </div>
                <form action="/project/{{$project->slug}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea required name="description" class="form-control" id="exampleFormControlTextarea1" rows="10">
                                {{ $project->description }}
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                    <div class="bg-body modal-body">
                        <div class="">
                            <form action="/project/{{ $project->slug}}/invitations" method="POST">
                                @csrf
                                <label for="exampleFormControlTextarea1" class="form-label">Add Members</label>
                                <input type="email" placeholder="Add a new members..." class="form-control" name="email">
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</div>
@endsection
