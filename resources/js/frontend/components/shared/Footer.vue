<template>
  <footer class="ranna-bg-dark">
    <div class="container">
      <div class="footer-logo">
        <router-link to="/">
          <img :src="this.$store.state.ASSET_BASE_URL+'app/img/logo-light.png'" class="img-fluid" alt="footer-logo" />
        </router-link>
      </div>
      <div class="footer-menu">
        <ul>
          <li>
            <a :href="( (companyDetail) && (companyDetail.youtube_url!='') )?companyDetail.youtube_url:'javascript:void(0);'">YOUTUBE CHANNEL</a>
          </li>
          <li>
            <a :href="( (companyDetail) && (companyDetail.facebook_url!='') )?companyDetail.facebook_url:'javascript:void(0);'">FACEBOOK</a>
          </li>
          <li>
            <a :href="( (companyDetail) && (companyDetail.twitter_url!='') )?companyDetail.twitter_url:'javascript:void(0);'">TWITTER</a>
          </li>
          <li>
            <a :href="( (companyDetail) && (companyDetail.instagram_url!='') )?companyDetail.instagram_url:'javascript:void(0);'">INSTAGRAM</a>
          </li>
          <li>
            <a :href="( (companyDetail) && (companyDetail.linkedin_url!='') )?companyDetail.linkedin_url:'javascript:void(0);'">LINKEDIN</a>
          </li>
          <li>
            <a :href="( (companyDetail) && (companyDetail.pinterest_url!='') )?companyDetail.pinterest_url:'javascript:void(0);'">PINTEREST</a>
          </li>
          <li>
            <a :href="( (companyDetail) && (companyDetail.telegram_url!='') )?companyDetail.telegram_url:'javascript:void(0);'">TELEGRAM</a>
          </li>
        </ul>
      </div>
      <div class="copyright">© All Right Reserved {{ new Date() | moment('YYYY') }}</div>
    </div>
  </footer>
</template>

<script>
import { mapState } from "vuex";
export default {
  name: "footercomponent",
  data() {
    return { 
    }
  },
  methods : {
    getCompanyDetail(){ 
       this.$store.dispatch('companyDetail');
    }
  },
  computed:mapState({
    companyDetail : (state) => state.data.companyDetail
  }),
  created(){ 
    this.getCompanyDetail();    
  }
};
</script>

<style scoped>
</style>