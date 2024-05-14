@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

<div class="bg-gray-100 px-4 my-32 max-2-3xl mx-auto space-y-6 w-1/2 rounded">

    <h1 class="ml-4 text-2xl font-semibold text-center font-fredoka z-20">Update Profile</h1>

    @if ($errors->any())
        <div class="w-full h-full m-auto bg-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('error'))
    <p class="text-red-500">{{ Session::get('error') }}</p>
@endif


<section class="py-10 my-auto dark:bg-gray-900 rounded">
    <div class="lg:w-[80%] md:w-[90%] xs:w-[96%] mx-auto flex gap-4">
        <div
            class="lg:w-[88%] md:w-[80%] sm:w-[88%] xs:w-full mx-auto shadow-2xl p-4 rounded-xl h-fit self-center dark:bg-gray-800/40">
            <!--  -->
            <div class="">
                <h1
                    class="lg:text-3xl md:text-2xl sm:text-xl xs:text-xl font-serif font-extrabold mb-2 dark:text-white">
                    Profile
                </h1>
                <h2 class="text-grey text-sm mb-4 dark:text-gray-400">Edit Profile</h2>
                <form action="/organizer/updateProfile" method="POST"></form>>
                    @csrf
                    @method('put')
                    <!-- Cover Image -->
                    <div
                        class="w-full rounded-sm bg-[url('')] bg-cover bg-center bg-no-repeat items-center">
                        <!-- Profile Image -->
                        <div
                            class="mx-auto flex justify-center w-[141px] h-[141px] bg-blue-300/20 rounded-full bg-[url('https://images.unsplash.com/photo-1438761681033-6461ffad8d80?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxwcm9maWxlfGVufDB8MHx8fDE3MTEwMDM0MjN8MA&ixlib=rb-4.0.3&q=80&w=1080')] bg-cover bg-center bg-no-repeat">

                            <div class="bg-white/90 rounded-full w-6 h-6 text-center ml-28 mt-4">

                                <input type="file" name="profile" id="upload_profile" hidden required>

                                <label for="upload_profile">
                                        <svg data-slot="icon" class="w-6 h-5 text-blue-700" fill="none"
                                            stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z">
                                            </path>
                                        </svg>
                                    </label>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <!--  -->
                            <input type="file" name="profile" id="upload_cover" hidden required>

                            <div
                                class="bg-white flex items-center gap-1 rounded-tl-md px-2 text-center font-semibold">
                                <label for="upload_cover" class="inline-flex items-center gap-1 cursor-pointer">Cover
                                    
                                <svg data-slot="icon" class="w-6 h-5 text-blue-700" fill="none" stroke-width="1.5"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z">
                                    </path>
                                </svg>
                                </label>
                            </div>

                        </div>
                    </div>
                    <h2 class="text-center mt-1 font-semibold dark:text-gray-300">Upload Profile and Cover Image
                    </h2>
                    <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">
                        <div class="w-full  mb-4 mt-6">
                            <label for="" class="mb-2 dark:text-gray-300">username</label>
                            <input type="text"
                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                    placeholder="First Name" value="{{old('email',$dataProfile->username)}}">
                        </div>
                        <div class="w-full  mb-4 lg:mt-6">
                            <label for="" class=" dark:text-gray-300">email</label>
                            <input type="text"
                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                    placeholder="Last Name" value="{{old('email',$dataProfile->email)}}">
                        </div>
                    </div>

                    <div class="w-full  mb-4 lg:mt-6">
                            <label for="" class=" dark:text-gray-300">Phone Number</label>
                            <input type="text"
                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                    placeholder="Phone Number" value="{{old('email',$dataProfile->phone)}}">
                        </div>

                    <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full"></div>
                        <div class="w-full  mb-4 mt-6">
                            <label for="" class="mb-2 dark:text-gray-300">Password</label>
                            <input type="text"
                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                    placeholder="Password">
                        </div>
                        <div class="w-full  mb-4 lg:mt-6">
                            <label for="" class=" dark:text-gray-300">Password Verify</label>
                            <input type="text"
                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800"
                                    placeholder="Password Verify">
                        </div>
                    </div>

                    <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">
                        
                        <div class="w-full">
                            <h3 class="dark:text-gray-300 mb-2">Date Of Birth</h3>
                            <input type="date"
                                    class="text-grey p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800">
                        </div>
                    </div>
                    <form action="/organizer/updateProfile" method="POST">
                        @csrf
                        @method('put')    
                        <div class="w-full rounded-lg bg-blue-500 mt-4 text-black text-lg font-semibold">
                            <button type="submit" class="bg-white border border-gray-400 block py-2 px-4 w-full rounded font-fredoka z-20">Submit</button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>

    <div class="w-1/2 m-auto border-2 border-black p-32">

    <h1 class="text-center">From Login</h1>

    @if ($errors->any())
        <div class="w-full h-full m-auto bg-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('error'))
    <p class="text-red-500">{{ Session::get('error') }}</p>
@endif


    <form action="/organizer/updateProfile" method="POST">
        @csrf
        @method('put')

        <div class="w-1/2 m-auto">
            <input type="email" name="email" id="email" placeholder="email"
                class="w-56 h-5 border-2 border-black" value="{{old('email',$dataProfile->email)}}"><br>
            <input type="text" name="username" id="username" placeholder="username"
                class="w-56 h-5 border-2 border-black" value="{{old('email',$dataProfile->username)}}"><br>
                <input type="number" name="phone" id="phone" placeholder="phone"
                class="w-56 h-5 border-2 border-black" value="{{old('email',$dataProfile->phone)}}"><br>
            <input type="password" name="password" id="password" placeholder="password"
                class="w-56 h-5 border-2 border-black"><br>
            <input type="password" name="passwordVerify" id="passwordVerify" placeholder="Password Verify"
                class="w-56 h-5 border-2 border-black"><br>
            <button type="submit" class="w-14 h-10 border-2 border-black text-center ">Kirim</button>
        </div>
    </form>
</div>
</section>

@endsection