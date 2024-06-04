@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="container mx-auto mt-40 p-4">
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

        <div class="my-5 space-y-2">
            <a href="/" class="p-2 text-md bg-brand-secondary text-white font-semibold rounded-md">< Kembali</a>
            <h1 class="font-bold text-4xl text-brand-secondary">Events</h1>
            <p class="font-bold text-2xl text-brand-gray">Lihat event-event yang kami asosiasikan!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            @forelse ($allEvent as $item)
                @if ($item->organizer_id !== null)
                    <a href="/organizer/dashboard/event/{{ $item->id }}">
                    @elseif ($item->community_id !== null)
                        <a href="/community/dashboard/event/{{ $item->id }}">
                @endif
                <div class="relative w-full h-[400px] overflow-hidden rounded-lg border border-gray-300">
                    <img src="{{ Storage::url('event/') . $item->media }}" class="w-full h-full object-cover"
                        alt="kegiatan-1" />

                    <div class="w-full h-full bg-black/50 absolute inset-0 rounded-lg z-10">
                        <span
                            class="absolute block top-0 left-0 text-xl font-semibold text-white bg-brand-secondary-lighter rounded-tl-lg rounded-br-lg px-6 py-2 z-20">
                            <p>{{ $item->category_name }}</p>
                        </span>

                        <div class="absolute bottom-0 p-4 space-y-1.5 w-full">
                            <h2 class="text-3xl font-semibold text-white">
                                {{ $item->title }}
                            </h2>
                            <div class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
                                <div
                                    class="bg-brand-primary absolute left-0 flex items-center justify-center h-full w-10 rounded-tl-lg rounded-bl-lg">
                                    <img alt="h-6 w-6 shrink-0" src="/icons/group.svg" />
                                </div>

                                <p class="text-lg ml-8 font-semibold text-white">{{ $item->event_date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            @empty
                <h1 class="text-center text-4xl">Belum ada event yang bisa dijalankan</h1>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $allEvent->links() }}
        </div>
    </div>

    @include('../Layout.footer')
@endsection