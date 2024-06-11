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

            <div class="bg-white p-6 rounded-lg shadow-md">
                <ul class="space-y-4">
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">Deskripsi : <span
                        class="font-normal">{{ $event->description }}</span></li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">Tgl_dimulai : <span
                        class="font-normal">{{ $event->event_date }}</span></li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">Category : <span
                        class="font-normal">{{ $event->category_name }}</span></li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">username : <span
                        class="font-normal">{{ $event->username }}</span></li>
                    <li class="text-lg font-semibold text-zinc-500 font-fredoka">WA : <a href="https://wa.me/{{ $event->phone }}" target="_blank">{{ $event->phone }}</a></li>
                    <div class="w-[100px] h-[100px] m-auto">
                        <img src="{{ Storage::url('event/') . $event->media }}" class="w-full h-full object-cover rounded-full">
                    </div>
                </ul>
            </div>
        </div>
    </div>
@endsection
