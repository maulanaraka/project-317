@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}


    <div class="flex justify-center items-center h-screen bg-gradient-to-b from-blue-500 to-blue-700">
        <div class="w-1/2 h-1/2 m-auto border-2 border-black p-32 bg-white rounded-lg shadow-lg">
            @if (session('username'))
                <h1 class="text-center mb-8 text-2xl text-blue-900">Selamat Datang {{ session('username') }}</h1>
            @endif
            
            <form action="/4dm1n/logout" method="POST">
                @csrf
                @method("delete")
                <button type="submit" class="w-full h-12 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">Logout</button>
            </form> 
        </div>
    </div>

    <script src="{{ asset('js/navbar.js') }}"></script>

@endsection
