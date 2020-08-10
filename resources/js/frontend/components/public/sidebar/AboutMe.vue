<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">ABOUT ME</h3>
    </div>
    <div class="widget-about">
      <figure class="author-figure">
        <img
          v-lazy="(companyDetail)?companyDetail.photo_url:''"
          class="sb-aboutme-img"
          alt="about"
        />
      </figure>
      <p class="recipe_title">{{ (companyDetail)?companyDetail.about:'' }}</p>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex"; 
export default {
  name: "AboutMeSideBar", 
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