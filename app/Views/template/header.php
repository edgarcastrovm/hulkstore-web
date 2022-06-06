<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= base_url('/assets/img/icons/logo-hulk-store.ico')?>">
  <title><?= $title ?></title>
  <?= link_tag('assets/fontawesome/css/all.css') ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <?= link_tag('assets/css/style.css') ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://unpkg.com/vue@3"></script>
  <script>
    URL_BASE = '<?=base_url()?>'
    axios.defaults.baseURL = 'http://localhost:5000'
  </script>
</head>
<body>
  <header>
    <nav class="section">
      <div class="top_navbar row">
        <div class="logo col col-3">
          <a href="<?= base_url()?>"> 
            <img src="<?= base_url('/assets/img/icons/logo-hulk-store.png')?>" alt="" height="64px" srcset=""/>
          </a>
          <span><b> Hulk Store</b></span>
        </div>
        <di class="col col-6" >
          <ul class="nav-menu">
            <li><a href="<?= base_url()?>">Inicio</a></li>
            <li><a href="<?= base_url('/about')?>">Acerca de</a></li>
            <li><a href="<?= base_url('/store')?>">Tienda</a></li>
          </ul>
        </di>
        <div class="nav-btn col col-3">
          <div id="app-iconcart">
            <a href="<?= base_url('/cart')?>" class="btn btn-danger">
              <i class="fas fa-cart-shopping"></i>
              <b> Ver carrito </b>
              <span class="badge bg-dark"> {{totalItems}} </span>
            </a>
          </div>
          
          <a class="link <?= session()->has('client')? '': 'hidden' ?>" href="#">
          Salir 
          <i class="fas fa-sign-out-alt"></i></a>
        </div>
      </div>
    </nav>
    <script >
      const cartApp = Vue.createApp({
        data () {
          return {
            listItem:[],
            totalItems:0
          }
        },
        mounted(){
          this.getTotalItems()
          setInterval(this.getTotalItems, 20000);
        },
        methods : {
          getTotalItems(){
            axios.get('/Store/getItems', {baseURL: URL_BASE })
              .then(res => {
                if(res.data){
                  this.listItem = res.data
                  this.totalItems = res.data.length
                }
              }).catch(err => {
                console.log(err)
              })
          },
        }
      })
      const vmCart = cartApp.mount("#app-iconcart")
      //vmCart.getTotalItems()
    </script>
  </header>
  <section class="container-fluid">