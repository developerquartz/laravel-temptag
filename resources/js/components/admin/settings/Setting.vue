<template>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Basic Info</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <!-- <li class="breadcrumb-item"><router-link :to="{name: 'admin_categories_list'}">Categories</router-link></li> -->
                <li class="breadcrumb-item active">Edit Basic Info</li>
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
                        <div class="card-header">Edit Basic Info</div>
                        <div class="card-body">
                            <form @submit.prevent="updateCustomer">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="contact_info_address" class="form-label">Address</label>
                                        <input id="contact_info_address" type="text" class="form-control" v-model="social_medias.contact_info_address" required autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="contact_info_email" class="form-label">Email</label>
                                        <input id="contact_info_email" type="text" class="form-control" v-model="social_medias.contact_info_email" required autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="contact_info_phone" class="form-label">Phone Number</label>
                                        <input id="contact_info_phone" type="text" class="form-control" v-model="social_medias.contact_info_phone" required autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="social_media_facebook_link" class="form-label">Facebook</label>
                                        <input id="social_media_facebook_link" type="text" class="form-control" v-model="social_medias.social_media_facebook_link" required autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="social_media_linkedin_link" class="form-label">Linkedin</label>
                                        <input id="social_media_linkedin_link" type="text" class="form-control" v-model="social_medias.social_media_linkedin_link" required autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="social_media_instagram_link" class="form-label">Instagram</label>
                                        <input id="social_media_instagram_link" type="text" class="form-control" v-model="social_medias.social_media_instagram_link" required autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="copyright" class="form-label">Copyright</label>
                                        <!-- <input id="copyright" type="text" class="form-control" v-model="social_medias.copyright" required autofocus autocomplete="off"> -->
                                        <tinymce id="copyright" v-model="social_medias.copyright" required></tinymce>
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" v-model="social_medias.is_active" :checked="isChecked(social_medias.is_active)">
                                        <label class="form-check-label" for="is_active">Is Active</label>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

    <!-- /.content -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            social_medias: [],
            error: null,
            success: null,
        }
    },
    mounted() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        // axios.get(`/api/settings/edit/${this.$route.params.id}`)
        axios.get(`/api/settings/edit/1`)
            .then(response => {
                this.social_medias = response.data.data.social_medias;
                console.log(response.data);
            })
            .catch(function (error) {
                console.error(error);
            });
    },
    methods: {
        updateCustomer() {
            // var is_active;
            // if(this.social_medias.is_active){is_active='Y';}else{is_active='N';}
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.post(`/api/settings/update/1`, {
                    contact_info_address: this.social_medias.contact_info_address,
                    contact_info_email: this.social_medias.contact_info_email,
                    contact_info_phone: this.social_medias.contact_info_phone,
                    social_media_facebook_link: this.social_medias.social_media_facebook_link,
                    social_media_linkedin_link: this.social_medias.social_media_linkedin_link,
                    social_media_instagram_link: this.social_medias.social_media_instagram_link,
                    copyright: this.social_medias.copyright,
                    // is_active: is_active
                })
                .then(response => {
                    console.log(response);
                    // this.$router.push({name: 'customers'});
                    if(response.data.success){
                        this.success=response.data.message;
                    }
                    else{
                        this.error=response.data.message;
                    }
                })
                .catch(function (error) {
                    console.error(error);
                });
        },
        isChecked(obj) {
            if(obj=='Y'){return true;}else{return false;}
        }/*,
        onChange(event) {
            var optionText = event.target.value;
            console.log(optionText);
            // if(optionText){ this.category.is_active='Y'; }else{ this.category.is_active='N'; }
            // console.log(this.category.is_active);
        }*/
    }
}
</script>