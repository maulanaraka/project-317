@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="container mx-auto mt-40 px-4">
        @if (Session::has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <span class="block sm:inline">{{ Session::get('error') }}</span>
            </div>
        @endif
        @if (Session::has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <span class="block sm:inline">{{ Session::get('success') }}</span>
            </div>
        @endif

        <form action="/organizer/listMyEvent/search" method="POST" class="mb-6">
            @csrf
            @method('post')
            <div class="flex items-center mb-4">
                <input type="text" placeholder="Search"
                    class="flex-1 appearance-none rounded-l border border-gray-400 py-2 px-4 bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" name="search" />
                <button type="submit"
                    class="w-auto bg-blue-500 text-blue border border-blue-500 rounded-r focus:outline-none hover:bg-blue-700 px-4 py-2">Search</button>
            </div>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse ($myEvents as $event)
                <div class="border border-gray-300 rounded-lg p-4">
                    <ul class="text-center">
                        <li class="font-semibold text-lg mb-2">{{ $event->title }}</li>
                        <li class="mb-2">{{ $event->description }}</li>
                        <li class="mb-2">Tanggal Dimulai: {{ $event->event_date }}</li>
                        <li class="mb-2">Kategori: {{ $event->category_name }}</li>
                        <div class="w-32 h-32 mx-auto mb-4">
                            <img src="{{ Storage::url('event/') . $event->media }}"
                                class="w-full h-full object-cover rounded-full">
                        </div>
                        <div class="mb-4">
                            Status: <span
                                class="{{ $event->event_is_approve ? 'text-green-500' : 'text-red-500' }}">{{ $event->event_is_approve ? 'Approved' : 'Pending' }}</span>
                        </div>

                        <div class="flex justify-center gap-3">
                            <form action="/organizer/deleteEvent" method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <input type="hidden" name="mediaHidden" value="{{ $event->media }}">
                                <button type="submit"
                                    class="w-auto bg-red-500 text-white rounded focus:outline-none hover:bg-red-700 px-4 py-2"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>

                            <a href="/organizer/{{ $event->id }}/formUpdateEvent"
                                class="w-auto bg-yellow-500 text-white rounded focus:outline-none hover:bg-yellow-700 px-4 py-2">Edit</a>

                            <a href="/organizer/{{ $event->id }}/detailEvent"
                                class="w-auto bg-lime-200 text-black rounded focus:outline-none hover:bg-lime-400 px-4 py-2">Detail</a>

                            @if ($event->event_status)
                                <div
                                    class="w-auto bg-green-400 text-white rounded focus:outline-none px-4 py-2">Kode :
                                    {{ $event->id }}</div>
                            @elseif($event->event_is_approve)
                                <form action="/organizer/updateEventStatus" method="POST">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="id" value="{{ $event->id }}">
                                    <button type="submit"
                                        class="w-auto bg-green-400 text-white rounded focus:outline-none hover:bg-green-600 px-4 py-2"
                                        onclick="return confirm('Are you sure?')">Accept</button>
                                </form>
                            @endif
                        </div>
                    </ul>
                </div>
            @empty
                <div class="text-center text-4xl font-semibold">Belum ada event</div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $myEvents->links() }}
        </div>
    </div>
@endsection
