<div class="panel panel-default">
    <div class="panel-body">
        <ul class="menu-admin1">
            <li><a href="{{route('users.index')}}">Все пользователи</a></li>
            <li><a href="{{route('users.create')}}">Добавить пользователя</a></li>
        </ul>
    </div>
</div>


<hr>



<div class="panel panel-default">
    <div class="panel-body">
        <p class="alert-danger alert">
            Только для разработчиков !
        </p>
        
        <ul class="menu-admin-danger">
            <li><a href="{{route('roles.index')}}">Roles</a></li>
            <li><a href="{{route('permissions.index')}}">Permissions</a></li>
        </ul>

        
    </div>
</div>






