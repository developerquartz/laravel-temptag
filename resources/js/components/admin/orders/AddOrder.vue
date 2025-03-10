<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Blog Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
            <li class="breadcrumb-item active">Add New Blog Category</li>
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
            <div class="card-header">Add Blog Category</div>
            <div class="card-body">
              <form @submit.prevent="submitForm">
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="blog_category_name" class="form-label">Name</label>
                      <input type="text" v-model="blog_category.blog_category_name" class="form-control" id="blog_category_name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" v-model="blog_category.is_active" :checked="isChecked(blog_category.is_active)">
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
      blog_category: {
        blog_category_name: '',
        is_active: true,
      },
      error: null,
      success: null,
    }
  },
  watch:{
    $route (to, from){
      this.isChecked();
    }
  },
  methods: {
    submitForm() {
      var is_active;
      if(this.blog_category.is_active){this.blog_category.is_active='Y';}else{this.blog_category.is_active='N';}
      console.log(this.category);
      /*axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
      axios.post('/api/blogcategories/add', this.category)
      .then(response => {
          console.log(response);
          if(response.data.success){
              this.success=response.data.message;this.error=null;
          }
          else{
            this.error=response.data.message;this.success=null;
          }
      })
      .catch(function (error) {
          console.error(error);
          this.error=error;this.success=null;
      });*/

      let existingObj = this;
      existingObj.success=null;
      existingObj.error=null;

      const config = {
          headers: {
              'content-type': 'multipart/form-data',
              'Authorization': 'Bearer ' + localStorage.getItem('token'),
          }
      }

      let data = new FormData();
      data.append('blog_category_name', this.blog_category.blog_category_name);
      data.append('is_active', this.blog_category.is_active);
      
      axios.post('/api/blogcategories/add', data, config)
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

    },
    isChecked(obj) {
      if(obj=='Y'){return true;}else{return false;}
    }
  }
}
</script>