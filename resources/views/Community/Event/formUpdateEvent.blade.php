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

        <form action="/community/updateEvent" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" id="id" name="id" value="{{ $myEvent->id }}">

            <div class="w-1/2 m-auto space-y-4">
                <input type="title" name="title" id="title" placeholder="title"
                class="w-3/4 h-5 border-2 border-black" value="{{old('title',$myEvent->title)}}"><br>
                
            <textarea class="border-2 border-black" name="description" id="" cols="30" rows="10">{{old('description',$myEvent->description)}}</textarea><br>

            <input type="date" name="event_date" id="event_date" placeholder="event_date"
                class="w-3/4 h-5 border-2 border-black" value="{{old('event_date',$myEvent->event_date)}}"><br>

            <input type="file" name="media" class=""> <br>
            <input type="hidden" name="mediaHidden" value="{{ $myEvent->media }}">

            <select name="event_category" id="cars">
                @foreach ($category as $cl ):
                <option value="{{ $cl->id }}" {{$myEvent->event_category == $cl->id ? 'selected' : ''}}>{{$cl->category_name}}</option>
                @endforeach
                </select><br>

                <button type="submit" class="w-14 h-10 border-2 border-black text-center ">Kirim</button>
            </div>
        </form>
    </div>
@endsection
