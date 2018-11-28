@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    {{--Подключаем сообщени об ошибке--}}
                    @include('helpers.session_succsess_error')
                    <h1>Объект</h1>

                    @php //dump($object); @endphp

                    @if($object->room)
                        @foreach($object->room as $room)
                            {{$room->id or ''}} {{$room->name or ''}} [{{$room->floorage or ''}}]
                            <a href="{{route('view.room', ['id' => $room->id, 'sale' => $object->sale])}}">Смотреть</a>
                            <br>
                        @endforeach
                    @endif



                <div>
            </div><!--col-->
        </div>
    </div>
@endsection
