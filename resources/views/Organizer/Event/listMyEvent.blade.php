@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}
    <div class="pt-20">
        <div class="w-3/4 lg:w-1/2 mx-auto mt-20 p-4 border-2 border-gray-300 rounded-lg shadow-md">
            @if (Session::has('error'))
                <p class="text-red-500">{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <p class="text-green-500">{{ Session::get('success') }}</p>
            @endif

            <form action="/organizer/listMyEvent/search" method="POST">
                @csrf
                @method('post')
                <div class="flex mb-5">
                    <input type="text" placeholder="Search"
                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" name="search" />
                    <button type="submit" class="w-14 h-10 border-2 border-black text-center">Search</button>
                </div>
            </form>

            @forelse ($myEvents as $event)
            <div class="w-3/4 lg:w-1/2 mx-auto mt-20 p-4 border-2 border-gray-300 rounded-lg shadow-md">
                @if (Session::has('error'))
                    <p class="text-red-500 text-center mb-4">{{ Session::get('error') }}</p>
                @endif
                @if (Session::has('success'))
                    <p class="text-green-500 text-center mb-4">{{ Session::get('success') }}</p>
                @endif

                <form action="/organizer/listMyEvent/search" method="POST">
                    @csrf
                    @method('post')
                    <div class="flex mb-5">
                        <input type="text" placeholder="Search"
                            class="flex-1 appearance-none border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            name="search" />
                        <button type="submit"
                            class="w-14 h-10 border-l-0 border-2 border-gray-300 rounded-r-lg bg-blue-500 text-blue hover:bg-blue-600">Search</button>
                    </div>
                </form>
                    <div class="w-full mb-5 p-4 border border-gray-300 rounded-lg shadow-sm bg-white">
                        <ul class="space-y-2">
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
                                class="w-14 h-10 border-2 border-yellow-500 text-center bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Edit</a>
                            <a href="/organizer/{{ $event->id }}/detailEvent"
                                class="w-14 h-10 border-2 border-lime-200 text-center bg-lime-200 text-black rounded-lg hover:bg-lime-300">Detail</a>

                            @if ($event->event_status)
                                <div type="submit" class="w-20 h-10 border-2 border-black text-center bg-green-400">Kode :
                                    {{ $event->id }}</div>
                            @elseif($event->event_is_approve)
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
        </div>        
        @empty
            <h1 class="text-center text-4xl text-gray-500">Belum ada event</h1>
        @endforelse


    </div>
    {{ $myEvents->links() }}
@endsection
