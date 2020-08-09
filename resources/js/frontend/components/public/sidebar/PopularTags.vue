<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">POPULAR TAGS</h3>
    </div>
    <div class="widget-tag">
      <ul v-if="popularTags">
        <li v-for="(tag,index) in popularTags" :key="index">
          <router-link :to="'/recipes/tag/'+tag.name">#{{ tag.name }}</router-link>
        </li>
      </ul>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "PopularTags",
  data() {
    return {};
  },
  methods: {
    getPopularTags() {
      this.$store.dispatch("popularTags", 9);
    },
  },
  created() {
    this.getPopularTags();
  },
  computed: mapState({
    popularTags: (state) => state.data.popularTags,
  }),
};
</script>

<style>
</style>