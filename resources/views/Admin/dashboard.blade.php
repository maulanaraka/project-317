@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    <div class="w-1/2 h-1/2 m-auto border-2 border-black p-32">
        @if (session('username'))
            <h1 class="text-center">Selamat Datang {{ session('username') }}</h1>
    @endif
        
        <form action="/4dm1n/logout" method="POST">
        @csrf
        @method("delete")
        <button type="submit" class="w-14 h-10 border-2 border-black text-center ">Logout</button>
        </form> 
      
       
    </div>
@endsection
