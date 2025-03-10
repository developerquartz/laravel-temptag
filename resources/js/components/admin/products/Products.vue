<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Product List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item active">All Product</li>
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
                <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_product_add'})">Add Product</button>
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
                    <th>Category</th>
                    <th>Name</th>
                    <!-- <th>Price</th> -->
                    <th>Image</th>
                    <th>Is Active</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="product in products" :key="product.id">
                    <td>{{ product.id }}</td>
                    <td>{{ product.category_name }}</td>
                    <td>{{ product.product_name }}</td>
                    <!-- <td>{{ product.product_price }}</td> -->
                    <td>
                        <img v-if="product.product_feature_image!='' && product.product_feature_image!='NULL'" :src="'../storage/uploads/products/'+product.product_feature_image" width="200px">
                        <img v-else :src="'../assets/admin/images/no-image-available_1.png'" width="200px">
                    </td>
                    <td>{{ product.is_active=='Y'?'Yes':'No' }}</td>
                    <td>{{ moment(product.created_at).format("DD-MM-YYYY") }}
                        
                    </td> 
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'admin_product_edit', params: { id: product.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
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
            products: [],
            success: null,
            message: null,
            error: null,
            moment:moment
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        
        axios.get('/api/products')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.products = response.data.data.products;
                // console.log(response.data.data.products);
            }
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
        deleteProduct(id) {
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.delete(`/api/products/delete/${id}`)
            .then(response => {
                
                console.log(response.data);
                if(!response.data.success){
                    // this.error=response.data.message;
                    this.error='This product has some permissions.please check.';this.success=null;
                }
                else{
                    let i = this.products.map(item => item.id).indexOf(id); // find index of your object
                    this.products.splice(i, 1);
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