<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Tags</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Manage Tags</li>
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
                <h3 class="card-title">Manage Tag</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="vueForm" name="vueForm" enctype="multipart/form-data" @submit.prevent="submitForm(this)"> 
                    <div class="card-body">   
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tag Name</label>
                                    <input 
                                        type="text" 
                                        name="name"
                                        v-model="editData.name"
                                        class="form-control"  
                                        placeholder="Enter tag name...">
                                    <p class="text-danger validation_errors" v-if="errorsList.name">{{ errorsList.name }} </p>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <label>Tag Description</label>
                                    <vue-editor
                                    name="description" 
                                    v-model="editData.description">
                                    </vue-editor>
                                    <p class="text-danger validation_errors" v-if="errorsList.description">{{ errorsList.description }} </p>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tag Status</label>
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
                            <router-link to="/tags" class="btn btn-danger">Back</router-link>
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
      name: 'TagsForm',
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
          editTags(id){
            let _this = this;
            this.$store.dispatch('editTags',{id : id})
            .then(function(result){
                _this.editData = result;
            }).catch(function(error){
                console.log(error);
            }); 
          },
          submitForm(){
            var vueForm = new FormData( $('#vueForm')[0]);
            vueForm.append('description',this.editData.description);
            let _this = this;
            _this.loader = _this.$loading.show();
            if( this.editData.id > 0){
               this.$store.dispatch('updateTag',{ id : this.editData.id,data : vueForm})
               .then(function(result){
                  _this.loader.hide();
                   if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!');
                    setTimeout(function(){ _this.$router.push('/tags'); },500);
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
              this.$store.dispatch('createTag',{ id : this.editData.id,data : vueForm})
              .then(function(result){
                 _this.loader.hide();
                  if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!');
                    setTimeout(function(){ _this.$router.push('/tags'); },500);
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
              this.editTags(this.$route.params.id);    
          }
      }
    }
</script> 
<style scoped> 
</style>
