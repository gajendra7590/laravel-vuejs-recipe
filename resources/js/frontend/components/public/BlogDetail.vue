<template>
  <div id="blogDetail">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image="/app/img/figure/inner-page-banner1.jpg"
    >
      <!-- <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs-area">
              <h1>Standard Blog Page</h1>
              <ul>
                <li>
                  <a href="index-2.html">Home</a>
                </li>
                <li>Blog</li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->
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
                      <span>{{ blogsDetail.user.first_name }}</span>
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
                  <a href="single-blog.html">
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
                    v-lazy="blogsDetail.user.photo_url"
                    style="height:75px;with:75px;"
                    alt="Blog Author"
                    class="rounded-circle media-img-auto"
                  />
                  <div class="media-body">
                    <h4 class="author-title">{{ blogsDetail.user.first_name }}</h4>
                    <h5 class="author-sub-title">Written by</h5>
                    <p>
                      {{ blogsDetail.user.about_me }}
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
            <div class="widget">
              <div class="section-heading heading-dark">
                <h3 class="item-heading">LATEST BLOG</h3>
              </div>
               <div class="widget-blog-post">
                <ul class="block-list" v-if="getBlogLatest">
                  <li class="single-item" v-for="(blog,index) in getBlogLatest" :key="index">
                    <div class="item-img">
                      <router-link :to="'/blogs/'+blog.slug">
                        <img v-lazy="blog.photo_url" style="min-width:90px;max-width:110px;min-height:90px;max-height:100px;" alt="Post" />
                      </router-link>
                    </div>
                    <div class="item-content">
                      <div class="item-post-date">
                        <a href="javascript:void(0);">
                          <i class="fas fa-clock"></i>{{ blog.created_at | moment('DD,MMM YYYY') }}
                        </a>
                      </div>
                      <h4 class="item-title">
                        <router-link :to="'/blogs/'+blog.slug">
                          {{ blog.title }}
                        </router-link>
                      </h4>
                      <div class="item-post-by">
                        <router-link :to="'/blogs/'+blog.slug">
                          <i class="fas fa-user"></i>
                          <span>by</span>
                          {{ blog.user.first_name }}
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
              <div class="widget-ad">
                <a href="#">
                  <img src="/app/img/figure/figure6.jpg" alt="Ad" class="img-fluid" />
                </a>
              </div>
            </div>
            <div class="widget">
              <div class="section-heading heading-dark">
                <h3 class="item-heading">CATEGORIES</h3>
              </div>
              <div class="widget-categories">
                <ul v-if="getBlogCategories">
                  <li v-for="(cat,index) in getBlogCategories" :key="index">
                    <router-link :to="'/blogs/category/'+cat.slug">
                      {{ cat.name }}
                      <span>{{ (cat.totalBlogs)?cat.totalBlogs:'0' }}</span>
                    </router-link>
                  </li>                    
                </ul>
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
                <h3 class="item-heading">FEATURED ARTICLE</h3>
              </div>
               <div class="widget-featured-feed" v-if="getBlogFeatured">
                <vueper-slides :autoplay="true" :duration="3000" class fixed-height="418px">
                  <vueper-slide
                    v-for="(fa,index) in getBlogFeatured"
                    :key="index"
                    class="featured-box-layout1 owl-stage-outer"
                  >
                    <template v-slot:content>
                      <div class="item-img">
                        <img v-lazy="fa.photo_url" alt="Brand" class="img-fluid" 
                        style="min-width:352px;max-width:352px;min-height:250px;max-height:250px;" />
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
                <h3 class="item-heading">INSTAGRAM</h3>
              </div>
                <div class="widget-instagram">
                <ul v-if="getBlogInstagrams"> 
                  <li v-for="(insta,index) in getBlogInstagrams" :key="index">
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
            <div class="widget">
              <div class="section-heading heading-dark">
                <h3 class="item-heading">POPULAR TAGS</h3>
              </div>
               <div class="widget-tag">
                <ul v-if="getBlogTags">
                  <li v-for="(tag,index) in getBlogTags" :key="index">
                    <router-link :to="'/blogs/tag/'+tag.slug">#{{ tag.name }}</router-link>
                  </li> 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Submit Recipe Area End Here -->
  </div>
</template>

<script>
import { mapState } from "vuex";
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
export default {
  name: "blogDetail",
  components: { VueperSlides, VueperSlide },
  data() {
    return {
       blogsDetail : [],
       totalResult : 0,
       comments : 0,
       likes : 0,
       perpage : 5 
    };
  },
  watch: {
    '$route.params.slug'(newId, oldId) {
        this.getBlogDetail()
    }
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
        } else {
           _this.$toastr.e('Error','No Data Founded');
        }
      }).catch(function(error){
        console.log( error );
      }); 
    }, 
    featuredBlogs() {
      this.$store.dispatch("getBlogFeatured", {limit : 3});
    },
    latestsBlogs() {
      this.$store.dispatch("getBlogLatest", {limit : 4});
    },
    instagramBlogs() {
      this.$store.dispatch("getBlogInstagrams", {limit : 9});
    },
    popularTags() {
      this.$store.dispatch("getBlogTags", {limit : 9});
    },
    popularCategories() {
      this.$store.dispatch("getBlogCategories", {limit : 7});
    },
  },
  created() {
    this.getBlogDetail();
    this.latestsBlogs();
    this.featuredBlogs();
    this.instagramBlogs();
    this.popularTags();
    this.popularCategories();
  },
  computed: mapState({ 
     getBlogLatest: (state) => state.data.getBlogLatest,
     getBlogFeatured: (state) => state.data.getBlogFeatured,
     getBlogInstagrams: (state) => state.data.getBlogInstagrams,
     getBlogTags: (state) => state.data.getBlogTags,
     getBlogCategories: (state) => state.data.getBlogCategories,
  }),
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