<template>
  <div id="authorDetail">
    <!-- Inne Page Banner Area Start Here -->
    <section class="inner-page-banner bg-common" data-bg-image="/app/img/figure/inner-page-banner1.jpg">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs-area">
              <h1>Author Archives</h1>
              <ul>
                <li>
                  <router-link to="/home">Home</router-link>
                </li>
                <li>Author Archives</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Single Author Area Start Here -->
    <section class="single-author-page-wrap padding-top-80 padding-bottom-50">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8">
            <div class="author-info">
              <div class="media media-none--xs">
                <img
                  v-lazy="authorDetail.photo_url"
                  alt="Blog Author"
                  style="height:182px;width:182px;"
                  class="rounded-circle media-img-auto"
                />
                <div class="media-body">
                  <h2 class="author-title">{{ (authorDetail.display_name)?authorDetail.display_name:'' }}</h2>
                  <div class="author-designation">Dessert Specialist</div>
                  <p>
                     {{ (authorDetail.about_me)?authorDetail.about_me:'' }}
                  </p>
                  <ul class="author-social">
                    <li>
                      <a href="#" class="facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="linkedin">
                        <i class="fab fa-linkedin-in"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="google">
                        <i class="fab fa-google-plus-g"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#" class="pinterest">
                        <i class="fab fa-pinterest"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="authorsRecipeContainer" v-if="( (authorsRecipe) && (authorsRecipe.length > 0))">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">{{ authorsRecipe.length }} RECIPE(S)</h2>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-12" v-for="(recipe,index) in authorsRecipe" :key="index">
                    <div class="product-box-layout1">
                      <figure class="item-figure">
                        <router-link :to="'/recipe/'+recipe.slug">
                          <img v-lazy="recipe.photo_url" alt="Product" style="width:365px;height:270px;" />
                        </router-link>
                      </figure>
                      <div class="item-content">
                        <span class="sub-title">{{ recipe.category.name }}</span>
                        <h3 class="item-title">
                          <router-link :to="'/recipe/'+recipe.slug">
                            {{ recipe.title }}
                          </router-link>
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
                        <p>
                         {{ recipe.short_desc }}
                        </p>
                        <ul class="entry-meta">
                          <li>
                            <a href="#">
                              <i class="fas fa-clock"></i>{{ recipe.cooking_time }}
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="fas fa-user"></i>by
                              <span>{{ recipe.user.display_name }}</span>
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="fas fa-heart"></i>
                              <span>02</span> Likes
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div> 
                </div>
                <ul class="pagination-layout1">
                  <li class="active">
                    <a href="#">1</a>
                  </li>
                  <li>
                    <a href="#">2</a>
                  </li>
                  <li>
                    <a href="#">3</a>
                  </li>
                  <li>
                    <a href="#">4</a>
                  </li>
                  <li>
                    <a href="#">5</a>
                  </li>
                </ul>
            </div>
          </div>
          <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
            <div class="widget">
              <div class="section-heading heading-dark">
                <h3 class="item-heading">FEATURED RECIPE</h3>
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
              <div class="section-heading heading-dark">
                <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
              </div>
              <div class="widget-follow-us">
                <ul>
                  <li class="single-item">
                    <a href="#">
                      <i class="fab fa-facebook-f"></i>LIKE ME ON
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="#">
                      <i class="fab fa-twitter"></i>LIKE ME
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="#">
                      <i class="fab fa-linkedin-in"></i>LIKE ME
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="#">
                      <i class="fab fa-pinterest-p"></i>LIKE ME
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="#">
                      <i class="fab fa-instagram"></i>LIKE ME
                    </a>
                  </li>
                  <li class="single-item">
                    <a href="#">
                      <i class="fab fa-youtube"></i>Subscribe
                    </a>
                  </li>
                </ul>
              </div>
            </div>
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
                <h3 class="item-heading">INSTAGRAM</h3>
              </div>
              <div class="widget-instagram">
                <ul v-if="followOnInsta">
                  <li v-for="(insta,index) in followOnInsta" :key="index">
                    <div class="item-box">
                      <img
                        v-lazy="insta.photo_url"
                        alt="Social Figure"
                        class="img-fluid"
                      />
                      <a href="javascript:void(0);" class="item-icon">
                        <i class="fab fa-instagram"></i>
                      </a>
                    </div>
                  </li> 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Single Author Area End Here -->
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
    return {
      authorDetail : []
    };
  },
  methods: {
    getAuthorsDetail(id) {
      let _this = this;
      _this.$store.dispatch("authorsDetail",{id : id})
      .then(function(result){
        console.log(result.id)
        if(result.id != undefined){ 
          _this.authorDetail = result;
        }else{ 
          _this.$toastr.e('Opps! Invalid Request');
          _this.$router.push('/authors');
        } 
      })
      .catch(function(error){
        console.log( error )

      });
    },
    getRecipesList(id) {
      this.$store.dispatch("authorsRecipe",{id : id});
    },
    getFeaturedRecipes() {
      this.$store.dispatch("featuredRecipes", 3);
    },
    getLatestsRecipes() {
      this.$store.dispatch("latestsRecipes",5);
    },
    followOnInstagram() {
      this.$store.dispatch("followOnInstagram", 9);
    }, 
  },
  created() {
    let id = this.$route.params.slug;
    if(id!=undefined){
      this.getAuthorsDetail(id);
      this.getRecipesList(id);
      this.getFeaturedRecipes();
      this.getLatestsRecipes();
      this.followOnInstagram();  
    }else{

    }

   
  },
  computed: mapState({
    authorsRecipe: (state) => state.data.authorsRecipe,  
    featuredRecipes: (state) => state.data.featuredRecipes,
    latestsRecipes: (state) => state.data.latestsRecipes,
    followOnInsta: (state) => state.data.followOnInstagram,
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