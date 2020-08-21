<template>
  <div id="wrapper" class="wrapper">
    <!-- Slider Area Start Here -->
    <section class="ranna-slider-area">
      <div class="container">
        <vueper-slides
          :autoplay="true"
          :duration="3000"
          fixed-height="300px"
          class="rc-carousel nav-control-layout3 owl-carousel owl-loaded owl-drag"
        >
          <vueper-slide
            v-for="(sld,index) in homeSlider.slider"
            :key="index"
            class="ranna-slider-content-layout1"
          >
            <template v-slot:content>
              <figure class="item-figure">
                <router-link :to="'/recipe/'+sld.slug">
                  <img v-lazy="sld.photo_url" alt="Product" class="home_main_slider" />
                </router-link>
              </figure>
              <div class="item-content">
                <span class="sub-title recipe_category_name">{{ sld.category.name }}</span>
                <h2 class="item-title recipe_title">
                  <router-link :to="'/recipe/'+sld.slug">{{ sld.title }}</router-link>
                </h2> 
                 
                 <Rating :rating="sld.avg_rating"/>

                <p class="recipe_short_desc" v-html="sld.short_desc"></p>
                <ul class="entry-meta">
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-clock"></i>
                      {{ sld.cooking_time }} Min
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-user"></i>by
                      <span>{{ sld.user.first_name }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-heart"></i>
                      <span>{{sld.likes_count }}</span> Likes
                    </a>
                  </li>
                </ul>
              </div>
            </template>
          </vueper-slide>
        </vueper-slides>
      </div>
    </section>
    <!-- Slider Area End Here -->
    <!-- Random Recipe Start Here -->
    <section class="padding-bottom-18">
      <div class="container">
        <div class="row" v-if="trending">
          <div
            v-for="(rec,index) in homeSlider.padbottom18"
            :key="index"
            class="col-lg-4 d-block d-md-none d-lg-block col-sm-12"
          >
            <div class="product-box-layout1">
              <figure class="item-figure">
                <router-link :to="'/recipe/'+rec.slug">
                  <img v-lazy="rec.photo_url" alt="Product" />
                </router-link>
              </figure>
              <div class="item-content">
                <span class="sub-title recipe_category_name">{{ rec.category.name }}</span>
                <h3 class="item-title recipe_title">
                  <router-link :to="'/recipe/'+rec.slug">{{ rec.title }}</router-link>
                </h3>
                <Rating :rating="rec.avg_rating"/>
                <ul class="entry-meta">
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-clock"></i>
                      {{ rec.cooking_time }} Min
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-user"></i>by
                      <span>{{ rec.user.first_name }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-heart"></i>
                      <span>{{ rec.likes_count }}</span> Likes
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Random Recipe End Here -->
    <!-- Trending Recipe Start Here -->
    <section class="padding-bottom-45">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8">
            <div class="section-heading heading-dark">
              <h2 class="item-heading">TRENDING RECIPES</h2>
            </div>
            <div class="row" v-if="trending">
              <div
                v-for="(rec,index) in trending"
                :key="index"
                :class=" (index == 0)?'col-12':'col-md-6 col-sm-6'"
              >
                <div
                  class="product-box-layout1"
                  :class=" (index == 0)?'trending_home_first':'trending_home'"
                >
                  <figure class="item-figure">
                    <router-link :to="'/recipe/'+rec.slug">
                      <img v-lazy="rec.photo_url" alt="Product" />
                    </router-link>
                  </figure>
                  <div class="item-content">
                    <span class="sub-title recipe_category_name">{{ rec.category.name }}</span>
                    <h2 class="item-title recipe_title">
                      <router-link :to="'/recipe/'+rec.slug">{{ rec.title }}</router-link>
                    </h2>

                     <Rating :rating="rec.avg_rating"/>

                    <p class="recipe_short_desc">{{ rec.short_desc }}</p>
                    <ul class="entry-meta">
                      <li>
                        <a href="javascript:void(0);">
                          <i class="fas fa-clock"></i>
                          {{ rec.cooking_time }} Min
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);">
                          <i class="fas fa-user"></i>by
                          <span>{{ rec.user.first_name }}</span>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);">
                          <i class="fas fa-heart"></i>
                          <span>{{ rec.likes_count }}</span> Likes
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="ranna-ad-box">
              <a href="javascript:void(0);">
                <img :src="this.$store.state.ASSET_BASE_URL+'app/img/figure/figure1.jpg'" alt="ad" />
              </a>
            </div>
          </div>
          <div class="col-lg-4 sidebar-widget-area sidebar-break-md"> 
            <AboutMe /> 
            <SubscribeAndFollow />
            <LatestRecipes /> 
            <Categories /> 
            <GetLatestUpdates />
          </div>
        </div>
      </div>
    </section>
    <!-- Trending Recipe End Here -->
    <!-- Editor’s Choice Start Here -->
    <section class="padding-bottom-45">
      <div class="container">
        <div class="section-heading heading-dark">
          <h2 class="item-heading">EDITOR'S CHOICE</h2>
        </div>
        <div class="row" v-if="homeSection3InOne">
          <div
            v-for="(ec,index) in homeSection3InOne.editorsChoice"
            :key="index"
            class="col-lg-4 d-block d-md-none d-lg-block col-sm-12 col-12"
          >
            <div class="product-box-layout2 editors-choice">
              <figure class="item-figure">
                <router-link :to="'/recipe/'+ec.slug">
                  <img v-lazy="ec.photo_url" alt="Product" />
                </router-link>
              </figure>
              <div class="item-content">
                <span class="sub-title recipe_title">{{ ec.title }}</span>
                <h3 class="item-title">
                  <router-link :to="'/recipe/'+ec.slug" class="recipe_short_desc">{{ ec.short_desc }}</router-link>
                </h3>
                 <Rating :rating="ec.avg_rating"/>
                <ul class="entry-meta">
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-clock"></i>
                      {{ ec.cooking_time }} Min
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-user"></i>by
                      <span>{{ ec.user.first_name }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-heart"></i>
                      <span>{{ ec.likes_count }}</span> Likes
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Editor’s Choice End Here -->
    <!-- Popular Recipe Start Here -->
    <section class="padding-bottom-45">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8">
            <div class="section-heading heading-dark">
              <h2 class="item-heading">POPULAR RECIPES</h2>
            </div>
            <div class="row" v-if="homeSection3InOne">
              <div
                v-for="(pr,index) in homeSection3InOne.popular"
                :key="index"
                class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12"
              >
                <div class="product-box-layout3 popular-recipes">
                  <figure class="item-figure">
                    <router-link :to="'/recipe/'+pr.slug">
                      <img v-lazy="pr.photo_url" alt="Product" />
                    </router-link>
                  </figure>
                  <div class="item-content">
                    <span class="sub-title recipe_category_name">{{ pr.category.name }}</span>
                    <h3 class="item-title">
                      <router-link :to="'/recipe/'+pr.slug" class="recipe_title">{{ pr.title }}</router-link>
                    </h3>
                    <Rating :rating="pr.avg_rating"/>
                    <p class="recipe_description">{{ pr.short_desc }}</p>
                    <ul class="entry-meta">
                      <li>
                        <a href="javascript:void(0);">
                          <i class="fas fa-clock"></i>
                          {{ pr.cooking_time }} Min
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);">
                          <i class="fas fa-user"></i>by
                          <span>{{ pr.user.first_name }}</span>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:void(0);">
                          <i class="fas fa-heart"></i>
                          <span>{{ pr.likes_count }}</span> Likes
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 sidebar-widget-area sidebar-break-md">

             <FeaturedRecipe />
             <PopularTags />     
                   
          </div>
        </div>
      </div>
    </section>
    <!-- Popular Recipe End Here -->
    <!-- Instagram Start Here -->
    <section class="instagram-feed-wrap">
      <div class="instagram-feed-title">
        <a href="javascript:void(0);">
          <i class="fab fa-instagram"></i>Follow On Instagram
        </a>
      </div>
      <ul class="instagram-feed-figure" v-if="followOnInsta">
        <li v-for="(insta,index) in followOnInsta" :key="index">
          <router-link :to="'/recipe/'+insta.slug">
            <img v-lazy="insta.photo_url" alt="Social" />
          </router-link>
        </li>
      </ul>
    </section>
    <!-- Instagram End Here -->
  </div>
