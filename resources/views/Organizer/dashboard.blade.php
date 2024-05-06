@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    <div class="w-1/2 h-1/2 m-auto border-2 border-black p-32">
        @if (session('username'))
            <h1 class="text-center">Selamat Datang {{ session('username') }}</h1>
    @endif
        
        <form action="/organizer/logout" method="POST">
        @csrf
        @method("delete")
        <button type="submit" class="w-14 h-10 border-2 border-black text-center ">Logout</button>
        </form> 
      
        <div class="flex flex-wrap w-full mt-10 space-x-4">
            <a href="/organizer/formAddEvent" class="border-2 border-black">Tambah Event</a>
            <a href="/organizer/listMyEvent" class="border-2 border-black">My Event</a>
        </div>
    </div>
@endsection
