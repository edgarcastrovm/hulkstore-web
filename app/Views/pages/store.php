<section id="store-app" class="container">
<div class="spinner" v-if="loading" ></div>
  <h4 class="text-center">Producto disponibles</h4>

  <div  class="galery">    
    <template v-for="(item, index) in listItem"  :key="item">
    <div class="card" style="width: 18rem;">
      <img :src="getSrc(item)" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center">{{item.tipNombre}}</h5>
        <p class="card-text">{{item.proNombre}}</p>
        <div class="ctl-item">
          <button class="btn btn-primary" type="button" @click="addItemToCart(item)" title="Agregar al carrito">
            <i class="fas fa-cart-plus"></i>
            <span> ${{item.proValor}}</span>
          </button>
          <div>
            <span class="badge bg-secondary"> Disponible {{item.disponible}}</span>
          </div>
        </div>
      </div>
    </div>
    </template>
  </div>
</section>
<?= script_tag('assets/js/store.js') ?>