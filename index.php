<?php
$home='home';
session_start();

require 'config/database.php';

//Obtension de datos para mostrar las imagenes, nombre y descripcion
$sqlCatalogo = "SELECT p.id, p.nombre, p.descripcion FROM catalogo AS p";
$catalogo = $conn->query($sqlCatalogo);

$dir = "posters/";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PLANTILLA 3</title>

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="container" data-bs-target="#navbar" data-bs-spy="scroll">

  <!--comienzo del banner-->
  <div class="hero" id="hero">
  </div>
  <div class="seccion" id="wrapper">
    <div class="wrapper" id="">
      <header style="height:570px;">
        <div class="banner row" id="banner">
          <div class="parallax text-center" style="background-image: url(img/1.jpg);">
            <div class="parallax-pattern-overlay">
              <div class="container text-center" style="height:600px; padding-top:170px;">
                <a href="#"><img id="site-title" class=" wow fadeInDown" wow-data-delay="0.0s" wow-data-duration="0.9s"
                    src="img/2.png" alt="" /></a>
                <h2 class="intro"><a href="<?php $home?>">Carsa Industria y Comercio</a></h2>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
  </div>
  <!--fin del banner-->

  <!--comienzo del menu-->
  <nav id="menu">
    <a href="#wrapper">Inicio</a>
    <a href="#aboutus">Sobre Nosotros</a>
    <a href="#gallery">Productos</a>
    <a href="#contact">Contactos</a>
    <span class="indicador" id="indicador"></span>
  </nav>
  <!--fin del menu-->

  <!--seccion informacion-->
  <div class="seccion" id="aboutus">
    <section class="aboutus" id="">
      <div class="container">
        <div class="heading text-center">
          <h2>Sobre Nosotros</h2>
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis dolor sit amet lacus ultricies
            rutrum. Curabitur vitae fringilla elit. Sed at nunc congue, cursus erat ac, pellentesque eros. Etiam
            ullamcorper sed lectus sit amet mattis. Morbi justo sem, cursus nec convallis a, pellentesque eu mi. Morbi
            hendrerit ultricies ligula </h3>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="papers text-center">
              <img src="img/team/1.jpg" alt=""><br />
              <a href="#"></a>
              <h4 class="">My Teacher John Vandeley</h4>
              <p>
                Have you ever felt worried that your party will not raise up to your guest expectations? In design,
                vertical rhythm is the structure that guides a reader's eye through the content. Good vertical rhythm
                makes a layout more balanced and beautiful and its
                content more readable. The time signature in sheet music visually depicts a song's rhythm, while for
                us, the lines of the baseline grid depict the rhythm of our content and give us guidelines.
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="papers text-center">
              <img src="img/team/2.jpg" alt=""><br />
              <a href="#"></a>
              <h4 class="">My Teacher Stephanie Hellen</h4>
              <p>
                Have you ever felt worried that your party will not raise up to your guest expectations? In design,
                vertical rhythm is the structure that guides a reader's eye through the content. Good vertical rhythm
                makes a layout more balanced and beautiful and its
                content more readable. The time signature in sheet music visually depicts a song's rhythm, while for
                us, the lines of the baseline grid depict the rhythm of our content and give us guidelines.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--fin seccion informacion-->

  <!--seccion productos-->
  <div class="seccion" id="gallery">
    <section class="gallery" id="">
      <div class="container">
        <div class="heading text-center">
          <h2>Productos</h2>
          <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis dolor sit amet lacus ultricies
            rutrum. Curabitur vitae fringilla elit. Sed at nunc congue, cursus erat ac, pellentesque eros. Etiam
            ullamcorper sed lectus sit amet mattis.</h3>
        </div>
        <!--comienzo imagenes del doom-->
        <div id="grid-gallery" class="grid-gallery">
          <section class="grid-wrap">
            <ul class="grid">
              <li class="grid-sizer"></li>
              <!--añadiendo tipos extensiones permitidas-->
              <?php while ($row = $catalogo->fetch_assoc()) {
                if (is_dir($dir)) {
                  if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                      if ($file == $row['id'] . '.jpg') {
                        $retorna_ext = pathinfo($file, PATHINFO_EXTENSION);

                      } elseif ($file == $row['id'] . '.png') {
                        $retorna_ext = pathinfo($file, PATHINFO_EXTENSION);
                      }
                    }
                    closedir($dh);
                  }
                }
                ?>

                <!--añadiendo datos de la consulta-->
                <li>
                  <figure>
                    <img src="<?= $dir . $row['id'] . '.' . $retorna_ext . '?n=' . time(); ?>" height="300"></td>
                    <figcaption>
                      <h3>
                        <?php echo $row['nombre'] ?>
                      </h3>
                      <p>
                        <?php echo $row['descripcion'] ?>
                      </p>
                    </figcaption>
                  </figure>
                </li>
                <?php
              }
              ?>
              <!--fin del bucle while-->

            </ul>
          </section>
          <!--fin imagenes del doom-->

          <!--seccion imagenes modal-->
          <section class="slideshow">
            <ul>
              <!--añadiendo tipos extensiones permitidas-->
              <?php
              $catalogo = $conn->query($sqlCatalogo);
              while ($row = $catalogo->fetch_assoc()) {
                if (is_dir($dir)) {
                  if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                      if ($file == $row['id'] . '.jpg') {
                        $retorna_ext = pathinfo($file, PATHINFO_EXTENSION);
                      } elseif ($file == $row['id'] . '.png') {
                        $retorna_ext = pathinfo($file, PATHINFO_EXTENSION);
                      }
                    }
                    closedir($dh);
                  }
                }
                ?>

                <!--añadiendo imagenes de la consulta-->
                <li>
                  <figure>
                    <img src="<?= $dir . $row['id'] . '.' . $retorna_ext . '?n=' . time(); ?>"></td>
                  </figure>
                </li>
                <?php
              }
              ?>
            </ul>

            <nav>
              <span class="icon nav-prev"></span>
              <span class="icon nav-next"></span>
              <span class="icon nav-close"></span>
            </nav>
            <div class="info-keys icon">Llaves de navegacion</div>
          </section>
          <!-- final seccion imagenes modal -->

        </div>
      </div>
    </section>
  </div>
  <!--fin seccion productos-->

  <!--inicio seccion contactos-->
  <div class="seccion" id="contact">
    <section class="contact" id="">
      <div class="container">
        <div class="heading">
          <h2>Contacto</h2>
          <h3><br>
            Cras dictum tellus dui, vitae sollicitudin ipsum tincidunt in. Sed tincidunt tristique enim sed
            sollcitudin.</h3>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="map">
              <img src="img/logo-carsa.jpg" width="800px" height="400px">
            </div>
          </div>
          <div class="contact-info">
            <div class="">
              <h4>Contactos</h4>
              <h5>Nullam elementum tellus pretium feugiat</h5>
              <p>Fusce fermen tum neque a rutrum varius odio pede ullamcorp-er tellus ut dignissim nisi risus non
                tortor</p>
              <ul>
                <li><i class="fa fa-home fa-2x"></i> Direccion: 7887 el Alto</li>
                <li><i class="fa fa-phone fa-2x"></i> +591 123456780</li>
                <li><i class="fa fa-envelope fa-2x"></i> carsa@gmail.com</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="mx-auto px-5">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4"
                  data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="correo electronico"
                  data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto"
                  data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required"
                  data-msg="Please write something for us" placeholder="Mensaje"></textarea>
                <div class="validation"></div>
              </div>

              <div class="text-center"><button type="submit" class="contact submit">Enviar</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--fin seccion contactos-->

  <!--footer-->
  <section class="footer" id="footer">
    <p class="text-center">
      <a href="#wrapper" class="gototop"><i class="fa fa-angle-double-up fa-2x"></i></a>
    </p>
    <div class="container">
      <ul>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
      </ul>
      <p>&copy; footer</p>
    </div>
  </section>

  <!-- Bootstrap js -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <!--script para el navbar-->
  <script src="assets/js/app.js"></script>

  <!-- scripts anteriores a la modificacion -->
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/masonry.js"></script>
  <script src="assets/js/imgloaded.js"></script>
  <script src="assets/js/classie.js"></script>
  <script src="assets/js/gridscroll.js"></script>

</body>

</html>