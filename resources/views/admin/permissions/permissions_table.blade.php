
@if($permissions)
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Display Name</th>
            <th>Описание</th>
            <th class="text-right">Редактировать</th>
        </tr>
        </thead>

        <tbody>



        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id or '-'}}</td>
                <td>{{$permission->name or '-'}}</td>
                <td>{{$permission->display_name or '-'}}</td>
                <td>{{$permission->description or '-'}}</td>
                <td>
                    <a href="{{route('permissions.edit', $permission->id)}}">редактировать</a>
                    <br>
                    <a href="{{route('permissions.delete', $permission->id)}}"  onclick="return confirm('УДАЛИТЬ?')">удалить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    Ошибка пользователи не найдены, проверьте переменную users
@endif


