<template>
  <div>
    <section class="inner-page-banner bg-common" data-bg-image></section> 
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
    verifyToken() {
      var token = this.$route.query.token;
      if (!token) {
        this.$router.push("/home");
        this.$toastr.e("ERROR", "Opps! Invalid Reset Password Token");
      } else {
        let _this = this;
        this.$store
          .dispatch("verifyEmail", { token: token })
          .then(function (result) {
            if (typeof result.status != "undefined" && result.status == false) {
              _this.$toastr.e(
                "ERROR",
                "Opps! Your account verify link got expired."
              );
              _this.$router.push("/home");
            } else if (typeof result.status != "undefined" && result.status == true) {

              localStorage.setItem(
              "USER_SESSION",
              JSON.stringify({
                  userToken: result.token.access_token,
                  userRole: result.role,
                  currentUser: result.current_user,
                })
              );
              _this.$toastr.s("SUCCESS", "Your account has been activated");               
               window.location.href = "/home"; 
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