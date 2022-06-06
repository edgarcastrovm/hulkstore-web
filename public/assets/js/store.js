Vue.createApp({
    data() {
        return {
            loading: false,
            listItem: [],

        }
    },
    mounted() {
        this.getProducts()
    },
    methods: {
        async getProducts() {
            this.loading = true
            await axios.get(`/api/ver_stock`)
                    .then(res => {
                        if (res.data) {
                            this.listItem = res.data
                        }
                    }).catch(err => {
                console.log(err)
                this.loading = false
            })
            this.loading = false
        },
        getSrc(item) {
            return `${URL_BASE}/${item.proImage}`
        },
        async addItemToCart(item) {
            this.loading = true
            await axios.post('/Store/addItem', item, {baseURL: URL_BASE})
                    .then(res => {
                        if (res.data) {
                            this.loading = false
                        }
                    })
                    .catch(err => {
                        alert("Error agregando item")
                        console.log(err)
                        this.loading = false
                    })
            vmCart.getTotalItems()
        },
    },
}).mount('#store-app')