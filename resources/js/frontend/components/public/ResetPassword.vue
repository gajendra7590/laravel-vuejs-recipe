<template>
  <div>Reset Password</div>
</template>

<script>
export default {
    name :'ForgotPassword',
    data(){
        return {

        }
    },
    methods :{
        verifyToken(){
            var token = this.$route.query.token;
            if(!token) {
                this.$router.push('/home');
                this.$toastr.e('ERROR','Opps! Invalid Reset Password Token');
            } else {
                let _this = this;
                this.$store.dispatch('verifyToken',{token:token})
                .then(function(result){
                    if( typeof(result.status)!='undefined' && (result.status == false) ){
                        
                        _this.$toastr.e('ERROR','Opps! Invalid/Expired Reset Password Token');
                        _this.$router.push('/home');
                    }
                }).catch(function(error){
                    console.log(error)
                }) 
            }
        } 
    },
    created(){
        this.verifyToken();
    }

}
</script> 

<style>

</style>