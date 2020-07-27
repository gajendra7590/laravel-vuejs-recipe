<template>
  <div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Sign Out</h1> -->
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Sign Out</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">          
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
  name: 'LogOut',
  data() {
    return {
       loader : null
    }
  }, 
  methods:{
      adminLogout(){  
        let _this = this; 
       _this.$dialog.confirm('Are you sure to signout your account?')
        .then(function(dialog) {
          loader: true;  
            //Delete Code start
            _this.$loading.show();
            _this.$store
              .dispatch("adminLogout",_this.loginData).then(res => { 
                if( typeof(res.status)!='undefined' && (res.status == true) ){  
                  localStorage.removeItem('current_user');
                  localStorage.removeItem('token');
                  _this.$toastr.s("You have been logged out", "SUCCESS!!");
                  setTimeout(function(){
                    window.location.href='/admin/login';
                  },500);
                } else if( typeof(res.status)!='undefined' && (res.status == false) ){ 
                  _this.$toastr.s("Error in logged out", "ERROR!!");
                } 
              })
              .catch(e => {
                _this.$toastr.s("Error in logged out", "ERROR!!"); 
              }); 
        }).catch(() => { 
            _this.$router.push('/dashboard');
        });
     }
  },
  created(){
    this.adminLogout();
  }
}
</script> 
<style scoped> 
</style>
