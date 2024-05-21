@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

{{-- Navbar --}}
    @include('Layout.navbar')
{{-- End Navbar --}}

    {{-- heading --}}
    <div class="relative overflow-hidden bg-cover bg-no-repeat p-12 text-center h-screen max-w-screen"
        style="background-image: url('{{ asset('#') }}')">
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

                        <p class="text-lg ml-8 font-semibold text-white">Ukrida</p>
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

                        <p class="text-lg ml-8 font-semibold text-white">Ukrida</p>
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

                        <p class="text-lg ml-8 font-semibold text-white">Ukrida</p>
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

                        <p class="text-lg ml-8 font-semibold text-white">Ukrida</p>
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
