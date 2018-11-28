
{{ Form::open(['route' => 'permissions.store']) }}

<div class="form-group">
    {{ Form::label('name', 'Имя Permission', ['class' => 'control-label']) }}
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



{{ Form::token() }}
{{ Form::submit('Добавить permission', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}



