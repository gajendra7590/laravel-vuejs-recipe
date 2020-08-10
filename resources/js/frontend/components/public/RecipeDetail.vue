<template>
  <div id="recipedetail">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image=""
    > 
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Single Recipe With Sidebar Area Start Here -->
    <section class="single-recipe-wrap-layout1 padding-top-74 padding-bottom-50">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8">
            <div class="single-recipe-layout1">
              <div class="ctg-name">{{ (recipeDetail.category)?recipeDetail.category.name:'' }}</div>
              <h2 class="item-title">{{ (recipeDetail.title)?recipeDetail.title:'' }}</h2>
              <div class="row mb-4">
                <div class="col-xl-9 col-12">
                  <ul class="entry-meta">
                    <li class="single-meta">
                      <a href="javascript:void(0);">
                        <i class="far fa-calendar-alt"></i>{{ recipeDetail.created_at | moment('MMM, DD YYYY') }}
                      </a>
                    </li>
                    <li class="single-meta">
                      <a href="#">
                        <i class="fas fa-user"></i>by
                        <span>
                         {{ (recipeDetail.user)?recipeDetail.user.first_name:'' }}
                        </span>
                      </a>
                    </li>
                    <li class="single-meta">
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
                    </li>
                    <li class="single-meta">
                      <a href="#">
                        <i class="fas fa-heart"></i>
                        <span>02</span>
                        Likes
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-xl-3 col-12">
                  <ul class="action-item">
                    <li>
                      <button>
                        <i class="fas fa-print"></i>
                      </button>
                    </li>
                    <li>
                      <button>
                        <i class="fas fa-expand-arrows-alt"></i>
                      </button>
                    </li>
                    <li class="action-share-hover">
                      <button>
                        <i class="fas fa-share-alt"></i>
                      </button>
                      <div class="action-share-wrap">
                        <a href="#" title="facebook">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" title="twitter">
                          <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" title="linkedin">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" title="pinterest">
                          <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#" title="skype">
                          <i class="fab fa-skype"></i>
                        </a>
                        <a href="#" title="rss">
                          <i class="fas fa-rss"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="item-figure">
                <img v-lazy="recipeDetail.photo_url" style="min-width:760px;" alt="Product" />
              </div>
              <div class="item-feature">
                <ul>
                  <li>
                    <div class="feature-wrap">
                      <div class="media">
                        <div class="feature-icon">
                          <i class="far fa-clock"></i>
                        </div>
                        <div class="media-body space-sm">
                          <div class="feature-title">PREP TIME</div>
                          <div class="feature-sub-title">{{ recipeDetail.prepairation_time }}</div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="feature-wrap">
                      <div class="media">
                        <div class="feature-icon">
                          <i class="fas fa-utensils"></i>
                        </div>
                        <div class="media-body space-sm">
                          <div class="feature-title">COOK TIME</div>
                          <div class="feature-sub-title">{{ recipeDetail.cooking_time }}</div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="feature-wrap">
                      <div class="media">
                        <div class="feature-icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <div class="media-body space-sm">
                          <div class="feature-title">SERVING</div>
                          <div class="feature-sub-title">{{ recipeDetail.serving_peoples }} People</div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="feature-wrap">
                      <div class="media">
                        <div class="feature-icon">
                          <i class="far fa-eye"></i>
                        </div>
                        <div class="media-body space-sm">
                          <div class="feature-title">VIEWS</div>
                          <div class="feature-sub-title">3,450</div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <p class="item-description" v-html="recipeDetail.description"> 
              </p>
              <div class="making-elements-wrap">
                <div class="row">
                  <div class="col-xl-6 col-12">
                    <div class="ingridients-wrap">
                      <h3 class="item-title">
                        <i class="fas fa-list-ul"></i>Ingridients
                      </h3> 
                      <div v-for="(ingr,index) in recipeDetail.ingredients" :key="index"> 
                        <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                        <label for="checkbox1">{{ ingr.name }}</label>
                      </div> 
                    </div>
                  </div>
                  <div class="col-xl-6 col-12">
                    <div class="nutrition-wrap">
                      <h3 class="item-title">
                        <i class="fas fa-info"></i>Nutrition
                      </h3>
                      <ul class="nutrition-list" v-if="recipeDetail">
                        <li v-for="(nutr,index) in recipeDetail.nutritions" :key="index">
                          <div class="nutrition-name">{{ nutr.nutrition_name }}</div>
                          <div class="nutrition-value">{{ nutr.nutrition_value }}</div>
                        </li> 
                      </ul>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="direction-wrap-layout1">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">DIRECTIONS</h2>
                </div>
                <p class="section-paragraph">
                  Salamander lied porpoise much over tightly circa horse
                  taped so innocuously side crudey mightily rigorous plot life. New homes in
                  particular are subject. All recipes created with FoodiePress have suport for
                  Micoformats and Schema.org is a collaboration byo improve convallis.
                </p>
                <div class="direction-box-layout1">
                  <div class="item-figure">
                    <img src="/app/img/figure/direction1.jpg" alt="DIRECTIONS" />
                  </div>
                  <div class="item-content">
                    <div class="serial-number">01 Step</div>
                    <p>
                      Recipe View
                      <span class="item-time">
                        <i class="far fa-clock"></i>5 Minutes
                      </span> chemaorg is a
                      collaboration improve
                      the web by creat inegaera structured markupinn ocuously
                      side crudey mightily rigorous plot life.
                    </p>
                  </div>
                </div> 
              </div>
              <div class="tag-share">
                <ul>
                  <li>
                    <ul class="inner-tag" v-if="recipeDetail.selected_tags">
                      <li v-for="(tg,index) in recipeDetail.selected_tags" :key="index">
                        <router-link 
                        class="recipe_category_name" 
                        :title="'Search Recipe for #'+tg.tag.name"
                        target="_blank"
                        :to="'/recipes/tag/'+tg.tag.slug">#{{ tg.tag.name }}</router-link>
                      </li> 
                    </ul>
                  </li>
                  <li>
                    <ul class="inner-share" v-if="recipeDetail.selected_tags">
                      <li>
                        <a href="#">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-google-plus-g"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-pinterest"></i>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="recipe-author">
                <div class="media media-none--xs">
                  <img
                    v-lazy="(recipeDetail.user)?recipeDetail.user.photo_url:''" style="height:112px;width:140px;"
                    alt="Blog Author"
                    class="rounded-circle media-img-auto"
                  />
                  <div class="media-body">
                    <h4 class="author-title">{{ (recipeDetail.user)?recipeDetail.user.first_name:'Author' }}</h4>
                    <h5 class="author-sub-title">Written by</h5>
                    <p v-html="(recipeDetail.user)?recipeDetail.user.about_me:'No Author Descritpion'"> 
                    </p>
                    <ul class="author-social">
                      <li>
                        <a :href="( (recipeDetail.user) && (recipeDetail.user.youtube_url!='') )?recipeDetail.user.youtube_url:'javascript:void(0);'">
                          <i class="fab fa-youtube"></i>
                        </a>
                      </li>
                      <li>
                         <a :href="( (recipeDetail.user) && (recipeDetail.user.facebook_url!='') )?recipeDetail.user.facebook_url:'javascript:void(0);'">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                         <a :href="( (recipeDetail.user) && (recipeDetail.user.twitter_url!='') )?recipeDetail.user.twitter_url:'javascript:void(0);'">
                          <i class="fab fa-twitter"></i>
                        </a>
                      </li>
                      <li>
                         <a :href="( (recipeDetail.user) && (recipeDetail.user.linkedin_url!='') )?recipeDetail.user.linkedin_url:'javascript:void(0);'">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </li>
                      <li>
                         <a :href="( (recipeDetail.user) && (recipeDetail.user.instagram_url!='') )?recipeDetail.user.instagram_url:'javascript:void(0);'">
                          <i class="fab fa-instagram"></i>
                        </a>
                      </li>
                      <li>
                         <a :href="( (recipeDetail.user) && (recipeDetail.user.pinterest_url!='') )?recipeDetail.user.pinterest_url:'javascript:void(0);'">
                          <i class="fab fa-pinterest"></i>
                        </a>
                      </li> 
                    </ul>
                  </div>
                </div>
              </div>
              <div class="also-like-wrap">
                <h4 class="also-like-title">YOU MAY ALSO LIKE</h4>
                <div class="row" v-if="recipeDetail.user"> 
                  <div class="col-xl-4 col-lg-6 col-md-6 col-12" v-for="(recipe,index) in recipeDetail.user.recipes" :key="index">
                    <div class="product-box-layout2">
                      <figure class="item-figure">
                        <img v-lazy="recipe.photo_url" alt="Product" style="width:233px;height:251px;" />
                      </figure>
                      <div class="item-content">
                        <span class="sub-title recipe_category_name">{{ recipe.category.name }}</span>
                        <h3 class="item-title">
                          <router-link :to="'/recipe/'+recipe.slug" class="recipe_title">
                            {{ recipe.title }}
                          </router-link>
                        </h3>
                        <ul class="entry-meta">
                          <li>
                            <a href="javascript:void(0);">
                              <i class="fas fa-user"></i>by
                              <span>{{ recipe.user.first_name }}</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
              <div class="recipe-reviews">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">RECIPE REVIEWS</h2>
                </div>
                <div class="avarage-rating-wrap">
                  <div class="avarage-rating">
                    Avarage Rating:
                    <span class="rating-icon-wrap">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </span>
                    <span class="rating-number">(5)</span>
                  </div>
                  <div class="total-reviews">
                    Total Reviews:
                    <span class="review-number">(02)</span>
                  </div>
                </div>
                <ul>
                  <li class="reviews-single-item">
                    <div class="media media-none--xs">
                      <img src="/app/img/blog/comment1.jpg" alt="Comment" class="media-img-auto" />
                      <div class="media-body">
                        <h4 class="comment-title">Liza Zaman</h4>
                        <span class="post-date">September 27, 2018</span>
                        <p>
                          Absolutely great recipe. I cooked it for my kids and they loved it, even
                          asked for more, can you believe it?
                        </p>
                        <ul class="item-rating">
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-empty">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item">
                            <span>
                              9
                              <span>/ 10</span>
                            </span>
                          </li>
                        </ul>
                        <a href="#" class="item-btn">
                          REPLY
                          <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                      </div>
                    </div>
                  </li>
                  <li class="reviews-single-item">
                    <div class="media media-none--xs">
                      <img src="/app/img/blog/comment2.jpg" alt="Comment" class="media-img-auto" />
                      <div class="media-body">
                        <h4 class="comment-title">John Martin</h4>
                        <span class="post-date">September 12, 2018</span>
                        <p>
                          Absolutely great recipe. I cooked it for my kids and they loved it, even
                          asked for more, can you believe it?
                        </p>
                        <ul class="item-rating">
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-empty">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item">
                            <span>
                              7
                              <span>/ 10</span>
                            </span>
                          </li>
                        </ul>
                        <a href="#" class="item-btn">
                          REPLY
                          <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="leave-review">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">LEAVE A REVIEW</h2>
                </div>
                <div class="rate-wrapper">
                  <div class="rate-label">Rating</div>
                  <div class="rate">
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
                <form class="leave-form-box">
                  <div class="row">
                    <div class="col-12 form-group">
                      <label>Comment :</label>
                      <textarea
                        placeholder
                        class="textarea form-control"
                        name="message"
                        rows="7"
                        cols="20"
                        data-error="Message field is required"
                        required
                      ></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-4 form-group">
                      <label>Name :</label>
                      <input
                        type="text"
                        placeholder
                        class="form-control"
                        name="name"
                        data-error="Name field is required"
                        required
                      />
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-4 form-group">
                      <label>E-mail :</label>
                      <input
                        type="email"
                        placeholder
                        class="form-control"
                        name="email"
                        data-error="E-mail field is required"
                        required
                      />
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-4 form-group">
                      <label>Website :</label>
                      <input
                        type="email"
                        placeholder
                        class="form-control"
                        name="email"
                        data-error="E-mail field is required"
                        required
                      />
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-12 form-group mb-0">
                      <button type="submit" class="item-btn">POST REVIEW</button>
                    </div>
                  </div>
                  <div class="form-response"></div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
            <LatestRecipes />
            <SubscribeAndFollow />  
            <FeaturedRecipe />  
            <GetLatestUpdates /> 
            <Categories /> 
            <PopularTags />   
          </div>
        </div>
      </div>
    </section>
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
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
//custom Components
import LatestRecipes from './sidebar/LatestRecipes';
import SubscribeAndFollow from './sidebar/SubscribeAndFollow';
import FeaturedRecipe from './sidebar/FeaturedRecipe';
import Categories from './sidebar/Categories';
import PopularTags from './sidebar/PopularTags'; 
import GetLatestUpdates from './blog_sidebar/GetLatestUpdates';
export default {
  name: "recipedetail",
  components: { 
    VueperSlides,
    VueperSlide,

    LatestRecipes, 
    SubscribeAndFollow,
    FeaturedRecipe,
    Categories,
    PopularTags,
    GetLatestUpdates 
  },
  data() {
    return {
        recipeDetail : []
    };
  },
  methods: {
    getRecipeDetail(slug) {
      let _this = this;
      _this.$store
        .dispatch("recipeDetail", { slug: slug })
        .then(function (result) {
          if (result.id != undefined) {
            _this.recipeDetail = result;
          } else {
            _this.$toastr.e("Opps! Invalid Request");
            _this.$router.push("/recipes");
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    }, 
    followOnInstagram() {
      this.$store.dispatch("followOnInstagram");
    }, 
  },
  created() {
    let slug = this.$route.params.slug;
    if (slug != undefined) {
      this.getRecipeDetail(slug); 
      this.followOnInstagram(); 
    }
  },
  computed: mapState({ 
    followOnInsta: (state) => state.data.followOnInstagram,  
  }),
  watch: {
    '$route.params.slug'(newId, oldId) {
        let slug = this.$route.params.slug;
        if (slug != undefined) {
          this.getRecipeDetail(slug); 
        }
     }
  } 
};
</script> 
<style lang="scss" scoped>
</style>