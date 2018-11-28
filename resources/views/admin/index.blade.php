@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    {{--Подключаем сообщени об ошибке--}}
                    @include('helpers.session_succsess_error')
                    <h2>Админ панель</h2>
                    <hr>


                    <div class="row">
                        <div class="col-md-4">
                            @include('admin.menu.menu')
                        </div><!--col-->

                        <div class="col-md-8">
                            Правое меню
                        </div><!--col-->


                    </div><!--row-->


                </div>
            </div>
@endsection
