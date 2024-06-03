@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="w-1/2 mx-auto mt-40">

    <h1 class="ml-4 text-2xl font-semibold text-center font-fredoka z-20">Add Report</h1>


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
        @if (Session::has('success'))
            <p class="text-green-500">{{ Session::get('success') }}</p>
        @endif


        <form action="/organizer/addReport" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="w-1/2 m-auto space-y-4">
                <input type="text" name="kode_event" placeholder="Kode Event" class="border border-gray-400 block py-2 px-4 w-full rounded"><br>

                <textarea name="description" id="description" placeholder="description"
                    class="border border-gray-400 block py-2 px-4 w-full rounded" name="description" id="" cols="30" rows="10"></textarea><br>

                <input type="date" name="report_date" id="report_date" placeholder="report_date"
                    class="border border-gray-400  block py-2 px-4 w-full rounded"><br>

                <input type="file" name="media" class=""> <br>

                <button type="submit" class="bg-white border border-gray-400 block py-2 px-4 w-full rounded font-fredoka z-20">Submit</button>
            </div>
        </form>
    </div>
@endsection
