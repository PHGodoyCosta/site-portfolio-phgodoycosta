@extends('layouts.app')

@section('title', '404 - Página não encontrada')

@section('content')
        <h1 class="text-center fw-bold mb-2" style="font-size: 4em">404</h1>
        <h2 class="text-center">Página não encontrada</h2>
        <p class="text-center fs-5 mt-3">Você será redirecionado em: <span id="conter" style="color: red">10</span></p>
@endsection

@section('scripts')
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
@endsection
