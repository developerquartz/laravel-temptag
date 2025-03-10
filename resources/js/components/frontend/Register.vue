<template>
  <div>
    <!-- Site Banner Start -->
    <section class="site-banner inner-banner" style="background: url(assets/frontend/images/inner-banner.png);">
        <div class="container">
            <div class="banner-form">
                <h1>Register</h1> 
             </div>
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="register-page">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body register-page">
                <h4 class="card-title">Register</h4>
                <h6 class="card-subtitle mb-2 text-muted">Create your account</h6>

                <div class="alert alert-success" role="alert" v-if="success !== null">
                  {{ success }}
                </div>
                <div class="alert alert-danger" role="alert" v-if="error !== null">
                  {{ error }}
                    <div v-if="validator_message" class="">
                      <div v-for="(v, k) in validator_message" :key="k">
                        <p v-for="error in v" :key="error" class="text-sm">
                          {{ error }}
                        </p>
                      </div>
                    </div>
                </div>
                <hr>
                
                
                <form @submit.prevent="submitForm">
                  <!-- <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="user.name" class="form-control" id="name" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" v-model="user.email" class="form-control" id="email" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" v-model="user.password" class="form-control" id="password" required>
                  </div>
                  <div class="mb-3">
                    <label for="password confirmation" class="form-label">Confirm Password</label>
                    <input type="password" v-model="user.password_confirmation" class="form-control" id="password_confirmation" required>
                  </div> -->
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="name" class="form-label">First Name *</label>
                      <input type="text" v-model="user.name" class="form-control" id="name" required>
                    </div>
                    <div class="col-md-6">
                      <label for="last_name" class="form-label">Last Name *</label>
                      <input type="text" v-model="user.last_name" class="form-control" id="last_name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="fax" class="form-label">Dealership Fax</label>
                      <input type="text" v-model="user.fax" class="form-control" id="fax" >
                    </div>
                    <div class="col-md-6">
                      <label for="phone_number" class="form-label">Dealership Phone *</label>
                      <input type="text" v-model="user.phone_number" class="form-control" id="name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="email" class="form-label">Email address *</label>
                      <input type="email" v-model="user.email" class="form-control" id="email" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="password" class="form-label">Password *</label>
                      <input type="password" v-model="user.password" class="form-control" id="password" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="password confirmation" class="form-label">Confirm Password *</label>
                      <input type="password" v-model="user.password_confirmation" class="form-control" id="password_confirmation" required>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="dealership_name" class="form-label">Dealership Name *</label>
                      <input type="text" v-model="user.dealership_name" class="form-control" id="dealership_name" required>
                    </div>
                  </div>
                  <div class="form-group row">  
                    <div class="col-md-6">
                      <label for="njvmc_id" class="form-label">NJMVC Dealer ID *</label>
                      <input type="text" v-model="user.njvmc_id" class="form-control" id="njvmc_id" required>
                    </div>
                    <div class="col-md-6">
                      <label for="njvmc_expiration_date" class="form-label">NJMVC Expiration Date *</label>
                      <!-- <input type="text" v-model="user.njvmc_expiration_date" class="form-control" id="njvmc_expiration_date" required> -->
                      <!-- <datepicker  v-model="user.njvmc_expiration_date" class="form-control" id="njvmc_expiration_date" required></datepicker> -->
                      <datepicker :format="customFormatter"  input-class="form-control demoDate2" @input="formatDate(user.njvmc_expiration_date)" :value="moment(Date.now()).format('DD-MM-YYYY')"></datepicker>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="street_address_1" class="form-label">Dealership Address *</label>
                      <input type="text" v-model="user.street_address_1" class="form-control" id="street_address_1" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="street_address_2" class="form-label">Dealership Address 2</label>
                      <input type="text" v-model="user.street_address_2" class="form-control" id="street_address_2">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="zip" class="form-label">Dealership Zip Code *</label>
                      <input type="text" v-model="user.zip" class="form-control" id="zip" required>
                    </div>
                    <div class="col-md-6">
                      <label for="city" class="form-label">Dealership City *</label>
                      <input type="text" v-model="user.city" class="form-control" id="city" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="state" class="form-label">Dealership State *</label>
                      <input type="text" v-model="user.state" class="form-control" id="state" required>
                    </div>
                    <div class="col-md-6">
                      <label for="country" class="form-label">Country</label>
                      <input type="text" v-model="user.country" class="form-control" id="country" > 
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                    <div class="col-md-12">
                        <label for="user_image" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" v-on:change="onChange($event, 'user_image')" required>
                        <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <div class="form-check">
                          <input type="checkbox" name="is_active" class="form-check-input" v-model="user.is_active" :checked="isChecked(user.is_active)">
                          <label class="form-check-label" for="is_active">Is Active</label>
                      </div>
                    </div>
                  </div> -->
                  <h3>Ship to</h3>
                  <hr>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <div class="form-check">
                          <input type="checkbox" name="ship_residential_address" class="form-check-input" v-model="user.ship_residential_address" :checked="isChecked(user.ship_residential_address)">
                          <label class="form-check-label" for="ship_residential_address">Is Residential Address</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="ship_first_name" class="form-label">First Name *</label>
                      <input type="text" v-model="user.ship_first_name" class="form-control" id="ship_first_name" required>
                    </div>
                    <div class="col-md-6">
                      <label for="ship_last_name" class="form-label">Last Name *</label>
                      <input type="text" v-model="user.ship_last_name" class="form-control" id="ship_last_name" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="ship_street_address_1" class="form-label">Address *</label>
                      <input type="text" v-model="user.ship_street_address_1" class="form-control" id="ship_street_address_1" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="ship_street_address_2" class="form-label">Address 2</label>
                      <input type="text" v-model="user.ship_street_address_2" class="form-control" id="ship_street_address_2">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="ship_zip" class="form-label">Zip Code *</label>
                      <input type="text" v-model="user.ship_zip" class="form-control" id="ship_zip" required>
                    </div>
                    <div class="col-md-6">
                      <label for="ship_city" class="form-label">City *</label>
                      <input type="text" v-model="user.ship_city" class="form-control" id="ship_city" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="ship_state" class="form-label">State *</label>
                      <input type="text" v-model="user.ship_state" class="form-control" id="ship_state" required>
                    </div>
                    <div class="col-md-6">
                      <label for="ship_phone_number" class="form-label">Phone *</label>
                      <input type="text" v-model="user.ship_phone_number" class="form-control" id="ship_phone_number" required> 
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="ship_email" class="form-label">Email *</label>
                      <input type="text" v-model="user.ship_email" class="form-control" id="ship_email" required>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary">Register</button>
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
import moment from 'moment';
import Datepicker from 'vuejs-datepicker';
export default {
  components: {
    Datepicker
  },
  data() {
      return {
        moment: moment,
        user: {
          name: '',
          last_name: '',
          email: '',
          password: '',
          password_confirmation: '',
          phone_number: '',
          dealership_name: '',
          njvmc_id: '',
          njvmc_expiration_date: '',
          street_address_1: '',
          street_address_2: '',
          zip: '',
          city: '',
          state: '',
          country: '',
          user_image: '',
          is_active: '',

          ship_first_name: '',
          ship_last_name: '',
          ship_phone_number: '',
          ship_dealership_name: '',
          ship_street_address_1: '',
          ship_street_address_2: '',
          ship_zip: '',
          ship_city: '',
          ship_state: '',
          ship_country: '',
          ship_phone_number: '',
          ship_email: '',
          ship_residential_address: false,
        },
        error: null,
        success: null,
        validator_message: null,
      }
    },
    methods: {
      submitForm() {
        /*axios.post('api/register', this.user)
          .then(response => {
            this.$router.push({
              name: 'login',
              params: {
                message: response.data.message
              }
            })
          })
          .catch(error => {
            this.errors = error.response.data.errors;
          });*/
        var is_active;var ship_residential_address;
        if(this.user.is_active){is_active='Y';}else{is_active='N';}
        if(this.user.ship_residential_address){ship_residential_address='Y';}else{ship_residential_address='N';}

        let existingObj = this;
        existingObj.success=null;
        existingObj.error=null;
        existingObj.validator_message=null;

        const config = {
            headers: {
              'content-type': 'multipart/form-data',
              'Authorization': 'Bearer ' + localStorage.getItem('token'),
            }
        }
        let data = new FormData();
        data.append('name', this.user.name);
        data.append('last_name', this.user.last_name);
        data.append('email', this.user.email);
        data.append('password', this.user.password);
        data.append('password_confirmation', this.user.password_confirmation);
        data.append('phone_number', this.user.phone_number);
        data.append('dealership_name', this.user.dealership_name);
        data.append('njvmc_id', this.user.njvmc_id);
        data.append('njvmc_expiration_date', this.user.njvmc_expiration_date);
        data.append('street_address_1', this.user.street_address_1);
        data.append('street_address_2', this.user.street_address_2);
        data.append('zip', this.user.zip);
        data.append('city', this.user.city);
        data.append('state', this.user.state);
        data.append('country', this.user.country);
        data.append('is_active', this.user.is_active);
        data.append('user_image', this.user.user_image);

        data.append('ship_first_name', this.user.ship_first_name);
        data.append('ship_last_name', this.user.ship_last_name);
        data.append('ship_phone_number', this.user.ship_phone_number);
        data.append('ship_dealership_name', this.user.ship_dealership_name);
        data.append('ship_street_address_1', this.user.ship_street_address_1);
        data.append('ship_street_address_2', this.user.ship_street_address_2);
        data.append('ship_zip', this.user.ship_zip);
        data.append('ship_city', this.user.ship_city);
        data.append('ship_state', this.user.ship_state);
        data.append('ship_country', this.user.ship_country);
        data.append('ship_email', this.user.ship_email);
        data.append('ship_residential_address', ship_residential_address);

        axios.post('/api/register', data, config)
        .then(function (response) {
            // existingObj.success = res.data.success;
            if(response.data.success){
              existingObj.success=response.data.message;existingObj.error=null;
              // existingObj.validator_message=response.data.validator_message;
              // console.log(response.data);
            }
            else{
              existingObj.error=response.data.message;existingObj.success=null;
            }
        })
        .catch(function (err) {
            existingObj.output = err;
            existingObj.error="Errors:";
            existingObj.validator_message=err.response.data.validator_message;
        });

        window.scrollTo(0,0);
      },
      isChecked(obj) {
        if(obj=='Y'){return true;}else{return false;}
      },
      customFormatter(date) {
        this.user.njvmc_expiration_date=moment(date).format('DD-MM-YYYY');
        console.log(this.user.njvmc_expiration_date);
        return moment(date).format('DD-MM-YYYY');
      },
      formatDate(val){
        let dateObj = new Date(val);
        this.$emit('input', dateObj);
      }
    }
}
</script>