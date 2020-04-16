@extends('layouts.app')

@section('content')

    <form method="post" action="{{ url('todolist') }}">
        {{ csrf_field() }}
        <label class="block mb-4 ">
            <span class="text-gray-700">List Name</span>
            <input type="text" class="form-input mt-1 block w-full" id="name" name="name" aria-describedby="name" placeholder="List Name">
        </label>

        <label class="block ">
            <span class="text-gray-700">List Description</span>
            <input type="text" class="form-input mt-1 block w-full" id="description" name="description" aria-describedby="description" placeholder="List Description">
        </label>

        <input type="hidden" name="display_order" id="display_order" value="{{ $order }}">
        <button type="submit" class="btn-submit bg-gray-800 hover:bg-blue-800 text-gray-300 font-bold py-2 px-4 rounded mt-4 items-center">
            <i class="fas fa-save"></i> Save
        </button>
    </form>

@endsection
