<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Contact Froms List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item active">All Contact Froms</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- <div class="col-md-2 mb-2">
                <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_category_add'})">Add Contact Froms</button>
            </div> -->
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
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="contact_form in contactforms" :key="contact_form.id">
                    <td>{{ contact_form.id }} </td>
                    <td>{{ contact_form.first_name }} {{ contact_form.last_name }}</td>
                    <td>{{ contact_form.email }}</td>
                    <td>{{ contact_form.phone }}</td>
                    <td>{{ contact_form.message }}</td>
                    <td>{{ moment(contact_form.created_at).format("DD-MM-YYYY") }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <!-- <router-link :to="{name: 'admin_contact_forms_list', params: { id: contact_form.id }}" class="btn btn-primary">Edit
                            </router-link> -->
                            <button class="btn btn-danger" @click="deleteCategory(contact_form.id)">Delete</button>
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
            contactforms: [],
            success: null,
            message: null,
            error: null,
            moment:moment
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        
        axios.get('/api/contactforms')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.contactforms = response.data.data.contactforms;
                // console.log(response.data.data.contactforms);
            }
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
        deleteCategory(id) {
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.delete(`/api/contactforms/delete/${id}`)
            .then(response => {
                
                console.log(response.data);
                if(!response.data.success){
                    // this.error=response.data.message;
                    this.error='This category has some permissions.please check.';this.success=null;
                }
                else{
                    let i = this.contactforms.map(item => item.id).indexOf(id); // find index of your object
                    this.contactforms.splice(i, 1);
                    this.success=response.data.message;this.error=null;
                }
            })
            .catch(function (error) {
                console.error(error);
            });
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