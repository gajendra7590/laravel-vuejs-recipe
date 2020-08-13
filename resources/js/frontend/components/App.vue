<template>
  <div id="appcomponent">
    <Header />
       <router-view></router-view>
    <Footer />
  </div>
</template> 
<script>
import Header from "./shared/Header";
import Footer from "./shared/Footer";
export default {
  name: "appcomponent",
  components: {
    Header,
    Footer,
  },
  data() {
    return { 
      loader : null
    };
  },
  methods:{ 
    getUserToken(){
        let token = null;
        let userData = localStorage.getItem('USER_SESSION');
        if (!!userData) {
            try {
                userData = JSON.parse(userData);
                token = (typeof(userData.userToken) != 'undefined') ? userData.userToken : null;
            } catch (e) {
              token = null;                
            }
        }
        return token;
    },
    getUserProfile() {
        let token = this.getUserToken(); 
        let _this = this;
        _this.loader = _this.$loading.show({zIndex : 99999999,opacity:1,backgroundColor: '#dc3545',color:'#fff'});
        if( (token != null) && (token != '') ){
            _this.$store.dispatch('getProfile')
            .then(function(result){
              _this.$store.state.data.userDetail = result;
               setTimeout(function(){ _this.loader.hide(); },1000);
            })
            .catch(function(error){
                console.log( error );
            });
        } else{ setTimeout(function(){ _this.loader.hide(); },1000); }  
    }
  },
  created(){ 
    this.getUserProfile();
  }
};
</script>
<style scoped>
</style>
