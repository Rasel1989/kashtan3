
{{ Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) }}

<div class="form-group">
    {{ Form::label('name', 'Логин', ['class' => 'control-label']) }}
    {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('fio', 'Введите ФИО сотрудника', ['class' => 'control-label']) }}
    {{ Form::text('fio', $user->fio, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('phone', 'Телефон сотрудника', ['class' => 'control-label']) }}
    {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{ Form::label('email', 'email сотрудника', ['class' => 'control-label']) }}
    {{ Form::text('email', $user->email, ['class' => 'form-control', 'required']) }}
</div>



<div class="alert alert-danger">

<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
       Изменить пароль
    </a>

</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <div class="form-group">
            {{ Form::label('password', 'Введите новый пароль сотрудника', ['class' => 'control-label']) }}
            {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Повторите пароль', ['class' => 'control-label']) }}
            {{ Form::password('password_confirmation',  ['class' => 'form-control']) }}
        </div>
    </div>
</div>

</div>


<div class="form-group">
    <p>Назначить права пользователю:</p>
    @foreach($roles as $role)
        @if(isset($user_roles))
            @if(in_array($role->id, $user_roles))
                {{Form::checkbox('roles[]', $role->id, true, ['id' => 'roles'.$role->id])}}
                {{Form::label('roles'.$role->id, $role->name)}}
            @else
                {{Form::checkbox('roles[]', $role->id, null, ['id' => 'roles'.$role->id])}}
                {{Form::label('roles'.$role->id, $role->name)}}

            @endif
        @endif
            <br>
    @endforeach
</div>






{{ Form::hidden('id', $user->id) }}
{{ Form::token() }}
{{ Form::submit('Изменить данные', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}



