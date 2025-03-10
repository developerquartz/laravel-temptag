<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">All Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      
      <!-- <div class="row align-items-md-stretch">
        <div class="col-md-6">
          <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h1>Admin Dashboard, {{user.name}}.</h1>
            <label>Login as:</label>
            <h2>{{loginType}}</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-light border rounded-3">
            <p>Role held:</p>
            <ul v-for="role in user.roles" :key="role.id">
              <li> {{ role.name }} </li>
            </ul>
          </div>
        </div>
      </div> -->


      <div class="row">
          <div class="col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Number of Customers : {{count_users}}</span>
                <span class="info-box-text">Number of New Customers : {{users_is_activeCount}}</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mb-6">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Number of Products</span>
                <span class="info-box-number">{{count_products}}</span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Payment Received</span>
                <span class="info-box-number">{{parseFloat(OrderTotalPaymentReceived).toFixed(2)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Order Received</span>
                <span class="info-box-number">{{new_orders}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>



      <!-- <div class="row">
        <div class="col-md-6">
          <p>Number of Customers: {{count_users}}</p>
          <p>Number of New Customers: {{users_is_activeCount}}</p>
        </div>
        <div class="col-md-6">
          <p>Number of Products: {{count_products}}</p>
        </div>
        <div class="col-md-6">
          <p>Total Payment Received: {{parseFloat(OrderTotalPaymentReceived).toFixed(2)}}</p>
        </div>
        <div class="col-md-6">
          <p>New Order Received: {{new_orders}}</p>
        </div>
      </div> -->
  </div>
  </section>

  </div>
</template>

<script>
export default {
  data() {
      return {
        user: '',
        loginType: '',
        count_users: 0,
        users_is_activeCount: 0,
        OrderTotalPaymentReceived: 0,
        count_products: '',
      }
    },
    mounted() {
      
    },
    created() {
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
      let error;
      axios.get(`/api/user`)
        .then(response => {
          this.user = response.data;
          this.loginType = response.data.roles[0].name;
        })
        .catch(error => {
          if (error.response.status === 401) {
            localStorage.clear();
            this.$router.push('/login');
          }
          console.error(error);
        })

        // Get all customers start
        axios.get(`/api/users/count_users`)
        .then(response => {
          this.count_users = response.data.userCount;
          this.users_is_activeCount = response.data.users_is_activeCount;
          // this.loginType = response.data.roles[0].name;
        })
        .catch(error => {
          if (error.response.status === 401) {
            localStorage.clear();
            this.$router.push('/login');
          }
          console.error(error);
        })
        // Get all customers end

        // Get all products start
        axios.get(`/api/products/count_products`)
        .then(response => {
          this.count_products = response.data;
          // this.loginType = response.data.roles[0].name;
        })
        .catch(error => {
          if (error.response.status === 401) {
            localStorage.clear();
            this.$router.push('/login');
          }
          console.error(error);
        })
        // Get all products end

        // Get all Order Total Payment Received start
        axios.get(`/api/orders/OrderTotalPaymentReceived`)
        .then(response => {
          this.OrderTotalPaymentReceived = response.data.data.orders;
          this.new_orders = response.data.data.new_orders;
          // this.loginType = response.data.roles[0].name;
        })
        .catch(error => {
          if (error.response.status === 401) {
            localStorage.clear();
            this.$router.push('/login');
          }
          console.error(error);
        })
        // Get all Order Total Payment Received end
    }
}
</script>