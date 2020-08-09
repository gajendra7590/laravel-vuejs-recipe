<template>
  <div id="authorDetail">
    <!-- Inne Page Banner Area Start Here -->
    <section class="inner-page-banner bg-common" data-bg-image=""> 
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
                <!-- <ul class="pagination-layout1">
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
                </ul> -->
            </div>
          </div>
          <div class="col-lg-4 sidebar-widget-area sidebar-break-md">

             <FeaturedRecipe />
             <SubscribeAndFollow />
             <LatestRecipes />
             <Instagram />

          </div>
        </div>
      </div>
    </section>
    <!-- Single Author Area End Here -->
  </div>
</template>

<script> 
import { mapState } from "vuex";
//custom Components
import LatestRecipes from './sidebar/LatestRecipes';
import SubscribeAndFollow from './sidebar/SubscribeAndFollow';
import FeaturedRecipe from './sidebar/FeaturedRecipe';
import Instagram from './sidebar/Instagram';
 
export default {
  name: "recipes",
  components: { 
    LatestRecipes, 
    SubscribeAndFollow,
    FeaturedRecipe,
    Instagram,
  }, 
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
    } 
  },
  created() {
    let id = this.$route.params.slug;
    if(id!=undefined){
      this.getAuthorsDetail(id);
      this.getRecipesList(id); 
    }    
  },
  computed: mapState({
    authorsRecipe: (state) => state.data.authorsRecipe 
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