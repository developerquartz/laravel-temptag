<template>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'admin_categories_list'}">Categories</router-link></li>
                <li class="breadcrumb-item active">Edit Category</li>
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
                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                            <form @submit.prevent="updateCustomer">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="category_name" class="form-label">Name</label>
                                        <input id="category_name" type="text" class="form-control" v-model="category.category_name" required autofocus autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" v-model="category.is_active" :checked="isChecked(category.is_active)">
                                        <label class="form-check-label" for="is_active">Is Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

    <!-- /.content -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            category: [],
            error: null,
            success: null,
        }
    },
    mounted() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/categories/edit/${this.$route.params.id}`)
            .then(response => {
                this.category = response.data.data.category;
                console.log(response.data);
            })
            .catch(function (error) {
                console.error(error);
            });
    },
    methods: {
        updateCustomer() {
            var is_active;
            if(this.category.is_active){is_active='Y';}else{is_active='N';}
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.post(`/api/categories/update/${this.$route.params.id}`, {
                    category_name: this.category.category_name,
                    is_active: is_active
                })
                .then(response => {
                    console.log(response);
                    // this.$router.push({name: 'customers'});
                    if(response.data.success){
                        this.success=response.data.message;
                    }
                    else{
                        this.error=response.data.message;
                    }
                })
                .catch(function (error) {
                    console.error(error);
                });
        },
        isChecked(obj) {
            if(obj=='Y'){return true;}else{return false;}
        }/*,
        onChange(event) {
            var optionText = event.target.value;
            console.log(optionText);
            // if(optionText){ this.category.is_active='Y'; }else{ this.category.is_active='N'; }
            // console.log(this.category.is_active);
        }*/
    }
}
</script>