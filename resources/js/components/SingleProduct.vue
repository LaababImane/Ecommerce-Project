<template>
        <div class="container">
            <div class="row" style="margin-top: 99px;">
                <div class="col-md-8 offset-md-2">
                    <img :src="product.image" :alt="product.name" width="160px">
                    <h3 class="title" v-html="product.name"></h3>
                    <p class="text-muted">{{product.description}}</p>
                    <h4>
                        <span class="small-text text-muted float-left">$ {{product.price}}</span>
                        <span class="small-text float-right">Available Quantity: {{product.units}}</span>
                    </h4>
                    <br>
                    <hr>
                    <router-link :to="{ path: '/checkout?pid='+product.id }" class="col-md-4 btn btn-lg btn-success float-right">Buy Now</router-link>
                </div>
            </div>
        </div>
    </template>

    <script>
    export default {
        data(){
            return {
                product : []
            }
        },
        beforeMount(){
            let url = `/api/products/${this.$route.params.id}`
            axios.get(url).then(response => this.product = response.data)      
        }
    }
    </script>

    <style scoped>
    .small-text { font-size: 18px; }
    .title { font-size: 36px; }
    </style>