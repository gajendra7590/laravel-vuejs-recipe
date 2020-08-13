<template>
  <div class="dashboard_Content">
    <!-- Tap Panel -->
    <div id="home" class>
      <h3>Your Profile</h3> 
      <div class="dashboard_Panel">
        <ValidationObserver v-slot="{ handleSubmit }">
        <form id="vueForm" 
              name="vueForm" 
              enctype="multipart/form-data" 
              class="submit-recipe-form" 
              @submit.prevent="handleSubmit(submitProfile)">
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>First Name</label>
                    <ValidationProvider name="First Name" rules="required" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter first name.."
                          class="form-control"
                          name="first_name"
                          v-model="editData.first_name">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                 <div class="col-sm-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    <ValidationProvider name="Last Name" rules="required" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter last name.."
                          class="form-control"
                          name="last_name"
                          v-model="editData.last_name">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div> 
             <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Display Name</label>
                    <ValidationProvider name="Display Name" rules="required" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter Display Name.."
                          class="form-control"
                          name="display_name"
                          v-model="editData.display_name">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Your speciality</label>
                    <ValidationProvider name="Your speciality" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Ex: Burger Specialist"
                          class="form-control"
                          name="speciality"
                          v-model="editData.speciality">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Email</label>
                    <ValidationProvider name="Email Address" rules="required|email" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter email address."
                          class="form-control"
                          name="email"
                          v-model="editData.email">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Phone</label>
                    <ValidationProvider name="Phone" rules="required|numeric|min:10|max:12" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter Phone.."
                          class="form-control"
                          name="phone"
                          v-model="editData.phone">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Country</label>
                    <ValidationProvider name="Address Line One" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Address Line One.."
                          class="form-control"
                          name="address_line_one"
                          v-model="editData.address_line_one">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Address Line 2</label>
                    <ValidationProvider name="Address Line Two" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Address Line Two.."
                          class="form-control"
                          name="address_line_two"
                          v-model="editData.address_line_two">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>City</label>
                    <ValidationProvider name="City" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="City.."
                          class="form-control"
                          name="city"
                          v-model="editData.city">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                 <div class="col-sm-3">
                  <div class="form-group">
                    <label>State</label>
                    <ValidationProvider name="State" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="State.."
                          class="form-control"
                          name="state"
                          v-model="editData.state">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                 <div class="col-sm-3">
                  <div class="form-group">
                    <label>Country</label>
                    <ValidationProvider name="Country" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Country.."
                          class="form-control"
                          name="country"
                          v-model="editData.country">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Zip Code</label>
                    <ValidationProvider name="Zip" rules="numeric|min:5" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Zip.."
                          class="form-control"
                          name="zip"
                          v-model="editData.zip">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Youtube URL</label>
                    <ValidationProvider name="Youtube URL" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter Youtube URL.."
                          class="form-control"
                          name="youtube_url"
                          v-model="editData.youtube_url">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Facebook URL</label>
                    <ValidationProvider name="Facebook URL" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter Facebook URL.."
                          class="form-control"
                          name="facebook_url"
                          v-model="editData.facebook_url">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Twitter URL</label>
                    <ValidationProvider name="Twitter URL" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter Twitter URL.."
                          class="form-control"
                          name="twitter_url"
                          v-model="editData.twitter_url">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Linkedin URL</label>
                    <ValidationProvider name="Linkedin URL" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter Linkedin URL.."
                          class="form-control"
                          name="linkedin_url"
                          v-model="editData.linkedin_url">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Instagram URL</label>
                    <ValidationProvider name="Instagram URL" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter Instagram URL.."
                          class="form-control"
                          name="instagram_url"
                          v-model="editData.instagram_url">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pinterest URL</label>
                    <ValidationProvider name="Pinterest URL" rules="" v-slot="{ errors }">
                        <input
                          type="text"
                          placeholder="Enter Pinterest URL.."
                          class="form-control"
                          name="pinterest_url"
                          v-model="editData.pinterest_url">
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>About Me</label>
                    <ValidationProvider name="About Me" rules="" v-slot="{ errors }">
                        <textarea
                          type="text"
                          placeholder="Enter About Me.."
                          class="form-control"
                          rows="4"
                          name="about_me"
                          v-model="editData.about_me"></textarea>
                        <span class="text-danger">{{ errors[0] }}</span>
                      </ValidationProvider>
                  </div>
                </div> 
            </div> 
          <button type="submit" class="btn-submit">Update Profile</button>
        </form>
        </ValidationObserver>
      </div>
    </div>
    <!-- Tap Panel -->
  </div>
</template> 
<script>
import $ from 'jquery';
export default {
  name: "userProfile",
  data() {
    return {
      loader : null,
      errorsList : [],
      editData : { 
          "first_name": "",
          "last_name": "",
          "display_name": "",
          "email": "",
          "phone": "",
          "photo": "",
          "address_line_one": null,
          "address_line_two": null,
          "city": "",
          "state": "",
          "country": "",
          "zip": "", 
          "speciality": "",
          "website_url": "",
          "youtube_url": "",
          "facebook_url": "",
          "twitter_url": "",
          "linkedin_url": "",
          "instagram_url": "",
          "pinterest_url": "",
          "reset_token": null,
          "reset_token_at": null,
          "about_me": "" 
      }
    };
  },
  methods: {
    submitProfile(){
      var vueForm = new FormData( $('#vueForm')[0]);
      let _this = this;
      _this.loader =  _this.$loading.show();
       this.$store.dispatch('saveProfile',vueForm)
        .then(function(result) {
            _this.loader.hide();
              if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
              _this.$toastr.s('Profile Updated Successfully','Success!'); 
            }else if( ( typeof(result.status) != 'undefined' ) && (result.status == false) ){ 
              _this.$toastr.e('Opps! Unable to save form,please check error log','Error!');  
                _this.errorsList = result.errors;  
            }else{
              _this.$toastr.e('Opps! Something went wrong,please check log','Error!'); 
            }  
        })
        .catch(function(error){
            _this.loader.hide();
             console.log(error);
        });
},
    getUserProfile(){
      let _this = this;
      _this.$store.dispatch('getProfile')
      .then(function(result){
        console.log( result )
        _this.editData = result;
      })
      .catch(function(error){

      });
      
    }
  },
  created() {
    this.getUserProfile();
  },
};
</script>

<style>
</style>