<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">CATEGORIES</h3>
    </div>
    <div class="widget-categories">
      <ul v-if="categories">
        <li v-for="(cat,index) in categories" :key="index">
          <router-link :to="'/recipes/category/'+cat.slug" class="recipe_category_name">
            {{ cat.name }}
            <span>{{ cat.counts }}</span>
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "Categories",
  data() {
    return {};
  },
  methods: {
    getCategories() {
      this.$store.dispatch("getSidebarCategories", 6);
    },
  },
  created() {
    this.getCategories();
  },
  computed: mapState({
    categories: (state) => state.data.getSidebarCategories,
  }),
};
</script>

<style>
</style>