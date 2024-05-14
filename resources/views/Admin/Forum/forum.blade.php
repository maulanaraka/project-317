@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="w-1/2 h-1/2 mx-auto mt-40 border-2 border-black p-2">
    
    <a href="/organizer/report" class="hover:font-bold font-semibold text-lg block text-[15px] lg:border-b-2 lg:border-[#000000]">Report</a>

        {{-- @if (Session::has('error'))
            <p class="text-red-500">{{ Session::get('error') }}</p>
        @endif
        @if (Session::has('success'))
            <p class="text-green-500">{{ Session::get('success') }}</p>
        @endif

        @forelse ($myEvents as $event)
            <div class="w-[60%] h-1/2 m-auto border-2 border-black">
                <ul class="text-center">
                    <li>Title : {{ $event->title }}</li>
                    <li>Deskripsi : {{ $event->description }}</li>
                    <li>Tgl_dimulai : {{ $event->event_date }}</li>
                    <li>Category : {{ $event->category_name }}</li>
                    <div class="w-[100px] h-[100px] m-auto">
                        <img src="{{ Storage::url('event/') . $event->media }}"
                            class="w-full h-full object-cover rounded-full">
                    </div>
                    <div>Status : <span
                            class="{{ $event->event_is_approve ? 'text-green-500' : 'text-red-500' }}">{{ $event->event_is_approve ? 'Approved' : 'Pending' }}</span>
                    </div>

                    <div class="flex justify-center gap-3">
                        <form action="/organizer/deleteEvent" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $event->id }}" id="">
                            <input type="hidden" name="mediaHidden" value="{{ $event->media }}" id="">
                            <button type="submit" class="w-14 h-10 border-2 border-black text-center bg-red-500"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                        <a href="/organizer/{{ $event->id }}/formUpdateEvent"
                            class="w-14 h-10 border-2 border-black text-center bg-yellow-500">Edit</a>

                        <a href="/organizer/{{ $event->id }}/detailEvent"
                            class="w-14 h-10 border-2 border-black text-center bg-lime-200">Detail</a>

                        @if ($event->event_is_approve)     
                        <form action="/organizer/updateEventStatus" method="POST">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $event->id }}" id="">
                            <button type="submit" class="w-14 h-10 border-2 border-black text-center bg-green-400"
                                onclick="return confirm('Are you sure?')">Accept</button>
                        </form>
                        @endif


                    </div>

                </ul>
            </div>
        @empty
            <h1 class="text-center text-4xl">Belum ada event</h1>
        @endforelse --}}


    </div>
@endsection
