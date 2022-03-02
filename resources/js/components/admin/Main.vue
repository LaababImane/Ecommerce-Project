
<template>
           

<section id="section-linemove-4" class="content-current"  style="padding-top: 0px;">

<div class="container">
            <div class="row">
               <div class="shadow p-4 mb-4 bg-white" style="background-color: white;float: right;width: 562px;height: 145px;border-radius: 18px;">
       <div class="row" style="padding-left: 55px">
    <div class="shadow col-sm-3" style="background-image:linear-gradient(to right, #cc3300 1%, #ff0066 103%);border-radius: 27px; margin-right: 2%">
      <img src="/images/box1.png" style="width: 40px; height: 40px; padding-left: 5px; padding-top: 10px;">      
      <p class="card-title text-uppercase text-muted mb-0"><font color="white" size="4px">Orders</font><br>
      <center><font color="white" size="2px">{{orders.length}}</font></center></p>
    </div>
    <div class="shadow col-sm-4" style="background-image:linear-gradient(to right, #ff9933 0%, #ffcc66 100%);border-radius: 27px; margin-right: 2%">
      <img src="/images/group.png" style="width: 40px; height: 40px; padding-left: 5px; padding-top: 10px;">        
      <p class="card-title text-uppercase text-muted mb-0"><font color="white" size="4px">Users</font><br>
      <center><font color="white" size="2px">{{users.length}}</font></center></p>
    </div>
    <div class="shadow col-sm-3" style="background-image:linear-gradient(to right, #006600 1%, #00cc00 103%);border-radius: 27px;">
      <img src="/images/stand.png" style="width: 40px; height: 40px; padding-left: 5px; padding-top: 10px;">        
      <p class="card-title text-uppercase text-muted mb-0"><font color="white" size="4px">Products</font><br>
      <center><font color="white" size="2px">{{products.length}}</font></center></p>
    </div>
  </div>

               </div>
            </div>
  

            <div class="row">
               <div class="shadow p-4 mb-4 bg-white" style="background-color: white;float: right;width: 562px;height: 474px;border-radius: 18px;">
                  <b> Performance indicators</b>
                  <br>
                  <div class="row">
                     <!--<div class="shadow" id="chart" style="background-color: #f9f9f9;border-radius: 10px;left: 28px;top: 20px;width: 485px; height: 387px; margin-left: 3px;">-->
                        <apexchart type="line" width="510" height="350" :options="chartOptions" :series="series"></apexchart>
                     <!--</div>-->
                  </div>
               </div>
            </div>


  
  <br>
               
            <div class="row">
               <div class="shadow p-4 mb-4 bg-white" style="background-color: white;float: right;width: 562px;height: 196px;border-radius: 18px;">
                  <b> Performance indicators</b>
                  <br>
                  <div class="row">
                     <div class="col-sm-3 shadow" style="background-color: #f9f9f9;border-radius: 10px;left: 28px;top: 20px;">
                        <div class="row">
                           <div class="col" style="top: 10px;">
                              <img src="https://www.flaticon.es/premium-icon/icons/svg/1580/1580238.svg" class="imgmetrics" style="top: 5px; left: 5px;">
                           </div>
                           <div class="col" style="top: 10px; font-size: 8px;"><b>Sales Cnv Rate </b>
                              <br>
                              <span class="glyphicon glyphicon-arrow-up" style="color: green;"></span> <b><font font-size="7" color="green">20%</font></b>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col" style="top: -10px; font-size: 12px;"><b>{{((orders.length/users.length)*100).toFixed(2)}}%</b></div>
                        </div>
                     </div>
                     <div class="col-sm-3 shadow" style="background-color: #f9f9f9;border-radius: 10px;left: 60px;top: 20px;">
                        <div class="row">
                           <div class="col" style="top: 10px;">
                              <img src="/images/average.png" class="imgmetrics" style="top: 5px; left: 5px;">
                           </div>
                           <div class="col" style="top: 10px; font-size: 8px;"><b> Average Order Value&nbsp; &nbsp; &nbsp; </b>
                              <span class="glyphicon glyphicon-arrow-up" style="color: red;"></span> <b><font font-size="7" color="red"> 0%</font></b>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col" style="top: -10px; font-size: 12px;"><b>{{((GrossSales.reduce(function(a,b){ return a+b}, 0))/orders.length).toFixed(2)}} DH</b></div>
                        </div>
                     </div>
                     <div class="col-sm-3 shadow" style="background-color: #f9f9f9;border-radius: 10px;left: 93px;top: 20px;">
                        <div class="row">
                           <div class="col" style="top: 10px;">
                              <img src="/images/rating.png" class="imgmetrics" style="top: 5px; left: 5px;">
                           </div>
                           <div class="col" style="top: 10px; font-size: 8px;"><b>% Active Customers </b>
                              <span class="glyphicon glyphicon-arrow-down" style="color: green;"></span> <b><font font-size="7" color="green">0 %</font></b>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col" style="top: -10px; font-size: 13px;"><b> {{((user_ids.length/users.length)*100).toFixed(2)}}%</b></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>




  </div>

