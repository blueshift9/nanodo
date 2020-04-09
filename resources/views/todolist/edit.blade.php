@extends('layouts.app')

@section('content')


    <form method="post" action="{{ url('todolist.update') }}">
        {{ csrf_field() }}
        <label class="block form-control">
            <span class="text-gray-700">List Name</span>
            <input type="text" class="form-input mt-1 block w-full" id="name" name="name" aria-describedby="name" placeholder="List Name">
        </label>

        <label class="block form-control">
            <span class="text-gray-700">List Description</span>
            <input type="text" class="form-input mt-1 block w-full" id="description" name="title" aria-describedby="description" placeholder="List Description">
        </label>

        <button type="submit" class="btn-submit form-control">
            <i class="fas fa-plus"></i> Save
        </button>
    </form>

@endsection
