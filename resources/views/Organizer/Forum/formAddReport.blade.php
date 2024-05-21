@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="w-1/2 mx-auto mt-40 border-2 border-black p-32">

        <h1 class="text-center">From Tambah Organizer Report</h1>

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
                <input type="text" name="kode_event" placeholder="Kode Event" class="w-3/4 h-5 border-2 border-black"><br>

                <textarea class="border-2 border-black" name="report" id="" cols="30" rows="10"></textarea><br>

                <input type="date" name="report_date" id="report_date" placeholder="report_date"
                    class="w-3/4 h-5 border-2 border-black"><br>

                <input type="file" name="media" class=""> <br>

                <button type="submit" class="w-14 h-10 border-2 border-black text-center ">Kirim</button>
            </div>
        </form>
    </div>
@endsection
