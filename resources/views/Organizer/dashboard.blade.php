@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

<nav class='fixed inset-x-0 top-0 mx-auto w-full border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-xl md:w-5/6 font-[Montserrat] z-20'>
    <div class='flex flex-wrap justify-between px-10 py-3'>
        <div class="flex-shrink-0 ml-2">
            <a aria-current="page" class="flex items-center" href="/organizer/dashboard">
                <img class="h-12 w-auto" src="/images/hero-head.png" alt="">
                <span class="ml-4 font-semibold text-lg transition-all duration-200 ease-nav-brand ">PhilanthroPal</span>
            </a>
        </div>
        <div id="toggle" class='flex ml-auto lg:order-1 lg:hidden relative z-20'>
            <button class='ml-7'>
                <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <ul id="collapseMenu" class='lg:!flex lg:space-x-10 max-lg:space-y-3 max-lg:hidden max-lg:w-full max-lg:my-4 my-auto'>
            <li class='max-lg:border-b max-lg:py-2'>
                <a href='/organizer/dashboard' class='{{ Str::contains(Route::currentRouteName(), 'dashboardOrg') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Dashboard</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2'>
                <a href='/organizer/formAddEvent' class='{{ Str::contains(Route::currentRouteName(), 'addEventOrg') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Tambah Event</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2'>
                <a href='/organizer/listMyEvent' class='{{ Str::contains(Route::currentRouteName(), 'eventOrg') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Event Saya</a>
            </li>
            <li class="relative">
                <button class="profile-button flex items-center text-gray-800 hover:text-blue-500 focus:outline-none transition duration-300 ease-in-out">
                    <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-tailwind/img/team-1.jpg" alt="avatar image" class="inline-flex items-center justify-center w-8 h-8 mr-2 text-white transition-all duration-200 ease-in-out text-sm rounded-full">
                    <span class="text-sm font-bold">
                        @if (session('username'))
                            @php
                                $username = session('username');
                                $displayUsername = strlen($username) > 15 ? substr($username, 0, 10) . '..' : $username;
                            @endphp
                            <h1 class="text-center">{{ $displayUsername }}</h1>
                        @endif
                    </span>
                    {{-- <svg id="arrowIcon" class="w-4 h-4 ml-1 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg> --}}
                </button>
                <ul id="profileDropdown" class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden">
                    <li class="py-1">
                        <a href="/organizer/profile" class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Show Profile</a>
                    </li>
                    {{-- <li class="py-1">
                        <a href="/organizer/{{$id}}/formUpdateProfile" class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Edit Profile</a>
                    </li> --}}
                    <li class="py-1">
                        <form action="/organizer/logout" method="POST">
                            @csrf
                            @method("delete")
                            <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-800 hover:bg-blue-500 hover:font-bold focus:outline-none">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script src="{{ asset('js/navbar.js') }}"></script>

    <div class="w-1/2 h-1/2 m-auto border-2 border-black p-32">
        @if (session('username'))
            <h1 class="text-center">Selamat Datang {{ session('username') }}</h1>
        @endif
        
        <form action="/organizer/logout" method="POST">
            @csrf
            @method("delete")
            <button type="submit" class="w-14 h-10 border-2 border-black text-center">Logout</button>
        </form> 

        <div class="flex flex-wrap w-full mt-10 space-x-4">
            <a href="/organizer/formAddEvent" class="border-2 border-black">Tambah Event</a>
            <a href="/organizer/listMyEvent" class="border-2 border-black">My Event</a>
        </div>
    </div>

    <!-- Sidebar -->
    {{-- <aside class="fixed inset-y-0 flex-wrap items-center justify-between flex-col-reverse block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0 font-fredoka" aria-expanded="false">
        
        <div class="h-19">
            <i class="absolute top-0 right-0 p-2 opacity-50 cursor-pointer fas fa-times  text-slate-400 xl:hidden" sidenav-close></i>
            <a class="block px-6 py-4 m-0 text-sm whitespace-nowrap  text-slate-700" href="/" target="_blank">
                <img src="/images/hero-head.png" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-12" alt="main_logo" />
                <span class="ml-4 font-semibold text-lg transition-all duration-200 ease-nav-brand ">PhilanthroPal</span>
            </a>
        </div>

        <hr class="h-px mt-0 mb-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

        <div class="items-center block w-auto m-2 max-h-screen my-2 overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 bg-blue-500/13 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="/organizer/dashboard">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 bg-blue-500/13 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors active" href="/organizer/formAddEvent">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Tambah Event</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 bg-blue-500/13 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors active" href="/organizer/listMyEvent">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Event Saya</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mx-4 absolute bottom-0 left-0 right-0 mb-4">
            <!-- Profile Section -->
            <div class="w-full leading-normal text-center transition-all ease-in rounded-lg shadow-md bg-white bg-150 hover:shadow-xs hover:-translate-y-px">
                <a href="/organizer/profile" class="flex items-center mb-4 p-2 text-gray-800 hover:text-blue-500">
                    <img
                        src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-tailwind/img/team-1.jpg"
                        alt="avatar image"
                        class="inline-flex items-center justify-center w-8 h-8 mr-2 text-white transition-all duration-200 ease-in-out text-sm rounded-full"
                    />
                    <span class="text-sm font-bold">Profile</span>
                </a>
            </div>

            <!-- Logout Button -->
            <form action="/organizer/logout" method="POST">
                @csrf
                @method("delete")
                <button type="submit" class="w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg cursor-pointer shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px active:opacity-85 hover:shadow-md">Logout</button>
            </form> 
        </div>
    </aside> --}}
    {{-- sidebar end --}}

    


@endsection