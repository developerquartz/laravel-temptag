<template>
  <div>
    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h1>Manager Dashboard, {{user.name}}.</h1>
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
</template>

<script>
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