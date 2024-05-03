@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')


    <section>
        <div class="w-full flex flex-col md:flex-row">
            <div class="w-full mb-5 md:w-1/2">

                <div class="w-[100px] h-[100px] mb-10 sm:mb-16 md:mb-24">
                    <img class="object-cover" src="/images/loginRegis/logo.png" alt="">
                </div>

                <div class="w-full text-center">
                    <h1 class="font-bold font-fredoka text-blue text-3xl lg:text-5xl">Pilih <span class="text-[#9EA97E]">Posisimu!</span>
                    </h1>
                    <p class="font-bold font-fredoka text-grey mt-2 text-sm lg:text-xl">Hai! Selamat datang ke dalam platform kami.
                        Sebelum masuk, mohon pilih posisi Anda untuk memastikan Anda mendapatkan akses yang tepat.</p>
                </div>

                <div class="w-full flex flex-col mt-5 sm:mt-10 md:mt-16 md:flex-row lg:mt-20 ">
                    <div class="w-full md:w-1/2 ">
                        <div class="w-[40%]  md:w-1/2 mx-auto ">
                            <a href="/community/register">
                                <img class="w-full" src="/images/loginRegis/logoCommunity.png" alt="">
                            </a>
                        </div>
                        <a href="/community/register">
                            <h1 class="font-bold font-fredoka text-blue text-xl text-center">Community</h1>
                        </a>
                    </div>

                    <div class="w-full my-10 sm:my-0 md:w-1/2 ">
                        <div class="w-[40%] md:w-1/2 mx-auto ">
                            <a href="/organizer/register">
                                <img class="w-full" src="/images/loginRegis/logoOrganizer.png" alt="">
                            </a>
                        </div>
                        <a href="/organizer/register">
                            <h1 class="font-bold font-fredoka text-[#9EA97E] text-xl text-center">Organizer</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <img class="object-cover" src="/images/loginRegis/Group116.png" alt="">
            </div>
        </div>
    </section>

    @include('Layout.footer');
@endsection
