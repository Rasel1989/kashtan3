@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    {{--Подключаем сообщени об ошибке--}}
                    @include('helpers.session_succsess_error')
                    <h1>Все объекты</h1>

                    {{--Подключаем таблицу всех объектов--}}
                    @include('objects.blocks.table_all_objects')
                    <div class="pagination">{{ $objects->render() }}</div><!--pagination-->
                </div>
            </div>
        </div>
    </div>
@endsection
