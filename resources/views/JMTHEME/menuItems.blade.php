@foreach($items as $item)
    <li>  <?php //{{ (URL::current() == $item->url()) ? "class=active" : '' }}?>
        <a href="{{ $item->url() }}">{{ $item->title}}</a>
        @if( $item->hasChildren())
            <ul class="sub-menu">
                @include(env('THEME').'.menuItems',['items'=>$item->children()])
            </ul>
            @endif
    </li>
    @endforeach