@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="w-1/2 h-1/2 mx-auto mt-40 border-2 border-black p-2">

        <div class="w-[60%] h-1/2 m-auto border-2 border-black">
            <ul class="text-center">
                <li>Title : {{ $event->title }}</li>
                <li>Deskripsi : {{ $event->description }}</li>
                <li>Tgl_dimulai : {{ $event->event_date }}</li>
                <li>Category : {{ $event->category_name }}</li>
                <li>username : {{ $event->username }}</li>
                <li>WA : <a href="https://wa.me/{{ $event->phone }}" target="_blank">{{ $event->phone }}</a></li>
                <div class="w-[100px] h-[100px] m-auto">
                    <img src="{{ Storage::url('event/') . $event->media }}" class="w-full h-full object-cover rounded-full">
                </div>
            </ul>
        </div>

    </div>
@endsection
