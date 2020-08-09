<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Company Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Manage Company Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Company Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="vueForm" name="vueForm" enctype="multipart/form-data" @submit.prevent="submitForm(this)"> 
                    <div class="card-body">  
                        <div class="row logo-container card-footer">
                            <div class="col-sm-2 col-xs-12 profile_image_container">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                       <img 
                                            class="profile-user-img img-fluid img-circle _img_thumb_preview" 
                                            :src="( editData.photo_url)?editData.photo_url:'/images/default/default.jpg'" 
                                            alt="User profile picture"
                                       >
                                    </div>   
                                </div>
                                <div class="customInput">
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload-alt" aria-hidden="true"></i>
                                        Upload Logo
                                    </label>
                                    <input id="file-upload" class="_img_thumb_input" accept="image/*" name="image" type="file"/>
                                </div>
                            </div> 
                        </div> 
                        <p class="text-danger validation_errors" v-if="errorsList.image">{{ errorsList.image }} </p>
                        <div class="row"> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input 
                                        type="text" 
                                        name="company_name"
                                        v-model="editData.company_name"
                                        class="form-control"  
                                        placeholder="Enter company name...">
                                        <p class="text-danger validation_errors" v-if="errorsList.company_name">{{ errorsList.company_name }} </p>
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company Contact</label>
                                    <input 
                                        type="text" 
                                        name="company_contact"
                                        v-model="editData.company_contact"
                                        class="form-control"  
                                        placeholder="Enter company contact...">
                                        <p class="text-danger validation_errors" v-if="errorsList.company_contact">{{ errorsList.company_contact }} </p>
                                </div>
                            </div>
                        </div>  
                         <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Company Email</label>
                                    <input 
                                        type="text" 
                                        name="company_email"
                                        v-model="editData.company_email"
                                        class="form-control"  
                                        placeholder="Enter company email">
                                        <p class="text-danger validation_errors" v-if="errorsList.company_email">{{ errorsList.company_email }} </p>
                                </div> 
                            </div>
                         </div> 
                         <div class="row"> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address Line One</label>
                                    <input 
                                        type="text" 
                                        name="address_line_one"
                                        v-model="editData.address_line_one"
                                        class="form-control"  
                                        placeholder="Address Line One...">
                                     <p class="text-danger validation_errors" v-if="errorsList.address_line_one">{{ errorsList.address_line_one }} </p>
                                </div> 
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                      <label>Address Line Two</label>
                                      <input 
                                          type="text" 
                                          name="address_line_two"
                                          v-model="editData.address_line_two"
                                          class="form-control"  
                                          placeholder="Address Line Two...">
                                      <p class="text-danger validation_errors" v-if="errorsList.address_line_two">{{ errorsList.address_line_two }} </p>
                                 </div>
                             </div>
                        </div>
                        <div class="row"> 
                           <div class="col-sm-3"> 
                                <div class="form-group">
                                      <label>Country</label>
                                      <input 
                                          type="text" 
                                          name="country"
                                          v-model="editData.country"
                                          class="form-control"  
                                          placeholder="Enter Country...">
                                      <p class="text-danger validation_errors" v-if="errorsList.country">{{ errorsList.country }} </p>
                                 </div>
                           </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>State</label>
                                    <input 
                                        type="text" 
                                        name="state"
                                        v-model="editData.state"
                                        class="form-control"  
                                        placeholder="Enter state...">
                                    <p class="text-danger validation_errors" v-if="errorsList.state">{{ errorsList.state }} </p>
                                </div> 
                            </div> 
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>City</label>
                                    <input 
                                        type="text" 
                                        name="city"
                                        v-model="editData.city"
                                        class="form-control"  
                                        placeholder="Enter city...">
                                    <p class="text-danger validation_errors" v-if="errorsList.city">{{ errorsList.city }} </p>
                                </div> 
                            </div> 
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input 
                                        type="text" 
                                        name="zip"
                                        v-model="editData.zip"
                                        class="form-control"  
                                        placeholder="Enter zip...">
                                    <p class="text-danger validation_errors" v-if="errorsList.zip">{{ errorsList.zip }} </p>
                                </div> 
                            </div> 
                        </div>    
                         <div class="row"> 
                           <div class="col-sm-3"> 
                                <div class="form-group">
                                      <label>Website URL</label>
                                      <input 
                                          type="text" 
                                          name="website_url"
                                          v-model="editData.website_url"
                                          class="form-control"  
                                          placeholder="Website URL...">
                                      <p class="text-danger validation_errors" v-if="errorsList.website_url">{{ errorsList.website_url }} </p>
                                 </div>
                           </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Youtube URL</label>
                                    <input 
                                        type="text" 
                                        name="youtube_url"
                                        v-model="editData.youtube_url"
                                        class="form-control"  
                                        placeholder="Youtube URL">
                                    <p class="text-danger validation_errors" v-if="errorsList.youtube_url">{{ errorsList.youtube_url }} </p>
                                </div> 
                            </div> 
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Facebook URL</label>
                                    <input 
                                        type="text" 
                                        name="facebook_url"
                                        v-model="editData.facebook_url"
                                        class="form-control"  
                                        placeholder="Facebook URL">
                                    <p class="text-danger validation_errors" v-if="errorsList.facebook_url">{{ errorsList.facebook_url }} </p>
                                </div> 
                            </div> 
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Twitter URL</label>
                                    <input 
                                        type="text" 
                                        name="twitter_url"
                                        v-model="editData.twitter_url"
                                        class="form-control"  
                                        placeholder="Twitter url..">
                                    <p class="text-danger validation_errors" v-if="errorsList.twitter_url">{{ errorsList.twitter_url }} </p>
                                </div> 
                            </div> 
                        </div>   
                        <div class="row"> 
                           <div class="col-sm-3"> 
                                <div class="form-group">
                                      <label>LinkedIn URL</label>
                                      <input 
                                          type="text" 
                                          name="linkedin_url"
                                          v-model="editData.linkedin_url"
                                          class="form-control"  
                                          placeholder="LinkedIn URL...">
                                      <p class="text-danger validation_errors" v-if="errorsList.linkedin_url">{{ errorsList.linkedin_url }} </p>
                                 </div>
                           </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Instagram URL</label>
                                    <input 
                                        type="text" 
                                        name="instagram_url"
                                        v-model="editData.instagram_url"
                                        class="form-control"  
                                        placeholder="Instagram URL">
                                    <p class="text-danger validation_errors" v-if="errorsList.instagram_url">{{ errorsList.instagram_url }} </p>
                                </div> 
                            </div> 
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Pinterest URL</label>
                                    <input 
                                        type="text" 
                                        name="pinterest_url"
                                        v-model="editData.pinterest_url"
                                        class="form-control"  
                                        placeholder="Pinterest URL">
                                    <p class="text-danger validation_errors" v-if="errorsList.pinterest_url">{{ errorsList.pinterest_url }} </p>
                                </div> 
                            </div>  
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>TeleGram URL</label>
                                    <input 
                                        type="text" 
                                        name="telegram_url"
                                        v-model="editData.telegram_url"
                                        class="form-control"  
                                        placeholder="TeleGram URL">
                                    <p class="text-danger validation_errors" v-if="errorsList.telegram_url">{{ errorsList.telegram_url }} </p>
                                </div> 
                            </div>  
                        </div>   
                         <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>About Description</label>
                                    <textarea 
                                       class="form-control"
                                       name="about" 
                                       v-model="editData.about"
                                       placeholder="About Description">
                                    </textarea>
                                    <p class="text-danger validation_errors" v-if="errorsList.about">{{ errorsList.about }} </p>
                                </div> 
                            </div>  
                        </div>    
                        <div class="card-footer"> 
                            <input type="hidden" name="id" v-model="editData.id">
                            <button type="submit" class="btn btn-success">Update Detail</button> 
                        </div>
                    </div>
              </form>
            </div>
            <!-- /.card --> 
          </div>
          <!--/.col (left) --> 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
    import { VueEditor } from "vue2-editor"; 
    import { mapState } from 'vuex';
    import config from '../../../../config';
    // config
    export default {
      name: 'AuthorsForm',
      components: {
         VueEditor
      }, 
      data:function(){
        return {
          errorsList : [],
          loader : '',
          editData : {  
              id: 0,
              company_name: "",
              company_contact: "",
              company_email: "", 
              address_line_one : "",
              address_line_two : "",
              city : "",
              state : "",
              country : "",
              zip : "",
              photo_url: config.ASSET_BASE_URL+'default_img/default.jpg',  
              website_url : "",
              youtube_url : "",
              facebook_url : "",
              twitter_url : "",
              linkedin_url : "",
              instagram_url : "",
              pinterest_url : "",
              telegram_url : "",
              status: "1",
          },
          errors : {},
        }
      },
      methods : {
          editCompanyDetail(id){
            let _this = this;
            this.loader =  _this.$loading.show(); 
            this.$store.dispatch('editCompanyDetail')
            .then(function(result){
                _this.editData = result;
                 _this.loader.hide();
            }).catch(function(error){
                console.log(error);
                 _this.loader.hide();
            }); 
          },
          submitForm(){
             var vueForm = new FormData( $('#vueForm')[0]);
             let _this = this;
             _this.errorsList = {};
             _this.loader =  _this.$loading.show(); 
              this.$store.dispatch('saveCompanyDetail',{ data : vueForm })
              .then(function(result){
                 _this.loader.hide();
                  if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!'); 
                  }else if( ( typeof(result.status) != 'undefined' ) && (result.status == false) ){ 
                    _this.$toastr.e('Opps! Unable to save form,please check error log','Error!');  
                    _this.errorsList = result.errors;  
                  }else{
                    _this.$toastr.e('Opps! Something went wrong,please check log','Error!'); 
                  } 
                })
               .catch(function(error){
                   _this.$toastr.e(error,'Errors!'); 
               });
            } 
      }, 
      created(){
          this.editCompanyDetail();
      }
    }
</script> 
<style scoped> 
</style>
