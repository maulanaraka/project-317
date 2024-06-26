@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

@include('Layout.navbar')

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


<section class="py-10 my-auto dark:bg-transparent rounded">
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
                <form action="/organizer/updateProfile" method="POST">
                    @csrf
                    @method('put')
                    <!-- Cover Image -->
                    <div
                        class="w-full rounded-sm bg-[url('')] bg-cover bg-center bg-no-repeat items-center">
                        <!-- Profile Image -->
                        <div
                            class="mx-auto flex justify-center w-[141px] h-[141px] bg-blue-300/20 rounded-full bg-[url('/../../public/images/loginRegis/Profile.png')] bg-cover bg-center bg-no-repeat">

                            <div class="bg-white/90 rounded-full w-6 h-6 text-center ml-28 mt-4">

                            </div>
                        </div>
                        <div class="flex justify-end">
                            <!--  -->
            

                            <div
                                class="bg-white flex items-center gap-1 rounded-tl-md px-2 text-center font-semibold">
                                
                            </div>

                        </div>
                    </div>
                
                    </h2>
                    <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">
                        <div class="w-full  mb-4 mt-6">
                            <label for="" class="mb-2 dark:text-gray-900">username</label>
                            <div type="text"
                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-700">
                                    {{$dataProfile->username}}</div>
                        </div>
                        <div class="w-full  mb-4 lg:mt-6">
                            <label for="" class=" dark:text-gray-900">email</label>
                            <div type="text"
                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-700">
                                    {{$dataProfile->email}}</div>
                        </div>
                    </div>

                    <div class="w-full  mb-4 lg:mt-6">
                            <label for="" class=" dark:text-gray-900">Phone Number</label>
                            <div type="text"
                                    class="mt-2 p-4 w-full border-2 rounded-lg dark:text-gray-200 dark:border-gray-600 dark:bg-gray-700">
                                    {{$dataProfile->phone}}</div>
                        </div>

                    <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full"></div>
                        
                    </div>

                    <div class="flex lg:flex-row md:flex-col sm:flex-col xs:flex-col gap-2 justify-center w-full">
                        

                    </div>
                    
                    <div class="w-full rounded-lg bg-blue-500 mt-4 text-black text-lg font-semibold">
                            <a href="/community/{{$dataProfile->id}}/formUpdateProfile" class="bg-white border border-gray-400 block py-2 px-4 w-full rounded font-fredoka z-20">Update</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection