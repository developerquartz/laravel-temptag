<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Page List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item active">All Page</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row" v-if="pages.length >= 1">
                <div class="col-md-2 mb-2">
                    <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_page_add'})">Add Page</button>
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
                        <th>Name</th>
                        <th>Title</th>
                        <!-- <th>Slug</th> -->
                        <!-- <th>Content</th> -->
                        <th>Background Image </th>
                        <th>Feature Image </th>
                        <!-- <th>Is Active</th> -->
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="page in pages" :key="page.id">
                        <td>{{ page.id }}</td>
                        <td>{{ page.page_name }}</td>
                        <td>{{ page.page_title }}</td>
                        <!-- <td>{{ page.page_slug }}</td> -->
                        <!-- <td>{{ page.page_content }}</td> -->
                        <td>
                            <img v-if="page.page_title_background_image!='' && page.page_title_background_image != 'NULL'" :src="'../storage/uploads/pages/'+page.page_title_background_image" width="200px">
                            <img v-else :src="'../assets/admin/images/no-image-available_1.png'" width="200px">
                        </td>
                        <td>
                            <img v-if="page.page_feature_image!='' && page.page_feature_image != 'NULL'" :src="'../storage/uploads/pages/'+page.page_feature_image" width="200px">
                            <img v-else :src="'../assets/admin/images/no-image-available_1.png'" width="200px">
                        </td>
                        <!-- <td>{{ page.is_active=='Y'?'Yes':'No' }}</td> -->
                        <td>{{ moment(page.created_at).format("DD-MM-YYYY") }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <div v-if="page.id==1">
                                    <router-link :to="{name: 'admin_home_page_edit', params: { id: page.id }}" class="btn btn-primary">Edit</router-link>
                                </div>
                                <div v-else-if="page.id==2">
                                    <router-link :to="{name: 'admin_about_page_edit', params: { id: page.id }}" class="btn btn-primary">Edit</router-link>
                                </div>
                                <div v-else-if="page.id==4">
                                    <router-link :to="{name: 'admin_conatct_page_edit', params: { id: page.id }}" class="btn btn-primary">Edit</router-link>
                                </div>
                                <div v-else>
                                <router-link :to="{name: 'admin_page_edit', params: { id: page.id }}" class="btn btn-primary">Edit
                                </router-link>
                                <!-- <button class="btn btn-danger" @click="deletePage(page.id)">Delete</button> -->
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row" v-if="pages.length <= 0">
                <div class="col-md-2 mb-2">
                    <button type="button" class="btn btn-info" @click="$router.push({ name: 'admin_page_add'})">Add Page</button>
                </div>
                <div class="col-md-12"><p>There no data now.</p></div>
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
            pages: [],
            success: null,
            message: null,
            error: null,
            moment:moment
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        
        axios.get('/api/pages')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.pages = response.data.data.pages;
                // console.log(response.data.data.pages);
            }
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
        deletePage(id) {
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.delete(`/api/pages/delete/${id}`)
            .then(response => {
                
                console.log(response.data);
                if(!response.data.success){
                    // this.error=response.data.message;
                    this.error='This page has some permissions.please check.';this.success=null;
                }
                else{
                    let i = this.pages.map(item => item.id).indexOf(id); // find index of your object
                    this.pages.splice(i, 1);
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