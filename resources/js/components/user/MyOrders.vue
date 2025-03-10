<template>
  <div>
    <!-- Site Banner Start -->
    <!-- <section class="site-banner inner-banner" v-bind:style="{ 'backgroundImage': 'url(' + '/storage/uploads/pages/'+ page.page_title_background_image + ')' }"> -->
    <section class="site-banner inner-banner" style="background: url(../assets/frontend/images/inner-banner.png);">
        <div class="container">
            <div class="banner-form">
                <h1>Your Orders</h1> 
             </div>
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="after-heading-page">
      <div class="container">
        <div class="row align-items-md-stretch">
          <div class="col-md-3">
            
            <div class="user-dashboard-sider">
              <ul class="list-group">
                <li class="list-group-item"><h3>Dashboard</h3></li>
                <li class="list-group-item">
                  <router-link :to="{name: 'user'}"  v-bind:class = "($route.name=='user')?'active':''">Your Account</router-link>
                </li>
                <li class="list-group-item">
                  <router-link :to="{name: 'myorders'}"  v-bind:class = "($route.name=='myorders')?'active':''">Your Orders</router-link>
                </li>
              </ul>
              <!-- abc-coponent -->
            </div>

          </div>
          <div class="col-md-9">
            <div class="h-100 p-5 bg-light border rounded-3">
              <h2>Order List</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(order, index) in orders" :key="order.id">
                    <td scope="row">{{index+1}}</td>
                    <td>{{ order.product_name }}</td>
                    <td>{{ order.name }}</td>
                    <td>{{ order.email }}</td>
                    <td>{{ order.transaction_id }}</td>
                    <td>{{ order.order_status }}</td>
                    <td>{{ order.order_total }}</td>
                    <td>{{ moment(order.created_at).format("DD-MM-YYYY HH:mm:ss") }}</td>
                  </tr>
                </tbody>
              </table> 

            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
</template>

<script>
  // import FaqComponent from './frontend/Faq.vue',
  import moment from 'moment'
export default {
  data() {
      return {
        user: '',
        loginType: '',
        orders: [],
        message: 'ccc',
        moment: moment,
        cartItems_count: 0, 
      }
    },
    created() {
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')

      /*axios.get(`/api/user`)
        .then(response => {
          this.user = response.data
          this.loginType = response.data.roles[0].name
        })
        .catch(error => {
          if (error.response.status === 401) {
            localStorage.clear();
            this.$router.push('/login')
          }
          console.error(error);
        })*/

      // get my oredrs
      axios.get('/api/orders/myorders')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
                this.message = "bbbbbssss";
            }else{
                this.orders = response.data.data.orders;
                this.message = "bbbbb";
                // console.log(response.data.data.orders);
            }
        })
        .catch(function (error) {
            console.error(error);
            this.message = "bbbbbxxcc";
        });
    }
}
</script>

<style type="text/css">
  .align-items-center {
    -ms-flex-align: center!important;
    align-items: center!important;
    display: flex;
    justify-content: center;
}
</style>