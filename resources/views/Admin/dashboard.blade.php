@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}
    <div class="relative overflow-hidden bg-cover bg-no-repeat p-12 text-center h-screen max-w-screen"
    style="background-image: url('{{ asset('https://wallpapercave.com/wp/wp2508415.jpg') }}')">
    <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
        style="background-color: rgba(18, 24, 46, 0.7)"></div>
    <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed mt-10">
        <div class="flex h-full items-center justify-center">
            <div class="text-white font-fredoka">
                <p class="mt-8 mb-4 text-lg font-normal  text-white lg:text-3xl sm:px-16 lg:px-48">
                    Selamat datang kembali
                </p>
                <h1 class="mb-8 text-4xl font-bold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                    ADMIN
                </h1>
            </div>
        </div>
    </div>
</div>

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
