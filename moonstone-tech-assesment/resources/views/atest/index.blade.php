<!DOCTYPE html>
<htm lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

        /* remove the bullet points */
        ul {
            list-style-type: none;
        }

        /* add border and change cursor on hover */
        .caret {
            display: block;
            padding: 5px;
            border: 1px solid;
            cursor: pointer;
        }

        /* add a '+' symbol to show item can expand */
        .caret.parent::before {
            content: '+';
            padding: 0 5px;
        }

        /* add a '-' symbol to show item has been expanded
           NB: if item is just caret, it has no children and has no
                expand or contrast sybmol
        */
        .caret.parent.caret-down::before {
            content: '-';
            padding: 0 5px;
        }

        /* if the item is nested, dont dispay it */
        .nested {
            display: none;
        }
        
        /* if the hidden nestest item becomes active, then display it*/
        .active {
            display: block;
        }

    </style>


</head>


<body>

    @include('atest.search-bar')
    
    <ul id="menu">
        <!-- $tree is passed down from AtestController --> 
        @foreach ($tree as $item)
            @include('atest.dropdown-item', ['item' => $item])
        @endforeach
    </ul>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglers = document.querySelectorAll('.caret');
            togglers.forEach(toggler => {
                toggler.addEventListener('click', function () {
                    // toggle the selected item's 'active' status
                    this.parentElement.querySelector(".nested").classList.toggle("active");
                    // toggle the selected item's 'caret-down' status
                    // to show is as a sub-element 
                    this.classList.toggle("caret-down");
                });
            });
        });
    </script>
</body>
</html>
