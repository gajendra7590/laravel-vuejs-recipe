<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/dshboard" class="brand-link">
      <img  v-lazy="userProfile.photo_url" alt="Admin" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Recipe Dashboard</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img 
           v-lazy="userProfile.photo_url"
           class="img-circle elevation-2" 
           alt="User Image"> -->
        </div>
        <div class="info">
          <router-link to="/update-profile" title="Edit Profile" class="d-block">
               {{ (userProfile.display_name)?userProfile.display_name:'User Name' }}
            </router-link>
            <span style="color:#fff;">
               ( {{ (userProfile.role)?userProfile.role:' ROLE ' }} }
            </span>
        </div>
      </div> 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           
          <li class="nav-item">
            <router-link to="/dashboard" title="View Dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </router-link>
          </li> 

          <li class="nav-item">
            <router-link to="/clients" title="View Clients List" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Clients</p>
            </router-link>
          </li> 

           <li class="nav-item">
            <router-link to="/authors" title="View Users List" class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>Authors</p>
            </router-link>
          </li> 

          <li class="nav-item">
            <router-link to="/categories" title="View Categories List" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Categories</p>
            </router-link>
          </li> 

           <li class="nav-item">
              <router-link to="/recipes" title="View Recipes List" class="nav-link">
                <i class="nav-icon fas fa-hamburger"></i>
                <p>Recipes</p>
              </router-link>
           </li> 

          <li class="nav-item">
            <router-link to="/change-password" title="Change Your Password" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>Change Password</p>
            </router-link>
          </li>   

          <li class="nav-item">
            <router-link to="/update-profile" title="Update Your Profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Update Profile</p>
            </router-link>
          </li>     

          <li class="nav-item">
            <router-link to="/logout" title="SignOut Your Account" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Sign Out</p>
            </router-link>
          </li>   

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
  name: 'Sidebar',
  data : function(){
    return {
      userProfile : {}
    }
  },
  methods :{
    getProfile(){
      let _this = this;
      _this.$store.dispatch('loggedProfile')
      .then(function(result){
         _this.userProfile = result;
       }) 

    }
  },
  created(){
    this.getProfile();
    //this.$loading.show({color: '#fff',backgroundColor: '#343a40',opacity: 0.9, zIndex: 999,});
  }   

}
</script> 
<style scoped> 
</style>
