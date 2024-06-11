@extends('./Layout/app')

@section('title', 'Forum')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="container mx-auto mt-40 p-4">
        @if (Session::has('error'))
            <p class="text-red-500">{{ Session::get('error') }}</p>
        @endif
        @if (Session::has('success'))
            <p class="text-green-500">{{ Session::get('success') }}</p>
        @endif

        <form action="/search/forum" method="POST">
            @csrf
            @method('post')
            <div class="flex mb-5">
                <input type="text" placeholder="Search"
                    class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
                    name="search" />
                <button type="submit" class="w-14 h-10 border-2 border-black text-center">Search</button>
            </div>
        </form>

        <div class="my-5 space-y-5">
            <a href="/" class="p-2 text-md bg-brand-secondary text-white font-semibold rounded-md">< Kembali</a>
            <h1 class="font-bold text-4xl text-brand-gray">Lihat pengalaman mereka!</h1>
            <p class="font-bold text-xl text-brand-gray">Ringkasan komprehensif tentang berbagai inisiatif yang telah kami jalankan untuk memberikan dampak positif bagi masyarakat, serta menjadi sumber inspirasi bagi upaya bersama dalam menciptakan perubahan yang berarti.</p>
        </div>

        <div class="grid grid-cols-1 gap-5">
        @forelse ($data as $item)
        <div class="w-full  bg-gray-500 flex flex-col rounded-md p-5 sm:flex-row lg:w-[80%]">
            <div class="w-15 h-15 mx-auto sm:ml-5  sm:w-1/4 lg:w-[15%]">
                <img src="/images/loginRegis/logoCommunity.png" alt="" class="object-cover">
            </div>
            <div class=" sm:w-3/4 lg:w-[85%]">
                <h1 class="text-white font-bold text-center text-xl sm:text-left">{{$item->title}}</h1>
                <p class="text-white text-center text-sm sm:text-left">{{$item->report}}</p>
            </div>
        </div>
        @empty
        <div class="w-full  bg-gray-500 flex flex-col rounded-md p-5">
            <p>Not Found Forum</p>
        </div>
        @endforelse
        </div>

        <div class="mt-8">
            {{ $data->links() }}
        </div>
    </div>

    @include('../Layout.footer')
@endsection