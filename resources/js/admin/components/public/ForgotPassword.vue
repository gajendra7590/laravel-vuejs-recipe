<template>
    <div class="login-page">
      <div class="login-box">
          <div class="login-logo">
            <a href="javascript:void(0);"><b>Recipe</b> Forgot Password</a>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Send Reset Password Link</p>
              <div class="alert" :class="alertClass" v-show="alertShow">
                {{ alertMessage }}
              </div> 
              <form @submit.prevent="adminForgotPassword" enctype="multipart/form-data" method="post">
                <div class="input-group mb-3">
                  <input type="email" 
                          name="email"  
                          v-model="forgotData.email"              
                          class="form-control" 
                          placeholder="Your email..">
                            <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <p class="text-danger validation_errors" v-if="errorsList.email">{{ errorsList.email }} </p>
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>  
              <p class="mt-3 mb-1">
                <router-link to="/login">Already User Login</router-link>
              </p> 
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
    </div>
</template> 
<script>
export default {
  name: 'ForgotPassword',
  data() {
    return {
      errorsList : [],
      alertClass : 'alert-success',
      alertShow : false,
      alertMessage : '',
      forgotData : {
        email : ''
      }
    }
  },
  methods: {
    // adminForgotPassword
    adminForgotPassword(){
        this.$store
        .dispatch("adminForgotPassword",this.forgotData).then(res => {
           if( typeof(res.status)!='undefined' && (res.status == true) ){ 
             this.alertClass = 'alert-success';
             this.alertShow = true; 
             this.alertMessage = res.message 
           } else if( typeof(res.status)!='undefined' && (res.status == false) ){ 
             this.errorsList = res.errors;  
             this.alertClass = 'alert-danger';
             this.alertShow = true;   
             this.alertMessage = res.message
           } 
        })
        .catch(e => {
          console.log(e);
        }); 

    }
  }, 
  created(){

  }
}
</script> 
<style scoped> 
</style>
