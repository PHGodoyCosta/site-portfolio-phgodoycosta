<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>404 - Página não encontrada</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Headers -->
        @php
            require __DIR__ . "/../../../resources/Components/head.blade.php";
        @endphp

        @vite('resources/css/app.css')
        @vite('resources/css/home.css')

    </head>
    <body>
        @php
            require __DIR__ . "/../../../resources/Components/header.blade.php";
        @endphp
        <h1 class="text-center fw-bold mb-2" style="font-size: 4em">404</h1>
        <h2 class="text-center">Página não encontrada</h2>
        <p class="text-center fs-5 mt-3">Você será redirecionado em: <span id="conter" style="color: red">10</span></p>
    </body>
    <script>
        window.addEventListener("load", e => {
            const conter = document.getElementById("conter")
            let numConter = 10;

            setInterval(() => {
                conter.innerHTML = numConter
                numConter -= 1

                if (numConter == 0) {
                    window.location.href = "/"
                }
            }, 1000)
        })
    </script>
</html>
