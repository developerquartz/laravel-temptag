//Aboutus.vue
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


    <section class="Lorem-it-work">
        <div class="container">
            
          <h2>{{page.page_content[0]['top_section'][0]['title']}}</h2>
          
          <div v-html="page.page_content[0]['top_section'][0]['description']"></div>
        </div>
    </section>

    <section class="feature-sec aenean-sec">
      <div class="inner">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <figure><img :src="'/storage/uploads/pages/'+page.features_section_image_old"/></figure>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="feature-content">
              <h3 @click="redirect_to_url(page.page_content[0]['features_section'][0]['title_a_link'])"><a href="">{{page.page_content[0]['features_section'][0]['title']}}</a></h3>
                
                <div v-html="page.page_content[0]['features_section'][0]['description']"></div>
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
                    features_section: [{title:'',title_a_link:'', description:''}]
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
            error: null,
            success: null,
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/pages/edit/2`)
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

        redirect_to_url(url){
            window.open(url, '_blank');
            console.log('im called');
        }

    }
}
</script>