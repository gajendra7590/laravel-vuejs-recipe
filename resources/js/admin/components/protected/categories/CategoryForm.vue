<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Update Category</li>
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
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="vueForm" name="vueForm" enctype="multipart/form-data"> 
                    <div class="card-body">  
                        <div class="row logo-container card-footer">
                            <div class="col-sm-12">
                                <div class="card-body box-profile">
                                    <div class="text-left">
                                       <img 
                                            class="profile-user-img img-fluid img-circle" 
                                            :src="(editData)?editData.photo_url:''" 
                                            alt="User profile picture"
                                       >
                                    </div>   
                                </div>
                                <div class="customInput">
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload-alt" aria-hidden="true"></i>
                                        Upload Category Image
                                    </label>
                                    <input id="file-upload" name="image" type="file"/>
                                </div>
                            </div>
                        </div>
                        {{ editData }}
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input 
                                        type="text" 
                                        name="name"
                                        v-model="editData.name"
                                        class="form-control"  
                                        placeholder="Enter category name...">
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <vue-editor v-model="editData.description"></vue-editor>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category Status</label>
                                    <select class="form-control" v-model="(editData)?editData.status:''">
                                        <option value="0">In Active</option>
                                        <option value="1">Active</option>
                                        <option value="2">Archieved</option> 
                                    </select>   
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <router-link to="/categories" class="btn btn-danger">Back</router-link>
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
    export default {
      name: 'CategoryForm',
      components: {
         VueEditor
      }, 
      data () {
          return {  
              editData : []
          }
      },
      methods : {
          editCategories(id){
              this.$store.dispatch('editCategories',id).then(function(result){
                  console.log( result )

              }); 
          }
      },
      computed: mapState({ 
         //editData: state => state.data.editCategories,
      }),
      created(){
          this.editCategories(this.$route.params.id);          
      }
    }
</script> 
<style scoped> 
</style>
