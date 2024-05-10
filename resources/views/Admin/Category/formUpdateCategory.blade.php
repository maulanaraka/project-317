@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    <div class="w-1/2 m-auto border-2 border-black p-32">

        <h1 class="text-center">From Add Category</h1>

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


        <form action="/4dm1n/updateCategory" method="POST">
            @csrf
            @method('put')
            <div class="w-1/2 m-auto">
                <input type="hidden" name="id" value="{{ $category->id }}">
                <input type="category" name="category_name" id="category" placeholder="category"
                    value="{{ old('category_name', $category->category_name) }}"
                    class="w-3/4 h-5 border-2 border-black"><br>
                <button type="submit" class="w-14 h-10 border-2 border-black text-center ">Kirim</button>
            </div>
        </form>
    </div>
@endsection
