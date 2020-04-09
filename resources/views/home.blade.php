@extends('layouts.app')

@section('content')

    <div class="flex flex-col mx-0 mb-4 w-full items-center">
        <button class="bg-gray-800 hover:bg-blue-800 text-gray-300 font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-plus-square"></i>
            <a href="/todolist/create"><span>&nbsp;Create New List</span></a>
        </button>
    </div>

    @forelse($user->lists as $list)
        <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mb-5">
            <div class="font-semibold bg-gray-800 text-gray-300 py-3 px-6 mb-0">
                {{ $list->name }}
            </div>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    {{ $list->description }}
                </p>
            </div>

            <div class="w-full p-6">
                <button class="bg-gray-800 hover:bg-blue-800 text-gray-300 font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-list-alt"></i>
                    <a href="{{ route('todolist.show', [$list->id]) }}">&nbsp;View </a>
                </button>
                <button class="bg-gray-800 hover:bg-blue-800 text-gray-300 font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-plus-square"></i>
                    <span>&nbsp;Add to List</span>
                </button>
            </div>
        </div>
    @empty
    @endforelse

@endsection
