<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
            <li class="breadcrumb-item active">Add New Page</li>
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
            <div class="card-header">Add Page</div>
            <div class="card-body">
              <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="page_name" class="form-label">Name</label>
                      <input type="text" v-model="page.page_name" class="form-control" id="page_name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="page_title" class="form-label">Title</label>
                      <input type="text" v-model="page.page_title" class="form-control" id="page_title" required>
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="page_meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" v-model="page.page_meta_keywords" class="form-control" id="page_meta_keywords" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="page_meta_desc" class="form-label">Meta Description</label>
                        <input type="text" v-model="page.page_meta_desc" class="form-control" id="page_meta_desc" required>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="page_content" class="form-label">Content</label>
                      <tinymce id="page_content" v-model="page.page_content" required></tinymce>
                      <!-- <vue-editor v-model="page.page_content" /> -->
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="page_title_background_image" class="form-label">Background Image</label>
                      <input type="file" class="form-control" v-on:change="onChange($event, 'page_title_background_image')">
                      <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="page_feature_image" class="form-label">Feature Image</label>
                      <input type="file" class="form-control" v-on:change="onChange($event, 'page_feature_image')">
                      <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" v-model="page.is_active" :checked="isChecked(page.is_active)">
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
      page: {
        page_name: '',
        page_title: '',
        price: '',
        page_meta_keywords: '',
        page_meta_desc: '',
        page_title_background_image: '',
        page_feature_image: '',
        is_active: true,
        page_content_multi:[{key:''},{key:''}],
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
      if(column_name=="page_feature_image"){
          this.page.page_feature_image = e.target.files[0];
          console.log(this.page.page_feature_image);
      }
      if(column_name=="page_title_background_image"){
          this.page.page_title_background_image = e.target.files[0];
          console.log(this.page.page_title_background_image);
      }
    },
    /*onChange: function (){
      var self = this
      console.log(self.list);
    },*/
    submitForm(e) {
      e.preventDefault();
      if(this.page.category_id=='Select Category'){
        this.error='Please Select the Category';this.success=null;
        // this.$router.push({ name: "admin_page_add"});
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
        if(this.page.is_active){this.page.is_active='Y';}else{this.page.is_active='N';}

        let data = new FormData();
        data.append('page_name', this.page.page_name);
        data.append('page_title', this.page.page_title);
        data.append('page_content', this.page.page_content);
        data.append('is_active', this.page.is_active);
        data.append('page_meta_keywords', this.page.page_meta_keywords);
        data.append('page_meta_desc', this.page.page_meta_desc);
        data.append('page_feature_image', this.page.page_feature_image);
        data.append('page_title_background_image', this.page.page_title_background_image);
        // console.log(this.page.page_content_multi);return;
        axios.post('/api/pages/add', data, config)
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
    }
  }
}
</script>