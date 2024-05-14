@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

  {{-- Navbar --}}
  @include('Layout.navbar')
  {{-- End Navbar --}}

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


    <form action="/4dm1n/updateProfile" method="POST">
        @csrf
        @method('put')

        <div class="w-1/2 m-auto">
            <input type="email" name="email" id="email" placeholder="email"
                class="w-56 h-5 border-2 border-black" value="{{old('email',$dataProfile->email)}}"><br>
            <input type="text" name="username" id="username" placeholder="username"
                class="w-56 h-5 border-2 border-black" value="{{old('email',$dataProfile->username)}}"><br>
            <input type="password" name="password" id="password" placeholder="password"
                class="w-56 h-5 border-2 border-black"><br>
            <input type="password" name="passwordVerify" id="passwordVerify" placeholder="Password Verify"
                class="w-56 h-5 border-2 border-black"><br>
            <button type="submit" class="w-14 h-10 border-2 border-black text-center ">Kirim</button>
        </div>
    </form>
</div>

@endsection