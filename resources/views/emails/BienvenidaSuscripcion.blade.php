<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/regular.css" integrity="sha384-avJt9MoJH2rB4PKRsJRHZv7yiFZn8LrnXuzvmZoD3fh1aL6aM6s0BBcnCvBe6XSD"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/brands.css" integrity="sha384-7xAnn7Zm3QC1jFjVc1A6v/toepoG3JXboQYzbM0jrPzou9OFXm/fY6Z/XiIebl/k"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG"
          crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <title>Bienvenido</title>
</head>

<body>
<div class="container">
    <div class="col-md-12">
        <img class="img-fluid" src="{{ asset('images/logos/holi.png') }}"  width="1000" alt="Bienvenido a Clinitec">

        <div class="col-md-12">
            <p>
                Hola {{ $DatosSuscipcion->Nombre }} {{ $DatosSuscipcion->Apellidos }},
            </p>

            <p>
                ¡Gracias por suscribirte a Clinitec
            </p>

            <p>
                Para completar tu registro, pulsa en <a href="http://167.99.224.27:81/confirmar-cuenta/{{ $DatosUser->Token_verificacion }}">Confirmar Suscripción.</a>
            </p>

            <p>
                Si no has solocitado personalmente el registro, por favor ignora este correo.
            </p>

            <p>Para evitar que Clinitec  sea considerado como span o correo basura, porfavor incluye la dirección
                clinitec@clinitec.mx en tu agenda</p>

        </div>

        <div class="boton">
            <div class="conf">
                <button onclick="http://167.99.224.27:81/confirmar-cuenta/{{ $DatosUser->Token_verificacion }}" type="button" class="btn btn-primary hola">
                    Confirmar Suscripción
                </button>
            </div>
        </div>

    </div>

</div>
<hr>

<div class="row">
    <div class=" titulos col-sm-6 text-center">Contacto

        <div>
            <i class="fas fa-map-marker-alt cont"></i>
            Prolongación 14 Sur 12134-3. Frac. Los Heroes
        </div>

        <div>
            <i class="fas fa-phone cont"></i>
            2223652403
        </div>

        <div>
            <i class="far fa-envelope cont"></i>
            servicio_cliente@service.com
        </div>


    </div>

    <div class="titulos col-sm-6 text-center">Social Media

        <div class="fb">
            <i class="fab fa-facebook-square media"></i>
            @Marilyn Romero Urbina
        </div>

        <div class="likd">
            <i class="fab fa-linkedin-in media"></i>
            @Marilyn Romero Urbina
        </div>

        <div class="whp">
            <i class="fab fa-whatsapp media"></i>
            2223520885
        </div>


    </div>

</div>


</body>
</html>