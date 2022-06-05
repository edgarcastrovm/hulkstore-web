<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <?= link_tag('assets/fontawesome/css/all.css') ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <?= link_tag('assets/css/style.css') ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/vue@3"></script>
  <script>
    axios.defaults.baseURL = '<?=base_url()?>'
  </script>
</head>
<body>
  <header>
    <nav class="section">
      <div class="top_navbar row">
        <div class="col col-3">
          <a href="#"> 
            <img src="<?= base_url()?>" alt="" srcset="">
          </a>
        </div>
        <di class="col col-6" >
          <ul class="nav-menu">
            <li><a href="#"></a>Inicio</li>
            <li><a href="#"></a>Acerca de</li>
            <li><a href="#"></a> Tienda</li>
          </ul>
        </di>
        <div class="nav-btn col col-3">
          <a class="link" href="#">Salir <i class="fas fa-sign-out-alt"></i> </a>
        </div>
      </div>
    </nav>
  </header>