</section>

    </template>

    <script>
    export default {
        data() {
            return {
                user : null,
                orders : [],
                products : [],
                users : [],
                user_ids: [],
                GrossSales: [],
                series: [],
                chartOptions: { chart: { height: 350, type: 'line', }, stroke: { width: [0, 4] }, title: { text: '' }, dataLabels: { enabled: true, enabledOnSeries: [1] }, labels: ['31 Jan', '28 Feb', '31 Mar', '30 Apr', '31 May', '30 Jun', '31 Jul', '31 Aug', '30 Sept', '31 Oct', '30 Nov', '31 Dec'], xaxis: { type: 'datetime' }, yaxis: [{ title: { text: '# of Customers', }, }, { opposite: true, title: { text: '# of Orders' } }] }
            }
        }, 
        mounted() {
            axios.get('/api/users/').then(response => this.users = response.data)
            axios.get('/api/products/').then(response => this.products = response.data)
            axios.get('/api/orders/').then(response => this.orders = response.data)
            axios.get('/api/orders/').then(response => {
               var user_ids = [] 
               this.ordersx = response.data
               var ordersx = this.ordersx
               var users = this.users
               for (let i=0; i<= ordersx.length-1; i++){
                  if (user_ids.includes(ordersx[i]["user_id"])){
                     console.log("Already Added")
                  } else {
                     user_ids.push(ordersx[i]["user_id"])
                  }
               }

               this.user_ids = user_ids

               this.GrossSales = []

               for(let i=0; i<=ordersx.length-1; i++){
                  this.GrossSales.push(ordersx[i]["quantity"]*ordersx[i]["product"]["price"])
               }

               this.series = [{ name: 'Customers', type: 'column', data: [] }, { name: 'Orders', type: 'line', data: [] }]
               var months = {1: 'Jan', 2: 'Feb', 3: 'Mar', 4: 'Apr', 5: 'May', 6: 'Jun', 7: 'Jul', 8: 'Aug', 9: 'Sep', 10: 'Oct', 11: 'Nov', 12: 'Dec'}
               var _months = {'01': 'Jan', '02': 'Feb', '03': 'Mar', '04': 'Apr', '05': 'May', '06': 'Jun', '07': 'Jul', '08': 'Aug', '09': 'Sep', '10': 'Oct', '11': 'Nov', '12': 'Dec'}
               var current_month = Date().split(" ")[1]
               for (var i = 0; i <= Object.keys(months).length-1; i++) {
                  console.log(current_month)
                  if (Object.values(months).indexOf(current_month)+1 >= i+1) {
                     this.series[0]["data"].push(users.length)
                  } else {
                     this.series[0]["data"].push(0)
                  }
               }

               var orders_count = {1: 0, 2: 0, 3: 0, 4: 0, 5: 0, 6: 0, 7: 0, 8: 0, 9: 0, 10: 0, 11: 0, 12: 0}
               current_month = Date().split(" ")[1]
               for (var i = 0; i <= Object.keys(months).length-1; i++) {
                  for (var j = 0; j <= ordersx.length-1; j++) {
                     var order_date = new Date(ordersx[j]["created_at"]).toDateString()
                     if (Object.values(months).indexOf(current_month)+1 >= Object.values(months).indexOf(order_date.split(" ")[1])+1){
                        var cmp_date = new Date(Date().split(" ")[3]+"-"+Object.keys(_months).sort()[i]+"-30T00:00:00.000000Z")
                        console.log(Object.values(months).indexOf(cmp_date.toDateString().split(" ")[1])+1)
                        console.log(Object.values(months).indexOf(current_month)+1)
                        //console.log(cmp_date.toDateString())
                        if((new Date(ordersx[j]["created_at"]) < cmp_date) && (Object.values(months).indexOf(cmp_date.toDateString().split(" ")[1]) <= Object.values(months).indexOf(current_month)+1)){
                           //console.log(1)
                           console.log("-----------------------------")
                           orders_count[i] = orders_count[i]+1
                           console.log(orders_count)

                     }
                  }
                  }

               }

               for (var i = 0; i <= Object.keys(orders_count).length-1; i++) {
                  this.series[1]["data"].push(Object.values(orders_count)[i])
               } 

               })

        }


    }
    </script>

    


    <style scoped>
    .big-text { font-size: 28px; color: #fff; }
    .product-box { 
      border: 0.5px solid #cccccc;
      border-radius: 18px;
     padding: 10px 15px; 
     height: 20vh;
     width: 350px;
     text-align: center;
     
     }

    img.imgmetrics {
    width: 30px;
    height: 30px;
    padding-left: 5px;
    padding-top: 10px;
    }
    a{
        color: #fff;
        text-decoration: none;
    }
    
    @media (max-width : 991px){
       .product-box { 
           left: 20%;
       }
    }
    </style>