<template>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit About Us Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'admin_pages_list'}">Pages</router-link></li>
                <li class="breadcrumb-item active">Edit About Us Page</li>
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
                        <div class="card-header">Edit About Us Page</div>
                        <div class="card-body">
                            <form @submit.prevent="updateCustomer">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="page_name" class="form-label">Name</label>
                                        <input id="page_name" type="text" class="form-control" v-model="page.page_name" required autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="page_title" class="form-label">Title</label>
                                        <input id="page_title" type="text" class="form-control" v-model="page.page_title" required autofocus autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="page_meta_keywords" class="form-label">Meta Keywords</label>
                                        <input type="text" v-model="page.page_meta_keywords" class="form-control" id="page_meta_keywords" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="page_meta_desc" class="form-label">Meta Description</label>
                                        <input type="text" v-model="page.page_meta_desc" class="form-control" id="page_meta_desc" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="page_content" class="form-label">Content</label>
                                        <tinymce id="page_content" v-model="page.page_content" required></tinymce>
                                    </div>
                                </div> -->
                                
                                <!-- How It Work Start-->
                                <!-- <div class="form-group row">
                                    <table>   
                                        <tr class="tablePurchase--td"  v-for="(item, index) in page.how_it_work" :key="index">
                                            <td><input type="text" class="table-quantity" v-model="page.how_it_work[index].title"
                                            /></td>
                                            <td><input type="text" class="table-quantity" v-model="page.how_it_work[index].content"
                                            /></td>
                                            <td><input type="text" class="table-quantity" v-model="page.how_it_work[index].image"
                                            /></td>
                                        </tr>
                                    </table>
                                </div> -->
                                <!-- How It Work End-->

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <img v-if="page.page_title_background_image_old!='' && page.page_title_background_image_old != 'NULL'" :src="'/storage/uploads/pages/'+page.page_title_background_image_old" width="200px">
                                        <img v-else :src="'/assets/admin/images/no-image-available_1.png'" width="200px">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="page_title_background_image" class="form-label">Background Image</label>
                                        <input type="file" class="form-control" v-on:change="onChange($event, 'page_title_background_image')">
                                        <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <img v-if="page.page_feature_image_old!='' && page.page_feature_image_old != 'NULL'" :src="'/storage/uploads/pages/'+page.page_feature_image_old" width="200px">
                                        <img v-else :src="'/assets/admin/images/no-image-available_1.png'" width="200px">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="page_feature_image" class="form-label">Feature Image</label>
                                        <input type="file" class="form-control" v-on:change="onChange($event, 'page_feature_image')">
                                        <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <h2>Top Section</h2>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="top_section_title" class="form-label">Title</label>
                                        <input id="top_section_title" type="text" class="form-control" v-model="page.page_content[0]['top_section'][0]['title']" required autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="top_section_description" class="form-label">Description</label>
                                            <tinymce id="top_section_description" v-model="page.page_content[0]['top_section'][0]['description']" required></tinymce>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <h2>Second Section</h2>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="features_section_title" class="form-label">Title</label>
                                        <input id="features_section_title" type="text" class="form-control" v-model="page.page_content[0]['features_section'][0]['title']" required autofocus autocomplete="off">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="features_section_title_a_link" class="form-label">Title Link</label>
                                        <input id="features_section_title_a_link" type="text" class="form-control" v-model="page.page_content[0]['features_section'][0]['title_a_link']" required autofocus autocomplete="off">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="features_section_description" class="form-label">Description</label>
                                            <tinymce id="features_section_description" v-model="page.page_content[0]['features_section'][0]['description']" required></tinymce>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <img v-if="page.features_section_image_old!='' && page.features_section_image_old != 'NULL'" :src="'/storage/uploads/pages/'+page.features_section_image_old" width="200px">
                                        <img v-else :src="'/assets/admin/images/no-image-available_1.png'" width="200px">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="features_section_image" class="form-label">Feature Image</label>
                                        <input type="file" class="form-control" v-on:change="onChange($event, 'features_section_image')">
                                        <p>Image should be (mimes:jpg,jpeg,png|max:2048)</p>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-md-12">
                                        Buy Now Section
                                    </div>
                                    <div class="col-md-12">
                                        <label for="buy_now_title" class="form-label">Title</label>
                                        <input id="buy_now_title" type="text" class="form-control" v-model="page.buy_now_title" required autofocus autocomplete="off">
                                    </div>
                                </div> -->

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" v-model="page.is_active" :checked="isChecked(page.is_active)">
                                        <label class="form-check-label" for="is_active">Is Active</label>
                                        </div>
                                    </div>
                                </div>

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
            page: {
                page_name: '',
                page_title: '',
                page_slug: '',
                page_feature_image: '',
                page_title_background_image: '',
                page_content: [{
                    top_section: [{title:'', description:''}],
                    features_section: [{title:'', title_a_link:'', description:''}]
                }],
                page_meta_keywords: '',
                page_meta_desc: '',
                is_active: true,
                page_feature_image_old: '',
                page_title_background_image_old: '',
                features_section_image: '',
                features_section_image_old: '',
            },
            error: null,
            success: null,
        }
    },
    created() {

        /*for (let i = 0; i < this.page.how_it_work.length; i++) {
            this.$set(
                this.page.how_it_work[i].title,
                this.page.how_it_work[i].content,
                this.page.how_it_work[i].image
            ); 
            console.log(this.page.how_it_work);
        }*/

        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/pages/edit/${this.$route.params.id}`)
        .then(response => {
            this.page = response.data.data.page;
            this.page.page_feature_image_old = response.data.data.page.page_feature_image;
            this.page.page_title_background_image_old = response.data.data.page.page_title_background_image;

            this.page.page_content = JSON.parse(response.data.data.page.page_content);
            
            this.page.additional_images = JSON.parse(response.data.data.page.additional_images);
            this.page.features_section_image_old = this.page.additional_images.features_section_image;


            // this.page.page_content = response.data.data.page.page_content;
            // console.log(this.page.additional_images.features_section_image);
        })
        .catch(function (error) {
            console.error(error);
        });
    },
    methods: {
        onChange(e,column_name) {
            if(column_name=="page_feature_image"){
                this.page.page_feature_image = e.target.files[0];
                console.log(this.page.page_feature_image);
            }
            if(column_name=="page_title_background_image"){
                this.page.page_title_background_image = e.target.files[0];
                console.log(this.page.page_title_background_image);
            }
            if(column_name=="features_section_image"){
                this.page.features_section_image = e.target.files[0];
                console.log(this.page.features_section_image);
            }
        },
        updateCustomer(e) {
            e.preventDefault();
            if(this.page.category_id=='Select Category'){
                this.error='Please Select the Category';this.success=null;
            }
            else{
                let existingObj = this;
                existingObj.success=null;
                existingObj.error=null;

                const config = {
                  headers: {
                      'content-type': 'multipart/form-data',
                      'Authorization': 'Bearer ' + localStorage.getItem('token'),
                  }
                }

                var is_active;
                if(this.page.is_active){this.page.is_active='Y';}else{this.page.is_active='N';}
                

                /*var myObject = { 
                    how_it_work_section: [
                        {"title":this.page.feature_title, "description":this.page.feature_title},
                        {"title":this.page.feature_title, "description":this.page.feature_title}
                    ],
                    features_section: {"title":this.page.feature_title, "description":this.page.feature_title},
                    // buy_now_section: {"title":this.page.feature_title,"title":this.page.feature_title}
                }
                // var myObject = {"feature_title":this.page.feature_title, "buy_now_title":this.page.feature_title};
                var final_array = [];
                final_array.push(myObject);*/



                let data = new FormData();
                data.append('page_name', this.page.page_name);
                data.append('page_title', this.page.page_title);
                data.append('page_slug', this.page.page_slug);
                data.append('page_title_background_image', this.page.page_title_background_image);
                data.append('page_feature_image', this.page.page_feature_image);
                data.append('is_active', this.page.is_active);
                data.append('page_content', JSON.stringify(this.page.page_content));
                // data.append('page_content', JSON.stringify(final_array));
                data.append('page_meta_keywords', this.page.page_meta_keywords);
                data.append('page_meta_desc', this.page.page_meta_desc);
                data.append('page_feature_image_old', this.page.page_feature_image_old);
                data.append('page_title_background_image_old', this.page.page_title_background_image_old);

                data.append('features_section_image', this.page.features_section_image);
                data.append('features_section_image_old', this.page.features_section_image_old);

                

                // data.append('feature_title', this.page.feature_title);
                // data.append('buy_now_title', this.page.buy_now_title);

                // console.log(this.page);return;
                axios.post(`/api/pages/update/${this.$route.params.id}`, data, config)
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

                window.scrollTo(0,0);
            }
        },
        isChecked(obj) {
            if(obj=='Y'){return true;}else{return false;}
        }
    }
}
</script>