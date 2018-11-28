@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    {{--Подключаем сообщени об ошибке--}}
                    @include('helpers.session_succsess_error')
                    <h3> Работа с Permissions</h3>
                    <p class="alert-warning alert">Внимание этот раздел только для разработчиков! Permissions не редактировать, не удалять! </p>

                    <div class="row">
                        <div class="col-md-3">
                            @include('admin.permissions.menu')
                        </div>

                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-heading">Permissions</div>
                                <div class="panel-body">
                                    @include('admin.permissions.permissions_table')
                                </div>
                            </div>
                        </div>
                    </div><!--.row-->
                </div>
            </div>
@endsection
