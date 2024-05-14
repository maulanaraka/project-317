@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-gray-100 mx-auto px-6">
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
            <div class="col-span-4 sm:col-span-3">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <img src="C:\Users\malvi\Pictures\Camera Roll\WIN_20240504_11_37_36_Pro.jpg" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                        </img>
                        <h1 class="text-xl font-bold">{{$dataProfile->username}}</h1>
                        <p class="text-gray-700">{{$dataProfile->email}}</p>
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Contact</a>
                            <a href="/organizer/{{$dataProfile->id}}/formUpdateProfile" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Update</a>
                        </div>
                    </div>
                    <hr class="my-6 border-t border-gray-300">
                    <div class="flex flex-col">
                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Skills</span>
                        <ul>
                            <li class="mb-2">JavaScript</li>
                            <li class="mb-2">React</li>
                            <li class="mb-2">Node.js</li>
                            <li class="mb-2">HTML/CSS</li>
                            <li class="mb-2">Tailwind Css</li>
                        </ul>
                    </div>
                </div>
            </div>


    <div class="w-1/2 h-1/2 m-auto border-2 border-black p-32 ">
        <h1 class="text-center mb-10">Profile saya</h1>
        <ul class="mb-5">
            <li>id : {{$dataProfile->id}}</li>
            <li>email : {{$dataProfile->email}}</li>
            <li>username : {{$dataProfile->username}}</li>
        </ul>

        <a href="/organizer/{{$dataProfile->id}}/formUpdateProfile" class="p-1 border-2 border-black text-center rounded-xl">Update</a>

    </div>

    @endsection