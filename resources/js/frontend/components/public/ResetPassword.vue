<template>
  <div>
    <section class="inner-page-banner bg-common" data-bg-image></section>
    <section class="login-page-wrap padding-top-80 padding-bottom-50">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-12">
              <div class="alert alert-dismissible" :class="alerts.class" v-if="alerts.message">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                   {{ alerts.message }}
                </div>
            <div class="login-box-layout1">
              <div class="section-heading heading-dark">
                <h2 class="item-heading">Reset Your Password</h2>
              </div> 
              <ValidationObserver v-slot="{ handleSubmit }">
                    <form class="login-form" ref="form" @submit.prevent="handleSubmit(submitResetPassword)">
                        <div class="row">
                        <div class="col-md-12">
                            <label class="mb-3">Enter your new strong password</label>
                            <ValidationProvider vid="newPassword" name="New Password" rules="required|min:6" v-slot="{ errors }">
                                 <input 
                                    name="newPassword"
                                    v-model="resetForm.newPassword" 
                                    class="main-input-box" 
                                    type="password" 
                                    placeholder="******" />
                                <span class="text-danger">{{ errors[0] }}</span>
                            </ValidationProvider>
                        </div>
                        </div>
                        <div class="btn-area">
                        <button class="btn-fill btn-primary" type="submit" value="Login">
                            Save New Password
                            <i class="flaticon-next"></i>
                        </button> 
                        </div> 
                    </form>
              </ValidationObserver>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template> 
<script>
export default {
  name: "ForgotPassword",
  data() {
    return {
        loader:null,
        alerts : {
            class : 'alert-sucess',
            message : '', 
        },
        resetForm : {
            newPassword : '',
            token : ''
        }
    };
  },
  methods: {
    submitResetPassword(){
        let _this = this;
        _this.loader = _this.$loading.show();
        this.$store
          .dispatch("forgotPasswordSave", _this.resetForm)
          .then(function (result) {
            _this.loader.hide();
            if (typeof result.status != "undefined" && result.status == false) { 
                _this.alerts = { class: 'alert-danger',message : result.message };            
            } else if (typeof result.status != "undefined" && result.status == true) {
                _this.resetForm.newPassword = '';
                _this.alerts = { class: 'alert-success',message : result.message };
                _this.$toastr.s('SUCCESS','Your New Password Saved SuccessFully');
                setTimeout(function(){ _this.$router.push('/home'); },1000)
            } 
          })
          .catch(function (error) {
            _this.loader.hide();
            console.log(error);
          });

    }, 
    verifyToken() {
      var token = this.$route.query.token;
      if (!token) {
        this.$router.push("/home");
        this.$toastr.e("ERROR", "Opps! Invalid Reset Password Token");
      } else {
        let _this = this;
        this.$store
          .dispatch("verifyToken", { token: token })
          .then(function (result) {
            if (typeof result.status != "undefined" && result.status == false) {
              _this.$toastr.e(
                "ERROR",
                "Opps! Invalid/Expired Reset Password Token"
              );
              _this.$router.push("/home");
            } else if (typeof result.status != "undefined" && result.status == true) {
                _this.resetForm.token = token;
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },
  },
  created() {
    this.verifyToken();
  },
};
</script> 

<style>
</style>