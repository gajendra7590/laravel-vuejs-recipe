<template>
  <div class="dashboard_Content">
    <!-- Tap Panel -->
    <div id="home" class>
      <h3>Change Password</h3>
      <div class="dashboard_Panel"> 
        <div class="alert" :class="alerts.class" v-if="alerts.message" role="alert">
          <h4 class="alert-heading text-capitalize">{{ alerts.message }}</h4>
          <div class="" v-if="errorsList">
             <hr>
             <p class="text-capitalize" v-for="(item,index) in errorsList" :key="index"> 
               <i class="fa fa-check-circle" aria-hidden="true"></i>
                {{ item }}
             </p>
          </div>  
        </div> 
        <ValidationObserver  v-slot="{ handleSubmit }">
        <form id="vueForm" 
              name="vueForm"  
              enctype="multipart/form-data" 
              class="submit-recipe-form" 
            @submit.prevent="handleSubmit(submitPassword)">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Old Password</label>
                    <ValidationProvider name="Old Password" rules="required|min:6" v-slot="{ errors }">
                      <input
                        type="password"
                        name="old_password"                       
                        v-model="old_password"
                        class="form-control"                        
                        placeholder="******">
                      <span class="text-danger">{{ errors[0] }}</span>
                    </ValidationProvider>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>New Password</label>
                    <ValidationProvider name="New Password" rules="required|min:6" v-slot="{ errors }">
                      <input
                        type="password"
                        name="new_password"
                        v-model="new_password"
                        class="form-control"
                        placeholder="******"                        
                       >
                      <span class="text-danger">{{ errors[0] }}</span>
                     </ValidationProvider>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Confirm New Password</label>
                     <ValidationProvider name="Confirm New Password" rules="required|min:6|password:@New Password" v-slot="{ errors }">
                      <input
                        type="password"
                        name="new_password_confirmation" 
                        v-model="new_password_confirmation"
                        class="form-control"
                        placeholder="******">
                      <span class="text-danger">{{ errors[0] }}</span>
                     </ValidationProvider>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn-submit">Update New Password</button>
        </form>
        </ValidationObserver>
      </div>
    </div>
    <!-- Tap Panel -->
  </div>
</template> 
<script>
import { extend } from 'vee-validate'; 
extend('password', {
  params: ['target'],
  validate(value, { target }) {
    return value === target;
  },
  message: 'Password confirmation does not match'
});

export default {
  name: "changePassword",
  data() {
    return {
       loader : null,
       alerts:{ class : 'alert-success',message : ''},
       errorsList : null, 
       old_password: "",
       new_password: "",
       new_password_confirmation: ""  
    };
  },
  methods: {
      formReset(){
        this.old_password = "";
        this.new_password = "";  
        this.new_password_confirmation = "";
        this.errorsList = [];
      },
      submitPassword(){
        var vueForm = new FormData( $('#vueForm')[0]);
        let _this = this;
        _this.loader =  _this.$loading.show();
        _this.errorsList = null;
        _this.$store.dispatch('changePassword',vueForm)
          .then(function(result) {
              _this.loader.hide();
                if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                  _this.alerts = {class:'alert-success',message : 'Password Changed Successfully'}; 
                  _this.formReset();
              }else if( ( typeof(result.status) != 'undefined' ) && (result.status == false) ){ 
                _this.alerts = {class:'alert-danger',message : result.message};  
                _this.errorsList = (typeof(result.errors)!='undefined')?result.errors:null;
              }else{
                _this.alerts = {class:'alert-danger',message : 'Something went wrong please check..'};  
              }  
          })
          .catch(function(error){
              _this.alerts = {class:'alert-danger',message : error.message}; 
              console.log(error);
          });
      }
  },
  created() {},
};
</script>

<style>
</style>