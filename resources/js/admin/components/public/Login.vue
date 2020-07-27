<template>
  <div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0);"><b>Recipe</b> Admin Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <div class="alert" :class="alertClass" v-show="alertShow">
        {{ alertMessage }}
      </div> 
      <form @submit.prevent="adminLogin" enctype="multipart/form-data" method="post">
        <div class="input-group mb-3">
          <input type="email" 
                 name="email"  
                 v-model="loginData.email"              
                 class="form-control" 
                 placeholder="Your email.."> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="text-danger validation_errors" v-if="errorsList.email">{{ errorsList.email }} </p>
        <div class="input-group mb-3">
          <input type="password" 
                 name="password"
                 v-model="loginData.password"   
                 class="form-control" 
                 placeholder="Your password"> 
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div> 
        </div>
        <p class="text-danger validation_errors" v-if="errorsList.password">{{ errorsList.password }} </p>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input 
                  name="remember"
                  type="checkbox" 
                  v-model="loginData.remeberMe"
                  id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="javascript:void(0);" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="javascript:void(0);" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <router-link to="/forgot-password">I forgot my password,reset here</router-link>
      </p> 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</template>

<script>
export default {
  name: 'Login',
  data() {
    return {
      errorsList : [],
      alertClass : 'alert-success',
      alertShow : false,
      alertMessage : '',
      loginData : {
        email : '',
        password : '',
        remeberMe : ''
      }
    }
  },
  methods: {
    adminLogin(){ 
       let _this = this;
       this.$store
        .dispatch("adminLogin",_this.loginData).then(res => {
           if( typeof(res.status)!='undefined' && (res.status == true) ){ 
             _this.alertClass = 'alert-success';
             _this.alertShow = true; 
             _this.alertMessage = res.message
             _this.$toastr.s("You have been logged in", "SUCCESS!!");
             localStorage.setItem('current_user',res.current_user);
             localStorage.setItem('token',res.token.access_token);
             setTimeout(function(){
               window.location.href='/admin/dashboard';
             },500);
           } else if( typeof(res.status)!='undefined' && (res.status == false) ){ 
             _this.errorsList = res.errors;  
             _this.alertClass = 'alert-danger';
             _this.alertShow = true;  
             _this.$toastr.e("Opps! error in logged in", "ERROR!!");
             localStorage.setItem('current_user','');
             localStorage.setItem('token','');
             _this.alertMessage = res.message
           } 
        })
        .catch(e => {
          console.log(e);
        }); 
    }

  },
  created(){
    //this.adminLogin() 
  } 
}
</script> 
<style scoped> 
</style>
