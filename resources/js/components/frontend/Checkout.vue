//Checkout.vue
<template>
  <div>
    <!-- Site Banner Start -->
    <!-- <section class="site-banner inner-banner" v-bind:style="{ 'backgroundImage': 'url(' + '/storage/uploads/pages/'+ page.page_title_background_image + ')' }"> -->
    <section class="site-banner inner-banner" style="background: url(assets/frontend/images/inner-banner.png);">
        <div class="container">
            <div class="banner-form">
                <h1>Checkout</h1> 
             </div>
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="after-heading-page">
      <div class="container">
      
        <div v-if="user.id==0">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Please Login before adding product to cart.</h1>
                </div>
            </div>
        </div>
        <div v-else>
            <!-- {{cart_products}} -->
            <!-- {{cartItems}} -->
            
            <div v-if="cart_products.length<=0">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Your Cart Is Empty</h1>
                    </div>
                </div>
            </div>
            <div v-else>
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
                <form @submit.prevent="placeOrder">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Fisrt Name</label>
                        <input type="text" v-model="user.name" class="form-control" id="name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" v-model="user.last_name" class="form-control" id="name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" v-model="user.phone_number" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" v-model="user.email" class="form-control" id="email" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="dealership_name" class="form-label">Dealership Name</label>
                        <input type="text" v-model="user.dealership_name" class="form-control" id="dealership_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="njvmc_id" class="form-label">NJVMC ID</label>
                        <input type="text" v-model="user.njvmc_id" class="form-control" id="njvmc_id" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="njvmc_expiration_date" class="form-label">Expiration Date</label>
                        <input type="text" v-model="user.njvmc_expiration_date" class="form-control" id="njvmc_expiration_date" readonly="readonly" required>
                    </div>
                    <div class="col-md-6">
                        <label for="njvmc_fax" class="form-label">Dealership Fax</label>
                        <input type="text" v-model="user.fax" class="form-control" id="njvmc_fax" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="street_address_1" class="form-label">Street Address 1</label>
                        <input type="text" v-model="user.street_address_1" class="form-control" id="street_address_1" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="street_address_2" class="form-label">Street Address 2</label>
                        <input type="text" v-model="user.street_address_2" class="form-control" id="street_address_2" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="zip" class="form-label">Zip Code</label>
                        <input type="text" v-model="user.zip" class="form-control" id="zip" required>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" v-model="user.city" class="form-control" id="city" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="state" class="form-label">State</label>
                        <input type="text" v-model="user.state" class="form-control" id="state" required>
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" v-model="user.country" class="form-control" id="country" required> 
                    </div>
                </div>

                <!-- Ship to a different address Start -->
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="checkbox-field">
                        <input name="different_address" v-model="diff_ship_address.different_address" id="different_address" value="forever" type="checkbox">
                        <span>Ship to a different address?</span>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="checkbox-field">
                        <input name="billing_address" v-model="diff_ship_address.billing_address" id="billing_address" value="forever" type="checkbox">
                        <span>Same as Billing address?</span>
                        </label>
                    </div>
                    <div class="col-md-12">
                        <label class="checkbox-field">
                        <input name="delivery_address" v-model="diff_ship_address.delivery_address" id="delivery_address" value="forever" type="checkbox">
                        <span>Use my default delivery address?</span>
                        </label>
                    </div>
                </div>
                <div v-if="diff_ship_address.different_address">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="diff_ship_first_name" class="form-label">Fisrt Name</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_first_name" class="form-control" id="diff_ship_first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="diff_ship_last_name" class="form-label">Last Name</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_last_name" class="form-control" id="diff_ship_last_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="diff_ship_phone_number" class="form-label">Phone Number</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_phone_number" class="form-control" id="diff_ship_phone_number" required>
                        </div>
                        <div class="col-md-6">
                            <label for="diff_ship_dealership_name" class="form-label">Dealership Name</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_dealership_name" class="form-control" id="diff_ship_dealership_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="diff_ship_street_address_1" class="form-label">Street Address 1</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_street_address_1" class="form-control" id="diff_ship_street_address_1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="diff_ship_street_address_2" class="form-label">Street Address 2</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_street_address_2" class="form-control" id="diff_ship_street_address_2" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="diff_ship_zip" class="form-label">Zip Code</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_zip" class="form-control" id="diff_ship_zip" required>
                        </div>
                        <div class="col-md-6">
                            <label for="diff_ship_city" class="form-label">City</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_city" class="form-control" id="diff_ship_city" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="diff_ship_state" class="form-label">State</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_state" class="form-control" id="diff_ship_state" required>
                        </div>
                        <div class="col-md-6">
                            <label for="diff_ship_country" class="form-label">Country</label>
                            <input type="text" v-model="diff_ship_address.diff_ship_country" class="form-control" id="diff_ship_country" required> 
                        </div>
                    </div>
                </div>
                <!-- Ship to a different address End -->
                
                <!-- PAYMENT METHOD -->
                <div class="form-group row">
                    <div class="col-md-12">
                        <h3>PAYMENT METHOD</h3>
                    </div>
                    <!-- <div class="col-md-12"> -->
                        <!-- <router-link :to="{name: 'placeorder'}" class="btn">Place order now</router-link> -->
                        <!-- <button type="submit" class="btn ">Place Order</button>
                    </div> -->
                </div>
                </form>



                <form @submit.prevent="placeOrder">
                        
                        <div class='form-row row'>
                           <div class='col-xs-12 form-group required'>
                              <label class='control-label'>Name on Card</label>
                              <input class='form-control' size='4' type='text' v-model="stripe_payment.card_name">
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-xs-12 form-group card required'>
                              <label class='control-label'>Card Number</label> 
                              <input autocomplete='off' class='form-control card-number' size='20'
                                 type='text' v-model="stripe_payment.card_number">
                           </div>
                        </div>
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <label class='control-label'>CVC</label> 
                              <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' v-model="stripe_payment.card_cvc">
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Month</label> 
                              <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' v-model="stripe_payment.card_expiry_month">
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Year</label> 
                              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' v-model="stripe_payment.card_expiry_year">
                           </div>
                        </div>
                        <!-- <div class='form-row row'>
                           <div class='col-md-12 error form-group hide'>
                              <div class='alert-danger alert'>Please correct the errors and try
                                 again.
                              </div>
                           </div>
                        </div> -->
                        <div class="row">
                           <div class="col-xs-12">
                              <!-- <button class="btn btn-primary btn-lg btn-block" type="submit"></button> -->
                              <button type="submit" class="btn ">Place Order</button>
                           </div>
                        </div>
                     </form>




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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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
            stripe_payment: {
                card_name: '',
                card_number: '',
                card_cvc: '',
                card_expiry_month: '',
                card_expiry_year: '',
                stripeToken:'',
            },
            cart_products:{},
            cartItems:{},
            cart_subtotal:{},
            // cart_total:{},
            cart_total:0,
            diff_ship_address:{
                different_address:false,
                billing_address:false,
                delivery_address:false,
            },
            error: null,
            success: null,
            transaction_id: '',
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
        placeOrder(){
            /*console.log('order placed');
            var different_address,billing_address,delivery_address;
            if(this.diff_ship_address.different_address){different_address='Y';}else{different_address='N';}*/

           /* if(this.diff_ship_address.billing_address){ billing_address=1; } else{ billing_address=0;}
            if(this.diff_ship_address.delivery_address){ delivery_address=1; } else{ delivery_address=0;}
            console.log(billing_address+' : '+delivery_address);*/
            

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

            // Stripe.setPublishableKey('pk_test_51I9o7AIA2bUojytGonwTjIaMbcauSXSMtsq8hFTG5G5HbmcT80s66u03poAz5TrjeWPIexvnthJqM6bjk9D5KOrl00luWnkDHQ');
            Stripe.setPublishableKey('pk_test_51KHUcLDPEv8s3nVzgbd63ighvLwhtPPgOjf6KhQUJHH2mtjBjKbA2McxeNgo1W0EUtqDVgNqRUUvzaKwDMZT1ZvU00bJkCvFYR');
            var result_token=Stripe.createToken({
                number: existingObj.stripe_payment.card_number,
                cvc: existingObj.stripe_payment.card_cvc,
                exp_month: existingObj.stripe_payment.card_expiry_month,
                exp_year: existingObj.stripe_payment.card_expiry_year
            }, existingObj.stripeResponseHandler);

            console.log(result_token);
            /*if(result_token){
                let data_pay = new FormData();
                data_pay.append('card_name', existingObj.stripe_payment.card_name);
                data_pay.append('card_number', existingObj.stripe_payment.card_number);
                data_pay.append('card_cvc', existingObj.stripe_payment.card_cvc);
                data_pay.append('card_expiry_month', existingObj.stripe_payment.card_expiry_month);
                data_pay.append('card_expiry_year',existingObj.stripe_payment.card_expiry_year);
                data_pay.append('token',existingObj.stripe_payment.token);
                
                axios.post(`/api/stripe`, data_pay, config)
                .then(function (response) {
                    // existingObj.success = res.data.success;
                    if(response.data.success){
                        existingObj.success=response.data.message;this.error=null;
                        console.log('success');
                    }
                    else{
                        existingObj.error=response.data.message;this.success=null;
                        console.log('error');
                    }
                })
                .catch(function (err) {
                    existingObj.output = err;
                });
            }*/
            


            /*if(different_address=='Y'){
                data.append('different_address', 'Y');

                data.append('diff_ship_user_id', this.user.id);
                data.append('diff_ship_first_name', this.diff_ship_address.diff_ship_first_name);
                data.append('diff_ship_last_name', this.diff_ship_address.diff_ship_last_name);
                data.append('diff_ship_phone_number', this.diff_ship_address.diff_ship_phone_number);
                data.append('diff_ship_dealership_name', this.diff_ship_address.diff_ship_dealership_name);
                data.append('diff_ship_street_address_1', this.diff_ship_address.diff_ship_street_address_1);
                data.append('diff_ship_street_address_2', this.diff_ship_address.diff_ship_street_address_2);
                data.append('diff_ship_zip', this.diff_ship_address.diff_ship_zip);
                data.append('diff_ship_city', this.diff_ship_address.diff_ship_city);
                data.append('diff_ship_state', this.diff_ship_address.diff_ship_state);
                data.append('diff_ship_country', this.diff_ship_address.diff_ship_country);

                axios.post('/api/user_addition_addresses/add', data, config)
                .then(function (response) {
                  // existingObj.success = res.data.success;
                  if(response.data.success){


                    if(existingObj.diff_ship_address.billing_address){ billing_address=response.data.useradditionaddress.id; } else{ billing_address=0;}
                    if(existingObj.diff_ship_address.delivery_address){ delivery_address=response.data.useradditionaddress.id; } else{ delivery_address=0;}
                    console.log(billing_address+' : '+delivery_address);
                    if(billing_address>0 || delivery_address>0){
                        console.log('FOr Update');

                        let data1 = new FormData();
                        data1.append('billing_address', billing_address);
                        data1.append('delivery_address', delivery_address);
                        
                        axios.post(`/api/users/updatebillingdefalutaddress/${existingObj.user.id}`, data1, config)
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
                    }
                    else{
                        console.log('Not Update');
                    }

                    console.log(response.data.useradditionaddress.id);
                    existingObj.success=response.data.message;this.error=null;

                  }
                  else{
                    existingObj.error=response.data.message;this.success=null;
                  }
                })
                .catch(function (err) {
                  existingObj.output = err;
                });
            }else{
                console.log("different_address='N'");
            }
            // data.append('name', this.user.name);
            // data.append('last_name', this.user.last_name);
            // data.append('email', this.user.email);
            // data.append('phone_number', this.user.phone_number);
            // data.append('dealership_name', this.user.dealership_name);
            // data.append('njvmc_id', this.user.njvmc_id);
            // data.append('njvmc_expiration_date', this.user.njvmc_expiration_date);
            // data.append('street_address_1', this.user.street_address_1);
            // data.append('street_address_2', this.user.street_address_2);
            // data.append('zip', this.user.zip);
            // data.append('city', this.user.city);
            // data.append('state', this.user.state);
            // data.append('country', this.user.country);
            // data.append('different_address', different_address);
            // data.append('user_image', this.user.user_image);

            let orderdata = new FormData();
            orderdata.append('user_id', this.user.id);
            orderdata.append('user', JSON.stringify(this.user));
            orderdata.append('diff_ship_address', JSON.stringify(this.diff_ship_address));
            orderdata.append('cart_products', JSON.stringify(this.cart_products));
            orderdata.append('cartItems', JSON.stringify(this.cartItems));
            orderdata.append('cart_subtotal', this.cart_subtotal);
            orderdata.append('cart_total', this.cart_total);

            // console.log("Uesr:"+this.user);
            // console.log("diff_ship_address:"+this.diff_ship_address);
            // console.log(this.cart_products);
            // console.log("cartItems:"+this.cartItems);



            axios.post('/api/orders/add', orderdata, config)
                .then(function (response) {
                  // existingObj.success = response.data.success;
                  // if(response.data.success){
                  // }
                  console.log(response.data);
            })
            .catch(function (err) {
              existingObj.output = err;
            });*/

            
        },
        stripeResponseHandler(status, response) {
            if (response.error) {
                // $('.error')
                //     .removeClass('hide')
                //     .find('.alert')
                //     .text(response.error.message);
                //     console.log('error'+response.error);
                this.error=response.error.message;
            } else {
                /* token contains id, last4, and card type */
                this.stripe_payment.stripeToken = response['id'];
                // $form.find('input[type=text]').empty();
                // $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                // $form.get(0).submit();
                console.log('stripeToken'+this.stripe_payment.stripeToken);


                console.log('order placed');
                



                let existingObj = this;
                existingObj.success=null;
                existingObj.error=null;

                const config = {
                  headers: {
                      'content-type': 'multipart/form-data',
                      'Authorization': 'Bearer ' + localStorage.getItem('token'),
                  }
                }
                

                let data_pay = new FormData();
                data_pay.append('card_name', existingObj.stripe_payment.card_name);
                data_pay.append('card_number', existingObj.stripe_payment.card_number);
                data_pay.append('card_cvc', existingObj.stripe_payment.card_cvc);
                data_pay.append('card_expiry_month', existingObj.stripe_payment.card_expiry_month);
                data_pay.append('card_expiry_year',existingObj.stripe_payment.card_expiry_year);
                data_pay.append('stripeToken',existingObj.stripe_payment.stripeToken);
                data_pay.append('cart_total',existingObj.cart_total);
                // data_pay.append('description','New Order on the TempTagNJ');
                
                axios.post(`/api/stripe`, data_pay, config)
                .then(function (response) {
                    // existingObj.success = res.data.success;
                    if(response.data.success){
                        existingObj.success=response.data.message;existingObj.error=null;
                        existingObj.transaction_id=response.data.data.id;
                        console.log('success'+existingObj.transaction_id);

                        // Create Order after payment start
                        var different_address,billing_address,delivery_address;
                        if(existingObj.diff_ship_address.different_address){different_address='Y';}else{different_address='N';}
                        if(different_address=='Y'){
                            console.log('b');
                            let data = new FormData();
                            data.append('user_id', existingObj.user.id);
                            data.append('different_address', 'Y');

                            data.append('diff_ship_user_id', existingObj.user.id);
                            data.append('diff_ship_first_name', existingObj.diff_ship_address.diff_ship_first_name);
                            data.append('diff_ship_last_name', existingObj.diff_ship_address.diff_ship_last_name);
                            data.append('diff_ship_phone_number', existingObj.diff_ship_address.diff_ship_phone_number);
                            data.append('diff_ship_dealership_name', existingObj.diff_ship_address.diff_ship_dealership_name);
                            data.append('diff_ship_street_address_1', existingObj.diff_ship_address.diff_ship_street_address_1);
                            data.append('diff_ship_street_address_2', existingObj.diff_ship_address.diff_ship_street_address_2);
                            data.append('diff_ship_zip', existingObj.diff_ship_address.diff_ship_zip);
                            data.append('diff_ship_city', existingObj.diff_ship_address.diff_ship_city);
                            data.append('diff_ship_state', existingObj.diff_ship_address.diff_ship_state);
                            data.append('diff_ship_country', existingObj.diff_ship_address.diff_ship_country);

                            axios.post('/api/user_addition_addresses/add', data, config)
                            .then(function (response) {
                              // existingObj.success = res.data.success;
                              if(response.data.success){


                                if(existingObj.diff_ship_address.billing_address){ billing_address=response.data.useradditionaddress.id; } else{ billing_address=0;}
                                if(existingObj.diff_ship_address.delivery_address){ delivery_address=response.data.useradditionaddress.id; } else{ delivery_address=0;}
                                console.log(billing_address+' : '+delivery_address);
                                if(billing_address>0 || delivery_address>0){
                                    console.log('FOr Update');

                                    let data1 = new FormData();
                                    data1.append('billing_address', billing_address);
                                    data1.append('delivery_address', delivery_address);
                                    
                                    axios.post(`/api/users/updatebillingdefalutaddress/${existingObj.user.id}`, data1, config)
                                    .then(function (response) {
                                        // existingObj.success = res.data.success;
                                        if(response.data.success){
                                            existingObj.success=response.data.message;existingObj.error=null;
                                            console.log('updatebillingdefalutaddress success');
                                        }
                                        else{
                                            existingObj.error=response.data.message;existingObj.success=null;
                                            console.log('updatebillingdefalutaddress error');
                                        } 
                                    })
                                    .catch(function (err) {
                                        existingObj.output = err;
                                    });
                                }
                                else{
                                    console.log('Not Update');
                                }

                                console.log(response.data.useradditionaddress.id);
                                existingObj.success=response.data.message;existingObj.error=null;
                                console.log('different_address success');
                              }
                              else{
                                existingObj.error=response.data.message;existingObj.success=null;
                                console.log('different_address error');
                              }
                            })
                            .catch(function (err) {
                              existingObj.output = err;
                            });
                        }else{
                            console.log("different_address='N'");
                        }
                        // data.append('name', this.user.name);
                        // data.append('last_name', this.user.last_name);
                        // data.append('email', this.user.email);
                        // data.append('phone_number', this.user.phone_number);
                        // data.append('dealership_name', this.user.dealership_name);
                        // data.append('njvmc_id', this.user.njvmc_id);
                        // data.append('njvmc_expiration_date', this.user.njvmc_expiration_date);
                        // data.append('street_address_1', this.user.street_address_1);
                        // data.append('street_address_2', this.user.street_address_2);
                        // data.append('zip', this.user.zip);
                        // data.append('city', this.user.city);
                        // data.append('state', this.user.state);
                        // data.append('country', this.user.country);
                        // data.append('different_address', different_address);
                        // data.append('user_image', this.user.user_image);
                        console.log('c');
                        let orderdata = new FormData();
                        orderdata.append('user_id', existingObj.user.id);
                        orderdata.append('user', JSON.stringify(existingObj.user));
                        orderdata.append('diff_ship_address', JSON.stringify(existingObj.diff_ship_address));
                        orderdata.append('cart_products', JSON.stringify(existingObj.cart_products));
                        orderdata.append('cartItems', JSON.stringify(existingObj.cartItems));
                        orderdata.append('cart_subtotal', existingObj.cart_subtotal);
                        orderdata.append('cart_total', existingObj.cart_total);
                        orderdata.append('transaction_id', existingObj.transaction_id);

                        // console.log("Uesr:"+this.user);
                        // console.log("diff_ship_address:"+this.diff_ship_address);
                        // console.log(this.cart_products);
                        // console.log("cartItems:"+this.cartItems);



                        axios.post('/api/orders/add', orderdata, config)
                            .then(function (response) {
                              // existingObj.success = response.data.success;existingObj.error=null;
                              // if(response.data.success){
                              // }
                              // console.log(response.data);
                            if(response.data.success){
                                existingObj.success=response.data.message;existingObj.error=null;
                                console.log('oredr success'+response.data.message);
                                // clear cart after order
                                let clear_cart_data = new FormData();
                                clear_cart_data.append('user_id', existingObj.user.id);
                                // console.log(this.page.page_content_multi);return;
                                axios.post('/api/carts/clear', clear_cart_data, config)
                                .then(function (response) {
                                  // existingObj.success = res.data.success;
                                  /*if(response.data.success){
                                    existingObj.success=response.data.message;this.error=null;
                                  }
                                  else{
                                    existingObj.error=response.data.message;this.success=null;
                                  }*/
                                    console.log('redirect checkout 1'); 
                                    existingObj.$router.push('/myorders');
                                    // existingObj.$router.push('/checkout');
                                })
                                .catch(function (err) {
                                  existingObj.output = err;
                                  existingObj.error = err;
                                  // window.scrollTo(0,0);
                                });
                                // clear cart after order
                            }
                            else{
                                existingObj.error=response.data.message;existingObj.success=null;
                                console.log('oredr error'+response.data);
                                // window.scrollTo(0,0);
                            } 
                        })
                        .catch(function (err) {
                          existingObj.output = err;
                          // window.scrollTo(0,0);
                        });
                        // Create Order after payment end

                    }
                    else{
                        existingObj.error=response.data.message;existingObj.success=null;
                        console.log('error');
                    }
                })
                .catch(function (err) {
                    existingObj.output = err;
                    // existingObj.error=err;this.success=null;
                    existingObj.error="Please check the payment details first.";this.success=null;
                });
            }

            console.log('redirect checkout');
            // this.$router.push('/');
            // this.$router.push('myorders');
            // this.$router.push('/checkout');
            window.scrollTo(0,0);
        }

    }
}
</script>