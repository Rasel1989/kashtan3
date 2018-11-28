
<?php //dump($role_permissions) ?>


{{ Form::open(['route' => ['roles.update', $role->id], 'method' => 'PUT']) }}

<div class="form-group">
    {{ Form::label('name', 'Имя роли', ['class' => 'control-label']) }}
    {{ Form::text('name', $role->name, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('display_name', 'display_name', ['class' => 'control-label']) }}
    {{ Form::text('display_name', $role->display_name, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'description', ['class' => 'control-label']) }}
    {{ Form::text('description', $role->description, ['class' => 'form-control']) }}
</div>


<div class="form-group">
    <div class="alert-warning alert">
    <p><span style="color: red;">Выберите разрешения:</span></p>
        <hr>

    @foreach($permissions as $permission)
        @if(isset($role_permissions))
            @if(in_array($permission->id, $role_permissions))
                {{Form::checkbox('permission[]', $permission->id, true, ['id' => 'permission'.$permission->id])}}
                {{Form::label('permission'.$permission->id, $permission->name)}}
                <p>Описание: <br>
                    {{$permission->description}}
                </p>
                <hr>
            @else
                {{Form::checkbox('permission[]', $permission->id, null, ['id' => 'permission'.$permission->id])}}
                {{Form::label('permission'.$permission->id, $permission->name)}}
                <p>Описание: <br>
                    {{$permission->description}}
                </p>
                <hr>

            @endif
        @endif

    @endforeach
    </div>
</div>


{{ Form::hidden('id', $role->id) }}
{{ Form::token() }}
{{ Form::submit('Изменить данные', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}



