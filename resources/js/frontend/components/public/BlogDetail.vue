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
          <div class="col-lg-8" v-if="blogsDetail">
            <div class="single-blog-box">
              <div class="main-figure">
                <a href="javascript:void(0);">
                  <img v-lazy="blogsDetail.photo_url" alt="Blog" class="blogSingleIMG" />
                </a>
              </div>
              <div class="blog-content">
                <ul class="entry-meta">
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-clock"></i>{{ blogsDetail.created_at | moment('DD MMMM YYYY') }}
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
                      <span>( {{ comments }} )</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-heart"></i>
                      <span>{{ likes }}</span>
                    </a>
                  </li>
                </ul>
                <h3 class="item-title">
                  <a href="javascript:void(0);">
                   {{ blogsDetail.title }}
                  </a>
                </h3>
                <p class="item-details">
                  {{ blogsDetail.description }}                  
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
                    <ul class="inner-share">
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
                          <i class="fab fa-pinterest-p"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-skype"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="next-prev-post">
                <div class="prev-post">
                  <a href="#" class="item-figure">
                    <img src="/app/img/blog/prev-post.jpg" alt="Post" />
                  </a>
                  <div class="item-content">
                    <p>PREVIOUS POST</p>
                    <h3 class="post-title">
                      <a href="#">Old school pancake next area so goody</a>
                    </h3>
                  </div>
                </div>
                <div class="next-post">
                  <div class="item-content">
                    <p>NEXT POST</p>
                    <h3 class="post-title">
                      <a href="#">Old school pancake next area so goody</a>
                    </h3>
                  </div>
                  <a href="#" class="item-figure">
                    <img src="/app/img/blog/next-post.jpg" alt="Post" />
                  </a>
                </div>
              </div>
              <div class="recipe-reviews">
                <div class="section-heading3 heading-dark">
                  <h2 class="item-heading">RECIPE REVIEWS</h2>
                </div>
                <ul>
                  <li class="reviews-single-item">
                    <div class="media media-none--xs">
                      <img src="/app/img/blog/comment1.jpg" alt="Comment" class="media-img-auto" />
                      <div class="media-body">
                        <h4 class="comment-title">Liza Zaman</h4>
                        <span class="post-date">September 27, 2018</span>
                        <p>
                          Absolutely great recipe. I cooked it for my kids and they loved it,
                          even
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
                          Absolutely great recipe. I cooked it for my kids and they loved it,
                          even
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
                <div class="section-heading3 heading-dark">
                  <h2 class="item-heading">LEAVE A REVIEW</h2>
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
                    <div class="col-md-4 form-group">
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
                    <div class="col-md-4 form-group">
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
                    <div class="col-md-4 form-group">
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
       blogsDetail : [],
       totalResult : 0,
       comments : 0,
       likes : 0,
       perpage : 5 
    };
  }, 
  methods: {
    getBlogDetail() {  
      let _this = this; 
      let slug = _this.$route.params.slug; 
      this.$store.dispatch("getBlogDetail",{ slug : slug })
      .then(function(response){  
        if( response.status == true ){
          _this.blogsDetail = response.data; 
          _this.comments = response.comments;
          _this.likes = response.likes;
          _this.blogViewSubmit( response.data.id);
        } else {
           _this.$toastr.e('Error','No Data Founded');
        }
      }).catch(function(error){
        console.log( error );
      }); 
    }, 
    blogViewSubmit(id){
      this.$store.dispatch("createNewBlogView",{id :id});
    }
  },
  created() {
    this.getBlogDetail();  
  },
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
</style>