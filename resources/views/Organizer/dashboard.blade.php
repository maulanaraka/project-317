@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- navbar start --}}
    <nav
        class='fixed inset-x-0 top-0 mx-auto w-full border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-xl md:w-5/6 font-fredoka z-20'>
        <div class='flex flex-wrap justify-between px-10 py-3'>
            <div class="flex-shrink-0 ml-2">
                <a aria-current="page" class="flex items-center" href="/organizer/dashboard">
                    <img class="h-12 w-auto" src="/images/hero-head.png" alt="">
                    <span class="ml-4 font-semibold text-3xl transition-all duration-200 ease-nav-brand ">PhilanthroPal</span>
                </a>
            </div>
            <div id="toggle" class='flex ml-auto lg:order-1 lg:hidden relative z-20'>
                <button class='ml-7'>
                    <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <ul id="collapseMenu"
                class='lg:!flex lg:space-x-10 max-lg:space-y-3 max-lg:hidden max-lg:w-full max-lg:my-4 my-auto'>
                <li class='max-lg:border-b max-lg:py-2'>
                    <a href='/organizer/dashboard'
                        class='{{ Str::contains(Route::currentRouteName(), 'dashboardOrg') ? 'hover:font-bold font-semibold text-lg block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 text-lg text-[15px]' }}'>Dashboard</a>
                </li>
                <li class='max-lg:border-b max-lg:py-2'>
                    <a href='#'
                        class='{{ Str::contains(Route::currentRouteName(), '#') ? 'hover:font-bold font-semibold text-lg block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 text-lg text-[15px]' }}'>Forum</a>
                </li>
                <li class='max-lg:border-b max-lg:py-2'>
                    <a href='/organizer/formAddEvent'
                        class='{{ Str::contains(Route::currentRouteName(), 'addEventOrg') ? 'hover:font-bold font-semibold text-lg block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 text-lg text-[15px]' }}'>Tambah
                        Event</a>
                </li>
                <li class='max-lg:border-b max-lg:py-2'>
                    <a href='/organizer/listMyEvent'
                        class='{{ Str::contains(Route::currentRouteName(), 'eventOrg') ? 'hover:font-bold font-semibold text-lg block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 text-lg text-[15px]' }}'>Event
                        Saya</a>
                </li>
                <li class="relative">
                    <button
                        class="profile-button flex items-center text-gray-800 hover:text-blue-500 focus:outline-none transition duration-300 ease-in-out">
                        <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-tailwind/img/team-1.jpg"
                            alt="avatar image"
                            class="inline-flex items-center justify-center w-8 h-8 mr-2 text-white transition-all duration-200 ease-in-out text-sm rounded-full">
                        <span class="text-lg font-bold">
                            @if (session('username'))
                                @php
                                    $username = session('username');
                                    $displayUsername =
                                        strlen($username) > 10 ? substr($username, 0, 10) . '..' : $username;
                                @endphp
                                <h1 class="text-center">{{ $displayUsername }}</h1>
                            @endif
                        </span>
                    </button>
                    <ul id="profileDropdown"
                        class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden">
                        <li class="py-1">
                            <a href="/organizer/profile"
                                class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Show
                                Profile</a>
                        </li>
                        <li class="py-1">
                            <a href="/organizer/{{session('id_user')}}/formUpdateProfile" class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Edit Profile</a>
                        </li>
                        <li class="py-1">
                            <form action="/organizer/logout" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm text-left text-gray-800 hover:bg-blue-500 hover:font-bold focus:outline-none">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    
    <script src="{{ asset('js/navbar.js') }}"></script>
    {{-- navbar end --}}

    {{-- heading --}}
    <div class="relative overflow-hidden bg-cover bg-no-repeat p-12 text-center h-screen max-w-screen"
        style="background-image: url('{{ asset('https://www.ctvnews.ca/polopoly_fs/1.5209840.1648432195!/httpImage/image.jpg_gen/derivatives/landscape_1020/image.jpg') }}')">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
            style="background-color: rgba(18, 24, 46, 0.7)"></div>
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed mt-10">
            <div class="flex h-full items-center justify-center">
                <div class="text-white font-fredoka">
                    <p class="mt-8 mb-4 text-lg font-normal  text-white lg:text-3xl sm:px-16 lg:px-48">
                        Mari bergabung dengan komunitas pengabdi masyarakat kami yang bersemangat untuk membuat dunia ini menjadi tempat yang lebih baik untuk kita semua.
                    </p>
                    <h1
                        class="mb-8 text-4xl font-bold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                        PhilanthroPal
                    </h1>
                </div>
            </div>
        </div>
    </div>

    {{-- carousel --}}
    <div class="py-4 px-8">
        <h3 class="text-gray-700 text-3xl font-medium">Event</h3>
    </div>
    <div class="overflow-x-auto flex items-center space-x-10 pt-4 px-8">
        <div class="w-[49.188rem] h-[30.875rem] relative shrink-0">
            <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg" alt="kegiatan-1" />

            <div class="w-full h-full bg-black/50 absolute inset-0 m-auto rounded-lg z-10">
                <span
                    class="absolute block top-0 left-0 text-xl font-semibold text-white bg-brand-secondary-lighter rounded-tl-lg rounded-br-lg px-6 py-2 z-20">
                    <p>Category</p>
                </span>

                <div class="absolute bottom-0 p-4 space-y-1.5 w-full">
                    <h2 class="text-3xl font-semibold text-white">
                        Dukung Program Sembako Murah untuk Warga Kelurahan Jelambar
                        Baru
                    </h2>
                    <div class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
                        <div
                            class="bg-brand-primary absolute left-0 flex items-center justify-center h-full w-10 rounded-tl-lg rounded-bl-lg">
                            <img alt="h-6 w-6 shrink-0" src="/icons/group.svg" />
                        </div>

                        <p class="text-lg ml-8 font-semibold text-white">ORganizer1</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[49.188rem] h-[30.875rem] relative shrink-0">
            <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg" alt="kegiatan-1" />

            <div class="w-full h-full bg-black/50 absolute inset-0 m-auto rounded-lg z-10">
                <span
                    class="absolute block top-0 left-0 text-xl font-semibold text-white bg-brand-secondary-lighter rounded-tl-lg rounded-br-lg px-6 py-2 z-20">
                    <p>Category</p>
                </span>

                <div class="absolute bottom-0 p-4 space-y-1.5 w-full">
                    <h2 class="text-3xl font-semibold text-white">
                        Dukung Program Sembako Murah untuk Warga Kelurahan Jelambar
                        Baru
                    </h2>
                    <div class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
                        <div
                            class="bg-brand-primary absolute left-0 flex items-center justify-center h-full w-10 rounded-tl-lg rounded-bl-lg">
                            <img alt="h-6 w-6 shrink-0" src="/icons/group.svg" />
                        </div>

                        <p class="text-lg ml-8 font-semibold text-white">ORganizer2</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[49.188rem] h-[30.875rem] relative shrink-0">
            <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg" alt="kegiatan-1" />

            <div class="w-full h-full bg-black/50 absolute inset-0 m-auto rounded-lg z-10">
                <span
                    class="absolute block top-0 left-0 text-xl font-semibold text-white bg-brand-secondary-lighter rounded-tl-lg rounded-br-lg px-6 py-2 z-20">
                    <p>Category</p>
                </span>

                <div class="absolute bottom-0 p-4 space-y-1.5 w-full">
                    <h2 class="text-3xl font-semibold text-white">
                        Dukung Program Sembako Murah untuk Warga Kelurahan Jelambar
                        Baru
                    </h2>
                    <div class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
                        <div
                            class="bg-brand-primary absolute left-0 flex items-center justify-center h-full w-10 rounded-tl-lg rounded-bl-lg">
                            <img alt="h-6 w-6 shrink-0" src="/icons/group.svg" />
                        </div>

                        <p class="text-lg ml-8 font-semibold text-white">organizer3</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[49.188rem] h-[30.875rem] relative shrink-0">
            <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg" alt="kegiatan-1" />

            <div class="w-full h-full bg-black/50 absolute inset-0 m-auto rounded-lg z-10">
                <span
                    class="absolute block top-0 left-0 text-xl font-semibold text-white bg-brand-secondary-lighter rounded-tl-lg rounded-br-lg px-6 py-2 z-20">
                    <p>Category</p>
                </span>

                <div class="absolute bottom-0 p-4 space-y-1.5 w-full">
                    <h2 class="text-3xl font-semibold text-white">
                        Dukung Program Sembako Murah untuk Warga Kelurahan Jelambar
                        Baru
                    </h2>
                    <div class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
                        <div
                            class="bg-brand-primary absolute left-0 flex items-center justify-center h-full w-10 rounded-tl-lg rounded-bl-lg">
                            <img alt="h-6 w-6 shrink-0" src="/icons/group.svg" />
                        </div>

                        <p class="text-lg ml-8 font-semibold text-white">organizer4</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- carousel end --}}

    <div class="py-8 px-8">
        <button class="hover:bg-sky-500 bg-sky-700 text-white font-bold py-2 px-4 rounded-xl">
            Lihat Event Lainnya
        </button>
    </div>

    <div class="py-4 px-8">
        <h3 class="text-gray-700 text-3xl font-medium">Category</h3>
    </div>

    <div class="py-8 px-8">
        <div class="grid grid-cols-2 gap-8">
            <!-- Card 1 -->
            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm flex items-center">
                <img src="https://www.binghamton.edu/news/images/uploads/features/food-bank-southern-tier.jpg" alt="Image" class="p-2 max-w-40 max-h-40 rounded-lg flex mr-4">
                <div>
                    <a href="#" class="block">
                        <h5 class="mb-2 text-2xl font-bold text-gray-900">Lingkungan</h5>
                    </a>
                    <p class="mb-3 text-sm text-gray-700">Lingkungan Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum a fugiat magni corrupti, fuga beatae mollitia exercitationem magnam eius nemo natus animi, perspiciatis quisquam saepe aliquid qui dolor esse placeat.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm flex items-center">
                <img src="https://www.binghamton.edu/news/images/uploads/features/food-bank-southern-tier.jpg" alt="Image" class="p-2 max-w-40 max-h-40 rounded-lg flex mr-4">
                <div>
                    <a href="#" class="block">
                        <h5 class="mb-2 text-2xl font-bold text-gray-900">Technology</h5>
                    </a>
                    <p class="mb-3 text-sm text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum a fugiat magni corrupti, fuga beatae mollitia exercitationem magnam eius nemo natus animi, perspiciatis quisquam saepe aliquid qui dolor esse placeat.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm flex items-center">
                <img src="https://www.binghamton.edu/news/images/uploads/features/food-bank-southern-tier.jpg" alt="Image" class="p-2 max-w-40 max-h-40 rounded-lg flex mr-4">
                <div>
                    <a href="#" class="block">
                        <h5 class="mb-2 text-2xl font-bold text-gray-900">Education</h5>
                    </a>
                    <p class="mb-3 text-sm text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum a fugiat magni corrupti, fuga beatae mollitia exercitationem magnam eius nemo natus animi, perspiciatis quisquam saepe aliquid qui dolor esse placeat.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Card 4 -->
            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm flex items-center">
                <img src="https://www.binghamton.edu/news/images/uploads/features/food-bank-southern-tier.jpg" alt="Image" class="p-2 max-w-40 max-h-40 rounded-lg flex mr-4">
                <div>
                    <a href="#" class="block">
                        <h5 class="mb-2 text-2xl font-bold text-gray-900">Health</h5>
                    </a>
                    <p class="mb-3 text-sm text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum a fugiat magni corrupti, fuga beatae mollitia exercitationem magnam eius nemo natus animi, perspiciatis quisquam saepe aliquid qui dolor esse placeat.</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg class="w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    

    {{-- table --}}
    {{-- <div class="pt-8 px-8">
        <div class="flex px-4 place-content-between">
            <h3 class="text-gray-700 text-3xl font-medium">Tables</h3>

            <div class="mt-3 flex flex-col sm:flex-row">
                <div class="flex">
                    <div class="relative">
                        <select
                            class="appearance-none h-full rounded-l border block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                        </select>

                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>

                    <div class="relative">
                        <select
                            class="h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                            <option>All</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>

                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="block relative mt-2 sm:mt-0">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>

                    <input placeholder="Search"
                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
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
                                Nama Event</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Kategori</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Tanggal</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                            alt="" />
                                    </div>

                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">Vera Carpenter</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">Jan 21, 2020</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative">Activo</span>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <img class="w-full h-full rounded-full"
                                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                            alt="" />
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap"> Event 1</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">Editor</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">Jan 01, 2020</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative">Activo</span>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                    <span class="text-xs xs:text-sm text-gray-900">Showing 1 to 4 of 50 Entries</span>

                    <div class="inline-flex mt-2 xs:mt-0">
                        <button
                            class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">Prev</button>
                        <button
                            class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- backend --}}
    {{-- <div class="w-1/2 h-1/2 m-auto border-2 border-black p-32">
        @if (session('username'))
            <h1 class="text-center">Selamat Datang {{ session('username') }}</h1>
        @endif

        <form action="/organizer/logout" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="w-14 h-10 border-2 border-black text-center">Logout</button>
        </form>

        <div class="flex flex-wrap w-full mt-10 space-x-4">
            <a href="/organizer/formAddEvent" class="border-2 border-black">Tambah Event</a>
            <a href="/organizer/listMyEvent" class="border-2 border-black">My Event</a>
        </div>
    </div> --}}

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



@include("Layout.footer")
@endsection
