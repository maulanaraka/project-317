@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="pt-20">
        <div class="relative bg-zinc-100 overflow-hidden w-full max-w-5xl mx-auto my-16 p-8 rounded-3xl shadow">
            <div class="mb-8">
                <p class="text-6xl font-medium text-stone-400 text-justify font-['Fredoka']">{{ $event->title }}</p>
            </div>

            @if (Session::has('error'))
                <p class="text-red-500">{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <p class="text-green-500">{{ Session::get('success') }}</p>
            @endif

            <div class="bg-white p-6 rounded-lg shadow-md">
                <ul class="space-y-4">
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">Description: <span class="font-normal">{{ $event->description }}</span></li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">Event Date: <span class="font-normal">{{ $event->event_date }}</span></li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">Category: <span class="font-normal">{{ $event->category_name }}</span></li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">Username: <span class="font-normal">{{ $event->username }}</span></li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">WhatsApp: <a href="https://wa.me/{{ $event->phone }}" target="_blank" class="text-blue-500">{{ $event->phone }}</a></li>
                    <li class="flex justify-center mt-4">
                        <div class="w-24 h-24">
                            <img src="{{ Storage::url('event/') . $event->media }}" class="w-full h-full object-cover rounded-full">
                        </div>
                    </li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">Status: <span class="{{ $event->event_status ? 'text-green-500' : 'text-red-500' }}">{{ $event->event_status ? 'Approved' : 'Pending' }}</span></li>
                </ul>
            </div>
        </div>
    </div>

    @include("Layout.footer")
@endsection
