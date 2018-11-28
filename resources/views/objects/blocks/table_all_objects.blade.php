{{--Таблица всех Объектов--}}
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Номер заявки/объекта</th>
        <th scope="col">Название и адрес объекта</th>
        <th scope="col">Клиент</th>
        <th scope="col">Контактный телефон</th>
        <th scope="col">Скидка</th>
        <th scope="col">Объект</th>
        <th scope="col">Анкета</th>
        <th scope="col">Сметчик</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($objects as $object)
        <tr>
            <td>
                <a href="{{route('view.object', $object->id)}}">
                    {{ $object->object_1c_name or '' }}
                </a>
            </td>
            <td>{{ $object->name or '' }}</td>
            <td>{{ $object->client_name or '' }}</td>
            <td>{{ $object->client_tel or '' }}</td>
            <td>{{ $object->sale or '' }}</td>
            <td></td>
            <td></td>
            <td>{{ $object->user_id or '' }}</td>
            <td>клонировать</td>
        </tr>
    @endforeach
    </tbody>
</table>