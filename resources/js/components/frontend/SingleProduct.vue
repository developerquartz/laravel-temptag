//Product.vue
<template>
  <div>
    <!-- Site Banner Start -->
    <section class="site-banner inner-banner" v-bind:style="{ 'backgroundImage': 'url(' + '/storage/uploads/pages/'+ page.page_title_background_image + ')' }">
      <div class="container">
        <div class="banner-form">
          <h1>{{product.product_name}}</h1>
        </div>
      </div>
    </section>

    <section class="product-sec">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <figure><img :src="'/storage/uploads/products/'+product.product_feature_image"/></figure>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="">
            <div class="col-md-6 offset-3">
              <div class="alert alert-success" role="alert" v-if="success !== null">
                {{ success }}
              </div>
              <div class="alert alert-danger" role="alert" v-if="error !== null">
                {{ error }}
              </div>
            </div>
          </div>
          <div class="content-details-sec">
            <h3>{{product.product_name}} - {{cart_product.cart_quantity}} Count</h3>
            <div class="price-sec">
              <!-- <h4>{{cart_product.currency_type}}{{cart_product.cart_price}}</h4> -->
              <h4>${{cart_product.cart_price}}</h4>
              <h6> <span>.</span> In Stock</h6>
            </div>
            <form @submit.prevent="submitFormAddCart" enctype="multipart/form-data">
            <div class="quantity-sec">
              <!-- <div class="qtydiv">
                <label for="Quantity-product-template">Quantity</label>
                <select v-model="cart_product.cart_quantity">
                   <option v-for="n in product.product_quantity_for_sale" :value="n">{{ n }}</option>
                </select>
              </div> -->
              <!-- {{cart_product.cart_quantity}}
              {{cart_product.cart_price}} -->
              <div class="qtydiv">
                <label for="Quantity-product-template">Quantity</label>
                <select v-model="cart_product.cart_quantity" @change="onChangeCartProduct($event)">
                   <option v-for="product_price_json_1 in product_price_json" :value=" product_price_json_1.quantity" :data-id="product_price_json_1.price" :data-currency_type="product_price_json_1.currency_type">{{ product_price_json_1.quantity }}</option>
                </select>
              </div>
              <div class="add-to-cart">
                <!-- <input type="text" name="product_id" v-model="cart_product.id" value="product.id">
                <input type="text" name="product_name" v-model="cart_product.product_name" value="product.product_name"> -->
                <button type="submit">Add To Cart</button>
              </div>
            </div>
            </form>
            <div class="accordion" id="accordionExample">
              <h4>Product detail</h4>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">DESCRIPTION & DETAILS</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body" v-html="product.product_detail">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="feature-sec product-page">
      <div class="inner">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="feature-content">
              <h3>Features</h3>
              <div v-html="product.product_features"></div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <figure><img :src="'/storage/uploads/products/'+product.additional_images.additional_image1"></figure>
            
          </div>
        </div>
      </div>
    </section>

    <section class="tab-sec">
      <div class="container">
        <div class="nav-pill-main-div mx-auto">
          <div class="customize_solution pt-3">
            <ul class="tabs nav nav-justified">
              <li class="tab-link current nav-pill mt-2" href="tab-1">
              <span class="ease-effect">Product Description </span> </li>
              <li class="tab-link nav-pill mt-2" href="tab-2">
              <span class="ease-effect">Specifications</span>
              </li>
            </ul>
            <div class="tab-content current" id="tab-1" v-html="product.product_description">
            </div>
            <div class="tab-content" id="tab-2" v-html="product.product_specification">
              
            </div>
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
      user:{id:0,},
      isLoggedIn:{},
      page: {
        page_name: '',
        page_title: '',
        page_slug: '',
        page_feature_image: '',
        page_title_background_image: '',
        page_content: '',
        page_meta_keywords: '',
        page_meta_desc: '',
        is_active: true,
        page_feature_image_old: '',
        page_title_background_image_old: '',
      },
      product:{
        category_id: '',
        id: '',
        product_name: '',
        product_quantity: '',
        product_price: '',
        product_quantity_for_sale: '',
        product_available: '',
        product_description: '',
        product_specification: '',
        product_features: '',
        product_feature_image: '',
        product_feature_image_old: '',
        on_home_page: false,
        is_active: true,
        additional_images: {additional_image1:'',additional_image2:'',},
        additional_image1_old: '',},
      // additional_images:{},
      cart_product: {
        cart_quantity:0,
        cart_price:0,
        currency_type:'$',
      },
      product_price_json:[{quantity:'',price:''}],
      error: null,
      success: null,
      // cart_products:{},
      // cartItems:{},
      // cartItems_count:0,
    }
  },
  mounted () {
    $('ul.tabs li').click(function () {
      // console.log('hello');
      var tab_id = $(this).attr('href');

      $('ul.tabs li').removeClass('current');
      $('.tab-content').removeClass('current');

      $(this).addClass('current');
      $("#" + tab_id).addClass('current');
    })

    this.setUser();
    console.log("ssss"+this.user);
  },
  created() {
    axios.defaults.headers.common['Content-Type'] = 'application/json'
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
    axios.get(`/api/pages/edit/1`)
    .then(response => {
        this.page = response.data.data.page;
        this.page.page_feature_image_old = response.data.data.page.page_feature_image;
        this.page.page_title_background_image_old = response.data.data.page.page_title_background_image;
        console.log(this.page.page_feature_image_old);
    })
    .catch(function (error) {
        console.error(error);
    });

    // Get single product
    axios.get(`/api/products/edit/${this.$route.params.id}`)
    .then(response => {
        this.product = response.data.data.product;
        this.product.product_feature_image_old = response.data.data.product.product_feature_image;
        
        this.product_price_json = JSON.parse(response.data.data.product.product_price_json);
        this.cart_product.cart_quantity=this.product_price_json[0].quantity;
        this.cart_product.cart_price=this.product_price_json[0].price;
        this.cart_product.currency_type=this.product_price_json[0].currency_type;
        console.log(this.cart_product);
        this.product.additional_images = JSON.parse(response.data.data.product.additional_images);
        this.product.additional_image1_old = this.product.additional_images.additional_image1;

        if(response.data.data.product.on_home_page=='N'){this.product.on_home_page=false;}
        console.log(this.product.additional_image1_old);
    })
    .catch(function (error) {
        console.error(error);
    });

  },
  methods: {
    setUser() {
      if(localStorage.getItem('user')){
        this.user = JSON.parse(localStorage.getItem('user'))
        this.isLoggedIn = localStorage.getItem('token') != null  
      }
    },
    onChangeCartProduct(event) {
      var selectedOption = event.target.selectedOptions[0];
      if(selectedOption){
        // console.log(selectedOption.text);
        // console.log(selectedOption.value);
        this.cart_product.cart_quantity=selectedOption.value;
        this.cart_product.cart_price=selectedOption.dataset.id;
        this.cart_product.currency_type=selectedOption.dataset.currency_type;
        // console.log(selectedOption);
        // console.log(selectedOption.dataset.id);
      }
    },
    submitFormAddCart(e) {
      e.preventDefault();
      if(this.user==null){this.user.id=0;}
      // console.log(this.user.id);
      // console.log(this.cart_product.cart_quantity);
      // console.log(this.product.id);
      // console.log(this.product.product_name);
      console.log(this.cart_product);

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
      data.append('user_id', this.user.id);
      data.append('id', this.product.id);
      data.append('name', this.product.product_name);
      data.append('price', (this.cart_product.cart_price/this.cart_product.cart_quantity));
      data.append('quantity', this.cart_product.cart_quantity);
      // console.log(this.page.page_content_multi);return;
      axios.post('/api/carts/cart', data, config)
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

      /*if(this.isLoggedIn){
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
        })
        .catch(function (error) {
            console.error(error);
        });
        // Get Cart Items End
      }*/
      console.log('redirect');
      // this.$router.push('/cart');
    this.$router.push({
    path: '/singleproduct/1',
    query: { type: 2 },
    });
      window.scrollTo(0,0);
    }
  }
}
</script>