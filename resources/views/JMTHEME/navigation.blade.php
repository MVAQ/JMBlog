@if($menu)
    <div class="menu classic">
        <ul id="nav" class="menu">
@include(env('THEME').'.menuItems',['items'=>$menu->roots()])
        </ul>
    </div>
    @endif