<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
            <li class="breadcrumb-item active">Add New Product</li>
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
            <div class="card-header">Add Product</div>
            <div class="card-body">
              <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="category_id" class="form-label">Select Category</label>
                      <!-- <input type="text" v-model="product.category_id" class="form-control" id="category_id" required> -->
                      <select class='form-control' v-model='product.category_id' :required="true">
                          <option value="Select Category" selected disabled>Select Category</option>
                          <option v-for='category in categories' :value='category.id'>{{ category.category_name }}</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_name" class="form-label">Name</label>
                      <input type="text" v-model="product.product_name" class="form-control" id="product_name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <table class="table table-bordered">
                      <thead class="text text-success">
                          <tr>                            
                              <th>Quantity</th>
                              <!-- <th>Currency Type</th> -->
                              <th>Price</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <tr v-for='(product_price_json_1, index) in product_price_json' :key="index"><td>
                          <input v-model="product_price_json_1.quantity" class="form-control" type="number" />
                      </td>
                      <!-- <td>
                        <select class='form-control' v-model='product_price_json_1.currency_type' :required="true">
                          <option value="$" selected>Doller</option>
                          <option value="¢" selected>Cent</option>
                        </select>
                      </td> -->
                      <td>
                          <input  v-model="product_price_json_1.price"  class="form-control" type="number"  step="0.01"/>
                      </td>
                      <td>
                          <i  @click="deleteRow(index)" class="fas fa-trash-alt" style="font-size:25px;color:red;cursor:pointer"></i>
                      </td>
                      </tr>                        
                      <tr>
                          <td>
                              <i class="fa fa-plus pull-right"  @click="addRow" style="font-size:25px;color:#337ab7;cursor:pointer"></i>
                          </td>                        
                      </tr>                        
                      </tbody>
                  </table>
                </div>
                <!-- <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_quantity" class="form-label">Quantity</label>
                      <input type="number" v-model="product.product_quantity" class="form-control" id="product_quantity" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_price" class="form-label">Price</label>
                      <input type="text" v-model="product.product_price" class="form-control" id="product_price" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_quantity_for_sale" class="form-label">Purchase Max Limit</label>
                      <input type="number" v-model="product.product_quantity_for_sale" class="form-control" id="product_quantity_for_sale" required>
                  </div>
                </div> -->
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_available" class="form-label">Product Available</label>
                      <input type="number" v-model="product.product_available" class="form-control" id="product_available" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_detail" class="form-label">Detail</label>
                      <tinymce id="product_detail" v-model="product.product_detail" required></tinymce>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_description" class="form-label">Description</label>
                      <!-- <input type="text" v-model="product.product_description" class="form-control" id="product_description" required> -->
                      <tinymce id="product_description" v-model="product.product_description" required></tinymce>
                      <!-- <vue-editor v-model="product.product_description" /> -->
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_specification" class="form-label">Specification</label>
                      <tinymce id="product_specification" v-model="product.product_specification" required></tinymce>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_features" class="form-label">Features</label>
                      <tinymce id="product_features" v-model="product.product_features" required></tinymce>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="product_feature_image" class="form-label">Feature Image</label>
                      <input type="file" class="form-control" v-on:change="onChange($event, 'product_feature_image')" required>
                      <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="additional_image1" class="form-label">Additional Image</label>
                      <input type="file" class="form-control" v-on:change="onChange($event, 'additional_image1')" required>
                      <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                  </div>
                </div>

                <!-- <div class="form-group row">
                  <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" name="on_home_page" class="form-check-input" v-model="product.on_home_page" :checked="isChecked(product.on_home_page)">
                        <label class="form-check-label" for="on_home_page">On Home Page</label>
                    </div>
                  </div>
                </div> -->

                <div class="form-group row">
                  <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" v-model="product.is_active" :checked="isChecked(product.is_active)">
                        <label class="form-check-label" for="is_active">Is Active</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn btn-info">Save</button>
                    </div>
                </div>

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
      categories: {},
      product: {
        category_id: 'Select Category',
        product_name: '',
        // product_quantity: '',
        // product_price: '',
        // product_quantity_for_sale: '',
        product_available: '',
        product_detail: '',
        product_description: '',
        product_specification: '',
        product_features: '',
        product_feature_image: '',
        on_home_page: false,
        is_active: true,
        additional_image1: '',
      },
      product_price_json:[{quantity:'',price:''}],
      error: null,
      success: null,
    }
  },
  watch:{
    $route (to, from){
      this.isChecked();
    }
  },
  created() {
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
      axios.get('/api/categories')
      .then(response => {
          this.categories = response.data.data.categories;
          console.log(this.categories);
      })
      .catch(function (error) {
          console.error(error);
      });
  },
  methods: {
    onChange(e,column_name) {
      if(column_name=="product_feature_image"){
        this.product.product_feature_image = e.target.files[0];
        console.log(this.product.product_feature_image);
      }
      if(column_name=="additional_image1"){
        this.product.additional_image1 = e.target.files[0];
        console.log(this.product.additional_image1);
      }
    },
    submitForm(e) {
      e.preventDefault();
      if(this.product.category_id=='Select Category'){
        this.error='Please Select the Category';this.success=null;
        // this.$router.push({ name: "admin_product_add"});
      }
      else{
        let existingObj = this;
        existingObj.success=null;
        existingObj.error=null;

        const config = {
            headers: {
                'content-type': 'multipart/form-data',
                'Authorization': 'Bearer ' + localStorage.getItem('token'),
            }
        }

        var is_active;
        if(this.product.is_active){this.product.is_active='Y';}else{this.product.is_active='N';}
        if(this.product.on_home_page){this.product.on_home_page='Y';}else{this.product.on_home_page='N';}

        let data = new FormData();
        data.append('category_id', this.product.category_id);
        data.append('product_name', this.product.product_name);
        // data.append('product_quantity', this.product.product_quantity);
        // data.append('product_price', this.product.product_price);
        // data.append('product_quantity_for_sale', this.product.product_quantity_for_sale);
        data.append('product_price_json', JSON.stringify(this.product_price_json));
        data.append('product_available', this.product.product_available);
        data.append('product_detail', this.product.product_detail);
        data.append('product_description', this.product.product_description);
        data.append('product_specification', this.product.product_specification);
        data.append('product_features', this.product.product_features);
        data.append('on_home_page', this.product.on_home_page);
        data.append('is_active', this.product.is_active);
        data.append('product_feature_image', this.product.product_feature_image);

        data.append('additional_image1', this.product.additional_image1);

        axios.post('/api/products/add', data, config)
        .then(function (response) {
            // existingObj.success = res.data.success;
            if(response.data.success){
              existingObj.success=response.data.message;this.error=null;
            }
            else{
              existingObj.error=response.data.message;this.success=null;
            }
        })
        .catch(function (err) {
            existingObj.output = err;
        });

        window.scrollTo(0,0);
      }
    },
    isChecked(obj) {
      if(obj=='Y'){return true;}else{return false;}
    },
    addRow: function() {      
       this.product_price_json.push({quantity:'',price:''})
    },
    deleteRow(index){    
        this.product_price_json.splice(index,1);             
    }
  }
}
</script>