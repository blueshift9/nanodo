@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    This page is not in use yet, a route should not even resolve here
                </div>

            <div class="flex flex-col mx-0 my-4 w-1/3">
                <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-plus-square"></i>
                    <span>&nbsp;Create New List</span>
                </button>
            </div>

            @forelse($user->lists as $list)
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mb-5">
                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    {{ $list->name }}
                </div>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        {{ $list->description }}
                    </p>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
