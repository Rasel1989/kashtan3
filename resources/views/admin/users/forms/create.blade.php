
{{ Form::open(['route' => 'users.store']) }}

    <div class="form-group">
        {{ Form::label('name', 'Логин', ['class' => 'control-label']) }}
        {{ Form::text('name', '', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('fio', 'Введите ФИО сотрудника', ['class' => 'control-label']) }}
        {{ Form::text('fio', '', ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Телефон сотрудника', ['class' => 'control-label']) }}
        {{ Form::text('phone', '', ['class' => 'form-control']) }}
    </div>


    <div class="form-group">
        {{ Form::label('email', 'email сотрудника', ['class' => 'control-label']) }}
        {{ Form::text('email', '', ['class' => 'form-control', 'required']) }}
    </div>


    <div class="form-group">
        {{ Form::label('password', 'Введите новый пароль сотрудника', ['class' => 'control-label']) }}
        {{ Form::password('password', ['class' => 'form-control', 'required']) }}
    </div>


    <div class="form-group">
        {{ Form::label('password_confirmation', 'Повторите пароль', ['class' => 'control-label']) }}
        {{ Form::password('password_confirmation',  ['class' => 'form-control', 'required']) }}
    </div>

    <div class="form-group">
        <p>Назначить права пользователю:</p>
        @foreach($roles as $role)
            {{Form::checkbox('roles[]', $role->id, null, ['id' => 'roles'.$role->id])}}
            {{Form::label('roles'.$role->id, $role->name)}}
            <br>
        @endforeach
    </div>








{{ Form::token() }}
{{ Form::submit('Добавить нового пользователя', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}



