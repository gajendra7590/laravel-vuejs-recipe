<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">ABOUT ME</h3>
    </div>
    <div class="widget-about">
      <figure class="author-figure">
        <img
          v-lazy="(companyDetail)?companyDetail.photo_url:''"
          style="height: 150px;width: 170px;"
          alt="about"
        />
      </figure>
      <p>{{ (companyDetail)?companyDetail.about:'' }}</p>
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