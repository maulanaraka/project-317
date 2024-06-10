@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="container mx-auto mt-44 px-4">
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

        <form action="/4dm1n/search" method="POST" class="mb-6">
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
            @forelse ($allEvent as $event)
                <div class="border border-gray-300 rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $event->title }}</h3>
                        <p class="text-gray-600">{{ $event->description }}</p>
                        <p class="text-gray-600">Start Date: {{ $event->event_date }}</p>
                        <p class="text-gray-600">Category: {{ $event->category_name }}</p>
                        <p class="text-gray-600">User: {{ !$event->community_id == null ? 'Community' : 'Organizer' }}</p>
                        <div class="mt-4 flex justify-center">
                            <img src="{{ Storage::url('event/') . $event->media }}" class="w-24 h-24 object-cover rounded-full">
                        </div>
                        <div class="mt-4">
                            Status: <span class="{{ $event->event_is_approve ? 'text-green-500' : 'text-red-500' }}">{{ $event->event_is_approve ? 'Approved' : 'Pending' }}</span>
                        </div>
                    </div>
                    <div class="px-6 py-4 flex justify-center">
                        <form action="/4dm1n/deleteEvent" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            <input type="hidden" name="mediaHidden" value="{{ $event->media }}">
                            <button type="submit" class="text-white bg-red-500 hover:bg-red-600 py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Are you sure you want to delete this event {{ $event->title }}?')">Delete</button>
                        </form>
                        @if (!$event->event_is_approve)
                            <form action="/4dm1n/approveEvent" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <button type="submit" class="text-white bg-green-500 hover:bg-green-600 py-2 px-4 rounded ml-2 focus:outline-none focus:shadow-outline" onclick="return confirm('Are you sure you want to approve this event?')">Approve</button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center text-4xl font-semibold">Belum ada event</div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $allEvent->links() }}
        </div>
    </div>
@endsection
