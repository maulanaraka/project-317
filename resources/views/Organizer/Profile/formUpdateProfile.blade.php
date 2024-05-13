@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

<div class="bg-gray-100 px-4 my-32 max-2-3xl mx-auto space-y-6 w-1/2 rounded">

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
                class="border border-gray-400 block py-2 px-4 w-full rounded" value="{{old('email',$dataProfile->email)}}"><br>
            <input type="text" name="username" id="username" placeholder="username"
                class="border border-gray-400 block py-2 px-4 w-full rounded" value="{{old('email',$dataProfile->username)}}"><br>
                <input type="number" name="phone" id="phone" placeholder="phone"
                class="border border-gray-400 block py-2 px-4 w-full rounded" value="{{old('email',$dataProfile->phone)}}"><br>
            <input type="password" name="password" id="password" placeholder="password"
                class="border border-gray-400 block py-2 px-4 w-full rounded"><br>
            <input type="password" name="passwordVerify" id="passwordVerify" placeholder="Password Verify"
                class="border border-gray-400 block py-2 px-4 w-full rounded"><br>
            <button type="submit" class="border border-gray-400 block py-2 px-4 w-full rounded bg-white ">Save</button>
        </div>
    </form>
</div>

@endsection