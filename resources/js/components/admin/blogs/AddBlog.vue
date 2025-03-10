<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
            <li class="breadcrumb-item active">Add New Blog</li>
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
            <div class="card-header">Add Blog</div>
            <div class="card-body">
              <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="blog_category_id" class="form-label">Select Blog Category</label>
                      <!-- <input type="text" v-model="blog.blog_category_id" class="form-control" id="blog_category_id" required> -->
                      <select class='form-control' v-model='blog.blog_category_id' :required="true">
                          <option value="Select Blog Category" selected disabled>Select Blog Category</option>
                          <option v-for='blogcategory in blogcategories' :value='blogcategory.id'>{{ blogcategory.blog_category_name }}</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="blog_name" class="form-label">Name</label>
                      <input type="text" v-model="blog.blog_name" class="form-control" id="blog_name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="blog_title" class="form-label">Title</label>
                      <input type="text" v-model="blog.blog_title" class="form-control" id="blog_title" required>
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="blog_meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" v-model="blog.blog_meta_keywords" class="form-control" id="blog_meta_keywords" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="blog_meta_desc" class="form-label">Meta Description</label>
                        <input type="text" v-model="blog.blog_meta_desc" class="form-control" id="blog_meta_desc" required>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="blog_content" class="form-label">Content</label>
                      <tinymce id="blog_content" v-model="blog.blog_content" required></tinymce>
                      <!-- <vue-editor v-model="blog.blog_content" /> -->
                  </div>
                </div>
                <!-- <div class="form-group row">
                  <div class="col-md-12">
                      <label for="blog_title_background_image" class="form-label">Background Image</label>
                      <input type="file" class="form-control" v-on:change="onChange($event, 'blog_title_background_image')">
                      <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                  </div>
                </div> -->

                <div class="form-group row">
                  <div class="col-md-12">
                      <label for="blog_feature_image" class="form-label">Feature Image</label>
                      <input type="file" class="form-control" v-on:change="onChange($event, 'blog_feature_image')">
                      <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" v-model="blog.is_active" :checked="isChecked(blog.is_active)">
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
      blogcategories: {},
      blog: {
        blog_category_id: 'Select Blog Category',
        blog_name: '',
        blog_title: '',
        blog_meta_keywords: '',
        blog_meta_desc: '',
        blog_title_background_image: '',
        blog_feature_image: '',
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
  created() {
      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
      axios.get('/api/blogcategories')
      .then(response => {
          this.blogcategories = response.data.data.blogcategories;
          console.log(this.blogcategories);
      })
      .catch(function (error) {
          console.error(error);
      });
  },
  methods: {
    onChange(e,column_name) {
      if(column_name=="blog_feature_image"){
        this.blog.blog_feature_image = e.target.files[0];
        console.log(this.blog.blog_feature_image);
      }
      if(column_name=="blog_title_background_image"){
        this.blog.blog_title_background_image = e.target.files[0];
        console.log(this.blog.blog_title_background_image);
      }
    },
    submitForm(e) {
      e.preventDefault();
      if(this.blog.blog_category_id=='Select Blog Category'){
        this.error='Please Select the Category';this.success=null;
        // this.$router.push({ name: "admin_blog_add"});
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
        if(this.blog.is_active){this.blog.is_active='Y';}else{this.blog.is_active='N';}

        let data = new FormData();
        data.append('blog_category_id', this.blog.blog_category_id);
        data.append('blog_name', this.blog.blog_name);
        data.append('blog_title', this.blog.blog_title);
        data.append('blog_content', this.blog.blog_content);
        data.append('is_active', this.blog.is_active);
        data.append('blog_meta_keywords', this.blog.blog_meta_keywords);
        data.append('blog_meta_desc', this.blog.blog_meta_desc);
        data.append('blog_feature_image', this.blog.blog_feature_image);
        data.append('blog_title_background_image', this.blog.blog_title_background_image);

        axios.post('/api/blogs/add', data, config)
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