<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Update Profile</li>
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
                <h3 class="card-title">Update Profile</h3>
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
                                        Upload Image
                                    </label>
                                    <input id="file-upload" class="_img_thumb_input" accept="image/*" name="image" type="file"/>
                                </div>
                            </div> 
                        </div> 
                        <p class="text-danger validation_errors" v-if="errorsList.image">{{ errorsList.image }} </p>
                        <div class="row"> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input 
                                        type="text" 
                                        name="first_name"
                                        v-model="editData.first_name"
                                        class="form-control"  
                                        placeholder="Enter first name...">
                                    <p class="text-danger validation_errors" v-if="errorsList.first_name">{{ errorsList.first_name }} </p>
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input 
                                        type="text" 
                                        name="last_name"
                                        v-model="editData.last_name"
                                        class="form-control"  
                                        placeholder="Enter last name...">
                                    <p class="text-danger validation_errors" v-if="errorsList.last_name">{{ errorsList.last_name }} </p>
                                </div>
                            </div>
                        </div>  
                        <div class="row"> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Display Name</label>
                                    <input 
                                        type="text" 
                                        name="display_name"
                                        v-model="editData.display_name"
                                        class="form-control"  
                                        placeholder="Enter display name...">
                                    <p class="text-danger validation_errors" v-if="errorsList.display_name">{{ errorsList.display_name }} </p>
                                </div> 
                            </div>
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                      <label>Email</label>
                                      <input 
                                          type="text" 
                                          name="email"
                                          v-model="editData.email"
                                          class="form-control"  
                                          placeholder="Enter email address...">
                                      <p class="text-danger validation_errors" v-if="errorsList.email">{{ errorsList.email }} </p>
                                 </div>
                             </div>
                        </div>
                         <div class="row">  
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                      <label>Phone</label>
                                      <input 
                                          type="text" 
                                          name="phone"
                                          v-model="editData.phone"
                                          class="form-control"  
                                          placeholder="Enter phone...">
                                      <p class="text-danger validation_errors" v-if="errorsList.phone">{{ errorsList.phone }} </p>
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
                                          placeholder="Enter countru...">
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" v-model="editData.status">
                                        <option value="0">In Active</option>
                                        <option value="1">Active</option>
                                        <option value="2">Archieved</option> 
                                    </select>   
                                    <p class="text-danger validation_errors" v-if="errorsList.status">{{ errorsList.status }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"> 
                            <button type="submit" class="btn btn-success">Update Profile</button>
                            <router-link to="dashboard" class="btn btn-danger">Back</router-link>
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
export default {
  name: 'UpdateProfile',
  components: {
         VueEditor
      }, 
      data:function(){
        return {
          loader:null,
          errorsList : [],
          editData : {  
              id: 0,
              first_name: "",
              last_name: "",
              display_name: "",
              email: "", 
              phone : "",
              address_line_one : "",
              address_line_two : "",
              city : "",
              state : "",
              country : "",
              zip : "",
              photo_url: config.ASSET_BASE_URL+'default_img/default.jpg', 
              status: "1",
          },
          errors : {},
        }
      },
      methods : {
          getProfile(){
            let _this = this;
            _this.loader = _this.$loading.show();
            this.$store.dispatch('getProfile')
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
            _this.loader = _this.$loading.show();
            if( this.editData.id > 0){
               this.$store.dispatch('updateProfile',{ data : vueForm})
               .then(function(result){
                    _this.loader.hide();
                   if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Profile Saved Successfully','Success!'); 
                  }else if( ( typeof(result.status) != 'undefined' ) && (result.status == false) ){ 
                    _this.$toastr.e('Opps! Unable to save form,please check error log','Error!');  
                    _this.errorsList = result.errors;
                  }else{
                    _this.$toastr.e('Opps! Something went wrong,please check log','Error!'); 
                  }  
                })
               .catch(function(error){
                 console.log(error);
               });
            }  
          }
      }, 
      created(){ 
          this.getProfile();  
      }, 
}
</script> 
<style scoped> 
</style>
