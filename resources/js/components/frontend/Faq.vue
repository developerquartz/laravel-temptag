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
    <section class="faq-page">
      <div class="container">
      <div class="row">
        <div v-html="page.page_content"></div>
        <!-- <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              How do I set up an account?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                TBD
              </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              I forgot my password, what can I do?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body"> 
                TBD
              </div>
            </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              How can I edit my account information?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                TBD
              </div>
            </div>
            </div>
            
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingfour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
              Why do I need to create an account to place an order?
              </button>
            </h2>
            <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                Only registered dealerships are able to purchase temptags. We must qualify that your company is a registered dealership before we can ship any orders.
              </div>
            </div>
            </div>
          
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingfive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
              Who do I contact if I have a question about my recent order?
              </button>
            </h2>
            <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                Please send us an email at finishedproductllc@gmail.com or call us at (xxx) xxx-xxxx and one of our representatives will get back to you.
              </div>
            </div>
            </div>
          
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingfive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
              How can I cancel my order?
              </button>
            </h2>
            <div id="flush-collapsesix" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                TBD
              </div>
            </div>
            </div>
          
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingfive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
              What happens if my product is damaged or defective?
              </button>
            </h2>
            <div id="flush-collapseseven" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                Please send us an email at finishedproductllc@gmail.com or call us at (xxx) xxx-xxxx and one of our representatives will get back to you.
              </div>
            </div>
            </div>
          
            <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingfive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseeight" aria-expanded="false" aria-controls="flush-collapseeight">
              How can I learn more about the State of New Jersey Motor Vehicle Commission Temporary Vehicle Tags (Temp Tag) program?
              </button>
            </h2>
            <div id="flush-collapseeight" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                Please visit https://www.njportal.com/MVC/TempTags/Default.aspx for more information on the State of New Jersey’s program
              </div>
            </div>
            </div>
            
          </div> -->
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
        axios.get(`/api/pages/edit/3`)
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