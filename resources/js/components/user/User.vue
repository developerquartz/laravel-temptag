<template>
  <div>
    <!-- Site Banner Start -->
    <!-- <section class="site-banner inner-banner" v-bind:style="{ 'backgroundImage': 'url(' + '/storage/uploads/pages/'+ page.page_title_background_image + ')' }"> -->
    <section class="site-banner inner-banner" style="background: url(assets/frontend/images/inner-banner.png);">
        <div class="container">
            <div class="banner-form">
                <h1>User Dashboard</h1> 
             </div>
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="after-heading-page">
      <div class="container">
        
        <!-- <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
              <h1>User Dashboard, {{user.name}}.</h1>
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
              <h1>Hi, {{user.name}}</h1>
              <!-- <label>Login as:{{loginType}}</label> -->
              <p>Name: {{user.name}}</p>
              <p>Email: {{user.email}}</p>
              <p>Phone Number: {{user.phone_number}}</p>
              <p>NJVMC ID: {{user.njvmc_id}}</p>
              <p>Dealership Name: {{user.dealership_name}}</p>
              <p>Street Address: {{user.street_address_1}}</p>
              <p>Zip: {{user.zip}}</p>
              <p>City: {{user.city}}</p>
              <p>State: {{user.state}}</p>
              <p>Country: {{user.country}}</p>
              <p>Fax: {{user.fax}}</p>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
</template>

<!-- <template>
  <div>
    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h1>User Dashboard, {{user.name}}.</h1>
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
    </div>
  </div>
</template> -->

<script>
  // import FaqComponent from './frontend/Faq.vue',
export default {
  data() {
      return {
        user: '',
        loginType: ''
      }
    },
    created() {
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')

      axios.get(`/api/user`)
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
        })
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