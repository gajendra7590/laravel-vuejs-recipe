<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">LATEST RECIPES</h3>
    </div>
    <div class="widget-latest">
      <ul class="block-list" v-if="latestsRecipes">
        <li v-for="(lr ,index) in latestsRecipes" :key="index" class="single-item">
          <div class="item-img latest-item-img">
            <router-link :to="'/recipe/'+lr.slug">
              <img v-lazy="lr.photo_url" alt="Post" />
            </router-link>
            <div class="count-number">{{ index }}</div>
          </div>
          <div class="item-content">
            <div class="item-ctg">{{ lr.category.name }}</div>
            <h4 class="item-title">
              <router-link :to="'/recipe/'+lr.slug">{{ lr.title }}</router-link>
            </h4>
            <div class="item-post-by">
              <router-link :to="'/recipe/'+lr.slug">
                <i class="fas fa-user"></i>
                <span>by</span>
                {{ lr.user.first_name }}
              </router-link>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "LatestRecipes",
  data() {
    return {};
  },
  methods: {
    getLatestsRecipes() {
      this.$store.dispatch("latestsRecipes", 5);
    },
  },
  created() {
    this.getLatestsRecipes();
  },
  computed: mapState({
    latestsRecipes: (state) => state.data.latestsRecipes,
  }),
};
</script>

<style>
</style>