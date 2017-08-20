@foreach(\Admin\Helpers\MenuHelper::getMenus() as $menu)
    <li class="nav-item">
        {!! $menu->render() !!}
    </li>
@endforeach