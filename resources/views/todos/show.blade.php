@extends('layouts/app')

@section('title')
    {{$todo->name}}
@endsection

@section('content')
<h1 class="text-center py-5">TODOS</h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card">
                                <div class="card-header text-center">
                                  {{$todo->name}}
                                </div>
                                <div class="card-body">
                                  <p class="card-text">
                                  {{ $todo->description }}
                                  </p>
                                  <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger ml-2 float-right">Delete</a>
                                  <a href="/todos/{{$todo->id}}/edit" class="btn btn-warning ml-2 float-right">Edit</a>
                                  <a href="/todos" class="btn btn-secondary float-right">Back</a>
                                </div>
                              </div>
                </div>
            </div>
@endsection
