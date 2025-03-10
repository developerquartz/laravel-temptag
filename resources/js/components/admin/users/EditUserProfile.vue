<template>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="alert alert-success" role="alert" v-if="success !== null">
                    {{ success }}
                </div>
                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                <div class="card card-info">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        <form @submit.prevent="updateCustomer">
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="user.name" required autofocus autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="user.email" required autofocus autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control" v-model="user.password" autocomplete="off">
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" v-model="user.is_active" :checked="checked">
                                        <label class="form-check-label" for="is_active">Is Activesss</label>
                                    </div>
                                </div> 
                            </div> -->

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-info">Update Profile</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row justify-content-center">
            <div class="col-md-6"> 
                
                <div class="alert alert-success" role="alert" v-if="success !== null">
                    {{ success }}
                </div>
                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                
            </div>
        </div> -->
        
    </div>
    </section>

    <!-- /.content -->
    </div>

</template>

<script>
export default {
    name:'EditProfile',
    data() {
        return {
            user: {},
            error: null,
            success: null,
            current_LoggedIn_user:{},
            checked:null,
        }
    },
    created() {
        // console.log('created');
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/editprofile/${this.current_LoggedIn_user.id}`)
                .then(response => {
                    // console.log(response.data);
                    this.user = response.data;
                    this.user.password = response.data.plain_password;
                    // console.log("MMMM "+this.user.password);
                    if(this.user.is_active=='Y'){this.checked='checked';}
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateCustomer() {
            var is_active;
            if(this.user.is_active){is_active='Y';}else{is_active='N';}
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/update/${this.current_LoggedIn_user.id}`, {
                        name: this.user.name,
                        email: this.user.email,
                        password: this.user.password,
                        // is_active: is_active
                    })
                    .then(response => {
                        console.log(response);
                        // this.$router.push({name: 'customers'});
                        window.Laravel.user.name=this.user.name;
                        if(response.data.success){
                            this.success=response.data.message;
                            window.Laravel.user.name=this.user.name;
                            console.log("Updated: "+window.Laravel.user.name);
                            this.changeUsername(this.user.name);
                        }
                        else{
                            this.error=response.data.error;
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        },
        changeUsername($argu){
            // alert($argu);
            $('.current_username_nav').html($argu);
        }
    },
    beforeRouteEnter(to, from, next) {
        // console.log('beforeRouteEnter');
       // Change page Title
        document.title = to.meta.title ? to.meta.title : 'Jason Levey | Profile Edit';
    }
}
</script>