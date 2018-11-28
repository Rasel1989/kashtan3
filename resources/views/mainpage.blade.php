@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    {{--Подключаем сообщени об ошибке--}}
                    @include('helpers.session_succsess_error')
                    <h1>Главная страница проекта</h1>

                    <div>
                    </div><!--col-->
                </div>
            </div>
@endsection
