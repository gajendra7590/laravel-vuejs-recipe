<template>
  <div id="app"> 
    <Header />
         <router-view></router-view>
    <Sidebar />
    <Footer />
  </div>
</template>

<script>
import Header from './components/shared/Header'
import Sidebar from './components/shared/Sidebar'
import Footer from './components/shared/Footer' 
export default {
  name: 'App',
  components: {
    Header,
    Sidebar,
    Footer
  },
  data(){
    return {
      loader : null
    }
  },
  methods:  {
    ValidateLoginStatus(){
      let _this = this;
      _this.$store.dispatch("loggedProfile")
      .then(function (result) {   
        _this.$store.state.data.userProfile = result; 
        setTimeout(function(){ _this.loader.hide();},2000)    
      }).catch(function(error){
          if( typeof(error.status != 'undefined') && (error.status == '401') && (error.statusText == 'Unauthorized') ){             
             _this.$toastr.e('YOUR SESSION HAS BEEN EXPIRED PLEASE LOGIN ONCE AGAIN','LOGOUT'); 
             localStorage.removeItem('ADMIN_SESSION');
             Window.location.href = '/admin/login';
          }         
      }); 
    } 
  },
  created(){
    let _this = this;
    _this.loader = this.$loading.show({opacity:1 ,backgroundColor: 'red', color: '#fff'});
    if(!!localStorage.getItem('ADMIN_SESSION')){ 
       this.ValidateLoginStatus(); 
    } else { 
       Window.location.href = '/admin/login'; 
    } 
  }
}
</script> 
<style> 
</style>
