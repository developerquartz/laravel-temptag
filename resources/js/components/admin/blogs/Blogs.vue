<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Blog List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item active">All Blog</li>
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
                <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_blog_add'})">Add Blog</button>
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
                    <th>Blog Category</th>
                    <th>Blog Name</th>
                    <th>Blog Title</th>
                    <th>Image</th>
                    <th>Is Active</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="blog in blogs" :key="blog.id">
                    <td>{{ blog.id }}</td>
                    <td>{{ blog.blog_category_name }}</td>
                    <td>{{ blog.blog_name }}</td>
                    <td>{{ blog.blog_title }}</td>
                    <td>
                        <img v-if="blog.blog_feature_image!='' && blog.blog_feature_image!='NULL'" :src="'../storage/uploads/blogs/'+blog.blog_feature_image" width="200px">
                        <img v-else :src="'../assets/admin/images/no-image-available_1.png'" width="200px">
                    </td>
                    <td>{{ blog.is_active=='Y'?'Yes':'No' }}</td>
                    <td>{{ moment(blog.created_at).format("DD-MM-YYYY") }}
                        
                    </td> 
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'admin_blog_edit', params: { id: blog.id }}" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deleteBlog(blog.id)">Delete</button>
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
            blogs: [],
            success: null,
            message: null,
            error: null,
            moment:moment
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        
        axios.get('/api/blogs')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.blogs = response.data.data.blogs;
                // console.log(response.data.data.blogs);
            }
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
        deleteBlog(id) {
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.delete(`/api/blogs/delete/${id}`)
            .then(response => {
                
                console.log(response.data);
                if(!response.data.success){
                    // this.error=response.data.message;
                    this.error='This blog has some permissions.please check.';this.success=null;
                }
                else{
                    let i = this.blogs.map(item => item.id).indexOf(id); // find index of your object
                    this.blogs.splice(i, 1);
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