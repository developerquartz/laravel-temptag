<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Promocode</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><router-link :to="{name: 'admin'}">Dashboard</router-link></li>
            <li class="breadcrumb-item active">Add New Promocode</li>
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
            <div class="card-header">Add Promocode</div>
            <div class="card-body">
              <form @submit.prevent="submitForm">
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

                <!-- <div class="form-group row">
                  <div class="col-md-12">
                    <div class="form-check">
                        <input type="checkbox" name="is_active" class="form-check-input" v-model="promocode.is_active" :checked="isChecked(promocode.is_active)">
                        <label class="form-check-label" for="is_active">Is Active</label>
                    </div>
                  </div>
                </div> -->

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn btn-info">Save</button>
                    </div>
                </div>

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
      // additional_information:{promocode_type:'persentage'},
      error: null,
      success: null,
    }
  },
  watch:{
    $route (to, from){
      this.isChecked();
    }
  },
  methods: {
    submitForm() {
      // var is_active;
      // if(this.promocode.is_active){this.promocode.is_active='Y';}else{this.promocode.is_active='N';}
            
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
      data.append('amount', this.promocode.amount);
      data.append('reward', this.promocode.reward);
      data.append('expires_in', this.promocode.expires_in);
      data.append('quantity', this.promocode.quantity);
      data.append('additional_information', JSON.stringify(this.promocode.additional_information));
      // data.append('is_active', this.promocode.is_active);
      
      axios.post('/api/promocodes/add', data, config)
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

    },
    isChecked(obj) {
      if(obj=='Y'){return true;}else{return false;}
    }
  }
}
</script>