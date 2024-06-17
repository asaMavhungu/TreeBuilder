<!DOCTYPE html>
<htm lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

        ul {
            list-style-type: none;
        }

        .caret {
            display: block;
            padding: 5px;
            border: 1px solid;
            cursor: pointer;
        }

        .caret.parent::before {
            content: '+';
            padding: 0 5px;
        }

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
