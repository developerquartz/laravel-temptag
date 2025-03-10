//Contactus.vue
<template>
  <div>
    <!-- Site Banner Start -->
    <section class="site-banner inner-banner" v-bind:style="{ 'backgroundImage': 'url(' + '/storage/uploads/pages/'+ page.page_title_background_image + ')' }">
        <div class="container">
            <div class="banner-form">
                <h1>{{page.page_name}}</h1> 
             </div>
         </div>
    </section>
    <!-- Site Banner End -->
    <section class="get-touch">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h6>Get In Touch</h6>
            <ul>
              <li>
                <span><img :src="'/storage/uploads/pages/'+page.how_it_work_section_image1_old"></span><div v-html="page.page_content[0]['how_it_work_section'][0]['description']"></div>
              </li>
              <li>
                <span><img :src="'/storage/uploads/pages/'+page.how_it_work_section_image2_old"></span><div v-html="page.page_content[0]['how_it_work_section'][1]['description']"></div>
              </li>
              <li>
                <span><img :src="'/storage/uploads/pages/'+page.how_it_work_section_image3_old"></span><div v-html="page.page_content[0]['how_it_work_section'][2]['description']"></div>
              </li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-6">
            <figure>
              <img :src="'/storage/uploads/pages/'+page.page_feature_image_old"/>
            </figure>
          </div>
        </div>
      </div>
    </section>

    <section class="get-touch">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="form-sec">
              <h6>Get In Touch</h6>
              <form @submit.prevent="submitForm">
                <div class="row">
                  <div class="col-md-12">
                    <div class="contact alert alert-success" role="alert" v-if="success !== null">
                      {{ success }}
                    </div>
                    <div class="contact alert alert-danger" role="alert" v-if="error !== null">
                      {{ error }}
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6"><input type="text" v-model="contactforms.first_name" placeholder="First Name *" required></div>
                  <div class="col-md-6 col-sm-6"><input type="text" v-model="contactforms.last_name" placeholder="Last Name *" required></div>
                  <div class="col-md-6 col-sm-6"><input type="email" v-model="contactforms.email" placeholder="Email *" required></div>
                  <div class="col-md-6 col-sm-6"><input type="text" v-model="contactforms.phone" placeholder="Phone"></div>
                  <div class="col-md-12 col-sm-12"><textarea v-model="contactforms.message" placeholder="Message"></textarea></div>
                  <div class="col-md-12 col-sm-12"><button>Submit</button></div>
                </div>
              </form>
            </div>  
          </div>
          <div class="col-md-6 col-sm-6">
            <figure>
              <div v-html="page.page_content[0]['top_section'][0]['description']"></div>    
            </figure>
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
                    how_it_work_section: [
                        {title:'', description:''},
                        {title:'', description:''},
                        {title:'', description:''}
                    ],
                    features_section: [{title:'', description:''}]
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
            contactforms: {
              first_name:'',
              last_name:'',
              email:'',
              phone:'',
              message:'',
              user_id:0,
            },
            error: null,
            success: null,
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/pages/edit/4`)
        .then(response => {
            this.page = response.data.data.page;
            this.page.page_feature_image_old = response.data.data.page.page_feature_image;
            this.page.page_title_background_image_old = response.data.data.page.page_title_background_image;
            this.page.page_content = JSON.parse(response.data.data.page.page_content);
            console.log(this.page.page_feature_image_old);

            this.page.additional_images = JSON.parse(response.data.data.page.additional_images);
            this.page.features_section_image_old = this.page.additional_images.features_section_image;
            this.page.how_it_work_section_image1_old = this.page.additional_images.how_it_work_section_image1;
            this.page.how_it_work_section_image2_old = this.page.additional_images.how_it_work_section_image2;
            this.page.how_it_work_section_image3_old = this.page.additional_images.how_it_work_section_image3;
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
      submitForm() {
        var is_active;
        console.log(this.contactforms);
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.post('/api/contactforms/add', this.contactforms)
        .then(response => {
            console.log(response);
            if(response.data.success){
                this.success=response.data.message;this.error=null;
                $('.contact.alert.alert-success').addClass('new');
            }
            else{
              this.error=response.data.message;this.success=null;
            }
        })
        .catch(function (error) {
            console.error(error);
            this.error=error;this.success=null;
        });

        this.remove_alert();

        // empty text boxs
        this.contactforms.first_name='';
        this.contactforms.last_name='';
        this.contactforms.email='';
        this.contactforms.phone='';
        this.contactforms.message='';
        this.contactforms.user_id=0;
      },
      remove_alert(){
        window.setTimeout(function () {
          $(".contact.alert").fadeTo(1000, 0).slideUp(1000, function () {
              //$(this).alert('close');
          });
          $('.contact.alert.alert-success').removeClass('new');
        }, 2000);
        console.log('contactforms');
      }
    }
}
</script>