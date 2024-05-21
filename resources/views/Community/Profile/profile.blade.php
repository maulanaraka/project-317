@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

<div class="bg-gray-100 mx-auto px-6 center">
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
            <div class="col-span-4 sm:col-span-3">
                <div class="bg-white shadow rounded-lg p-6">
                    <div class="flex flex-col items-center">
                        <img src="C:\PerkuliahanDuniawi\SEMESTER 6\REKAYASA PERANGKAT LUNAK\PROJECT 317\public\images\KTM.jpg" class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">
                        </img>
                        <h1 class="text-xl font-bold">{{$dataProfile->username}}</h1>
                        <p class="text-gray-700">{{$dataProfile->email}}</p>
                        <div class="mt-6 flex flex-wrap gap-4 justify-center">
                            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-2 rounded">Contact</a>
                            <a href="/organizer/{{$dataProfile->id}}/formUpdateProfile" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-2 rounded">Update</a>
                        </div>
                    </div>
                    <hr class="my-6 border-t border-gray-300">
                    <div class="flex flex-col">
                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">About</span>
                        <ul>
                            <li class="mb-2">id : {{$dataProfile->id}} </li>
                            <li class="mb-2">Phone Number : {{$dataProfile->phone}} </li>
            
                        </ul>
                    </div>
                </div>
            </div>

  {{-- Navbar --}}
 // @include('Layout.navbar')
  {{-- End Navbar --}}

    @endsection