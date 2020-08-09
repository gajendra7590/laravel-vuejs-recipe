<template>
  <div id="blog">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image="/app/img/figure/inner-page-banner1.jpg"
    >
      <!-- <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs-area">
              <h1>Blogs</h1>
              <ul>
                <li>
                  <router-link :to="'/home'">Home</router-link>
                </li>
                <li>Blog</li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Blog List Area Start Here -->
    <section class="blog-list-page-wrap padding-top-80 padding-bottom-50">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8" v-if="(blogsList)">
            <div class="blog-box-layout1" v-for="(blog,index) in blogsList" :key="index">
              <div class="item-figure">
                <router-link :to="'/blogs/'+blog.slug">
                  <img v-lazy="blog.photo_url" alt="Blog"  
                  style="min-width:760px;max-width:760px;min-height:390px;max-height:390px;"/>
                </router-link>
              </div>
              <div class="item-content">
                <ul class="entry-meta">
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-clock"></i>{{ blog.created_at | moment('MMM,DD YYYY HH:MM:SS') }}
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-user"></i>by
                      <span>{{ blog.user.first_name }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-comments"></i>Comments
                      <span>( {{ comments}} )</span>
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
                  <router-link :to="'/blogs/'+blog.slug">
                   {{ blog.title }}
                  </router-link>
                </h3>
                <p>
                  {{ blog.short_desc }}
                </p>
                <router-link :to="'/blogs/'+blog.slug" class="item-btn">
                  Continue Reading
                  <i class="flaticon-next"></i>
                </router-link>
              </div>
            </div> 
            <div v-if="blogsList.length > 0">
                <paginate
                    :page-count="(totalResult/perpage)"
                    :page-range="3"
                    :margin-pages="2"
                    :click-handler="blogPaginate"
                    :prev-text="'Prev'"
                    :next-text="'Next'"
                    :container-class="'pagination-layout1'"
                    :page-class="'page-item'">
                </paginate>  
            </div> 
            <div class="nocontainer">
                <div class="error-content-box no-result-found" v-if="blogsList.length == 0"> 
                    <h5 class="">No Blog Found For Category : {{ this.$route.params.slug }}</h5>  
                </div>
                <div class="noResultLink" style="text-algin:center;">
                    <router-link class="btn btn-danger btn-md" :to="'/blogs'">Go To Blog List</router-link>
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
    <!-- Blog List Area End Here -->
  </div>
</template>

<script>
import { mapState } from "vuex";
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
export default {
  name: "blogByTag",
  components: { VueperSlides, VueperSlide },
  data() {
    return {
       blogsList : [],
       totalResult : 0,
       comments : 0,
       likes : 0,
       perpage : 5 
    };
  },
  watch: {
    '$route.params.slug'(newId, oldId) {
        this.getBlogs(1)
    }
  },
  methods: {
    getBlogs(page = 1) {  
      let _this = this; 
      let slug = _this.$route.params.slug; 
      this.$store.dispatch("getBlogListByCategories",{ slug : slug, page : page })
      .then(function(response){  
        if( response.status == true ){
          _this.blogsList = response.blogs;
          _this.totalResult = response.total_counts; 
          _this.comments = response.comments;
          _this.likes = response.likes;
        } else {
           _this.$toastr.e('Error','No Data Founded');
        }
      }).catch(function(error){
        console.log( error );
      }); 
    },
    blogPaginate(page){
      this.getBlogs(page);
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
    this.getBlogs(1);
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
    .error-content-box.no-result-found {
        border: 1px solid #f65058;
        padding: 17px 0px 1px 0px !important;
        margin-top: 4px !important;
    }
    .error-content-box.no-result-found h5 {
        font-size: 20px;
        font-weight: 600;
        font-style: italic;
        color: #808080;
    }
    .noResultLink {
        text-align: center;
        margin-top: 13px;
    }
</style>