<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Manage Blog</li>
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
                <h3 class="card-title">Manage Blog</h3>
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
                                        Feature Image
                                    </label>
                                    <input id="file-upload" class="_img_thumb_input" accept="image/*" name="image" type="file"/>
                                </div>
                            </div> 
                        </div> 
                        <p class="text-danger validation_errors" v-if="errorsList.image">{{ errorsList.image }} </p> 
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Blog Title</label> 
                                    <input 
                                        type="text" 
                                        name="title"
                                        v-model="editData.title"
                                        class="form-control"  
                                        placeholder="Enter title...">
                                    <p class="text-danger validation_errors" v-if="errorsList.title">{{ errorsList.title }} </p>
                                </div>
                            </div>
                        </div>  
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group" v-if="tags">
                                  <label>Blog Tags</label>
                                  <select class="form-control select2" name="tags[]" multiple="multiple" style="width: 100%;">
                                    <option v-for="(tag,index) in tags" 
                                    :key="index" 
                                    :selected="(editData.selected_tags.map(el => el.tag_id)).includes(tag.id)" 
                                    :value="tag.id">{{ tag.name }}</option> 
                                  </select>
                                  <p class="text-danger validation_errors" v-if="errorsList.tags">{{ errorsList.tags }} </p>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Blog Category</label>
                                    <select class="form-control" name="category_id" v-model="editData.category_id">
                                        <option value="" selected>---Select Blog Category</option> 
                                        <option v-for="(category,index) in categories" :key="index" :value="category.id">
                                          {{ category.name }}
                                        </option>
                                    </select>   
                                    <p class="text-danger validation_errors" v-if="errorsList.category_id">{{ errorsList.category_id }} </p>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <label>Blog Short Description</label>
                                    <textarea 
                                        class="form-control"
                                        name="short_desc" 
                                        placeholder='Short Desc..'
                                        v-model="editData.short_desc">
                                    </textarea>
                                    <p class="text-danger validation_errors" 
                                       v-if="errorsList.short_desc">{{ errorsList.short_desc }}
                                    </p>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <label>Blog Description</label>
                                    <vue-editor
                                    name="description" 
                                    placeholder='Full article note..'
                                    v-model="editData.description">
                                    </vue-editor>
                                    <p class="text-danger validation_errors" v-if="errorsList.description">{{ errorsList.description }} </p>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Blog Status</label>
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
                            <router-link to="/blogs" class="btn btn-danger">Back</router-link>
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
      name: 'RecipesForm',
      components: {
         VueEditor
      }, 
      data:function(){
        return {
          loader : null,
          errorsList : [],
          editData : {  
              id: 0,
              category_id : '',
              title: "",
              short_desc:"",
              description: "", 
              selected_tags : [], 
              photo_url: config.ASSET_BASE_URL+'default_img/default.jpg', 
              is_slider: "0",
              status: "1",
          },
          errors : {},
        }
      },
      methods : {
          editBlog(id){
            let _this = this;
             _this.loader = _this.$loading.show();
            this.$store.dispatch('editBlog',{id : id})
            .then(function(result){ 
                _this.editData = result;   
                _this.loader.hide(); 
            }).catch(function(error){
                console.log(error);
                _this.loader.hide();
            }); 
          },
          getCategories(){
            this.$store.dispatch('blogCategories');  
          },
          getTags(){  
            this.$store.dispatch('blogTags');  
          },  
          submitForm(){
            var vueForm = new FormData( $('#vueForm')[0]);
            vueForm.append('description',this.editData.description);
            let _this = this;
            _this.loader = _this.$loading.show();
            if( this.editData.id > 0){
               this.$store.dispatch('updateBlog',{ id : this.editData.id,data : vueForm})
               .then(function(result){
                  _this.loader.hide();
                   if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!');
                    setTimeout(function(){ _this.$router.push('/blogs'); },500);
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
              this.$store.dispatch('createBlog',{ id : this.editData.id,data : vueForm})
              .then(function(result){
                 _this.loader.hide();
                  if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!');
                    setTimeout(function(){ _this.$router.push('/blogs'); },500);
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
      created(){ 
          this.getCategories();
          this.getTags();
          if( typeof(this.$route.params.id)!='undefined' ){
              this.editBlog(this.$route.params.id);    
          }
      },
      mounted:function(){ 
          setTimeout( function(){
              $('.select2').select2();
           },1000);
      },
      computed: mapState({ 
          categories : state => state.data.blogCategories,
          tags : state => state.data.blogTags
      })

    }
</script> 
<style> 
  .additional-input-box {
        margin-bottom: 5px;
        padding: 15px;
        background-color: #eeeeee;
        display: flex;
        align-items: center;
   }
   .additional-input-box .form-control {
        background-color: #ffffff;
        border: none;
        border-radius: 4px;
        height: 40px;
        padding: 10px 15px;
    }
    .additional-input-box.icon-right i {
        margin-left: 10px;
        background-color: #ffffff;
        padding: 13px;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }
    .additional-input-box.icon-right i:hover {
        background-color: #ff4a52;
        color: #ffffff;
    }
    .additional-input-box i {
        color: #989898;
        font-size: 20px;
        width: 35px;
    }  
    .add-more-btn{
        margin: 9px;
        float: right;
    }
    .hideContainer {
      display: none !important;
    }
</style>
