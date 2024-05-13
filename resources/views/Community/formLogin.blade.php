@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')



    <div class="w-1/2 m-auto border-2 border-black p-32">

        <h1 class="text-center">From Login Community</h1>

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


        <form action="/community/login" method="POST">
            @csrf
            @method('post')

            <div class="w-1/2 m-auto">
                <input type="email" name="email" id="email" placeholder="email"
                    class="w-3/4 h-5 border-2 border-black"><br>
                <input type="password" name="password" id="password" placeholder="password"
                    class="w-3/4 h-5 border-2 border-black"><br>
                <button type="submit" class="w-14 h-10 border-2 border-black text-center ">Kirim</button>
            </div>
        </form>
    </div>
@endsection
