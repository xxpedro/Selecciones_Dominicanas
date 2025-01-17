<?php
require_once "../../helpers/Auth.php";

$auth = new Auth('admin', '../../admin/menuAdmin.php', true);

include_once "../../candidatos/servicios/candidato.php";
include_once "../../candidatos/servicios/CandidatoServiceDataBase.php";
include_once "../../helpers/Utilities.php";

$serviceCandidato = new CandidatoServiceDatabase();
$utilities = new Utilities();

$Candidatos = $serviceCandidato->GetListPorPuesto("Presidente");

$hoy = date("Y-m-d");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votacion Presidenial</title>


    <script src="https://kit.fontawesome.com/c805912686.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/votaciones.css" type="text/css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-success">
        <div class="container-fluid pt-1 ">
          <img src="../../assets/img/logo.png" class="">


          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

              <li class="nav-item dropdown">
                <a class="nav-link text-success dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Inicio
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="../index.php">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!---->

  <div class="container">

      <h3>Elecciones Presidenciales</h3>
      <div class="row">

      <div class="col-md-5 text-center">
          <label class="image-checkbox">
              <img style="object-fit:cover;" class="img-responsive d-block" src="https://dummyimage.com/600x400/000/fff">
              <input name="image" value="" type="checkbox">
          </label>
      </div>

      <div class="col-md-5 text-center">
          <label class="image-checkbox">
              <img style="object-fit:cover;" class="img-responsive d-block" src="https://dummyimage.com/600x400/000/fff">
              <input name="image" value="" type="checkbox">
          </label>
      </div>
      <div class="col-md-5 text-center">
          <label class="image-checkbox">
              <img style="object-fit:cover;" class="img-responsive d-block" src="https://dummyimage.com/600x400/000/fff">
              <input name="image" value="" type="checkbox">
          </label>
      </div>



      </div>
  </div>

  <!--
<div class="container-votos mt-4 ">
    <?php for ($i = 0; $i < sizeof($Candidatos); $i++): ?>

        <button class="btn candidato m-2" id="<?php echo "?puesto=Presidente&partido=" . $Candidatos[$i]['Partido'] . "&voto=1&fecha=" . $hoy; ?>" >
                <div class="card " style="width: 18rem; ">
        <img src="<?php echo $utilities->getSrcImage64($Candidatos[$i]['Logo_Partido']); ?>" class="card-img-top rounded "  width="10px">
        <div class="card-body">
            <h5 class="card-title"><?php echo $Candidatos[$i]['Partido']; ?></h5>
            <img src="<?php echo $utilities->getSrcImage64($Candidatos[$i]['Foto']); ?>" class="card-img-top" alt="...">
            <p class="card-text"> <?php echo $Candidatos[$i]['Nombre'] . " " . $Candidatos[$i]['Apellido']; ?> </p>
        </div>
        </div>

        </button>

    <?php endfor;?>

    <button class="btn candidato  " id=" ?puesto=p&partido=ninguno&voto=1&fecha=<?php echo $hoy; ?>" >
                <div class="card" style="width: 18rem; ">

        <div class="card-body">
            <h5 class="card-title">Ninguno</h5>
            <img src="../../assets/img/dafaultVoto.png" class="card-img-top" alt="...">
            <p class="card-text"> Ningun candidato </p>
        </div>
        </div>

        </button>




</div>
<div class="container text-center">
<form action="../menuPrincipal.php" method="post">
<button href="#" class=" btn btn-success btn-block disabled text-center " id="voto" name='voto' >Votar</button>
</form>
</div>
    -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>// image gallery
                // init the state from the input
                $(".image-checkbox").each(function () {
                    if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                        $(this).addClass('image-checkbox-checked');
                    } else {
                        $(this).removeClass('image-checkbox-checked');
                    }
                });

                // sync the state to the input
                $(".image-checkbox").on("click", function (e) {
                    $(this).toggleClass('image-checkbox-checked');
                    var $checkbox = $(this).find('input[type="checkbox"]');
                    $checkbox.prop("checked", !$checkbox.prop("checked"))

                    e.preventDefault();
                });
                //# sourceURL=pen.js
            </script>

    <script src="../../assets/js/funcionesVista.js"></script>
</body>
</html>