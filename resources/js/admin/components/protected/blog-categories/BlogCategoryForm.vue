<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Blog Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Manage Blog Category</li>
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
                <h3 class="card-title">Manage Blog Category</h3>
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Blog Category Name</label>
                                    <input 
                                        type="text" 
                                        name="name"
                                        v-model="editData.name"
                                        class="form-control"  
                                        placeholder="Enter blog category name...">
                                    <p class="text-danger validation_errors" v-if="errorsList.name">{{ errorsList.name }} </p>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <label>Blog Category Description</label>
                                    <vue-editor
                                    name="description" 
                                    placeholder="Blog Category Description.."
                                    v-model="editData.description">
                                    </vue-editor>
                                    <p class="text-danger validation_errors" v-if="errorsList.description">{{ errorsList.description }} </p>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Blog Category Status</label>
                                    <select class="form-control" name="status" v-model="editData.status">
                                        <option value="0">In Active</option>
                                        <option value="1">Active</option>
                                        <option value="2">Archive</option> 
                                    </select>   
                                    <p class="text-danger validation_errors" v-if="errorsList.status">{{ errorsList.status }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"> 
                            <button type="submit" class="btn btn-success">Submit</button>
                            <router-link to="/blog-categories" class="btn btn-danger">Back</router-link>
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
      name: 'BlogCategoryForm',
      components: {
         VueEditor
      }, 
      data:function(){
        return {
          loader:null,
          errorsList : [],
          editData : {  
              id: 0,
              name: "",
              description: "",
              photo_url: config.ASSET_BASE_URL+'default_img/default.jpg', 
              status: "1",
          },
          errors : {},
        }
      },
      methods : {
          editBlogCategories(id){
            let _this = this;
             _this.loader = _this.$loading.show();
            this.$store.dispatch('editBlogCategories',{id : id})
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
            vueForm.append('description',this.editData.description);
            let _this = this;
            _this.loader = _this.$loading.show();
            if( this.editData.id > 0){
               this.$store.dispatch('updateBlogCategory',{ id : this.editData.id,data : vueForm})
               .then(function(result){
                  _this.loader.hide();
                   if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!');
                    setTimeout(function(){ _this.$router.push('/blog-categories'); },500);
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
            } else {
              this.$store.dispatch('createBlogCategory',{ id : this.editData.id,data : vueForm})
              .then(function(result){
                 _this.loader.hide();
                  if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!');
                    setTimeout(function(){ _this.$router.push('/blog-categories'); },500);
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
             
          }
      },
      computed: mapState({ 
         //editData: state => state.data.editCategories,
      }),
      created(){
          if( typeof(this.$route.params.id)!='undefined' ){
              this.editBlogCategories(this.$route.params.id);    
          }
      }
    }
</script> 
<style scoped> 
</style>
