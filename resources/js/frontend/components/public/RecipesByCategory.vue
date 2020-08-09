<template>
  <div id="recipesByCategory">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image="g"
    > 
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Recipe With Sidebar Area Start Here -->
    <section class="all-recipes-page-wrap padding-top-80 padding-bottom-22">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8"> 
            <div class="adv-search-wrap">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Recipe Search . . ."
                />
                <div class="btn-group">
                  <div class="input-group-btn">
                    <button type="submit" class="btn-search">
                      <i class="flaticon-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" v-if="recipesList">
              <div class="col-md-6 col-12" v-for="(recipe,index) in recipesList" :key="index">
                <div class="product-box-layout1 recipes-list-container">
                  <figure class="item-figure">
                    <router-link :to="'/recipe/'+recipe.slug">
                      <img v-lazy="recipe.photo_url" alt="recipe.title" />
                    </router-link>
                  </figure>
                  <div class="item-content">
                    <span class="sub-title">{{ recipe.category.name }}</span>
                    <h3 class="item-title">
                      <router-link :to="'recipe/'+recipe.slug">{{ recipe.title }}</router-link>
                    </h3>
                    <ul class="item-rating">
                      <li class="star-fill">
                        <i class="fas fa-star"></i>
                      </li>
                      <li class="star-fill">
                        <i class="fas fa-star"></i>
                      </li>
                      <li class="star-fill">
                        <i class="fas fa-star"></i>
                      </li>
                      <li class="star-fill">
                        <i class="fas fa-star"></i>
                      </li>
                      <li class="star-empty">
                        <i class="fas fa-star"></i>
                      </li>
                      <li>
                        <span>
                          9
                          <span>/ 10</span>
                        </span>
                      </li>
                    </ul>
                    <p>{{ recipe.short_desc }}</p>
                    <ul class="entry-meta">
                      <li>
                        <a href="javascript:void(0);" title="Cooking Time">
                          <i class="fas fa-clock"></i>
                          {{ recipe.cooking_time }}
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);">
                          <i class="fas fa-user"></i>by
                          <span>{{ recipe.user.first_name }}</span>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);">
                          <i class="fas fa-heart"></i>
                          <span>02</span> Likes
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
            <LatestRecipes />
            <SubscribeAndFollow /> 
            <FeaturedRecipe />  
            <GetLatestUpdates /> 
            <Instagram /> 
            <PopularTags />  
          </div>
        </div>
      </div>
    </section>
    <!-- Recipe With Sidebar Area End Here --> 
    >
  </div>
</template>

<script>
import { mapState } from "vuex"; 
//Custom components
import LatestRecipes from './sidebar/LatestRecipes';
import SubscribeAndFollow from './sidebar/SubscribeAndFollow';
import FeaturedRecipe from './sidebar/FeaturedRecipe';
import Instagram from './sidebar/Instagram';
import PopularTags from './sidebar/PopularTags';
import GetLatestUpdates from './blog_sidebar/GetLatestUpdates';
export default {
  name: "recipesByCategory",
  components: { 
    LatestRecipes, 
    SubscribeAndFollow,
    FeaturedRecipe,
    Instagram,
    PopularTags,
    GetLatestUpdates 
  },
  data() {
    return {};
  },
  methods: {
    getRecipesList(slug) {
      this.$store.dispatch("recipesListByCategory",{slug : slug});
    } 
  },
  created() { 
    let slug = this.$route.params.slug; 
    if (slug != undefined) { 
      this.getRecipesList(slug); 
    }
  },
  computed: mapState({
    recipesList: (state) => state.data.recipesListByCategory 
  }),
};
</script> 
<style scoped>
img.insta-img {
  min-height: 100px;
  max-height: 100px;
  min-width: 114px;
  max-width: 114px;
}

.recipes-list-container img {
  min-height: 270px;
  max-height: 270px;
  min-width: 365px;
  max-width: 365px;
}
</style>