<li>
    @if (isset($item->children) && count($item->children) > 0)
        <span class="caret parent">{{ $item->name }}</span>
    @else
        <span class="caret">{{ $item->name }}</span>
    @endif
    <!-- if item->children is a set, include the nested list --> 
    @if (isset($item->children))
        <ul class="nested">
            <!-- for each child in the list, recursively add that child-item's children --> 
            @foreach ($item->children as $child)
                @include('atest.dropdown-item', ['item' => $child])
            @endforeach
        </ul>
    @endif
</li>
