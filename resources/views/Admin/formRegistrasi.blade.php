@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')
    

    <section>
        <div class="w-full flex flex-col sm:flex-row">
            <div class="w-full mb-5 sm:w-1/2">

                <div class="w-[100px] h-[100px] mb-10">
                    <img class="object-cover" src="/images/loginRegis/logo.png" alt="">
                </div>

                <div>
                    <div class="w-full flex flex-wrap">
                        <div class="w-[40%]">
                            <img class="mx-auto w-1/2" src="/images/loginRegis/logoOrganizer.png" alt="">
                        </div>
                        <div class="w-[60%] ">
                            <h1 class="font-bold text-grey text-2xl">Registrasi Sebagai</h1>
                            <h1 class="font-bold text-blue text-3xl">Admin</h1>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="w-full h-full m-auto bg-red-300">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @if (Session::has('success'))
                <div class="w-full h-full m-auto bg-green-200">
                    <p class="text-green-500 text-center">{{ Session::get('success') }}</p>
                </div>
                @endif
                
                @if (Session::has('error'))
                <div class="w-full h-full m-auto bg-red-300">
                    <p class="text-red-500 text-center">{{ Session::get('error') }}</p>
                </div>
                @endif
                <div class="w-full flex flex-col sm:mt-10 md:mt-16 lg:mt-20">
                    <h3 class="text-slate-400 text-md text-center my-3 font-bold">Data Admin</h3>
        
                    <div class="w-[90%] mx-auto flex-wrap sm:w-full ml-4">
                        <form action="/4dm1n/registrasi" method="POST">
                            @csrf
                            @method('post')
                            <input type="text" name="email" placeholder="Email" class="w-full sm:w-[49%] mb-3 sm:mb-4 md:mb-5 lg:mb-7  h-10 bg-grey rounded-xl placeholder:text-white placeholder:pl-4 placeholder:font-fredoka placeholder:font-bold">
                            <input type="text" name="username" placeholder="Username" class="w-full sm:w-[49%] mb-3 sm:mb-4 md:mb-5 lg:mb-7   h-10 bg-grey rounded-xl placeholder:text-white placeholder:pl-4 placeholder:font-fredoka placeholder:font-bold">
                            <input type="text" name="password" placeholder="Password" class="w-full sm:w-[49%] mb-3 sm:mb-4 md:mb-5 lg:mb-7   h-10 bg-grey rounded-xl placeholder:text-white placeholder:pl-4 placeholder:font-fredoka placeholder:font-bold">
                            {{-- <input type="text" name="passwordVerify" placeholder="passwordVerify" class="w-full sm:w-[49%] mb-3 sm:mb-4 md:mb-5 lg:mb-7   h-10 bg-grey rounded-xl placeholder:text-white placeholder:pl-4 placeholder:font-fredoka placeholder:font-bold"> --}}
                        </form>
                    </div>
                    <button type="submit" class="w-20 h-10 mx-auto bg-blue rounded-xl text-white font-bold font-fredoka">Kirim</button>
                </div>
            </div>
            <div class="w-full sm:w-1/2">
                <img src="/images/loginRegis/Group116.png" alt="">
            </div>
        </div>
    </section>

   @include("Layout.footer");
@endsection
