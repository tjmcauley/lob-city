<html>
    <head>
        <Title>Lob City - yield@('title')</Title>
    </head>

    @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <body>
        <h1>Lob City</h1>
        <div>
            @yield('content')
        </div>
    </body>
</html>