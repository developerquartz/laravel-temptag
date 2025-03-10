<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Order Detail</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'admin_orders_list'}">All Orders</router-link></li>
                <li class="breadcrumb-item active">Order Detail</li>
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
                <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_order_add'})">Add Order</button>
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
                    <th>User Name</th>
                    <th>Order Total</th>
                    <th>Order Status</th>
                    <th>Is Active</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Price Total</th>
                    <th>Created At</th>
                    <!-- <th>Actions</th> -->
                </tr>
                </thead>
                <tbody>
                <tr v-for="orderitem in orderitems" :key="orderitem.id">
                    <td>{{ orderitem.id }}</td>
                    <td>{{ orderitem.name }}</td>
                    <td>{{ orderitem.order_total }}</td>
                    <td>{{ orderitem.transaction_status }}</td>
                    <td>{{ orderitem.is_active=='Y'?'Yes':'No' }}</td>
                    <td>{{ orderitem.product_price }}</td>
                    <td>{{ orderitem.product_quantity }}</td>
                    <td>{{ orderitem.product_price_total }}</td>
                    <td>{{ moment(orderitem.created_at).format("DD-MM-YYYY") }}</td>
                    <!-- <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'admin_order_edit', params: { id: orderitem.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteCategory(orderitem.id)">Delete</button>
                        </div>
                    </td> -->
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
            orderitems: {},
            success: null,
            message: null,
            error: null,
            moment:moment
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        
        
        axios.get(`/api/orders/orderdetail/${this.$route.params.id}`)
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.orderitems = response.data.data.orderitems;
                // console.log(response.data.data.orderitems);
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
            axios.delete(`/api/orderitems/delete/${id}`)
            .then(response => {
                
                console.log(response.data);
                if(!response.data.success){
                    // this.error=response.data.message;
                    this.error='This blog category has some permissions.please check.';this.success=null;
                }
                else{
                    let i = this.orderitems.map(item => item.id).indexOf(id); // find index of your object
                    this.orderitems.splice(i, 1);
                    this.success=response.data.message;this.error=null;
                }
            })
            .catch(function (error) {
                console.error(error);
            });
        }*/
    },
    /*beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }*/
}
</script>