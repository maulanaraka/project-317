@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

  {{-- Navbar --}}
  @include('Layout.navbar')
  {{-- End Navbar --}}

  <div class="container mx-auto mt-44 mt-8">
    @if (Session::has('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <span class="block sm:inline">{{ Session::get('error') }}</span>
      </div>
    @endif
    @if (Session::has('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <span class="block sm:inline">{{ Session::get('success') }}</span>
      </div>
    @endif
    <a href="/4dm1n/formAddCategory" class="inline-block mb-4">
      <button type="submit"
              class="bg-cyan-500 hover:bg-cyan-600 text-white text-center px-4 py-2 rounded-md focus:outline-none">Tambah</button>
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      @forelse ($category as $ctg)
        <div class="border border-gray-300 rounded-lg overflow-hidden">
          <div class="px-6 py-4 text-center">
            <h3 class="text-lg font-semibold text-gray-800">{{ $ctg->category_name }}</h3>
          </div>
          <div class="px-6 py-4 flex justify-center">
            <form action="/4dm1n/deleteCategory" method="POST">
              @csrf
              @method('delete')
              <input type="hidden" name="id" value="{{ $ctg->id }}" id="">
              <button type="submit"
                      class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline"
                      onclick="return confirm('Are you sure you want to delete this category {{ $ctg->category_name }}?')">Delete</button>
            </form>
            <a href="/4dm1n/formUpdateCategory/{{ $ctg->id }}" class="ml-2">
              <button type="submit"
                      class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
            </a>
          </div>
        </div>
      @empty
        <div class="text-center text-4xl font-semibold">Belum ada kategori</div>
      @endforelse
    </div>
  </div>
@endsection
