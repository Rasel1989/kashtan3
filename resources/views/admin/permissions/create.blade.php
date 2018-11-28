@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    {{--Подключаем сообщени об ошибке--}}
                    @include('helpers.session_succsess_error')
                    <h3>Добавить Permission</h3>

                    <div class="row">
                        <div class="col-md-3">
                            @include('admin.permissions.menu')
                        </div>

                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-heading">Добавить permission</div>
                                <div class="panel-body">
                                    @include('admin.permissions.forms.create')
                                </div>
                            </div>

                        </div>
                    </div><!--.row-->
                </div>
            </div>
@endsection
