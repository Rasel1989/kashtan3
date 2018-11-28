
{{ Form::open(['route' => ['permissions.update', $permission->id], 'method' => 'PUT']) }}

<div class="form-group">
    {{ Form::label('name', 'Имя роли', ['class' => 'control-label']) }}
    {{ Form::text('name', $permission->name, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('display_name', 'display_name', ['class' => 'control-label']) }}
    {{ Form::text('display_name', $permission->display_name, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'description', ['class' => 'control-label']) }}
    {{ Form::text('description', $permission->description, ['class' => 'form-control']) }}
</div>


{{ Form::hidden('id', $permission->id) }}
{{ Form::token() }}
{{ Form::submit('Изменить данные', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}



