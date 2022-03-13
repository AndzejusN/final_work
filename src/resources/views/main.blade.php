<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <title></title>
</head>
<body>
<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center pt-3">
            <img class="logo" src="storage/img/logo/logo_universal_2.png" alt="SAND LOGO"/>
        </div>
        @yield('content')
        <div class="row d-flex justify-content-evenly">
            <div class="row align-items-center">
                <div class="col-2">
                    <div class="p-2 border">
                        <p>Copyright ©2022</p>
                        <p>MB SAND</p>
                        <p>Visos teisės saugomos</p>
                    </div>
                </div>
                <div class="col-8">
                    <div class="p-2 border text-center">
                        <p>Kontaktinis tel. +370 609 54 003 </p>
                        <p>El. paštas: andzejus.naimovicius@gmail.com</p>
                        <p>Informuojame, kad sistemos sklandžiam darbui užtikrinti naudojami slapukai
                            (angl. cookies)</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="p-2 border">
                        <span>Powered by:</span>
                        <span><img src="storage/img/logo/laravel_9_banner_small.png" alt="no image"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
