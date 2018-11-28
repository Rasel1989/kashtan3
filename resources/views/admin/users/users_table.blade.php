
@if($users)
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Login</th>
            <th>ФИО</th>
            <th>email</th>
            <th>Роли</th>
            <th>Телефон</th>
            <th class="text-right">Редактировать</th>
        </tr>
        </thead>

        <tbody>



            @foreach($users as $user)
                <tr>
                    <td>{{$user->id or '-'}}</td>
                    <td>{{$user->name or '-'}}</td>
                    <td>{{$user->fio or '-'}}</td>
                    <td>{{$user->email or '-'}}</td>
                    <td>
                        @if($user->role)
                            @foreach($user->role as $role)
                                {{$role->name or ''}}
                                <br>
                            @endforeach
                        @else
                            Нет роле
                        @endif
                    </td>

                    <td>{{$user->phone or '-'}}</td>

                    <td>
                        <a href="{{route('users.edit', $user->id)}}">редактировать</a>
                        <br>
                        <a href="{{route('users.delete', $user->id)}}"  onclick="return confirm('УДАЛИТЬ?')">удалить</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Ошибка пользователи не найдены, проверьте переменную users
@endif


