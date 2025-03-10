<template>
  <div>
    <!-- Site Banner Start -->
    <!-- <section class="site-banner inner-banner" v-bind:style="{ 'backgroundImage': 'url(' + '/storage/uploads/blogs/'+ blog.blog_title_background_image + ')' }"> -->
    <section class="site-banner inner-banner" style="background: url(/assets/frontend/images/inner-banner.png);">
        <div class="container">
            <div class="banner-form">
                <h1>{{blog.blog_name}}</h1> 
             </div> 
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="blog-detail"> 
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="left-detail-blog">
                        <figure>
                            <img v-if="blog.blog_feature_image!='' && blog.blog_feature_image!='NULL'" :src="'../storage/uploads/blogs/'+blog.blog_feature_image">
                            <img v-else :src="'/assets/admin/images/no-image-available_1.png'">
                        </figure>
                        <figcaption>
                            <h4>{{blog.blog_title}}</h4>
                            <div class="date-sec">{{ moment(blog.created_at).format("DD/MMM/YYYY")}}</div>
                            <div class="discription-sec" v-html="blog.blog_content">
                                
                            </div>
                        </figcaption>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="sidebar-blog">
                        <h4>Recent Posts</h4>
                        <ul>
                            <li v-for="recentblog in recentblogs" :key="recentblog.id">
                                <figure>
                                    <router-link :to="{name: 'singleblog', params: { id: recentblog.id }}">
                                    <img v-if="recentblog.blog_feature_image!='' && recentblog.blog_feature_image!='NULL'" :src="'../storage/uploads/blogs/'+recentblog.blog_feature_image">
                                    <img v-else :src="'/assets/admin/images/no-image-available_1.png'">
                                    </router-link>
                                </figure>
                                <figcaption>
                                    <router-link :to="{name: 'singleblog', params: { id: recentblog.id }}">
                                        <h6>{{recentblog.blog_name}}</h6>
                                    </router-link>
                                    <p>{{recentblog.blog_title}}</p>
                                </figcaption>
                            </li>
                            <!-- <li>
                                <figure>
                                    <img src="assets/images/feature.jpg">
                                </figure>
                                <figcaption>
                                    <h6>Lorem ipsum dolor</h6>
                                    <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                </figcaption>
                            </li>
                             <li>
                                <figure>
                                    <img src="assets/images/feature.jpg">
                                </figure>
                                <figcaption>
                                    <h6>Lorem ipsum dolor</h6>
                                    <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                </figcaption>
                            </li>
                             <li>
                                <figure>
                                   <img src="assets/images/feature.jpg">
                                </figure>
                                <figcaption>
                                    <h6>Lorem ipsum dolor</h6>
                                    <p>Sed do eiusmod tempor incididunt ut labore et magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                </figcaption>
                            </li> -->
                        </ul>
                    </div>
                </div>
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
            blogcategories: {},
            recentblogs: {},
            blog: {
                blog_category_id: 'Select Blog Category',
                blog_name: '',
                blog_title: '',
                blog_meta_keywords: '',
                blog_meta_desc: '',
                blog_title_background_image: '',
                blog_feature_image: '',
                blog_title_background_image_old: '',
                blog_feature_image_old: '',
                is_active: true,
            },
            error: null,
            success: null,
            moment:moment,
        }
    },
    created() {
        /*axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/blogs/edit/${this.$route.params.id}`)
        .then(response => {
            this.blog = response.data.data.blog;
            this.blog.blog_feature_image_old = response.data.data.blog.blog_feature_image;
            this.blog.blog_title_background_image_old = response.data.data.blog.blog_title_background_image;
            console.log(this.blog.blog_feature_image_old);
        })
        .catch(function (error) {
            console.error(error);
        });

        // Get all categoies
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
        // Get Recent Blogs
        axios.get('/api/blogs/recentblogs')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.recentblogs = response.data.data.blogs;
                // console.log(response.data.data.blogs);
            }
        })
        .catch(function (error) {
            console.error(error);
        });*/
        this.refresh_page_date();
    },
    watch:{
      $route (to, from){
         if(to !== from ) {
          this.refresh_page_date();console.log('yes');
        }else{
            console.log('dssss');
        }
      }
    },
    methods: {
        refresh_page_date(){
            axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/blogs/edit/${this.$route.params.id}`)
        .then(response => {
            this.blog = response.data.data.blog;
            this.blog.blog_feature_image_old = response.data.data.blog.blog_feature_image;
            this.blog.blog_title_background_image_old = response.data.data.blog.blog_title_background_image;
            console.log(this.blog.blog_feature_image_old);
        })
        .catch(function (error) {
            console.error(error);
        });

        // Get all categoies
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
        // Get Recent Blogs
        axios.get(`/api/blogs/recentblogs/${this.$route.params.id}`)
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.recentblogs = response.data.data.blogs;
                // console.log(response.data.data.blogs);
            }
        })
        .catch(function (error) {
            console.error(error);
        });
        }
    }
}
</script>