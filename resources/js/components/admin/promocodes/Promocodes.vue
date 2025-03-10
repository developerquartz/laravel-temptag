<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Promocode List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item active">All Promocodes</li>
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
                <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_promocode_add'})">Add Promocode</button>
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
                    <th>Promocode</th>
                    <th>Reward</th>
                    <th>Quantity</th>
                    <!-- <th>Type</th> -->
                    <th>Expires At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="promocode in promocodes" :key="promocode.id">
                    <td>{{ promocode.id }}</td>
                    <td>{{ promocode.code }}</td>
                    <td>{{ promocode.reward }}</td>
                    <td>{{ promocode.quantity }}</td>
                    <!-- <td>
                        {{promocode.data.promocode_type}}
                    </td> -->
                    <td>{{ moment(promocode.expires_at).format("DD-MM-YYYY") }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <!-- <router-link :to="{name: 'admin_promocode_edit', params: { id: promocode.id }}" class="btn btn-primary">Edit
                            </router-link> -->
                            <button class="btn btn-danger" @click="deletePromocode(promocode.id,promocode.code)">Delete</button>
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
            promocodes: [],
            additional_information:{promocode_type:'persentage'},
            success: null,
            message: null,
            error: null,
            moment:moment
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        
        axios.get('/api/promocodes')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                console.log(response.data.data.promocodes);
                this.promocodes = response.data.data.promocodes;
                // this.promocodes.additional_information=response.data.data.promocodes.data;
                // console.log(JSON.parse(this.promocodes.data));
            }
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
        deletePromocode(id,code) {
            let existingObj = this;
            existingObj.success=null;
            existingObj.error=null;

            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.delete(`/api/promocodes/delete/${id}/${code}`)
            .then(response => {
                
                console.log(response.data);
                if(!response.data.success){
                    // this.error=response.data.message;
                    this.error='This Promocode has some permissions.please check.';this.success=null;
                }
                else{
                    let i = existingObj.promocodes.map(item => item.id).indexOf(id); // find index of your object
                    existingObj.promocodes.splice(i, 1);
                    this.success=response.data.message;this.error=null;
                }
            })
            .catch(function (error) {
                console.error(error);
            });
        }
    },
    /*filters: {
        pretty: function(value) {
          return JSON.stringify(JSON.parse(value), null, 2);
        }
    },*/
    /*beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }*/
}
</script>