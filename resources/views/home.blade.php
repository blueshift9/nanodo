@extends('layouts.app')

@section('content')
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }
        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
    <div class="flex flex-col mx-0 mb-4 w-full items-center">
        {{--<button class="bg-gray-800 hover:bg-blue-800 text-gray-300 font-bold py-2 px-4 rounded inline-flex items-center">
            <i class="fas fa-plus-square"></i>
            <a href="/todolist/create"><span>&nbsp;Create New List</span></a>
        </button>--}}
        <button class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full">Open Modal</button>

    </div>

    @forelse($user->lists as $list)
        <div class="flex flex-col break-words bg-white border border-2 shadow-md mb-5 todolist-box" data-id="{{ $list->id }}">
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
                <button class="bg-red-800 hover:bg-red-600 text-gray-300 font-bold py-2 px-4 rounded inline-flex items-center delete-list" data-id="{{ $list->id }}">
                    <i class="fas fa-trash"></i>
                    <span>&nbsp;Delete</span>
                </button>
            </div>
        </div>
    @empty
    @endforelse
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Create New List</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>

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

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="btn-submit bg-gray-800 hover:bg-blue-800 text-gray-300 font-bold py-2 px-4 mr-2 rounded mt-4 items-center">Save</button>
                        <button class="modal-close  bg-gray-800 hover:bg-blue-800 text-gray-300 font-bold py-2 px-4 rounded mt-4 items-center">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function(event){
                event.preventDefault()
                toggleModal()
            })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };


        function toggleModal () {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }

        $('.delete-list').on( "click", function() {
            var id = $(this).data('id');
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                url: "{{ url('todolist') }}/" + id,
                type: 'delete',
                error: function(result) {

                },
                success: function (result) {
                    toastr.success(result);
                    $(".todolist-box[data-id='" + id +"']").fadeOut(1000);
                },
            });
        });


    </script>
@endpush
