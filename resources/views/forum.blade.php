@extends('./Layout/app')

@section('title', 'Forum')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="pt-20">
        <div class="relative bg-zinc-100 overflow-hidden w-full max-w-7xl mx-auto my-16 p-8 rounded-3xl shadow">
            @if (Session::has('error'))
                <p class="text-red-500">{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <p class="text-green-500">{{ Session::get('success') }}</p>
            @endif

            <form action="/search/forum" method="POST" class="mb-8">
                @csrf
                @method('post')
                <div class="flex items-center">
                    <input type="text" placeholder="Search"
                        class="appearance-none rounded-l-md border border-gray-400 border-r-0 pl-4 pr-4 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
                        name="search" />
                    <button type="submit" class="bg-black text-white px-4 py-2 rounded-r-md">Search</button>
                </div>
            </form>

            <div class="mb-10">
                <a href="/" class="inline-block mb-5 p-2 text-md bg-brand-secondary text-white font-semibold rounded-md">< Kembali</a>
                <h1 class="font-bold text-4xl text-stone-400 mb-4 font-['Fredoka']">Lihat pengalaman mereka!</h1>
                <p class="text-xl text-stone-500 font-['Fredoka']">Ringkasan komprehensif tentang berbagai inisiatif yang telah kami jalankan untuk memberikan dampak positif bagi masyarakat, serta menjadi sumber inspirasi bagi upaya bersama dalam menciptakan perubahan yang berarti.</p>
            </div>

            <div class="grid grid-cols-1 gap-5">
                @forelse ($data as $item)
                    <div class="bg-zinc-200 flex flex-col sm:flex-row rounded-md shadow-md p-5 lg:w-[80%] mx-auto">
                        <div class="flex-shrink-0 w-20 h-20 mx-auto sm:mx-0">
                            <img src="/images/loginRegis/logoCommunity.png" alt="" class="object-cover w-full h-full rounded-full">
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-5">
                            <h1 class="text-stone-600 font-bold text-xl text-center sm:text-left font-['Fredoka']">{{ $item->title }}</h1>
                            <p class="text-stone-500 text-sm text-center sm:text-left mt-2 font-['Fredoka']">{{ $item->report }}</p>
                        </div>
                    </div>
                @empty
                    <div class="bg-zinc-200 flex flex-col rounded-md shadow-md p-5 text-center">
                        <p class="text-stone-500 font-['Fredoka']">Not Found Forum</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $data->links() }}
            </div>
        </div>
    </div>

    @include('../Layout.footer')
@endsection
