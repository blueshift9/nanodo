@extends('layouts.app')

@section('content')

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

@endsection
