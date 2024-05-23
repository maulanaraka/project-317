@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

{{-- Navbar --}}
@include('Layout.navbar')
{{-- End Navbar --}}    


<div class="relative overflow-hidden bg-cover bg-no-repeat p-12 text-center h-screen max-w-screen"
style="background-image: url('{{ asset('#') }}')">
<div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
    style="background-color: rgba(18, 24, 46, 0.7)"></div>
<div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed mt-10">
    <div class="flex h-full items-center justify-center">
        <div class="text-white font-fredoka">
            <p class="mt-8 mb-4 text-lg font-normal  text-white lg:text-3xl sm:px-16 lg:px-48">
                Mari bergabung dengan komunitas pengabdi masyarakat kami yang bersemangat untuk membuat dunia ini
                menjadi tempat yang lebih baik untuk kita semua.
            </p>
            <h1 class="mb-8 text-4xl font-bold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                PhilanthroPal</h1>
            {{-- <a href="#"
                class="rounded-xl border-2 border-neutral-50 px-3 pb-[8px] pt-[10px] text-lg lg:text-md sm:px-10 font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200"
                data-te-ripple-init data-te-ripple-color="light">
                Pesan Sekarang
            </a> --}}
        </div>
    </div>
</div>
</div>

{{-- carousel --}}
<div class="overflow-x-auto flex items-center space-x-10 pt-4 px-8">
@forelse ($dataCorousel as $item)
    <a href="/community/dashboard/event/{{$item->id}}">
        <div class="w-[49.188rem] h-[30.875rem] relative shrink-0">
            <img src="{{ Storage::url('event/') . $item->media }}" class="w-full h-full object-cover rounded-lg"
                alt="kegiatan-1" />

            <div class="w-full h-full bg-black/50 absolute inset-0 m-auto rounded-lg z-10">
                <span
                    class="absolute block top-0 left-0 text-xl font-semibold text-white bg-brand-secondary-lighter rounded-tl-lg rounded-br-lg px-6 py-2 z-20">
                    <p>{{ $item->category_name }}</p>
                </span>

                <div class="absolute bottom-0 p-4 space-y-1.5 w-full">
                    <h2 class="text-3xl font-semibold text-white">
                        {{ $item->title }}
                    </h2>
                    <div class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
                        <div
                            class="bg-brand-primary absolute left-0 flex items-center justify-center h-full w-10 rounded-tl-lg rounded-bl-lg">
                            <img alt="h-6 w-6 shrink-0" src="/icons/group.svg" />
                        </div>

                        <p class="text-lg ml-8 font-semibold text-white">{{ $item->event_date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
@empty
    <div class="w-[49.188rem] h-[30.875rem] relative shrink-0">
        <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg" alt="kegiatan-1" />

        <div class="w-full h-full bg-black/50 absolute inset-0 m-auto rounded-lg z-10">
            <span
                class="absolute block top-0 left-0 text-xl font-semibold text-white bg-brand-secondary-lighter rounded-tl-lg rounded-br-lg px-6 py-2 z-20">
                <p>Category</p>
            </span>

            <div class="absolute bottom-0 p-4 space-y-1.5 w-full">
                <h2 class="text-3xl font-semibold text-white">
                    Belum Terdapat Event yang bisa dijalankan
                </h2>
                <div class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
                    <div
                        class="bg-brand-primary absolute left-0 flex items-center justify-center h-full w-10 rounded-tl-lg rounded-bl-lg">
                        <img alt="h-6 w-6 shrink-0" src="/icons/group.svg" />
                    </div>

                    <p class="text-lg ml-8 font-semibold text-white">Ukrida</p>
                </div>
            </div>
        </div>
    </div>
@endforelse


</div>
{{-- carousel end --}}

{{-- table --}}
<div class="pt-8">
<div class="flex px-4 place-content-between">
    <h3 class="text-gray-700 text-3xl font-medium">Tables</h3>

    <div class="mt-3 flex flex-col sm:flex-row">
        <div class="flex">
            {{-- <div class="relative">
                <select
                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                </select>

                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div> --}}
            {{-- 
            <div class="relative">
                <select
                    class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                    <option>All</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>

                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </div>
            </div> --}}
        </div>

        <div class="block relative mt-2 sm:mt-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                    <path
                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                    </path>
                </svg>
            </span>

            <form action="/community/dashboard/search" method="POST">
                @csrf
                @method('post')
                <div class="flex">
                    <input type="text" placeholder="Search"
                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
                        name="search" />
                    <button type="submit" class="w-14 h-10 border-2 border-black text-center">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="max-w-full px-4 py-4 overflow-x-auto">
    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Title</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Description</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Category</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Start Date</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Img</th>
                    <th
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataEvent as $event)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $event->title }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $event->description }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $event->category_name }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">{{ $event->event_date }}</p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                            <div class="w-40 h-40 ">
                                <img class="w-full h-full" src="{{ Storage::url('public/event/') . $event->media }}"
                                    alt="">
                            </div>
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <span
                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                <a href="/community/dashboard/event/{{ $event->id }}">
                                    <span class="relative">Detail</span>
                                </a>
                            </span>
                        </td>
                    </tr>
                @empty
                    <div
                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Tidak ada data
                    </div>
                @endforelse
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
            {{-- <span class="text-xs xs:text-sm text-gray-900">Showing 1 to 4 of 50 Entries</span> --}}

            <div class="inline-flex mt-2 xs:mt-0">

                {{ $dataEvent->links() }}
            </div>
        </div>
    </div>
</div>
</div>



    {{-- <div class="w-1/2 h-1/2 m-auto border-2 border-black p-32">
        @if (session('username'))
            <h1 class="text-center">Welcome {{ session('username') }}</h1>
        @endif

        <form action="/organizer/logout" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="w-14 h-10 border-2 border-black text-center">Logout</button>
        </form>

        <div class="flex flex-wrap w-full mt-10 space-x-4">
            <a href="/organizer/formAddEvent" class="border-2 border-black">Add Event</a>
            <a href="/organizer/listMyEvent" class="border-2 border-black">My Event</a>
        </div>
      
    </div> --}}

    @include('Layout.footer')
@endsection
