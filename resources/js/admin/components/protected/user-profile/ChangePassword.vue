<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Change Password</li>
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
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="vueForm" name="vueForm" enctype="multipart/form-data" @submit.prevent="submitForm(this)">
                <div class="card-body">
                  <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" 
                           name="old_password"
                           v-model="formData.old_password"
                           class="form-control"  
                           placeholder="******">
                  </div>
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="password" 
                           name="new_password"
                           v-model="formData.new_password"
                           class="form-control"  
                           placeholder="******">
                  </div> 
                  <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" 
                           name="new_password_confirmation"
                           v-model="formData.new_password_confirmation"
                           class="form-control"  
                           placeholder="******">
                  </div>
                </div>
                <!-- /.card-body --> 
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Password</button>
                  <router-link to="dashboard" class="btn btn-danger">Back</router-link>
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
export default {
  name: 'ChangePassword',
  data : function(){
    return { 
        formData : {
          old_password : '',
          new_password : '',
          new_password_confirmation : ''
        } 
    }
  },
  methods : {
      submitForm(){
        let _this = this;
         _this.$store.dispatch('changePassword',{data : _this.formData})
         .then(function(result){
            if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
              _this.$toastr.s('Password Changed Successfully','Success!');
              _this.resetForm(); 
            }else if( ( typeof(result.status) != 'undefined' ) && (result.status == false) ){ 
              _this.$toastr.e('Opps! Unable to save form,please check error log','Error!');  
            }else{
              _this.$toastr.e('Opps! Something went wrong,please check log','Error!'); 
            }  
        })
        .catch(function(error){
           _this.$toastr.e(error,'Error!'); 
        });
      }, 
      resetForm() {
        this.formData = { old_password : '',new_password : '',new_password_confirmation : '' };
      },
       
  } 
}
</script> 
<style scoped> 
</style>
