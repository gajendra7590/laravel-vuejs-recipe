<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">POPULAR TAGS</h3>
    </div>
    <div class="widget-tag">
      <ul v-if="getBlogTags">
        <li v-for="(tag,index) in getBlogTags" :key="index">
          <router-link :to="'/blogs/tag/'+tag.slug">#{{ tag.name }}</router-link>
        </li>
      </ul>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "LatestTags",
  data() {
    return {};
  },
  methods: {
     popularTags() {
      this.$store.dispatch("getBlogTags", {limit : 9});
    },
  },
  created() {
    this.popularTags();
  },
  computed: mapState({
    getBlogTags: (state) => state.data.getBlogTags,
  }),
};
</script>

<style>
</style>