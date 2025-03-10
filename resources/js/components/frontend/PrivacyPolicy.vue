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
    <section class="privacy-page">
      <div class="container">
      <div class="row">
        <div v-html="page.page_content"></div>
      </div>
      </div>
    </section>
    
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
                page_content: '',
                page_meta_keywords: '',
                page_meta_desc: '',
                is_active: true,
                page_feature_image_old: '',
                page_title_background_image_old: '',
            },
            error: null,
            success: null,
        }
    },
    created() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/pages/edit/6`)
        .then(response => {
            this.page = response.data.data.page;
            this.page.page_feature_image_old = response.data.data.page.page_feature_image;
            this.page.page_title_background_image_old = response.data.data.page.page_title_background_image;
            console.log(this.page.page_feature_image_old);
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {

    }
}
</script>