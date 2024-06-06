@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

  {{-- Navbar --}}
  @include('Layout.navbar')
  {{-- End Navbar --}}

  <div class="w-full md:w-1/2 mx-auto mt-44 p-8 bg-white border border-black rounded-lg">

    <h1 class="text-3xl text-center font-semibold mb-8">Form Ubah Kategori</h1>

    @if ($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    @if (Session::has('error'))
      <p class="text-red-500 text-center">{{ Session::get('error') }}</p>
    @endif

    <form action="/4dm1n/updateCategory" method="POST" class="w-full max-w-sm mx-auto">
      @csrf
      @method('put')
      <div class="mb-4">
        <input type="hidden" name="id" value="{{ $category->id }}">
        <input type="text" name="category_name" id="category" placeholder="Nama Kategori"
               value="{{ old('category_name', $category->category_name) }}"
               class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
      </div>
      <div class="flex justify-center">
        <button type="submit" class="bg-blue hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded focus:outline-none focus:shadow-outline">
          Kirim
        </button>
      </div>
    </form>

  </div>
@endsection
