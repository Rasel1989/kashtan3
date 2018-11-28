@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    {{--Подключаем сообщени об ошибке--}}
                    @include('helpers.session_succsess_error')
                    <h1>Все объекты</h1>
                        {{$sale}}

                        @if($room->prices)
                            @foreach($smetaSections as $section)


                                <b>{{$section->title}}</b><br>




                                    @foreach($room->prices as $price)

                                        @if($section->id == $price->smetaprices->section_id)
                                            [{{$price->id}}] - {{$price->smetaprices->name}} - {{$price->volume}}<br>
                                        @endif

                                    @endforeach


                            @endforeach
                            {{--
                            @foreach($room->prices as $price)

                            @endforeach
                            --}}
                        @endif
                    <div>
                    </div><!--col-->
                </div>
            </div>
@endsection
