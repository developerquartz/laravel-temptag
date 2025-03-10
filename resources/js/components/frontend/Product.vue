//Product.vue
<template>
  <div>
    <!-- Site Banner Start -->
    <section class="site-banner inner-banner" style="background: url(assets/frontend/images/inner-banner.png);">
      <div class="container">
        <div class="banner-form">
          <h1>PM SKU: TEMPTAG25</h1> 
        </div>
      </div>
    </section>

    <section class="product-sec">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <figure><img src="assets/frontend/images/food.png"></figure>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="content-details-sec">
            <h3>(PM SKU: TEMPTAG25) - New Jersey Temporary License Plates - 25 Count</h3>
            <div class="price-sec">
              <h4>$23.00</h4>
              <h6> <span>.</span> In Stock</h6>
            </div>
            <div class="quantity-sec">
              <div class="qtydiv">
                <label for="Quantity-product-template">Quantity</label>
                <select>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                </select>
              </div>
              <div class="add-to-cart">
                <button>Add To Cart</button>
              </div>
            </div>
            <div class="accordion" id="accordionExample">
              <h4>Product detail</h4>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">DESCRIPTION & DETAILS</button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
              <p>- 8.5" x 11"</p>
              <p>- Weather resistant (cold, hot, wet, snow, wind, and humidity)</p>
              <p>- Tear proof</p>
              <p>- Chemical (oil) resistant</p>
              <p>- UV light/fade resistant</p>
              <p>- Matte finish (to eliminate glossy reflection at night)</p>
              <p>-Dry Toner/ Laser Printer Compatible</p>
              <p>The paper will be drilled and perforated as follows:</p>
              <ul>
                <li>Two (2) holes at the top of the paper to allow for adherence to the rear plate of the vehicle </li>
                <li>Perforated lengthwise across the paper in landscape mode to separate the template from the rest of the paper </li>
                <li>Perforated perpendicular to the lengthwise perforation to create the temporary vehicle registration from the dealer copy of the tag. </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <figure><img src="assets/frontend/images/product.png"></figure>
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
            <div class="tab-content current" id="tab-1">
              <p class="pb-20">
              Paper Mart Inc. is approved by the State of New Jersey Motor Vehicle Commission (NJMVC) and NIC to be an authorized vendor of the temporary license plate paper used for the eTemp Registration Tag system. We have the paper that meets all of the specifications of the NJMVC and NIC.
              </p>
            </div>
            <div class="tab-content" id="tab-2">
              <p class="pb-20">
              Paper Mart Inc. is approved by the State of New 
              </p>
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
  mounted () {
    $('ul.tabs li').click(function () {
      // console.log('hello');
      var tab_id = $(this).attr('href');

      $('ul.tabs li').removeClass('current');
      $('.tab-content').removeClass('current');

      $(this).addClass('current');
      $("#" + tab_id).addClass('current');
    })
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
  },
  methods: {

  }
}
</script>