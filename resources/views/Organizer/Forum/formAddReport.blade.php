@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="pt-20">
        <div class="relative bg-zinc-100 overflow-hidden w-full max-w-5xl mx-auto my-16 p-8 rounded-3xl shadow">
            <div class="mb-8">
                <h1 class="text-6xl font-medium text-stone-400 text-justify font-['Fredoka']">Add Report</h1>
            </div>

            @if ($errors->any())
                <div class="bg-red-300 p-4 rounded">
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
            @if (Session::has('success'))
                <p class="text-green-500">{{ Session::get('success') }}</p>
            @endif

            <form action="/organizer/addReport" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="space-y-4">
                    <input type="text" name="kode_event" placeholder="Kode Event"
                        class="mt-1 border bg-zinc-600 block w-full py-2 px-4 rounded-lg placeholder:text-white text-white font-fredoka"><br>

                    <textarea name="report" id="description" placeholder="Description"
                        class="mt-1 border border-zinc-600 block w-full py-2 px-4 rounded-lg font-fredoka"
                        cols="30" rows="10"></textarea><br>

                    <input type="date" name="report_date" id="report_date" placeholder="Report Date"
                        class="mt-1 border border-zinc-600 block w-full py-2 px-4 rounded-lg font-fredoka"><br>

                    <input type="file" name="media" class="mt-1 block w-full py-2 px-4 rounded-lg bg-zinc-300 font-fredoka"> <br>

                    <button type="submit"
                        class="bg-sky-900 text-white py-2 px-4 rounded-md font-extrabold font-fredoka hover:bg-sky-700 focus:outline-none">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @include("Layout.footer")
@endsection
