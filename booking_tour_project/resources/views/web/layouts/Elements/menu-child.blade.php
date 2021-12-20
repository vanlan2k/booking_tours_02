@if($category->cateParent->count())
    <ul class="submenu dropdown-menu">
        @foreach($category->cateParent as $cateParent)
        <li><a class="dropdown-item" href="/search?category={{$cateParent->id}}">{{$cateParent->name}}</a>
            @include('web.layouts.Elements.menu-child', ['category' => $cateParent])
        </li>
        @endforeach
    </ul>
@endif
