@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    <div class="w-1/2 h-1/2 m-auto border-2 border-black p-2">
        @if (Session::has('error'))
            <p class="text-red-500">{{ Session::get('error') }}</p>
        @endif
        @if (Session::has('success'))
            <p class="text-green-500">{{ Session::get('success') }}</p>
        @endif
        <a href="/4dm1n/formAddCategory"><button type="submit"
                class="w-14 h-10 border-2 border-black text-center bg-cyan-500">Tambah</button></a>

        @forelse ($category as $ctg)
            <div class="w-[60%] h-1/2 m-auto border-2 border-black">
                <ul class="text-center">
                    <li>Nama Category : <span class="text-red-500 font-bold">{{ $ctg->category_name }}</span></li>
                    <div class="flex justify-center gap-3">
                        <form action="/4dm1n/deleteCategory" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $ctg->id }}" id="">
                            <button type="submit" class="w-14 h-10 border-2 border-black text-center bg-red-500"
                                onclick="return confirm('Are you sure deleted this event {{ $ctg->category_name }} ?')">Delete</button>
                        </form>
                        <a href="/4dm1n/formUpdateCategory/{{ $ctg->id }}"><button type="submit"
                                class="w-14 h-10 border-2 border-black text-center bg-green-500">Edit</button></a>
                    </div>
                </ul>
            </div>
        @empty
            <h1 class="text-center text-4xl">Belum ada event</h1>
        @endforelse


    </div>
@endsection
