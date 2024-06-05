@extends('./Layout/app')

@section('title', 'Dashboard')

@section('content')

    {{-- Navbar --}}
    @include('Layout.navbar')
    {{-- End Navbar --}}

    <div class="pt-20">
        <div class="relative bg-zinc-100 overflow-hidden w-full max-w-5xl mx-auto my-16 p-8 rounded-3xl shadow">
            <div class="mb-8">
                <p class="text-6xl font-medium text-stone-400 text-justify font-['Fredoka']">New Event</p>
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

            <form action="/organizer/addEvent" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-base font-semibold text-zinc-500 font-fredoka">Title</label>
                        <input type="text" name="title" id="title" placeholder="Title"
                            class="mt-1 border bg-zinc-600 block w-full py-2 px-4 rounded-lg placeholder:text-white text-white font-fredoka">
                    </div>

                    <div>
                        <label for="description"
                            class="block text-base font-semibold text-zinc-500 font-fredoka">Description</label>
                        <textarea name="description" id="description" placeholder="Description"
                            class="mt-1 border border-zinc-600 block w-full py-2 px-4 rounded-lg font-fredoka" rows="4"></textarea>
                    </div>

                    <div>
                        <label for="event_date" class="block text-base font-semibold text-zinc-500 font-fredoka">Event
                            Date</label>
                        <input type="date" name="event_date" id="event_date"
                            class="mt-1 border border-zinc-600 block w-full py-2 px-4 rounded-lg font-fredoka">
                    </div>

                    <div>
                        <label for="media" class="block text-base font-semibold text-zinc-500 font-fredoka">Media</label>
                        <input type="file" name="media" id="media"
                            class="mt-1 block w-full py-2 px-4 rounded-lg bg-zinc-300 font-fredoka">
                    </div>

                    <div>
                        <label for="event_category"
                            class="block text-base font-semibold text-zinc-500 font-fredoka">Category</label>
                        <select name="event_category" id="event_category"
                            class="mt-1 block w-full py-2 px-4 rounded-lg bg-yellow-600 text-white font-fredoka">
                            @foreach ($category_list as $cl)
                                <option value="{{ $cl->id }}">{{ $cl->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-sky-900 text-white py-2 px-6 rounded-md font-extrabold font-['Plus Jakarta Sans'] hover:bg-sky-700 focus:outline-none">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('Layout.footer')
@endsection
