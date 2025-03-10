//Home.vue
<template>
  <div>
    <!-- Site Banner Start -->
    <section class="site-banner homepage">
      <div class="sec"><img :src="'/storage/uploads/pages/'+page.page_title_background_image"></div>
        <div class="container">
            <div class="banner-form">
                <h1>{{page.page_content[0]['top_section'][0]['title']}}</h1> 
                <div v-html="page.page_content[0]['top_section'][0]['description']"></div>
           <figure><img :src="'/storage/uploads/pages/'+page.page_feature_image"/></figure>
             </div>
         </div>
    </section>
    <!-- Site Banner End -->

    <section class="how-it-work" id="bookappointment">
        <div class="container">
          <h2>{{page.page_content[0]['how_it_work_section_title'][0]['title']}}</h2>
          <ul>
            <li>
              <figure><img :src="'/storage/uploads/pages/'+page.how_it_work_section_image1_old"/></figure>
              <figcaption>
              <h3>{{page.page_content[0]['how_it_work_section'][0]['title']}}</h3>
              <div v-html="page.page_content[0]['how_it_work_section'][0]['description']"></div>
              </figcaption>
            </li>
            <li>
              <figure><img :src="'/storage/uploads/pages/'+page.how_it_work_section_image2_old"/></figure>
              <figcaption>
                <h3>{{page.page_content[0]['how_it_work_section'][1]['title']}}</h3>
                <div v-html="page.page_content[0]['how_it_work_section'][1]['description']"></div>
              </figcaption>
            </li>
            <li>
              <figure><img :src="'/storage/uploads/pages/'+page.how_it_work_section_image3_old"/></figure>
              <figcaption>
                <h3>{{page.page_content[0]['how_it_work_section'][2]['title']}}</h3>
                <div v-html="page.page_content[0]['how_it_work_section'][2]['description']"></div>
              </figcaption>
            </li>
          </ul>
        </div>
    </section>

    <section class="feature-sec">
      <div class="inner">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <figure><img :src="'/storage/uploads/pages/'+page.features_section_image_old"/></figure>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="feature-content">
              <h3>{{page.page_content[0]['features_section'][0]['title']}}</h3>
              <div v-html="page.page_content[0]['features_section'][0]['description']">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="sku-sec">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <h3>{{page.page_content[0]['buy_now_section_title'][0]['title']}}</h3>
          <p v-html="product.product_detail"></p>
            <figure>
             <img :src="'/storage/uploads/products/'+product.product_feature_image"/>
            </figure>
            <!-- <a href="#">Buy Now</a> -->
            <!-- <router-link :to="{name: 'product'}" v-bind:class = "($route.name=='home')?'active':''">Buy Now</router-link> -->
            <router-link :to="`/singleproduct/${product.id}`">{{page.page_content[0]['buy_now_section_title'][0]['title']}}</router-link>
        </div>
        </div>
      </div>
    </section>
    
    <!-- <div class="newsletter-section">
      <div class="container"> 
          <div class="newsletter-icon">
            <img src="assets/frontend/images/mail.png"/>
          </div>
            <h2 class="h2">Subscribe our newsletters</h2>
          
        <form>
          <div class="input-group">
          <input type="email" placeholder="example@gmail.com">
          <span class="input-group__btn">
            <button type="submit" class="btn" name="commit">
            <span>Subscribe</span>
            </button>
          </span>
          </div>
        </form>
      </div>
    </div> -->

  </div>
</template>

<script>
export default {
    data() {
        return {
            page: {
                page_name: '',
                page_title: '',
                page_slug: '',
                page_feature_image: '',
                page_title_background_image: '',
                page_content: [{
                    top_section: [{title:'', description:''}],
                    how_it_work_section_title: [{title:''}],
                    how_it_work_section: [
                        {title:'', description:''},
                        {title:'', description:''},
                        {title:'', description:''}
                    ],
                    features_section: [{title:'', description:''}],
                    buy_now_section_title: [{title:''}],
                    product_ids: [{product_id:0}]
                }],
                page_meta_keywords: '',
                page_meta_desc: '',
                is_active: true,
                page_feature_image_old: '',
                page_title_background_image_old: '',
                how_it_work_section_image1: '',
                how_it_work_section_image1_old: '',
                how_it_work_section_image2: '',
                how_it_work_section_image2_old: '',
                how_it_work_section_image3: '',
                how_it_work_section_image3_old: '',
            },
            product:{},
            product_id_s:0,
            error: null,
            success: null,
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        // Get Home Page Content
        axios.get(`/api/pages/edit/1`)
        .then(response => {
            this.page = response.data.data.page;
            this.page.page_feature_image_old = response.data.data.page.page_feature_image;
            this.page.page_title_background_image_old = response.data.data.page.page_title_background_image;
            this.page.page_content = JSON.parse(response.data.data.page.page_content);
            this.product_id_s=this.page.page_content[0]['product_ids'][0]['product_id'];
            // console.log(this.page.page_content[0]['product_ids'][0]['product_id']);
            console.log(this.product_id_s);

            // Get Products for home only start
            axios.get(`/api/products/edit/`+this.product_id_s)
            .then(response => {
                if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                    this.$router.push('/dashboard');
                }else{
                    this.product = response.data.data.product;
                    // console.log(response.data.data.product);
                }
            })
            .catch(function (error) {
                console.error(error);
            });
            // Get Products for home only end

            this.page.additional_images = JSON.parse(response.data.data.page.additional_images);
            this.page.features_section_image_old = this.page.additional_images.features_section_image;
            this.page.how_it_work_section_image1_old = this.page.additional_images.how_it_work_section_image1;
            this.page.how_it_work_section_image2_old = this.page.additional_images.how_it_work_section_image2;
            this.page.how_it_work_section_image3_old = this.page.additional_images.how_it_work_section_image3;
        })
        .catch(function (error) {
            console.error(error);
        });

        // Get Products for home only
        // axios.defaults.headers.common['Content-Type'] = 'application/json'
        // axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')

        /*axios.get('/api/products/get_products_on_home_page')
        .then(response => {
            if(typeof response.data.message != undefined && response.data.message == "Unauthorized"){
                this.$router.push('/dashboard');
            }else{
                this.products = response.data.data.products;
                // console.log(response.data.data.products);
            }
        })
        .catch(function (error) {
            console.error(error);
        });*/
    },
    methods: {
    }
}
</script>