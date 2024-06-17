<li>
    <span class="caret">{{ $item->name }}</span>
    // if item->children is a set, include the nested list
    @if (isset($item->children))
        <ul class="nested">
            // for each child in the list, recursively add that child-item's children
            @foreach ($item->children as $child)
                @include('atest.dropdown-item', ['item' => $child])
            @endforeach
        </ul>
    @endif
</li>
