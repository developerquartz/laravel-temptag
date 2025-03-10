<template>
  
  <div class="wrapper" v-if="this.$route.meta.layout==='admin'">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <router-link :to="{name: 'home'}" class="nav-link">Home</router-link>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- <a href="#" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Edit Profile
              <span class="float-right text-muted text-sm">12 hours</span>
            </a> -->
            <router-link :to="`/admin/editprofile/${this.user.id}`" class="dropdown-item"><i class="fas fa-user mr-2"></i>Edit Profile</router-link>
            <div class="dropdown-divider"></div>
            <a href="#"  @click="logout" class="dropdown-item dropdown-footer">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <!-- <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a> -->
      <router-link :to="{name: 'admin'}" class="navbar-brand"><img src="/assets/frontend/images/logo.jpg" alt="" class="brand-image elevation-3 brand-link" style="opacity: .8"></router-link>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button>
            </div>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2"> 
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
              <router-link :to="{name: 'admin'}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard </p>
              </router-link>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Users<i class="fas fa-angle-left right"></i></p></a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link :to="{name: 'admin_users_list'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All Users</p></a></router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name: 'admin_user_add'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Add New User</p></a></router-link>
                </li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-list-alt"></i><p>Categories<i class="fas fa-angle-left right"></i></p></a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link :to="{name: 'admin_categories_list'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All Categories</p></a></router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name: 'admin_category_add'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Add New Category</p></a></router-link>
                </li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i><p>Products<i class="fas fa-angle-left right"></i></p></a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link :to="{name: 'admin_products_list'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All Products</p></a></router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name: 'admin_product_add'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Add New Product</p></a></router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-certificate"></i><p>Promocodes<i class="fas fa-angle-left right"></i></p></a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link :to="{name: 'admin_promocodes_list'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All Promocodes</p></a></router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name: 'admin_promocode_add'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Add New Promocode</p></a></router-link>
                </li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-file"></i><p>Pages<i class="fas fa-angle-left right"></i></p></a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link :to="{name: 'admin_pages_list'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All Pages</p></a></router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name: 'admin_page_add'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Add New Page</p></a></router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fab fa-blog"></i><p>Blogs Categories<i class="fas fa-angle-left right"></i></p></a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link :to="{name: 'admin_blog_categories_list'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All Blog Categories</p></a></router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name: 'admin_blog_category_add'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Add New Blog Category</p></a></router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"><i class="nav-icon fas fa-list-alt"></i><p>Blogs<i class="fas fa-angle-left right"></i></p></a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link :to="{name: 'admin_blogs_list'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All Blogs</p></a></router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{name: 'admin_blog_add'}" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Add New Blog</p></a></router-link>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <router-link :to="{name: 'admin_contact_forms_list'}" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i><p>Contact Us Forms </p>
              </router-link>
            </li>

            <li class="nav-item">
              <router-link :to="{name: 'admin_subscription_forms_list'}" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i><p>Subscription Forms </p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'admin_orders_list'}" class="nav-link">
                <i class="nav-icon fas fa fa-list"></i><p>Orders </p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{name: 'admin_settings'}" class="nav-link">
                <i class="nav-icon fas fa fa-list"></i><p>Basic Info </p>
              </router-link>
            </li>

          </ul>
        </nav> 
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper"> -->
      <!-- Content Header (Page header) -->
      <main class="">
        <!--<router-view></router-view>-->
        <router-view @loggedIn="setUser"></router-view>
      </main>
      <!-- /.content -->
    <!-- </div> -->
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020-2021 <a href="https://www.finishedproductusa.com">Finished Product LLC</a>. </strong>All rights reserved.
      <div class="float-right d-none d-sm-inline-block"><b>Version</b> 1.0.0</div>
    </footer>
  </div> 
  <!-- ./ Admin wrapper -->



    <div v-else-if="this.$route.meta.layout==='user'">
      <!-- user dashboard -->
      
    </div>
    

    <div v-else-if="this.$route.meta.layout==='manager'">
      manager
    </div>
    
    <div v-else>
      <!-- Header Start -->
      <header class="header">
        <div class="container">
          <div class="d-flex">
            <nav class="navbar navbar-expand-lg w-100">
              <div class="logo">
                <!-- <a class="navbar-brand" href="/">
                    <img src="assets/frontend/images/logo.jpg" alt="">
                </a> -->
                <router-link :to="{name: 'home'}" class="navbar-brand"><img src="/assets/frontend/images/logo.jpg" alt=""></router-link>
              </div> 

              <div class="sec-in">  
                  <!-- <a href="#" class="icon-sec d-xl-none d-md-none"><i class="bi bi-search"></i></a>
                  <a href="#" class="icon-sec d-xl-none d-md-none" ><i class="bi bi-person"></i></a>
                  <a href="#" class="icon-sec d-xl-none d-md-none"><i class="bi bi-bag"></i> <span class="count">0</span></a> -->
                  <template v-if="isLoggedIn">
                    
                      <router-link :to="{name: 'user'}" class="icon-sec d-xl-none d-md-none"><i class="bi bi-person"></i></router-link>
                    
                  </template>
                  <template v-if="!isLoggedIn">
                    <router-link :to="{name: 'login'}" class="icon-sec d-xl-none d-md-none"><i class="bi bi-person"></i></router-link>
                  </template>
                  <router-link :to="{name: 'cart'}" class="icon-sec d-xl-none d-md-none"><i class="bi bi-bag"></i><span class="count">{{cartItems_count}}</span></router-link>

                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
              </div>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                  <li><router-link :to="{name: 'home'}" v-bind:class = "($route.name=='home')?'active':''">Home</router-link></li>
                  <li class="buy_now">
                    <!-- <router-link :to="{name: 'product'}" v-bind:class = "($route.name=='home')?'active':''">Buy Now</router-link> -->
                    <router-link :to="{name: 'singleproduct', params: { id: 1 }}" v-bind:class = "($route.name=='home')?'active':''">Buy Now</router-link>
                  </li>
                  <li><router-link :to="{name: 'about-us'}"  v-bind:class = "($route.name=='about-us')?'active':''">About Us</router-link></li>
                  <li><router-link :to="{name: 'faq'}"  v-bind:class = "($route.name=='faq')?'active':''">FAQ</router-link></li>
                  <li><router-link :to="{name: 'contact-us'}"  v-bind:class = "($route.name=='contact-us')?'active':''">Contact Us</router-link></li>
                  <!-- <li><a href="#" class="icon-sec"><i class="bi bi-search"></i></a></li> -->
                  
                  <template v-if="isLoggedIn">
                    <div v-for="role in user.roles" :key="role.id">
                      <li class="nav-item">
                        <router-link :to="{name: role.name}" class="icon-sec d-xxl-none"><i class="bi bi-person"></i></router-link>
                        <!-- <router-link :to="{name: role.name}" class="icon-sec" target= '_blank'><i class="bi bi-person"></i></router-link> -->
                      </li>
                    </div>
                    <li class="nav-item"><a class="icon-sec" @click="logout"><i class="bi bi-box-arrow-in-left"></i></a></li>
                  </template>
                  <template v-if="!isLoggedIn">
                    <li class="nav-item">
                      <router-link :to="{name: 'login'}" class="icon-sec d-xxl-none"><i class="bi bi-person"></i></router-link>
                    </li>
                    <!-- <li class="nav-item">
                      <router-link :to="{name: 'register'}" class="nav-link">Register</router-link>
                    </li> -->
                  </template>

                  <!-- <li><a href="#" class="icon-sec" ><i class="bi bi-person"></i></a></li> -->
                  <li>
                    <!-- <a href="#" class="icon-sec d-xxl-none"><i class="bi bi-bag"></i> <span class="count">0</span></a> -->
                    <router-link :to="{name: 'cart'}" class="icon-sec d-xxl-none"><i class="bi bi-bag"></i><span class="count">{{cartItems_count}}</span></router-link>
                  </li>

                </ul>
              </div>
            </nav>
          </div>
        </div>
      </header>
      <!-- Header End -->

      <main class="">
        <!--<router-view></router-view>-->
        <router-view @loggedIn="setUser"></router-view>
      </main>

      <!-- Newsletter Start-->
      <div class="newsletter-section">
        <div class="container"> 
          <div class="newsletter-icon">
            <img src="/assets/frontend/images/mail.png"/>
          </div>
          <h2 class="h2">Subscribe our newsletters</h2>
          <div class="col-md-4 offset-4">
            <div class="subscribe alert alert-success" role="alert" v-if="subscribe_success !== null">
              {{ subscribe_success }}
            </div>
            <div class="subscribe alert alert-danger" role="alert" v-if="subscribe_error !== null">
              {{ subscribe_error }}
            </div>
          </div>
        
          <form @submit.prevent="submitForm">
            <div class="input-group">
            <input id="subscriptionforms_email" type="email" placeholder="example@gmail.com" v-model="subscriptionforms.email" required>
            <span class="input-group__btn">
              <button type="submit" class="btn" name="commit">
              <span>Subscribe</span>
              </button>
            </span>
            </div>
          </form>
        </div>
      </div>
      <!-- Newsletter End-->

      <!-- Footer Start -->
      <footer class="footer">
          <div class="container">
             <div class="row">   
                  <div class="col-md-3 col-lg-3">
                      <figure>
                        <!-- <img src="/assets/frontend/images/logo.jpg"/> -->
                        <router-link :to="{name: 'home'}" class="navbar-brand"><img src="/assets/frontend/images/logo.jpg" alt=""></router-link>
                      </figure>

                      <ul class="social-icon">
                          <li>
                              <a :href="social_medias.social_media_facebook_link" target="_blank">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                  </svg>
                              </a>
                          </li>
                          <li>
                              <a :href="social_medias.social_media_instagram_link" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                  </svg>
                              </a>
                          </li>
                          <li>
                              <a :href="social_medias.social_media_linkedin_link" target="_blank">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                      </svg>
                              </a>
                          </li>
                      </ul>
                  </div>
                  <div class="col-md-3 col-lg-3">
                      <h4>Quick Links</h4>
                      <ul>
                          <li><router-link :to="{name: 'home'}">Home</router-link></li>
                          <li><router-link :to="{name: 'about-us'}">About Us</router-link></li>
                          <li><router-link :to="{name: 'faq'}">FAQ</router-link></li>
                          <li><router-link :to="{name: 'contact-us'}">Contact Us</router-link></li>
                      </ul>
                  </div>
                  <div class="col-md-3 col-lg-3">
                      <h4>info </h4>
                      <ul>
                          <li><router-link :to="{name: 'returnpolicy'}">Return Policy</router-link></li>
                          <li><router-link :to="{name: 'termsandcondition'}">Terms of Service</router-link></li>
                          <li><router-link :to="{name: 'privacypolicy'}">Privacy Policy</router-link></li>
                          <li><router-link :to="{name: 'blogs'}">Blogs</router-link></li>
                      </ul>
                  </div>
                  <div class="col-md-3 col-lg-3">
                      <h4>Contact Info </h4>
                      <ul>
                          <li><a href="#"><i class="bi bi-geo-alt"></i>{{social_medias.contact_info_address}}</a></li>
                          <li><a href="#"><i class="bi bi-envelope"></i>{{social_medias.contact_info_email}}</a></li>
                          <li><a href="#"><i class="bi bi-telephone"></i>{{social_medias.contact_info_phone}}</a></li>
                      </ul>
                  </div>
             </div>
          </div>  
          <div class="copyright">
              <!-- <p>© 2021, <a href="https://www.finishedproductusa.com" target="_blank">Finished Product LLC</a>. All rights reserved.</p> -->
              <div v-html="social_medias.copyright"></div>
          </div>
      </footer>

    </div>



</template>

<script>
export default {
  data() {
      return {
        user: {id:'',},
        isLoggedIn: false,
        layout:this.$route.meta.layout,
        subscriptionforms: {
          email:'',
          user_id:0,
        },
        error: null,
        success: null,
        subscribe_error: null,
        subscribe_success: null,
        cart_products:{},
        cartItems:{},
        cartItems_count:0,
        social_medias:{},
      }
    },
    created() {
      console.log('App.vue created');
      this.setUser();
      /*if(this.user){
        console.log('mounted'+ this.user.roles[0]['name']);  
      }
      else{
        console.log('mounted not login');
      }*/
      if(this.isLoggedIn){
          console.log(this.isLoggedIn+"ssss");
          // Get Cart Items Start
          axios.defaults.headers.common['Content-Type'] = 'application/json'
          axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
          axios.get(`/api/carts/cart`,{
            params: {
              user_id: this.user.id,
            }
          })
          .then(response => {
              this.cart_products = response.data.data.cart_products;
              this.cartItems = response.data.data.cartItems;
              this.cartItems_count = response.data.data.cartItems_count;
              // console.log(response.data.data);
              // console.log(this.cart_products);
              console.log("Hello444"+this.cartItems_count);
          })
          .catch(function (error) {
              console.error(error);
          });
          // Get Cart Items End
        }
        else{
          this.cartItems_count = 0;
        }

        // Get Settings Start
        axios.get('/api/settings/')
          .then(response => {
              this.social_medias = response.data.data.social_medias;
          })
          .catch(function (error) {
              console.error(error);
              this.message = "bbbbbxxcc";
          });
        // Get Settings End
    },
    mounted() {

      /*$(".navbar-toggler").click(function(){
      alert("The paragraph was clicked.");

      });*/
      $('button').on('click', function(e) {
        // $('body').addClass('menu-clicked');
        $('body').toggleClass('menu-clicked');
        /*if(! $('body').hasClass("class-name")){
          $('body').addClass('menu-clicked');
        }
        else{
          $('body').removeClass('menu-clicked');
        }*/
        e.stopPropagation();
      });

      $(".navbar-nav li a").click(function(){
        // alert("The paragraph was clicked.");
        $('#navbarSupportedContent').removeClass('show');
      });

      console.log('App.vue mounted');
      this.setUser();
      this.load_css_files();
    },
    watch:{
      $route (to, from){
        console.log('App.vue watch');
        // load css files on ruote change start
        // this.cartItems_count = 0;
        console.log('this.layout'+ this.layout);
        console.log('this.$route.meta.layout'+ this.$route.meta.layout);
        if(this.layout != this.$route.meta.layout){
          this.load_css_files();
          this.layout=this.$route.meta.layout;
        }
        console.log(this.layout);
        // load css files on ruote change end
        if(this.isLoggedIn){
          console.log(this.isLoggedIn);
          // Get Cart Items Start
          axios.defaults.headers.common['Content-Type'] = 'application/json'
          axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
          axios.get(`/api/carts/cart`,{
            params: {
              user_id: this.user.id,
            }
          })
          .then(response => {
              this.cart_products = response.data.data.cart_products;
              this.cartItems = response.data.data.cartItems;
              this.cartItems_count = response.data.data.cartItems_count;
              // console.log(response.data.data);
              // console.log(this.cart_products);
              // console.log("Hello"+this.cartItems_count);
          })
          .catch(function (error) {
              console.error(error);
          });
          // Get Cart Items End
        }
        else{
          this.cartItems_count = 0;
        }

        // Get Settings Start
        axios.get('/api/settings/')
          .then(response => {
              this.social_medias = response.data.data.social_medias;
          })
          .catch(function (error) {
              console.error(error);
              this.message = "bbbbbxxcc";
          });
        // Get Settings End

      }
    },
    methods: {
      setUser() {
          this.user = JSON.parse(localStorage.getItem('user'));
          this.isLoggedIn = localStorage.getItem('token') != null;
        },
        logout() {
          localStorage.removeItem('token');
          localStorage.removeItem('user');
          this.setUser();

          // this.$router.push('/');
          // this.$router.push({ name: "home"});
          window.location.replace("/");
        },
        load_css_files() {
          console.log('load_css_files');
          // if(this.$route.meta.layout=='frontend'){console.log('l f');}
          // if(this.$route.meta.layout=='admin'){console.log('l admin');}
          // if(this.$route.meta.layout=='user'){console.log('l user');}

          var plugin = document.createElement("script");
          if(this.$route.meta.layout=='admin'){
          if(this.user.roles[0]['name']=='admin'){
            console.log('admin includes');
            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/admin/css/style.css"); 
            document.getElementsByTagName("head")[0].appendChild(element);

            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/admin/dist/css/adminlte.min.css");
            document.getElementsByTagName("head")[0].appendChild(element);

            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/admin/plugins/fontawesome-free/css/all.min.css");
            document.getElementsByTagName("head")[0].appendChild(element);

            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/admin/plugins/select2/css/select2.min.css");
            document.getElementsByTagName("head")[0].appendChild(element);

            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css");
            document.getElementsByTagName("head")[0].appendChild(element);

            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/admin/plugins/daterangepicker/daterangepicker.css");
            document.getElementsByTagName("head")[0].appendChild(element);

            // Main Files
            var adminlte = document.createElement("script");
            adminlte.setAttribute("src","/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js");
            adminlte.async = true;
            document.head.appendChild(adminlte);
            
            var adminlte = document.createElement("script");
            adminlte.setAttribute("src","/assets/admin/dist/js/adminlte.min.js");
            adminlte.async = true;
            document.head.appendChild(adminlte);

            var demo = document.createElement("script");
            demo.setAttribute("src","/assets/admin/dist/js/demo.js");
            demo.async = true;
            document.head.appendChild(demo);
            
            // My custom js
            // var custom = document.createElement("script");
            // custom.setAttribute("src","/assets/admin/js/custom.js");
            // custom.async = true;
            // document.head.appendChild(custom);
          }
          else if(this.user.roles[0]['name']=='user'){
            console.log('user includes');
          }
          else{
            console.log('else includes');
          }
          }


          if(this.$route.meta.layout=='frontend'){
            // common css and js includes
            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/frontend/css/style.css?v=0.0"); 
            document.getElementsByTagName("head")[0].appendChild(element);

            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"); 
            document.getElementsByTagName("head")[0].appendChild(element);

            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/frontend/css/slick.css"); 
            document.getElementsByTagName("head")[0].appendChild(element);
            
            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/frontend/css/slick-theme.css"); 
            document.getElementsByTagName("head")[0].appendChild(element);

            // my css
            var element = document.createElement("link");
            element.setAttribute("rel", "stylesheet");
            element.setAttribute("type", "text/css");
            element.setAttribute("href", "/assets/frontend/css/style_me.css?v=0.0"); 
            document.getElementsByTagName("head")[0].appendChild(element);

            // Js files
            /*plugin.setAttribute("src","/assets/admin/dist/js/slick.js");
            plugin.async = true;
            document.head.appendChild(plugin);*/

            /*plugin.async = true
            plugin.setAttribute("src","/assets/frontend/js/custom_me.js");
            plugin.async = true;
            document.head.appendChild(plugin);*/
            var stripe = document.createElement("script");
            stripe.setAttribute("src","https://js.stripe.com/v2/");
            stripe.async = true;
            document.head.appendChild(stripe);
          }
        },
        submitForm() {
          var is_active;
          console.log(this.subscriptionforms);
          axios.defaults.headers.common['Content-Type'] = 'application/json'
          axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
          axios.post('/api/subscriptionforms/add', this.subscriptionforms)
          .then(response => {
              console.log("response"+response.data.message);
              if(response.data.success){
                this.subscribe_success=response.data.message;
                $('.subscribe.alert.alert-success').addClass('new');
                this.subscribe_error=null;
              }
              else{
                this.subscribe_error=response.data.message;this.subscribe_success=null;
              }
          })
          .catch(function (error) {
              // console.error(error);
              this.subscribe_error=error;this.subscribe_success=null;
          });
          this.remove_alert();
          // $('#subscriptionforms_email').val('');
          this.subscriptionforms.email='';
        },
        remove_alert(){
          window.setTimeout(function () {
            $(".subscribe.alert").fadeTo(1000, 0).slideUp(1000, function () {
                //$(this).alert('close');
            });
            $('.subscribe.alert.alert-success').removeClass('new');
          }, 2000);
          console.log('immm'); 
        }
    },
    beforeRouteEnter(to, from, next) { 
      
    }, 
}
</script>