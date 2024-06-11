@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    <div class="flex justify-center items-center h-screen">
        <div class="w-full md:w-1/2 bg-white p-8 md:p-16 border border-gray-300 rounded-lg shadow-lg">
            <h1 class="text-center text-2xl md:text-4xl mb-8">Form Login</h1>

            @if ($errors->any())
                <div class="bg-red-300 p-4 rounded-md mb-4">
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

            <form action="/4dm1n/login" method="POST" class="text-center">
                @csrf
                @method('post')

                <div class="w-full md:w-3/4 mx-auto mb-8">
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="w-full h-12 px-4 mb-4 rounded border border-gray-300 focus:outline-none focus:border-blue-500"><br>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full h-12 px-4 mb-4 rounded border border-gray-300 focus:outline-none focus:border-blue-500"><br>
                    <button type="submit" class="w-full h-12 bg-blue text-white rounded hover:bg-blue-600 focus:outline-none">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection
