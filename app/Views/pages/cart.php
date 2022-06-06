<section id="cart-app" class="container-fluid">
    <div class="spinner" v-if="loading" ></div>
    <div class="row">
        <div class="col col-4">
            <button class="btn btn-primary" type="button" @click="clearCart()" >Limpiar carrito
            </button>
            <br>
            <ol class="list-group list-group-numbered">
                <template v-for="(item, index) in listItem"  :key="index">
                    <li class="list-group-item d-flex justify-content-between align-items-start">


                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <img :src="getSrc(item)" height="64">
                                # {{item.itvUnidad}} 
                                <button class="btn btn-sm btn-primary" type="button" @click="setNumItems(item,1)" > 
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button class="btn btn-sm btn-primary" type="button" @click="setNumItems(item,-1)" >
                                    <i class="fas fa-minus"></i>
                                </button>
                                - ${{item.itvValorUnidad}}
                            </div>
                            {{item.proNombre}}
                        </div>
                        <span class="badge bg-danger rounded-pill">total : ${{item.itvValorTotal}}</span>            
                    </li>
                </template>
            </ol>
        </div>
        <div class="col col-8"></div>
    </div>

</section>
<?= script_tag('assets/js/cart.js') ?>