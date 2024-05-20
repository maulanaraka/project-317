@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="w-1/2 h-1/2 mx-auto mt-40 border-2 border-black p-2">
        @if (Session::has('error'))
            <p class="text-red-500">{{ Session::get('error') }}</p>
        @endif
        @if (Session::has('success'))
            <p class="text-green-500">{{ Session::get('success') }}</p>
        @endif

        <form action="/search" method="POST">
            @csrf
            @method('post')
            <div class="flex mb-5">
                <input type="text" placeholder="Search"
                    class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
                    name="search" />
                <button type="submit" class="w-14 h-10 border-2 border-black text-center">Search</button>
            </div>
        </form>

        @forelse ($allEvent as $event)
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
                    <li>User : {{ !$event->community_id == null ? 'Community' : 'Organizer' }}</li>

                    <div class="flex justify-center gap-3">
                        @if ($event->community_id == null)
                            <a href="/community/{{ $event->id }}/detailEvent"
                                class="w-14 h-10 border-2 border-black text-center bg-lime-200">Detail</a>
                        @elseif ($event->organizer_id == null)
                            <a href="/organizer/{{ $event->id }}/detailEvent"
                                class="w-14 h-10 border-2 border-black text-center bg-lime-200">Detail</a>
                        @endif
                    </div>
                </ul>
            </div>
        @empty
            <h1 class="text-center text-4xl">Belum ada event yang bisa dijalankan</h1>
        @endforelse

        {{ $allEvent->links() }}
    </div>
@endsection
