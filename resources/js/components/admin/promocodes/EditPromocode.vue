<template>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Category</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
                <li class="breadcrumb-item"><router-link :to="{name: 'admin_categories_list'}">Promocodes</router-link></li>
                <li class="breadcrumb-item active">Edit Promocode</li>
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
                        <div class="card-header">Edit Promocode</div>
                        <div class="card-body">
                            <form @submit.prevent="updateCustomer">
                                <div class="form-group row">
                                  <div class="col-md-6">
                                      <label for="amount" class="form-label">Number Codes</label>
                                      <input type="number" v-model="promocode.amount" class="form-control" id="amount" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="reward" class="form-label">Reward</label>
                                      <input type="number" v-model="promocode.reward" class="form-control" id="reward" required>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-6">
                                      <label for="quantity" class="form-label">Number of Time Use</label>
                                      <input type="number" v-model="promocode.quantity" class="form-control" id="quantity" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="expires_in" class="form-label">Expires in Days</label>
                                      <input type="number" v-model="promocode.expires_in" class="form-control" id="expires_in" required>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-12">
                                      <label for="promocode_type" class="form-label">Reward Type</label>
                                      <br>
                                      <input type="radio" id="persentage" value="persentage" v-model="promocode.additional_information.promocode_type">
                                      <label for="persentage">Persentage</label>
                                      
                                      <input type="radio" id="fixed" value="fixed" v-model="promocode.additional_information.promocode_type">
                                      <label for="fixed">Fixed</label>

                                      <!-- {{additional_information.promocode_type}} -->
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
            promocode: {
                amount: 1,
                reward: 1,
                expires_in: 7,
                quantity: 1,
                // is_active: true,
                additional_information:{promocode_type:'persentage'},
            },
            additional_information:{promocode_type:'persentage'},
            error: null,
            success: null,
        }
    },
    mounted() {
        axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
        axios.get(`/api/promocodes/edit/${this.$route.params.id}`)
            .then(response => {
                this.promocode = response.data.data.promocode;
                // this.additional_information = JSON.parse(response.data.data.additional_information);
                console.log(response.data);
            })
            .catch(function (error) {
                console.error(error);
            });
    },
    methods: {
        updateCustomer() {
            // var is_active;
            // if(this.blog_category.is_active){is_active='Y';}else{is_active='N';}
            axios.defaults.headers.common['Content-Type'] = 'application/json'
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token')
            axios.post(`/api/promocodes/update/${this.$route.params.id}`, {
                    amount:this.promocode.amount,
                    reward:this.promocode.reward,
                    expires_in:this.promocode.expires_in,
                    quantity:this.promocode.quantity,
                    additional_information:JSON.stringify(this.additional_information),
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