<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">INSTAGRAM</h3>
    </div>
    <div class="widget-instagram">
      <ul v-if="getBlogInstagrams">
        <li v-for="(insta,index) in getBlogInstagrams" :key="index">
          <div class="item-box">
            <img v-lazy="insta.photo_url" alt="Social Figure" class="img-fluid" />
            <a href="javascript:void(0);" class="item-icon">
              <i class="fab fa-instagram"></i>
            </a>
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
    instagramBlogs() {
      this.$store.dispatch("getBlogInstagrams", {limit : 9});
    },
  },
  created() {
    this.instagramBlogs();
  },
  computed: mapState({
    getBlogInstagrams: (state) => state.data.getBlogInstagrams,
  }),
};
</script>

<style>
</style>