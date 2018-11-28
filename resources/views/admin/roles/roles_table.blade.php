
@if($roles)
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Display Name</th>
            <th>Описание</th>
            <th>Разрешения</th>
            <th class="text-right">Редактировать</th>
        </tr>
        </thead>

        <tbody>

        @foreach($roles as $role)
            <tr>
                <td>{{$role->id or '-'}}</td>
                <td>{{$role->name or '-'}}</td>
                <td>{{$role->display_name or '-'}}</td>
                <td>{{$role->description or '-'}}</td>
                <td>
                    @if($role->permission)
                        @foreach($role->permission as $permission)
                            {{$permission->name}} <br>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a href="{{route('roles.edit', $role->id)}}">редактировать</a>
                    <br>
                    <a href="{{route('roles.delete', $role->id)}}"  onclick="return confirm('УДАЛИТЬ?')">удалить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    Ошибка пользователи не найдены, проверьте переменную users
@endif


