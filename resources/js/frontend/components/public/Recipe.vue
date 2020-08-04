<template>
  <div id="recipes">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image="/app/img/figure/inner-page-banner1.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs-area">
              <h1>Recipes List</h1>
              <ul>
                <li>
                  <router-link to="/home">Home</router-link>
                </li>
                <li>All Recipes</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
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
                  placeholder="Author Name or Recipe Search . . ."
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
                    <router-link :to="'recipe/'+recipe.slug">
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
            <div class="widget">
              <div class="section-heading heading-dark">
                <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
              </div>
              <div class="widget-follow-us">
                <ul>
                  <li class="single-item">
                    <a href="javascript:void(0);">
                      <i class="fab fa-facebook-f"></i>LIKE ME ON
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="javascript:void(0);">
                      <i class="fab fa-twitter"></i>LIKE ME
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="javascript:void(0);">
                      <i class="fab fa-linkedin-in"></i>LIKE ME
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="javascript:void(0);">
                      <i class="fab fa-pinterest-p"></i>LIKE ME
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="javascript:void(0);">
                      <i class="fab fa-instagram"></i>LIKE ME
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="javascript:void(0);">
                      <i class="fab fa-youtube"></i>Subscribe
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget">
              <div class="widget-ad">
                <a href="javascript:void(0);">
                  <img src="/app/img/figure/figure4.jpg" alt="Ad" class="img-fluid" />
                </a>
              </div>
            </div>
            <div class="widget">
              <div class="section-heading heading-dark">
                <h3 class="item-heading">FEATURED ARTICLE</h3>
              </div>
              <div class="widget-featured-feed" v-if="featuredRecipes">
                <vueper-slides :autoplay="true" :duration="3000" class fixed-height="418px">
                  <vueper-slide
                    v-for="(fa,index) in featuredRecipes"
                    :key="index"
                    class="featured-box-layout1 owl-stage-outer"
                  >
                    <template v-slot:content>
                      <div class="item-img">
                        <img v-lazy="fa.photo_url" alt="Brand" class="img-fluid" />
                      </div>
                      <div class="item-content">
                        <span class="ctg-name">{{ fa.category.name }}</span>
                        <h4 class="item-title">
                          <router-link :to="'/recipe/'+fa.slug">{{ fa.title }}</router-link>
                        </h4>
                        <p>{{ fa.short_desc }}</p>
                      </div>
                    </template>
                  </vueper-slide>
                </vueper-slides>
              </div>
            </div>
            <div class="widget">
              <div class="widget-newsletter-subscribe">
                <h3>GET LATEST UPDATES</h3>
                <p>Newsletter Subscribe</p>
                <form class="newsletter-subscribe-form">
                  <div class="form-group">
                    <input
                      type="text"
                      placeholder="your e-mail address"
                      class="form-control"
                      name="email"
                      data-error="E-mail field is required"
                      required
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group mb-none">
                    <button type="submit" class="item-btn">SUBSCRIBE</button>
                  </div>
                </form>
              </div>
            </div>
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
            <div class="widget">
              <div class="section-heading heading-dark">
                <h3 class="item-heading">POPULAR TAGS</h3>
              </div>
              <div class="widget-tag">
                <ul v-if="popularTags">
                  <li v-for="(tag,index) in popularTags" :key="index">
                    <router-link :to="'/recipe/tag/'+tag.name">{{ tag.name }}</router-link>
                  </li>
                </ul>
              </div>
            </div>
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
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
export default {
  name: "recipes",
  components: { VueperSlides, VueperSlide },
  data() {
    return {};
  },
  methods: {
    getRecipesList() {
      this.$store.dispatch("recipesList");
    },
    getFeaturedRecipes() {
      this.$store.dispatch("featuredRecipes", 3);
    },
    getLatestsRecipes() {
      this.$store.dispatch("latestsRecipes", 4);
    },
    followOnInstagram() {
      this.$store.dispatch("followOnInstagram", 9);
    },
    getPopularTags() {
      this.$store.dispatch("popularTags", 10);
    },
  },
  created() {
    this.getRecipesList();
    this.getFeaturedRecipes();
    this.getLatestsRecipes();
    this.followOnInstagram();
    this.getPopularTags();
  },
  computed: mapState({
    recipesList: (state) => state.data.recipesList,
    featuredRecipes: (state) => state.data.featuredRecipes,
    latestsRecipes: (state) => state.data.latestsRecipes,
    followOnInsta: (state) => state.data.followOnInstagram,
    popularTags: (state) => state.data.popularTags,
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