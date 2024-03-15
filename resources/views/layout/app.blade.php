<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        @component('component_navbar', ["current" => $current])
            @endcomponent

        <main role="main">
                       
            @hasSection('body')
                @yield('body')                
            @endif
            
        </main>
    </div>
    <script type="text/javascript" src="/js/scripts.js"></script>
</body>
</html>