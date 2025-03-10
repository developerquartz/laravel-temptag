//Login.vue
<template>
  <div>
    <!-- Site Banner Start -->
    <section class="site-banner inner-banner" style="background: url(assets/frontend/images/inner-banner.png);">
        <div class="container">
            <div class="banner-form">
                <h1>Login</h1> 
             </div>
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="after-heading-page">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
              <div class="card-body login-page">
                <div v-if="message" class="alert alert-success" role="alert">
                    {{message}}
                </div>
                <h4 class="card-title">Login</h4>
                <h6 class="card-subtitle mb-2 text-muted">Login to your account</h6>
                <hr>
                <div v-if="error" class="alert bg-danger text-white ">
                  {{ error }}
                </div>
                <form @submit.prevent="loginForm">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" v-model="email" class="form-control" id="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" v-model="password" class="form-control" id="password" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
                   
                  <router-link :to="{name: 'register'}"><button type="button" class="btn btn-primary register">Register</button></router-link>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
 
<script>
export default {
  data() {
      return {
        email: '',
        password: '',
        error: null,
        message: ''
      }
    },
    created() {
      if (this.$route.params.message !== undefined) {
        this.message = this.$route.params.message + ' Please login!'
      }
    },
    methods: {
      loginForm() {
        axios.post('api/login', {
            email: this.email,
            password: this.password
          })
          .then(response => {
            // console.log("response"+JSON.stringify(response.data));
            localStorage.setItem('user', JSON.stringify(response.data.user))
            localStorage.setItem('token', response.data.token)

            let loginType = response.data.user.roles[0].name
            if (loginType === 'user') {
              // this.$router.push('user');
              this.$router.push('/');
            } else if (loginType === 'admin') {
              // this.$router.push('admin')
              // this.$router.go('admin');
              // this.$router.push({ name: "home"});
              // this.$forceUpdate('admin');
              // location.reload();
              window.location.replace("admin");
            } else if (loginType === 'manager') {
              this.$router.push('manager')
            } else {
              this.$router.push('home')
            }

            this.$emit('loggedIn')

          })
          .catch(error => {
            this.error = error.response.data.error;
          });
      }
    }
}
</script>