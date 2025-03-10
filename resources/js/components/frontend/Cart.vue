//Cart.vue
<template>
  <div >
    <!-- Site Banner Start -->
    <!-- <section class="site-banner inner-banner" v-bind:style="{ 'backgroundImage': 'url(' + '/storage/uploads/pages/'+ page.page_title_background_image + ')' }"> -->
    <section class="site-banner inner-banner" style="background: url(assets/frontend/images/inner-banner.png);">
        <div class="container">
            <div class="banner-form">
                <h1>Cart</h1> 
             </div>
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="after-heading-page">
      <div class="container">
      <div class="row">
        <div class="col-md-12" v-if="user.id==0">
            <h1 class="text-center">Please Login before adding product to cart.</h1>
        </div>
        <div class="for-mobile" v-else>
            <!-- {{cart_products}} -->
            <!-- {{cartItems}} -->
            <div class="col-md-12" v-if="cart_products.length<=0">
                <h1 class="text-center">Your Cart Is Empty</h1>
            </div>
            <div class="col-md-12" v-else>
                <table class="table table-bordered cart-page">
                    <tr>
                        <th>Order Number</th>
                        <th>Name</th>
                        <!-- <th>Single Item Price</th> -->
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                   </tr>
                    <tr v-for="cart_product in cart_products" class="cart_product-row">
                        <!-- <td @click="" style="cursor: pointer">{{cart_product.product_name}}</td>
                        <td @click="" style="cursor: pointer"></td> -->
                        <td>{{cart_product.id}}</td>
                        <td>{{cart_product.name}}</td>
                        <!-- <td>{{cart_product.price}}</td> -->
                        <td>
                            <!-- {{cart_product}} -->
                            <!-- <select v-model="cart_product.quantity">
                                <option v-for="n in 10" :value="n">{{ n }}</option>
                            </select> -->
                            <div class="quantity">
                                <div class="quantity-input">
                                    <!-- <button class="btn btn-increase" v-on:click="cartUpdate($event, 'decrease',user.id,cart_product.id)">-</button>
                                    <input :class="[`cart_product_quantity_${cart_product.id}`]" type="text" v-model="cart_product.quantity" pattern="[0-9]*">
                                    <button class="btn btn-increase" v-on:click="cartUpdate($event, 'increase',user.id,cart_product.id)">+</button> -->
                                    {{cart_product.quantity}}
                                </div>
                            </div>
                        </td>
                        <td>{{cart_total_ori=cart_product.getPriceSum}}</td>
                        <td><button class="btn btn-increase " v-on:click="cartRemove($event,user.id,cart_product.id)">Remove</button></td>
                    </tr>
                    <tr v-if="this.applypromocode_type==='persentage' || this.applypromocode_type==='fixed' ">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Coupon Discount:</td>
                        <td>
                            <div v-if="this.applypromocode_type==='persentage'">
                                {{(cart_total_ori*applyreward/100)}}$
                            </div>
                            <div v-else>
                                {{applyreward}}$
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Sub Total:</td>
                        <td>{{cart_subtotal}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total:</td>
                        <td>{{cart_total}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn remove-btn" v-on:click="cartRemoveAll($event,user.id)">Remove All</button>
                        </td>
                    </tr>
                  
                </table>
                  <div class="coupen-cart">
                    <div class="row">
                         <div class="col-md-6 col-6">
                            <div class="">
                                <div class="col-md-12">
                                    <div class="alert alert-success" role="alert" v-if="success !== null">
                                    {{ success }}
                                    </div>
                                    <div class="alert alert-danger" role="alert" v-if="error !== null">
                                    {{ error }}
                                    </div>
                                </div>
                            </div>
                            <form class="appy-form" @submit.prevent="submitApplyCoupon" enctype="multipart/form-data">
                                <div class="quantity-sec">
                                  <input type="text" name="coupon_code" v-model="coupon_code" placeholder="Coupen Code">
                                  <div class="add-to-cart">
                                    <button type="submit">Apply</button>
                                  </div>
                                </div>
                            </form>    
                        </div>
                         <div class="col-md-6 col-6">
                            <router-link :to="{name: 'checkout'}" class="checkout-btn">Checkout</router-link>
                        </div>
                    </div>
                </div>
                    
            </div>
            
        </div>
      </div>

      <!-- <div class="row">
        <div class="col-md-12">
            
        </div>
      </div> -->

      </div>
    </section>
    
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
            cart_products:{},
            cartItems:{},
            cart_subtotal:{},
            cart_total:{},
            cart_total:0,
            cart_total_ori:0,
            coupon_code:'',
            applypromocode_type:'',
            applycoupon_code:'',
            applyreward:0,
            applydiscount:0,
            error: null,
            success: null,
        }
    },
    created() {
        this.setUser();

        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        /*axios.get(`/api/pages/edit/6`)
        .then(response => {
            this.page = response.data.data.page;
            this.page.page_feature_image_old = response.data.data.page.page_feature_image;
            this.page.page_title_background_image_old = response.data.data.page.page_title_background_image;
            console.log(this.page.page_feature_image_old);
        })
        .catch(function (error) {
            console.error(error);
        });*/
        
        // Get Cart Items Start
        console.log('getCart');
        this.getCart();
        console.log('getSubTotal');
        this.getSubTotal();
        console.log('getTotal');
        this.getTotal();
        // Get Cart Items End
    },
    mounted(){
        
    },
    methods: {
        setUser() {
            if(localStorage.getItem('user')){
                this.user = JSON.parse(localStorage.getItem('user'));
                this.isLoggedIn = localStorage.getItem('token') != null;
            }
        },
        getCart(){
            // Get Cart Items Start
            axios.get(`/api/carts/cart`,{
              params: {
                user_id: this.user.id,
              }
            })
            .then(response => {
                this.cart_products = response.data.data.cart_products;
                this.cartItems = response.data.data.cartItems;
                // console.log(response.data.data);
                // console.log(this.cart_products);
            })
            .catch(function (error) {
                console.error(error);
            });
            // Get Cart Items End
        },
        cartUpdate(e,value,user_id,id){
            // console.log(value);
            // console.log(e);
            // console.log(user_id);
            // console.log(id);
            // this.cart_product.quantity=cart_product.quantity+1;
            var cart_product_quantity=parseInt($('.cart_product_quantity_'+id).val());
            var cart_product_quantity_updated=0;
            if(value=='increase'){
                $('.cart_product_quantity_'+id).val(cart_product_quantity+1);
                cart_product_quantity_updated=cart_product_quantity+1; 
            }
            else{
                $('.cart_product_quantity_'+id).val(cart_product_quantity-1);
                cart_product_quantity_updated=cart_product_quantity-1;
            }
            
            let existingObj = this;
            existingObj.success=null;
            existingObj.error=null;

            if(cart_product_quantity_updated>=1){
                // Update Cart
                const config = {
                  headers: {
                      'content-type': 'multipart/form-data',
                      'Authorization': 'Bearer ' + localStorage.getItem('token'),
                  }
                }

                let data = new FormData();
                data.append('user_id', user_id);
                data.append('id', id);
                data.append('quantity', cart_product_quantity_updated);
                // console.log(this.page.page_content_multi);return;
                axios.post('/api/carts/update-cart', data, config)
                .then(function (response) {
                  // existingObj.success = res.data.success;
                  if(response.data.success){
                    existingObj.success=response.data.message;this.error=null;
                  }
                  else{
                    existingObj.error=response.data.message;this.success=null;
                  }
                  this.getCart();
                })
                .catch(function (err) {
                  existingObj.output = err;
                });
            }
            else{
                existingObj.error="The minimum quantity of cart item is 1.";this.success=null;
            }
            // this.$router.go()   // Refreshes page
            // this.$forceUpdate();
            location.reload(true);
            window.scrollTo(0,0);
        },
        cartRemove(e,user_id,id){
            // console.log(e);
            // console.log(user_id);
            // console.log(id);

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
            data.append('user_id', user_id);
            data.append('id', id);
            // console.log(this.page.page_content_multi);return;
            axios.post('/api/carts/remove', data, config)
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
            // this.$router.go()   // Refreshes page
            // this.$forceUpdate();
            location.reload(true);
            window.scrollTo(0,0);
        },
        cartRemoveAll(e,user_id){
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
            data.append('user_id', user_id);
            // console.log(this.page.page_content_multi);return;
            axios.post('/api/carts/clear', data, config)
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
            // this.$router.go()   // Refreshes page
            // this.$forceUpdate();
            location.reload(true);
            window.scrollTo(0,0);
        },
        getSubTotal(){
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
            // console.log(this.page.page_content_multi);return;
            axios.post('/api/carts/gettotal', data, config)
            .then(function (response) {
              // existingObj.success = res.data.success;
             if(response.data.success){
                existingObj.cart_subtotal=response.data.data;
                // console.log(existingObj.cart_subtotal);
              }
              else{
                console.log("Error");
              }
              console.log(response.data.data);
            })
            .catch(function (err) {
              existingObj.output = err;
            });
        },
        getTotal(){
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
            // console.log(this.page.page_content_multi);return;
            axios.post('/api/carts/gettotal', data, config)
            .then(function (response) {
              // existingObj.success = res.data.success;
             if(response.data.success){
                existingObj.cart_total=response.data.data;
                // existingObj.cart_total_ori=response.data.data;
                // console.log(existingObj.cart_total);
              }
              else{
                console.log("Error");
              }
              console.log(response.data.data);
            })
            .catch(function (err) {
              existingObj.output = err;
            });
        },
        submitApplyCoupon(e) {
            e.preventDefault();
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
            data.append('coupon_code', this.coupon_code);
            axios.post('/api/promocodes/apply', data, config)
            .then(function (response) {
                // existingObj.success = res.data.success;
                if(response.data.success){
                    console.log(response.data.data);
                    console.log(response.data.data.coupon_code);
                    console.log(response.data.data.promocode_type);
                    console.log(response.data.data.reward);
                    existingObj.applypromocode_type=response.data.data.promocode_type;
                    existingObj.applyreward=response.data.data.reward;
                    existingObj.applycoupon_code=response.data.data.coupon_code;
                    // console.log("b"+response.data.data.promocode.code);
                    existingObj.success=response.data.message;this.error=null;
                    // Get Cart Items Start
                    console.log('getCart');
                    this.getCart();
                    console.log('getSubTotal');
                    this.getSubTotal();
                    console.log('getTotal');
                    this.getTotal();
                    // Get Cart Items End
                }
                else{
                    existingObj.error=response.data.message;this.success=null;
                }
            })
            .catch(function (err) {
                existingObj.output = err;
            });

            // Get Cart Items Start
            console.log('getCart');
            this.getCart();
            console.log('getSubTotal');
            this.getSubTotal();
            console.log('getTotal');
            this.getTotal();
            // Get Cart Items End
        }
    }
}
</script>