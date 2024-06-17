<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <ul id="menu">
        // $tree is passed down from AtestController
        @foreach ($tree as $item)
            @include('atest.dropdown-item', ['item' => $item])
        @endforeach
    </ul>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglers = document.querySelectorAll('.caret');
            togglers.forEach(toggler => {
                toggler.addEventListener('click', function () {
                    this.parentElement.querySelector(".nested").classList.toggle("active");
                    this.classList.toggle("caret-down");
                });
            });
        });
    </script>
</body>
</html>
