//Contactus.vue
<template>
  <div>
    <!-- Site Banner Start -->
    <section class="site-banner inner-banner" style="background: url(assets/frontend/images/inner-banner.png);">
        <div class="container">
            <div class="banner-form">
                <h1>Blogs</h1> 
             </div>
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="blog-sec blog-sound">
        <div class="container">
            <div class="row">
                <div class="col-md-4" v-for="blog in blogs" :key="blog.id">
                    <div class="blog-inner">
                            <figure>
                                <router-link :to="{name: 'singleblog', params: { id: blog.id }}">
                                <img v-if="blog.blog_feature_image!='' && blog.blog_feature_image!='NULL'" :src="'../storage/uploads/blogs/'+blog.blog_feature_image">
                                <img v-else :src="'/assets/admin/images/no-image-available_1.png'">
                                </router-link>
                            </figure>
                            <figcaption>
                                <router-link :to="{name: 'singleblog', params: { id: blog.id }}">
                                    <h4>{{ blog.blog_name }}</h4>
                                </router-link>
                                <h6>{{ moment(blog.created_at).format("DD/MMM/YYYY")}}</h6>
                                <p>{{blog.blog_title}}</p>
                            </figcaption>
                    </div>
                </div>

                <!-- <div class="col-md-4">
                    <div class="blog-inner">
                            <figure>
                              <img src="assets/images/feature.jpg">
                            </figure>
                            <figcaption>
                                <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</h4>
                                <h6>19/Aug/2021</h6>
                                <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                            </figcaption>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-inner">
                            <figure>
                              <img src="assets/images/feature.jpg">
                            </figure>
                            <figcaption>
                                <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</h4>
                                <h6>19/Aug/2021</h6>
                                <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                            </figcaption>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-inner">
                            <figure>
                              <img src="assets/images/feature.jpg">
                            </figure>
                            <figcaption>
                                <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</h4>
                                <h6>19/Aug/2021</h6>
                                <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                            </figcaption>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="blog-inner">
                            <figure>
                              <img src="assets/images/feature.jpg">
                            </figure>
                            <figcaption>
                                <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</h4>
                                <h6>19/Aug/2021</h6>
                                <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                            </figcaption>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-inner">
                            <figure>
                              <img src="assets/images/feature.jpg">
                            </figure>
                            <figcaption>
                                <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</h4>
                                <h6>19/Aug/2021</h6>
                                <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                            </figcaption>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-inner">
                            <figure>
                              <img src="assets/images/feature.jpg">
                            </figure>
                            <figcaption>
                                <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</h4>
                                <h6>19/Aug/2021</h6>
                                <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                            </figcaption>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    
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