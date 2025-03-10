<template>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="alert alert-success" role="alert" v-if="success !== null">
                    {{ success }}
                </div>
                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                <div class="card card-info">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        <form @submit.prevent="updateCustomer">
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
                              <div class="col-md-12">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" v-model="user.old_password" class="form-control" id="old_password" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" v-model="user.password" class="form-control" id="password" required>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <label for="password confirmation" class="form-label">Confirm Password</label>
                                <input type="password" v-model="user.password_confirmation" class="form-control" id="password_confirmation" required>
                              </div>
                            </div>

                            <!-- <div class="form-group row">
                              <div class="col-md-12">
                                <label for="dealership_name" class="form-label">Dealership Name</label>
                                <input type="text" v-model="user.dealership_name" class="form-control" id="dealership_name" required>
                              </div>
                            </div>
                            <div class="form-group row">  
                              <div class="col-md-6">
                                <label for="njvmc_id" class="form-label">NJVMC ID</label>
                                <input type="text" v-model="user.njvmc_id" class="form-control" id="njvmc_id" required>
                              </div>
                              <div class="col-md-6">
                                <label for="njvmc_expiration_date" class="form-label">Expiration Date</label>
                                <datepicker :format="customFormatter" :disabledDates="disabledDates" input-class="form-control demoDate2" @input="formatDate(user.njvmc_expiration_date)" :value="moment(Date.now()).format('DD-MM-YYYY')"></datepicker>
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

                            

                            <div class="form-group row">
                              <div class="col-md-12">
                                <div class="form-check">
                                    <input type="checkbox" name="is_active" class="form-check-input" v-model="user.is_active" :checked="isChecked(user.is_active)">
                                    <label class="form-check-label" for="is_active">Is Active</label>
                                </div>
                              </div>
                            </div> -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <img v-if="user.user_image_old!='' && user.user_image_old != 'NULL'" :src="'/storage/uploads/users/'+user.user_image_old" width="200px">
                                    <img v-else :src="'/assets/admin/images/no-image-available_1.png'" width="200px">
                                </div>
                              <div class="col-md-12">
                                  <label for="user_image" class="form-label">Profile Image</label>
                                  <input type="file" class="form-control" v-on:change="onChange($event, 'user_image')" >
                                  <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                              </div>
                            </div>
                            <!-- <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4"> -->
                            <button type="submit" class="btn btn-info">Update</button>
                                <!-- </div>
                            </div> -->
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row justify-content-center">
            <div class="col-md-6"> 
                
                <div class="alert alert-success" role="alert" v-if="success !== null">
                    {{ success }}
                </div>
                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                
            </div>
        </div> -->
        
    </div>
    </section>

    <!-- /.content -->
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
                /*dealership_name: '',
                njvmc_id: '',
                njvmc_expiration_date: '',
                street_address_1: '',
                street_address_2: '',
                zip: '',
                city: '',
                state: '',
                country: '',*/
                user_image: '',
                user_image_old: '',
                old_password: '',
                is_active: true,
            },
            error: null,
            success: null,
            disabledDates: {
                // to: new Date(Date.now() - 8640000)
            },
        }
    },
    created(){
        // this.customFormatter(Date.now());
        // this.user.njvmc_expiration_date=this.formatDate(moment(Date.now()).format('DD-MM-YYYY'));
    },
    mounted() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/users/edit/${this.$route.params.id}`)
        .then(response => {
            this.user = response.data.user;
            this.user.user_image_old = response.data.user.user_image;
            this.user.password = response.data.user.plain_password;
            this.user.password_confirmation = response.data.user.plain_password;
            console.log(this.user.user_image_old);
        })
        .catch(function (error) {
            console.error(error);
        });

        // this.njvmc_expiration_date = "2018-09-08";
        // this.user.njvmc_expiration_date=moment(Date.now()).format('DD-MM-YYYY');

    },
    methods: {
        onChange(e,column_name) {
            if(column_name=="user_image"){
                this.user.user_image = e.target.files[0];
                console.log(this.user.user_image);
            }
        },
        updateCustomer() {
            var is_active;
            if(this.user.is_active){is_active='Y';}else{is_active='N';}
            /*axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.post(`/api/users/update/${this.$route.params.id}`, {
                name: this.user.name,
                email: this.user.email,
                password: this.user.password,
                is_active: is_active
            })
            .then(response => {
                console.log(response);
                // this.$router.push({name: 'customers'});
                if(response.data.success){
                    this.success=response.data.message;
                }
                else{
                    this.error=response.data.error;
                }
            })
            .catch(function (error) {
                console.error(error);
            });*/
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
            data.append('name', this.user.name);
            data.append('last_name', this.user.last_name);
            data.append('email', this.user.email);
            data.append('password', this.user.password);
            data.append('password_confirmation', this.user.password_confirmation);
            data.append('phone_number', this.user.phone_number);
            /*data.append('dealership_name', this.user.dealership_name);
            data.append('njvmc_id', this.user.njvmc_id);
            data.append('njvmc_expiration_date', this.user.njvmc_expiration_date);
            data.append('street_address_1', this.user.street_address_1);
            data.append('street_address_2', this.user.street_address_2);
            data.append('zip', this.user.zip);
            data.append('city', this.user.city);
            data.append('state', this.user.state);
            data.append('country', this.user.country);
            data.append('is_active', is_active);*/
            data.append('user_image', this.user.user_image);
            data.append('user_image_old', this.user.user_image);
            
            data.append('old_password', this.user.old_password);

            axios.post(`/api/users/updateadminprofile/${this.$route.params.id}`, data, config)
            .then(function (response) {
                // existingObj.success = res.data.success;
                if(response.data.success){
                    existingObj.success=response.data.message;this.error=null;
                }
                else{
                    existingObj.error=response.data.message;this.success=null;
                }
                console.log(response);
            })
            .catch(function (err) {
                existingObj.output = err;
            });

            window.scrollTo(0,0);
        },
        isChecked(obj) {
            if(obj=='Y'){return true;}else{return false;}
        },
        /*customDateFormat() {
                return moment(this.due_date).format("MM-DD-YYYY")
        },*/
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