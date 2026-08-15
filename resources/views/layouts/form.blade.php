<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Admin Form
    </title>


    {{-- CSS های پروژه خودت اگر در Layout اصلی داری، همان‌ها را اینجا هم کپی کن --}}

</head>


<body>


    {{-- فقط Toggle Dark / Light اینجا بماند --}}
    
    <div class="position-fixed top-0 end-0 p-3">

        <button class="btn btn-light shadow"
                id="theme-toggle">

            <i class="icon-moon"></i>

        </button>

    </div>



    <main>

        @yield('content')

    </main>



</body>

</html>