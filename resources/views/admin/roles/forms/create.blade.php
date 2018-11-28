
{{ Form::open(['route' => 'roles.store']) }}

<div class="form-group">
    {{ Form::label('name', 'Имя роли', ['class' => 'control-label']) }}
    {{ Form::text('name', '', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('display_name', 'display_name', ['class' => 'control-label']) }}
    {{ Form::text('display_name', '', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'description', ['class' => 'control-label']) }}
    {{ Form::text('description', '', ['class' => 'form-control']) }}
</div>


<div class="form-group">
    <p><span style="color: red;">Выберите разрешения:</span></p>
    @if($permissions)
        @foreach($permissions as $permission)
            {{Form::checkbox('permission[]', $permission->id, null, ['id' => 'permission'.$permission->id])}}
                {{Form::label('permission'.$permission->id, $permission->name)}}
                <p>Описание: <br>
                    {{$permission->description}}
                </p>
            <hr>
        @endforeach
    @endif


</div>



{{ Form::token() }}
{{ Form::submit('Добавить роль', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}



