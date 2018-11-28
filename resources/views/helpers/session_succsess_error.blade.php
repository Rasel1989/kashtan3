{{--БЛОК сообщений об ошибке или успехе--}}
<div>
    @if(Session::has('success'))
        <div class="alert alert-success" style="margin-top: 15px;">
            <ul>
                <li>{!! Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
</div>

@if(Session::has('error'))
    <p>
    <div class="alert alert-danger" style="margin-top: 15px;">
        <ul>
            <li>{!! Session::get('error') !!}</li>
        </ul>
    </div>
    </p>
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif