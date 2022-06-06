Vue.createApp({
    data() {
        return {
            loading: false,
            listItem: {},

        }
    },
    mounted() {
        this.geItemCart()
    },
    methods: {
        getSrc(item) {
            return `${URL_BASE}/${item.proImage}`
        },
        async geItemCart() {
            this.loading = true
            await axios.get('/Store/getItems', {baseURL: URL_BASE})
                    .then(res => {
                        this.listItem = {}
                        if (res.data) {
                            this.listItem = res.data
                        }
                    })
                    .catch(err => {
                        this.loading = false
                    })
            this.loading = false
        },
        setNumItems(item, val) {
            this.loading = true
            axios.post('/Store/setNumItems', {product: item, val: val}, {baseURL: URL_BASE})
                    .then(res => {
                        if (typeof res.data == 'object') {
                            this.listItem = res.data
                        }else{
                            console.log("El formato no es correcto")
                        }
                        this.loading = false
                    })
                    .catch(err => {
                        console.log(err)
                        this.loading = false
                    })
        },
        clearCart() {
            axios.get('/Store/clearItems', {baseURL: URL_BASE})
                    .then(res => {
                        this.listItem = []
                        vmCart.getTotalItems()
                    })
                    .catch(err => {
                        alert("Error agregando item")
                        console.log(err)
                    })
        }

    },
}).mount('#cart-app')