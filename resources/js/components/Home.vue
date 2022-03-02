<template>
<div>
<div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <h2 class="title" style="font-size: 60px; color: #ffffff">Welcome to the Starbucks Store </h2>
            </div>
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-4 product-grid"> -->
                        <!--<div class="row"> -->
                            <div class="col-md-4 product-grid" v-for="(product,index) in products" :key="index">
                                <center>
                                <router-link :to="{ path: '/products/'+product.id}">
                                    <img :src="product.image" :alt="product.name" width="100px" height="240px">
                                    <div class="overlay">
                                        <div class="detail">View Details</div>
                                    
                                    <h5><span v-html="product.name"></span></h5>
                                      <h5 class="text-center">  $ {{product.price}}</h5>
                                    </div>
                                    <button class="btn buy">Buy Now</button>
                                </router-link></center>
                            </div>
                            </div>
                        <!--</div> -->
                    <!--</div>-->
                </div>
</div>
    </template>

    <script scoped>
        export default {
            data(){
                return {
                    products : []
                }
            },
            mounted(){
                axios.get("api/products/").then(response => this.products = response.data)      
            }
        }
    </script>

    <style>
.hero-section {
        height: 30vh;
        background: #212529;
        align-items: center;
        margin-bottom: 20px;
        margin-top: 103px;
    }
    .title {
        font-size: 60px;
        color: #ffffff;
    }
    .container{
	padding-top: 50px;
}
hr{
	width: 100px;
	border: 1px solid #434444;

}

/* Product Grid */
.product-grid{
	padding-bottom: 20px;
	padding-top: 20px;
}
.product-grid:hover{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.image{
	position: relative;
}
.overlay{
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	height: 91%;
	width: 100%;
	opacity: 0;
	transition: .5s ease;
	background-color: rgba(94, 163, 128, 0.7);
}
.image:hover .overlay{
	opacity: 1;
}
.detail{
	color: #fff;
	font-size: 20px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
}

.buy{
	background-color: transparent;
	color: #434444;
	border-radius: 0;
	border: 1px solid #434444;
	width: 100%;
	margin-top: 20px;
    background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.9;
}
.buy:hover{
	background-color: #434444;
	color: #fff;
}

    </style>