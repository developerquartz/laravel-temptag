<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>User List</h1>
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
          <div class="row">
            <div class="col-md-2 mb-2">
                <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_user_add'})">Add User</button>
            </div>
            <div class="col-md-12">
                <div class="alert alert-success" role="alert" v-if="success !== null">
                    {{ success }}
                </div>
                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Is Active</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.is_active=='Y'?'Yes':'No' }}</td>
                    <td>{{ moment(user.created_at).format("DD-MM-YYYY") }}
                        
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'adminuseredit', params: { id: user.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteUser(user.id)">Delete</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        </section>

        <!-- /.content -->
    </div>

</template>

<script>
    import moment from 'moment'
export default {
    data() {
        return {
            users: [],
            success: null,
            message: null,
            error: null,
            moment:moment
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        
        axios.get('/api/users')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.users = response.data;
            }
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
        deleteUser(id) {
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            // this.$axios.get('/sanctum/csrf-cookie').then(response => {
            axios.delete(`/api/users/delete/${id}`)
                .then(response => {
                    
                    console.log(response.data);
                    if(!response.data.success){
                        // this.error=response.data.message;
                        this.error='This User has some permissions.please check.';this.success=null;
                    }
                    else{
                        let i = this.users.map(item => item.id).indexOf(id); // find index of your object
                        this.users.splice(i, 1);
                        this.success=response.data.message;this.error=null;
                    }
                })
                .catch(function (error) {
                    console.error(error);
                });
            // })
        }
    },
    /*beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }*/
}
</script>