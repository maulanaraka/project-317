@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

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