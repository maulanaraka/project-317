    {{-- navbar start --}}
    <nav
        class='fixed inset-x-0 top-0 mx-auto w-full border border-gray-100 bg-white/80 py-3 shadow backdrop-blur-lg md:top-6 md:rounded-xl md:w-5/6 font-fredoka z-20'>
        <div class='flex flex-wrap justify-between px-10 py-3'>
            <div class="flex-shrink-0 ml-2">
                @if (session()->get('login') !== true)
                    <a aria-current="page" class="flex items-center" href="/">
                        <img class="h-12 w-auto" src="/images/hero-head.png" alt="">
                        <span
                            class="ml-4 font-semibold text-3xl transition-all duration-200 ease-nav-brand ">PhilanthroPal</span>
                    </a>
                @endif
                @if (session()->get('role') == 'organizer')
                    <a aria-current="page" class="flex items-center" href="/organizer/dashboard">
                        <img class="h-12 w-auto" src="/images/hero-head.png" alt="">
                        <span
                            class="ml-4 font-semibold text-3xl transition-all duration-200 ease-nav-brand ">PhilanthroPal</span>
                    </a>
                @elseif (session()->get('role') == 'community')
                    <a aria-current="page" class="flex items-center" href="/community/dashboard">
                        <img class="h-12 w-auto" src="/images/hero-head.png" alt="">
                        <span
                            class="ml-4 font-semibold text-3xl transition-all duration-200 ease-nav-brand ">PhilanthroPal</span>
                    </a>
                @elseif (session()->get('role') == '4dm1n')
                    <a aria-current="page" class="flex items-center" href="/4dm1n/dashboard">
                        <img class="h-12 w-auto" src="/images/hero-head.png" alt="">
                        <span
                            class="ml-4 font-semibold text-3xl transition-all duration-200 ease-nav-brand ">PhilanthroPal</span>
                    </a>
                @endif
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
            {{-- Slicing Content Navbar --}}
            @if (session()->get('role') == 'organizer')
                <ul id="collapseMenu"
                    class='lg:!flex lg:space-x-10 max-lg:space-y-3 max-lg:hidden max-lg:w-full max-lg:my-4 my-auto'>

                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/organizer/dashboard'
                            class='{{ Str::contains(Route::currentRouteName(), 'dashboardOrg') ? 'hover:font-bold font-semibold text-lg block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 text-lg text-[15px]' }}'>Dashboard</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/organizer/forum'
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
                                <a href="/organizer/{{ session('id_user') }}/formUpdateProfile"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Edit
                                    Profile</a>
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
            @elseif (session()->get('role') == 'community')
                <ul id="collapseMenu"
                    class='lg:!flex lg:space-x-10 max-lg:space-y-3 max-lg:hidden max-lg:w-full max-lg:my-4 my-auto'>

                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/community/dashboard'
                            class='{{ Str::contains(Route::currentRouteName(), 'dashboardOrg') ? 'hover:font-bold font-semibold text-lg block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 text-lg text-[15px]' }}'>Dashboard</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/community/formAddEvent'
                            class='{{ Str::contains(Route::currentRouteName(), 'addEventOrg') ? 'hover:font-bold font-semibold text-lg block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 text-lg text-[15px]' }}'>Tambah
                            Event</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/community/listMyEvent'
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
                                <a href="/community/profile"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Show
                                    Profile</a>
                            </li>
                            <li class="py-1">
                                <a href="/community/{{ session('id_user') }}/formUpdateProfile"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Edit
                                    Profile</a>
                            </li>
                            <li class="py-1">
                                <form action="/community/logout" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-sm text-left text-gray-800 hover:bg-blue-500 hover:font-bold focus:outline-none">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @elseif (session()->get('role') == '4dm1n')
                <ul id="collapseMenu"
                    class='lg:!flex lg:space-x-10 max-lg:space-y-3 max-lg:hidden max-lg:w-full max-lg:my-4 my-auto'>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/4dm1n/dashboard'
                            class='{{ Str::contains(Route::currentRouteName(), 'dashboardAdm') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Dashboard</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/4dm1n/event'
                            class='{{ Str::contains(Route::currentRouteName(), 'addEventOrg') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Event</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/4dm1n/category'
                            class='{{ Str::contains(Route::currentRouteName(), 'addEventOrg') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Category</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='/4dm1n/forum'
                            class='{{ Str::contains(Route::currentRouteName(), 'addEventOrg') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Forum</a>
                    </li>
                    <li class="relative">
                        <button
                            class="profile-button flex items-center text-gray-800 hover:text-blue-500 focus:outline-none transition duration-300 ease-in-out">
                            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-tailwind/img/team-1.jpg"
                                alt="avatar image"
                                class="inline-flex items-center justify-center w-8 h-8 mr-2 text-white transition-all duration-200 ease-in-out text-sm rounded-full">
                            <span class="text-sm font-bold">
                                @if (session('username'))
                                    @php
                                        $username = session('username');
                                        $displayUsername =
                                            strlen($username) > 15 ? substr($username, 0, 10) . '..' : $username;
                                    @endphp
                                    <h1 class="text-center">{{ $displayUsername }}</h1>
                                @endif
                            </span>
                        </button>
                        <ul id="profileDropdown"
                            class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden">
                            <li class="py-1">
                                <a href="/4dm1n/profile"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Show
                                    Profile</a>
                            </li>
                            <li class="py-1">
                                <a href="/4dm1n/{{ session()->get('id_user') }}}/formUpdateProfile"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Edit
                                    Profile</a>
                            </li>
                            <li class="py-1">
                                <form action="/4dm1n/logout" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-sm text-left text-gray-800 hover:bg-blue-500 hover:font-bold focus:outline-none">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @elseif (session()->get('login') !== true)
            <ul id="collapseMenu"
                    class='lg:!flex lg:space-x-10 max-lg:space-y-3 max-lg:hidden max-lg:w-full max-lg:my-4 my-auto'>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='explore'
                            class='{{ Str::contains(Route::currentRouteName(), 'dashboardAdm') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Explore</a>
                    </li>
                    <li class='max-lg:border-b max-lg:py-2'>
                        <a href='forum'
                            class='{{ Str::contains(Route::currentRouteName(), 'addEventOrg') ? 'hover:font-bold font-semibold block text-[15px] lg:border-b-2 lg:border-[#000000]' : 'hover:font-bold text-gray-600 font-reguler text-[15px]' }}'>Forum</a>
                    </li>
                    
                    <li class="relative">
                        <button
                            class="profile-button flex items-center text-gray-800 hover:text-blue-500 focus:outline-none transition duration-300 ease-in-out">
                            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-tailwind/img/team-1.jpg"
                                alt="avatar image"
                                class="inline-flex items-center justify-center w-8 h-8 mr-2 text-white transition-all duration-200 ease-in-out text-sm rounded-full">
                            <span class="text-sm font-bold">
                            </span>
                        </button>
                        <ul id="profileDropdown"
                            class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 hidden">
                            <li class="py-1">
                                <a href="/explore"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Show
                                    Explore</a>
                            </li>
                            <li class="py-1">
                                <a href="/forum"
                                    class="block px-4 py-2 text-sm text-gray-800 hover:bg-blue-500 hover:font-bold">Show
                                    Forum</a>
                            </li>
                          
                          
                        </ul>
                    </li>
                </ul>
           
            @endif


        </div>

    </nav>


    {{-- navbar end --}}
