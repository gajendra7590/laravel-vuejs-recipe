<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">CATEGORIES</h3>
    </div>
    <div class="widget-categories">
      <ul v-if="getBlogCategories">
        <li v-for="(cat,index) in getBlogCategories" :key="index">
          <router-link :to="'/blogs/category/'+cat.slug">
            {{ cat.name }}
            <span>{{ (cat.totalBlogs)?cat.totalBlogs:'0' }}</span>
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "LatestCategories",
  data() {
    return {};
  },
  methods: {
    popularCategories() {
      this.$store.dispatch("getBlogCategories", {limit : 7});
    },
  },
  created() {
    this.popularCategories();
  },
  computed: mapState({
    getBlogCategories: (state) => state.data.getBlogCategories,
  }),
};
</script>

<style>
</style>