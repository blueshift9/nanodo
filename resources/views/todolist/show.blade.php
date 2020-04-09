@extends('layouts.app')

@section('content')

    <div class="flex flex-col break-words bg-white border border-2 shadow-md mb-5">
        <div class="font-semibold bg-gray-800 text-gray-300 py-3 px-6 mb-0">
            {{ $list->name }}
        </div>

        <div class="w-full p-6">
            <p class="text-gray-700">
                {{ $list->description }}
            </p>
        </div>

        <div class="w-full p-6">
            <ul id="items" class="">
                {{--<li class="sort-handle">item 1</li>
                <li class="sort-handle">item 2</li>
                <li class="sort-handle">item 3</li>--}}
                @foreach($list->listitems as $listitem)
                    <li class="sort-handle" data-id="{{ $listitem->id }}">{{ $listitem->body }}</li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection

@push('scripts')
    <style>
        .sort-handle {
            cursor: move;
            margin: 10px 0;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
            var el = document.getElementById('items');
            var sortable = Sortable.create(el, {
                ghostClass: "sortable-ghost",  // Class name for the drop placeholder
                chosenClass: "sortable-chosen",  // Class name for the chosen item
                dragClass: "sortable-drag",  // Class name for the dragging item
                animation: 150,  // ms, animation speed moving items when sorting, `0` — without animation
                handle: ".sort-handle",  // Drag handle selector within list items
                onUpdate: function (evt) {
                    arr = [];
                    $( ".sort-handle" ).each(function( index ) {
                        arr.push($( this ).data('id'));
                    });
                    // same properties as onEnd
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        url: "{{ url('listitem/changeorder') }}",
                        type: 'post',
                        data: {
                            order: arr
                        },
                        success: function (result) {
                            //window.location.reload();
                            toastr.success('Order updated.')
                        },
                        complete: function () {
                        }
                    });
                },
            });

    </script>
@endpush
