<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
    </div>
    <div class="widget-follow-us">
      <ul>
        <li class="single-item">
          <a
            :href="( (companyDetail && (companyDetail.youtube_url!='') ) )?companyDetail.youtube_url:'javascript:void(0);'"
          >
            <i class="fab fa-youtube"></i>Subscribe Channel
          </a>
        </li>
        <li class="single-item">
          <a
            :href="( (companyDetail && (companyDetail.youtube_url!='')) )?companyDetail.facebook_url:'javascript:void(0);'"
          >
            <i class="fab fa-facebook-f"></i>LIKE ME ON
          </a>
        </li>
        <li class="single-item">
          <a
            :href="( (companyDetail && (companyDetail.twitter_url!='')))?companyDetail.twitter_url:'javascript:void(0);'"
          >
            <i class="fab fa-twitter"></i>LIKE ME
          </a>
        </li>
        <li class="single-item">
          <a
            :href="((companyDetail && (companyDetail.linkedin_url!='')))?companyDetail.linkedin_url:'javascript:void(0);'"
          >
            <i class="fab fa-linkedin-in"></i>LIKE ME
          </a>
        </li>
        <li class="single-item">
          <a
            :href="((companyDetail && (companyDetail.instagram_url!='')))?companyDetail.instagram_url:'javascript:void(0);'"
          >
            <i class="fab fa-instagram"></i>LIKE ME
          </a>
        </li>
        <li class="single-item">
          <a
            :href="( (companyDetail && (companyDetail.pinterest_url!='')))?companyDetail.pinterest_url:'javascript:void(0);'"
          >
            <i class="fab fa-pinterest-p"></i>LIKE ME
          </a>
        </li>
        <li class="single-item">
          <a
            :href="( (companyDetail && (companyDetail.telegram_url!='')) )?companyDetail.telegram_url:'javascript:void(0);'"
          >
            <i class="fab fa-telegram"></i>Subscribe US
          </a>
        </li>
      </ul>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "SubscribeAndFollow",
  data() {
    return {};
  },
  methods: {},
  computed: mapState({
    companyDetail: (state) => state.data.companyDetail,
  }),
};
</script>

<style>
</style>