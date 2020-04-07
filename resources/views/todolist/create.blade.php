@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <form method="post" action="{{ route('todolist.store') }}">
                    {{ csrf_field() }}
                    <label class="block form-control">
                        <span class="text-gray-700">List Name</span>
                        <input type="text" class="form-input mt-1 block w-full" id="name" name="name" aria-describedby="name" placeholder="List Name">
                    </label>

                    <label class="block form-control">
                        <span class="text-gray-700">List Description</span>
                        <input type="text" class="form-input mt-1 block w-full" id="description" name="title" aria-describedby="description" placeholder="List Description">
                    </label>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                    <button  type="submit" class="btn-submit form-control">
                        <i class="fas fa-plus"></i> Save
                    </button>
                </form>
        </div>
    </div>
@endsection
