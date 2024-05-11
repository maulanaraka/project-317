@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    <div class="w-1/2 h-1/2 m-auto border-2 border-black p-2">
        @if (Session::has('error'))
        <p class="text-red-500">{{ Session::get('error') }}</p>
    @endif
    @if (Session::has('success'))
        <p class="text-green-500">{{ Session::get('success') }}</p>
    @endif

        @forelse ($allEvent as $event)
            <div class="w-[60%] h-1/2 m-auto border-2 border-black">
                <ul class="text-center">
                    <li>Title : {{ $event->title }}</li>
                    <li>Deskripsi : {{ $event->description }}</li>
                    <li>Tgl_dimulai : {{ $event->event_date }}</li>
                    <li>Category : {{ $event->category_name }}</li>
                    <li>User : {{ !$event->community_id == Null ? "Community" : "Organizer" }}</li>
                    <div class="w-[100px] h-[100px] m-auto">
                        <img src="{{ Storage::url('event/').$event->media }}" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div >Status : <span class="{{ $event->event_is_approve ? "text-green-500" : "text-red-500" }}">{{$event->event_is_approve ? "Approved" : "Pending"}}</span></div>
                    <div class="flex justify-center gap-3">
                        <form action="/4dm1n/deleteEvent" method="POST">
                            @csrf
                            @method("delete")
                            <input type="hidden" name="id" value="{{ $event->id }}" id="">
                            <input type="hidden" name="mediaHidden" value="{{ $event->media }}" id="">
                            <button type="submit" class="w-14 h-10 border-2 border-black text-center bg-red-500" onclick="return confirm('Are you sure deleted this event {{$event->title}} ?')">Delete</button>
                        </form>
                        @if (!$event->event_is_approve)    
                        <form action="/4dm1n/approveEvent" method="POST">
                            @csrf
                            @method("put")
                            <input type="hidden" name="id" value="{{ $event->id }}" id="">
                            <button type="submit" class="w-14 h-10 border-2 border-black text-center bg-green-500" onclick="return confirm('Are you sure approve?')">Approve</button>
                        </form>
                        @endif
                    </div>
                </ul>
            </div>
        @empty
            <h1 class="text-center text-4xl">Belum ada event</h1>
        @endforelse


    </div>
@endsection
