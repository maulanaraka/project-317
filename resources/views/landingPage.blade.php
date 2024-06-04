@extends('./Layout/app')

@section('title', 'Landing Page')

@section('content')

@include('Layout.navbar')

    <main class="font-fredoka space-y-14">
        <section class="h-screen">
            <div class="p-4 relative h-full w-full flex items-center justify-center">
                <!-- Hero bagian kiri -->
                <img class="top-0 left-0 absolute md:h-[initial] h-32" src="/images/hero-head.png" alt="hero-head" />
                <img src="/images/hero-1.png" class="absolute md:block lg:h-[initial] md:h-80 hidden inset-y-0 my-auto left-0"
                    alt="hero-1" />

                <!-- Hero bagian kanan -->
                <img src="/images/hero-2.png" class="absolute top-0 right-0 md:block lg:h-[initial] md:h-80 hidden"
                    alt="hero-2" />
                <img src="/images/hero-3.png" class="absolute bottom-[-10%] right-0 md:block lg:h-[initial] md:h-80 hidden"
                    alt="hero-3" />
                <div class="flex flex-col items-center space-y-3.5">
                    <img class="h-80 lg:h-96 w-fit object-contain z-30" alt="hero" src="/images/hero.png" />

                    <h1 class="text-5xl font-bold text--primary text-center">
                        Selamat Datang!
                    </h1>
                    <p class="text-lg text-brand-gray max-w-2xl text-center">
                        Apakah Anda ingin menemukan cara yang lebih efektif untuk menyasar
                        dan membantu orang-orang yang membutuhkan?
                    </p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 ">
                        <a href="/accountLogin">
                            <button
                                class="px-8 py-4 text-white font-semibold rounded-lg bg-brand-primary hover:bg-brand-primary/80">
                                Login
                            </button>
                        </a>
                        <a href="/explore">
                            <button
                                class="px-8 py-4 text-white font-semibold rounded-lg bg-brand-yellow hover:bg-brand-yellow/80">
                                Guest
                            </button>
                        </a>
                    </div>
                    <h5 class="font-semibold text-lg text-brand-gray">
                        Belum punya akun?
                        <a href="/accountRegister" class="text-brand-secondary hover:underline">Registrasi</a>
                    </h5>
                </div>
            </div>
        </section>

        <section>
            <div class="pl-4 py-4 space-y-7 flex flex-col justify-center">
                <div class="space-y-1.5">
                    <h1 class="text-5xl font-bold text-brand-primary">
                        Kegiatan <span class="text-brand-secondary">Kami</span>
                    </h1>
                    <p class="text-brand-gray font-semibold truncate">
                        Mulai perjalanan pengabdian masyarakatmu bersama kami!
                    </p>
                </div>

                <div class="w-full overflow-auto flex items-center space-x-10">
                    <div class="w-[49.188rem] h-[30.875rem] relative shrink-0">
                        <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg"
                            alt="kegiatan-1" />

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
                                <div
                                    class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
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
                        <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg"
                            alt="kegiatan-1" />

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
                                <div
                                    class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
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
                        <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg"
                            alt="kegiatan-1" />

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
                                <div
                                    class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
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
                        <img src="/images/kegiatan/kegiatan-1.png" class="w-full h-full object-cover rounded-lg"
                            alt="kegiatan-1" />

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
                                <div
                                    class="flex items-center bg-brand-secondary-lighter relative rounded-lg w-fit px-8 py-2">
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
            </div>
        </section>

        <section>
            <div class="max-w-[84rem] mx-auto flex w-full items-center p-4 md:space-x-16">
                <img src="/images/upaya/ilustrasi.png" class="lg:h-[36rem] h-96 w-full hidden md:block object-contain"
                    alt="ilustrasi" />

                <div class="space-y-7">
                    <div>
                        <h1 class="text-5xl text-center font-bold text-brand-primary">
                            Apa Yang
                            <span class="text-brand-secondary">Kami</span> Upayakan?
                        </h1>
                    </div>

                    <div class="relative">
                        <span class="absolute -top-4 -left-4 bg-brand-secondary w-64 h-24 block rounded-lg"></span>

                        <div class="rounded-lg relative bg-brand-primary p-4 z-10">
                            <h5 class="text-white text-justify font-semibold text-lg">
                                Kami menyadari pentingnya akses yang efisien dan tepat kepada
                                sumber daya dan informasi yang diperlukan dalam upaya
                                pengabdian masyarakat yang berarti. Inilah mengapa kami hadir
                                di sini: untuk menyediakan perangkat dan sumber daya yang
                                diperlukan guna mencapai dampak nyata.<br /><br />
                                Dengan menggunakan teknologi dan data, Platform Pengabdi
                                Masyarakat kami didesain untuk membantu Anda mengidentifikasi
                                target yang relevan untuk inisiatif Anda. Baik itu terkait
                                dengan kesehatan, pendidikan, lingkungan, atau kesejahteraan
                                sosial, tujuan Anda menjadi fokus kami. Kami berkomitmen untuk
                                mendukung perjalanan Anda dalam menciptakan perubahan positif.
                                Mari bergabung bersama kami dan mulailah membuat dampak yang
                                berarti!
                            </h5>
                        </div>

                        <span class="absolute -bottom-4 -right-4 bg-brand-secondary w-64 h-24 block rounded-lg"></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="!-mt-7">
            <div class="pl-4 flex items-center h-full w-full justify-between space-x-5">
                <div>
                    <h4 class="font-semibold text-brand-gray text-xl">
                        Perkenalkan...
                    </h4>

                    <div class="space-y-3">
                        <h1 class="text-5xl text-center font-bold text-brand-primary">
                            Philanthro<span class="text-brand-secondary">Pal</span>
                        </h1>

                        <div class="relative">
                            <span class="absolute -top-4 -left-4 bg-brand-secondary w-64 h-24 block rounded-lg"></span>

                            <div class="bg-brand-primary p-4 rounded-lg relative z-10">
                                <p class="text-white text-justify font-semibold text-lg max-w-5xl">
                                    Mari bergabung dengan komunitas pengabdi masyarakat kami
                                    yang bersemangat untuk membuat dunia ini menjadi tempat yang
                                    lebih baik untuk kita semua. Bersama-sama, mari kita berikan
                                    dampak positif yang berkelanjutan bagi masyarakat yang kita
                                    layani.
                                </p>
                            </div>

                            <span class="absolute -bottom-4 -right-4 bg-brand-secondary w-64 h-24 block rounded-lg"></span>
                        </div>
                    </div>
                </div>

                <div class="h-[32rem] w-fit relative">
                    <img src="/images/philantropal/ilustrasi.png" class="h-full w-full md:block hidden object-contain"
                        alt="ilustrasi-philantropal" />
                </div>
            </div>
        </section>
    </main>
    @include('Layout.footer')
@endsection