</template>

<script>
import { mapState } from "vuex";
//In your Vue.js component.
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
//Import Component 
import AboutMe from './sidebar/AboutMe';
import SubscribeAndFollow from './sidebar/SubscribeAndFollow';
import LatestRecipes from './sidebar/LatestRecipes';
import Categories from './sidebar/Categories';
import FeaturedRecipe from './sidebar/FeaturedRecipe';
import PopularTags from './sidebar/PopularTags';
import GetLatestUpdates from './blog_sidebar/GetLatestUpdates';
export default {
  name: "home",
  components: { 
    VueperSlides, 
    VueperSlide,
    //below all custom components
    AboutMe,
    SubscribeAndFollow,
    LatestRecipes,
    Categories,
    FeaturedRecipe,
    PopularTags,
    GetLatestUpdates
  },
  data() {
    return {};
  },
  methods: {
    getHomeSlider() {
      this.$store.dispatch("getHomeSlider");
    },
    homeTrendingRecipe() {
      this.$store.dispatch("homeTrendingRecipe");
    },
    homeSection3In1() {
      this.$store.dispatch("homeSection3In1");
    }, 
    followOnInstagram() {
      this.$store.dispatch("followOnInstagram");
    }, 
    getRandomRecipes() {
      this.$store.dispatch("randomRecipes", 3);
    },
  },
  created() {
    this.getHomeSlider();
    this.homeTrendingRecipe();
    this.homeSection3In1();
    this.followOnInstagram(); 
    this.getRandomRecipes();
  },
  computed: mapState({
    homeSlider: (state) => state.data.getHomeSlider,
    trending: (state) => state.data.homeTrendingRecipe,
    homeSection3InOne: (state) => state.data.homeSection3In1,
    followOnInsta: (state) => state.data.followOnInstagram,  
  }),
};
</script>

<style>
.vueperslides {
  margin-bottom: 17px !important;
}

.ranna-slider-content-layout1 {
  margin-bottom: 0px !important;
}
.vueperslides__bullets {
  bottom: -18px !important;
}

.item-img.latest-item-img img {
  height: 97px;
  width: 106px;
}
.item-img.latest-item-img {
  max-width: 128px;
  min-height: 70px;
}
.instagram-feed-figure img {
  width: 230px;
  height: 230px;
}

.padding-bottom-18 img,
.trending_home img,
.editors-choice img {
  min-height: 273px;
  max-height: 273px;
  max-width: 365px;
  min-width: 365px;
}
.popular-recipes img {
  max-width: 425px;
  min-width: 425px;
  max-height: 271px;
  min-height: 271px;
}
.trending_home_first img {
  min-width: 780px;
  max-width: 780px;
  max-height: 400px;
  min-height: 400px;
}
.home_main_slider img {
  min-width: 1170px !important;
  max-width: 1170px !important;
  max-height: 546px !important;
  min-height: 546px !important;
}
</style>