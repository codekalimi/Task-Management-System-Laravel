@extends('layouts/app')

@section('title')
    Create a new Todos
@endsection

@section('content')
<h1 class="text-center my-5">CREATE A NEW TASK</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-primary">
            <div class="card-header bg-info"></div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
            <form action="/store-todo" method="post">
                @csrf
                <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Task Name" value="">
                </div>
                <div class="form-group">
                        <textarea name="description" cols="5" rows="5" class="form-control" placeholder="Description"></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn-success">Create</button>
                    <button class="btn-secondary">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
