@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    <div class="w-1/2 h-1/2 m-auto border-2 border-black p-2">

        @forelse ($myEvents as $event)
            <div class="w-[60%] h-1/2 m-auto border-2 border-black">
                <ul class="text-center">
                    <li>Title : {{ $event->title }}</li>
                    <li>Deskripsi : {{ $event->description }}</li>
                    <li>Tgl_dimulai : {{ $event->event_date }}</li>
                    <li>Category : {{ $event->category_name }}</li>
                    <div class="w-[100px] h-[100px] m-auto">
                        <img src="{{ Storage::url('event/').$event->media }}" class="w-full h-full object-cover rounded-full">
                    </div>
                </ul>
            </div>
        @empty
            <h1 class="text-center text-4xl">Belum ada event</h1>
        @endforelse


    </div>
@endsection
