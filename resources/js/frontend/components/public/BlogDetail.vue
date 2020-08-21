<template>
  <div id="blogDetail">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image="/app/img/figure/inner-page-banner1.jpg"
    > 
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Submit Recipe Area Start Here --> 
    <section class="single-blog-page-wrap padding-top-80 padding-bottom-50">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8">
            <div class="single-blog-box" v-if="blogsDetail">
              <div class="main-figure">
                <a href="javascript:void(0);">
                  <img v-lazy="blogsDetail.photo_url" alt="Blog" class="blogSingleIMG" />
                </a>
              </div>
              <div class="blog-content">
                <ul class="entry-meta">
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-clock"></i> 
                      {{ blogsDetail.created_at | moment('DD MMMM YYYY') }}
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-user"></i>by
                      <span>{{ (blogsDetail.user)?blogsDetail.user.first_name:'' }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-comments"></i>Comments
                      <span>( {{ blogsDetail.comments_count }} )</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-heart"></i>
                      <span>{{ blogsDetail.likes_count }}</span>
                    </a>
                  </li>
                </ul>
                <h3 class="item-title">
                  <a href="javascript:void(0);">
                   {{ blogsDetail.title }}
                  </a>
                </h3>
                <p class="item-details" v-html="blogsDetail.description"> 
                </p>
              </div>
              <div class="tag-share">
                <ul>
                  <li>
                    <ul class="inner-tag" v-if="blogsDetail.selected_tags">
                      <li v-for="(tag,index) in blogsDetail.selected_tags" :key="index">
                        <router-link :to="'/blogs/tag/'+tag.tag.slug">{{ tag.tag.name }}</router-link>
                      </li> 
                    </ul>
                  </li>
                  <li>
                     <ul class="inner-share" v-if="blogsDetail.id">
                      <li>
                        <ShareNetwork
                          network="facebook"
                          :url="this.$store.state.BASE_URL+'recipe/'+blogsDetail.slug"
                          :title="blogsDetail.title"
                          class="link-cursor"
                        >
                          <i class="fab fa-facebook-f"></i>
                        </ShareNetwork>
                      </li>
                      <li>
                        <ShareNetwork
                          network="twitter"
                          :url="this.$store.state.BASE_URL+'recipe/'+blogsDetail.slug"
                          :title="blogsDetail.title"
                          class="link-cursor"
                        >
                          <i class="fab fa-twitter"></i>
                        </ShareNetwork>
                      </li>
                      <li>
                        <ShareNetwork
                          network="linkedin"
                          :url="this.$store.state.BASE_URL+'recipe/'+blogsDetail.slug"
                          :title="blogsDetail.title"
                          class="link-cursor"
                        >
                          <i class="fab fa-linkedin-in"></i>
                        </ShareNetwork>
                      </li>
                      <li>
                        <ShareNetwork
                          network="pinterest"
                          :url="this.$store.state.BASE_URL+'recipe/'+blogsDetail.slug"
                          :title="blogsDetail.title"
                          class="link-cursor"
                        >
                          <i class="fab fa-pinterest-p"></i>
                        </ShareNetwork>
                      </li>
                      <li>
                        <ShareNetwork
                          network="whatsapp"
                          :url="this.$store.state.BASE_URL+'recipe/'+blogsDetail.slug"
                          :title="blogsDetail.title"
                          class="link-cursor"
                        >
                          <i class="fab fa-whatsapp"></i>
                        </ShareNetwork>
                      </li>
                      <li>
                        <ShareNetwork
                          network="telegram"
                          :url="this.$store.state.BASE_URL+'recipe/'+blogsDetail.slug"
                          :title="blogsDetail.title"
                          class="link-cursor"
                        >
                          <i class="fab fa-telegram"></i>
                        </ShareNetwork>
                      </li>
                      <li></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="recipe-author">
                <div class="media media-none--xs">
                  <img
                    v-lazy="(blogsDetail.user)?blogsDetail.user.photo_url:''"
                    style="height:75px;with:75px;"
                    alt="Blog Author"
                    class="rounded-circle media-img-auto"
                  />
                  <div class="media-body">
                    <h4 class="author-title">{{ (blogsDetail.user)?blogsDetail.user.first_name:'' }}</h4>
                    <h5 class="author-sub-title">Written by</h5>
                    <p>
                      {{ (blogsDetail.user)?blogsDetail.user.about_me:'' }}
                    </p>
                    <ul class="author-social">
                      <li>
                        <a
                          :href="( (blogsDetail.user) && (blogsDetail.user.youtube_url!='') )?blogsDetail.user.youtube_url:'javascript:void(0);'"
                        >
                          <i class="fab fa-youtube"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          :href="( (blogsDetail.user) && (blogsDetail.user.facebook_url!='') )?blogsDetail.user.facebook_url:'javascript:void(0);'"
                        >
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          :href="( (blogsDetail.user) && (blogsDetail.user.twitter_url!='') )?blogsDetail.user.twitter_url:'javascript:void(0);'"
                        >
                          <i class="fab fa-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          :href="( (blogsDetail.user) && (blogsDetail.user.linkedin_url!='') )?blogsDetail.user.linkedin_url:'javascript:void(0);'"
                        >
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          :href="( (blogsDetail.user) && (blogsDetail.user.instagram_url!='') )?blogsDetail.user.instagram_url:'javascript:void(0);'"
                        >
                          <i class="fab fa-instagram"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          :href="( (blogsDetail.user) && (blogsDetail.user.pinterest_url!='') )?blogsDetail.user.pinterest_url:'javascript:void(0);'"
                        >
                          <i class="fab fa-pinterest"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="next-prev-post">
                <div class="prev-post" v-for="(post,index) in nexPrevPost" :key="index">
                  <router-link :to="'/blogs/'+post.slug" class="item-figure">
                    <img v-lazy="post.photo_url" alt="Post" style="height: 100px;width: 144px;" />
                  </router-link>
                  <div class="item-content">
                    <p>PREVIOUS POST</p>
                    <h3 class="post-title">
                      <router-link :to="'/blogs/'+post.slug">{{ post.title  }}</router-link>
                    </h3>
                  </div>
                </div>
                
              </div>

               <div class="recipe-reviews">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">BLOG REVIEWS</h2>
                </div> 

                <div v-if="(ratingsList) && (ratingsList.ratings_count > 0)"> 
                    <ul class="reivew-ul" v-for="(rating,index) in ratingsList.ratings" :key="index"> 
                      <li class="reviews-single-item">
                        <div class="media media-none--xs">
                          <img v-lazy="rating.user.photo_url" height="120" width="130" alt="Comment" class="media-img-auto" />
                          <div class="media-body">
                            <h4 class="comment-title">{{ rating.user.first_name }}</h4>
                            <span class="post-date">{{ rating.rating_time | moment('MMM DD,YYYY') }}</span>
                            <p>{{ rating.comment }}</p>
                            <ul class="item-rating">
                              <li class="single-item star-fill" v-for="(j) in parseInt(rating.rating)" :key="j+12">
                                <i class="fas fa-star"></i>
                              </li> 
                              <li class="single-item star-empty" v-for="(k) in (5 - parseInt(rating.rating))" :key="k+21">
                                <i class="fas fa-star"></i>
                              </li>
                              <li class="single-item">
                                <span>
                                  {{ rating.rating }}
                                  <span>/ 5</span>
                                </span>
                              </li>
                            </ul> 
                          </div>
                        </div>
                      </li>  
                    </ul> 
                </div>
                <div v-else class="no-review-container">
                  <p>No Review found for this recipe.</p>
                </div>
                
              </div>

              <div class="leave-review">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">LEAVE A REVIEW</h2>
                  <a v-if="userRating" 
                    @click="toggleForm" href="javascript:void(0);"
                     class="btn btn-xl btn-info">Edit Review</a>
                </div> 
                <div v-if="this.$store.state.loggedIn" v-show="isRatingFormShow">
                  <ValidationObserver v-slot="{ handleSubmit }">                      
                    <form class="leave-form-box" @submit.prevent="handleSubmit(reviewSubmit)">
                      <div class="row">
                        <div class="col-12 form-group">
                          <label>Rating :</label>
                          <ValidationProvider name="rating" rules="required|min:1|max:5" v-slot="{ errors }"> 
                             <star-rating v-model="review.rating" :show-rating="false"></star-rating> 
                             <div class="help-block text-danger">{{ errors[0] }}</div>
                          </ValidationProvider> 
                        </div>
                        <div class="col-12 form-group">
                          <label>Comment :</label>
                          <ValidationProvider name="Comment" rules="required|min:15" v-slot="{ errors }"> 
                            <textarea
                              placeholder
                              class="textarea form-control"
                              name="message"
                              rows="7"
                              cols="20"
                              v-model="review.comment"
                            ></textarea>
                            <div class="help-block text-danger">{{ errors[0] }}</div>
                          </ValidationProvider> 
                        </div>  
                        <div class="col-12 form-group mb-0">
                          <button type="submit" class="item-btn">POST REVIEW</button>
                        </div>
                      </div>
                      <div class="form-response"></div>
                    </form>
                  </ValidationObserver>
                </div>
                <div v-else>
                  <p>Logged In & Live Comment</p>
                </div>
              </div>


               
            </div>
          </div>
           <div class="col-lg-4 sidebar-widget-area sidebar-break-md"> 
            <LatestBlog />
            <SubscribeAndFollow /> 
            <LastestCategories /> 
            <GetLatestUpdates />
            <FeaturedBlog />
            <Instagram />
            <LatestTags /> 
          </div>
        </div>
      </div>
    </section>
    <!-- Submit Recipe Area End Here -->
  </div>
</template>

<script>
import { mapState } from "vuex";
import StarRating from 'vue-star-rating';
import "vueperslides/dist/vueperslides.css";
//Custom Component
import LatestBlog from './blog_sidebar/LatestBlog';
import SubscribeAndFollow from './sidebar/SubscribeAndFollow';
import LastestCategories from './blog_sidebar/LastestCategories';
import GetLatestUpdates from './blog_sidebar/GetLatestUpdates';
import FeaturedBlog from './blog_sidebar/FeaturedBlog';
import Instagram from './blog_sidebar/Instagram';
import LatestTags from './blog_sidebar/LatestTags';

export default {
  name: "blogDetail",
  components : {
    StarRating,
    LatestBlog,
    SubscribeAndFollow,
    LastestCategories,
    GetLatestUpdates,
    FeaturedBlog,
    Instagram,
    LatestTags
  },
  data() {
    return {
      loader : null,
      isRatingFormShow : false,
      userLike : null,
      userRating : null,
      likeActive : '', //like-active
      review : {
        id : 0,
        rating : 1,
        comment : '' 
       }, 
       blogsDetail : [],
       nexPrevPost : [], 
    };
  }, 
  methods: {
    getBlogDetail() {  
      let _this = this; 
      let slug = _this.$route.params.slug; 
      _this.loader =  _this.$loading.show();
      this.$store.dispatch("getBlogDetail",{ slug : slug })
      .then(function(response){  
        if( response.status == true ){
          _this.blogsDetail = response.data; 
          _this.nexPrevPost = response.nexPrevPost;
          _this.comments = response.comments;
          _this.likes = response.likes;
          _this.blogViewSubmit( response.data.id);
          _this.getRatings(response.data.id); 
          _this.getCurrentRating(response.data.id);
          setTimeout(() => { _this.loader.hide(); }, 1000);
        } else {
           _this.$toastr.e('Error','No Data Founded');
           _this.$router.push("/blogs");
           _this.loader.hide();
        }
      }).catch(function(error){
        console.log( error );
         _this.loader.hide();
      }); 
    }, 
    blogViewSubmit(id){
      this.$store.dispatch("createNewBlogView",{id :id});
    },
     getCurrentRating(blog_id){ 
       if(this.$store.state.loggedIn){
            let _this = this;
            _this.$store.dispatch('getUsersBlogRating',{id : blog_id})
            .then(function(result){
              _this.userRating = result; 
              if(result!=''){ 
                 _this.isRatingFormShow = false;
              } else { 
                 _this.isRatingFormShow = true;
              }  
            })
            .catch(function(error){
              console.log( error )              
            }); 
        }
    },
    reviewSubmit(){
      let blog_id = this.blogsDetail.id;
      let _this = this;
      if(!(this.$store.state.loggedIn)){
        _this.$toastr.e("Login & submit this",'Warning!'); 
      } else {
          if(blog_id > 0){            
            _this.review.id = blog_id;
            _this.loader = _this.$loading.show();
            _this.$store.dispatch('createNewBlogRating',_this.review)
            .then(function(result){
                _this.loader.hide();
                if( (typeof(result.status) !='undefined') && (result.status == true) ){
                  _this.getRatings(blog_id);
                  _this.getCurrentRating(blog_id);
                  _this.$toastr.s(result.message,'Success!'); 
                }  
            })
            .catch(function(error){
              _this.loader.hide();
              console.log( error );          
            }) 
          }  
      } 
    },
    getRatings(id){
       this.$store.dispatch('getBlogRatings',{id : id}); 
    },
    toggleForm(){
      this.isRatingFormShow = true;
      let ur = this.userRating;      
      this.review = {
         id : (ur.id)?ur.id:0,
         rating : (ur.rating)?parseInt(ur.rating):1,
         comment : (ur.comment)?ur.comment:'',
      }
    },
     getInteger(rating){
       let fraction = ((rating % 1).toFixed(2));
        if(fraction != '0.00'){ 
          return (rating - fraction);
        } else {
          return rating;
        } 
    },
    getFloat(rating){
        let fraction = ((rating % 1).toFixed(2));
        if(fraction != '0.00'){
          return 1;
        } else {
          return 0;
        } 
    },
  },
  created() {
    this.getBlogDetail();  
  },
   computed: mapState({ 
    ratingsList :(state) => state.data.getBlogRatings    
  }),
   watch: {
    '$route.params.slug'(newId, oldId) {
        this.getBlogDetail()
    }
  } 
};
</script> 
<style scoped>
  img.blogSingleIMG {
      max-width: 760px;
      min-width: 760px;
      min-height: 390px;
      max-height: 390px;
  }
  .avarage-rating-wrap {
      display: inline-flex;
      padding: 15px 0px;
  }
</style>