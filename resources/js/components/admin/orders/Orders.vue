<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Order List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item active">All Orders</li>
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
                <!-- <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_order_add'})">Add Order</button> -->
                <!-- <button class="btn btn-danger" @click="orderFileExpot()">Export Data</button> -->
                <!-- <a type="button" href="/api/orders/orders-file-export/" download="file.xlsx">
                <button class="btn btn-success" @click="orderFileExpot()">Export Data1</button></a> -->

                <a type="button"  :href="baseurl+'/api/orders/orders-file-export/'" download="file.xlsx">
                <button class="btn btn-success" @click="orderFileExpot()">Export Data</button></a>
                <!-- <a type="button"  href="https://temptag.abc.com/admin/orders/api/orders/orders-file-export/" download="file.xlsx">
                <button class="btn btn-success" @click="orderFileExpot()">Export Data</button></a> -->


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
                    <th>User Name</th>
                    <th>Order Total</th>
                    <th>Transaction ID</th>
                    <th>Order Status</th>
                    <th>Is Active</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="order in orders" :key="order.id">
                    <td>{{ order.id }}</td>
                    <td>{{ order.name }}</td>
                    <td>{{ order.order_total }}</td>
                    <td>{{ order.transaction_id }}</td>
                    <td>{{ order.transaction_status }}</td>
                    <td>{{ order.is_active=='Y'?'Yes':'No' }}</td>
                    <td>{{ moment(order.created_at).format("DD-MM-YYYY") }}
                        
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <!-- <router-link :to="{name: 'admin_order_edit', params: { id: order.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteCategory(order.id)">Delete</button> -->
                            <router-link :to="{name: 'admin_order_detail', params: { id: order.id }}" class="btn btn-primary">View Detail
                            </router-link>
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
            orders: [],
            success: null,
            message: null,
            error: null,
            moment:moment,
            baseurl:process.env.MIX_API_URL,
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        
        axios.get('/api/orders') 
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.orders = response.data.data.orders;
                // console.log(response.data.data.orders);
            }
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
        /*deleteCategory(id) {
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.delete(`/api/orders/delete/${id}`)
            .then(response => {
                
                console.log(response.data);
                if(!response.data.success){
                    // this.error=response.data.message;
                    this.error='This blog category has some permissions.please check.';this.success=null;
                }
                else{
                    let i = this.orders.map(item => item.id).indexOf(id); // find index of your object
                    this.orders.splice(i, 1);
                    this.success=response.data.message;this.error=null;
                }
            })
            .catch(function (error) {
                console.error(error);
            });
        }*/
        orderFileExpot(){

            let api_url = process.env.MIX_API_URL;
            console.log("my env variable:");
            console.log(api_url);

            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.get(`/api/orders/orders-file-export`)
            .then(response => {
                
                console.log(response.data);
                /*if(!response.data.success){
                    // this.error=response.data.message;
                    this.error='error occurs.';this.success=null;
                }
                else{
                    this.success='success';this.error=null;
                }*/
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