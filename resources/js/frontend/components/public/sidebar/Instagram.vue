<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">INSTAGRAM</h3>
    </div>
    <div class="widget-instagram">
      <ul v-if="followOnInsta">
        <li v-for="(insta,index) in followOnInsta" :key="index">
          <div class="item-box">
            <img v-lazy="insta.photo_url" alt="Social Figure" class="img-fluid insta-img" />
            <router-link :to="'/recipe/'+insta.slug" class="item-icon">
              <i class="fab fa-instagram"></i>
            </router-link>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "Instagram",
  data() {
    return {};
  },
  methods: {
    followOnInstagram() {
      this.$store.dispatch("followOnInstagram", 9);
    },
  },
  created() {
    this.followOnInstagram();
  },
  computed: mapState({
    followOnInsta: (state) => state.data.followOnInstagram,
  }),
};
</script>

<style>
</style>