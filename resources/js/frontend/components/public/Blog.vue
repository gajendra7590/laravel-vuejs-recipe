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
          <div class="col-lg-8" v-if="(blogsList) && (blogsList.length > 0)">

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
                      <span>( {{ blog.comments_count }} )</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">
                      <i class="fas fa-heart"></i>
                      <span>{{ blog.likes_count }}</span>
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
    <!-- Blog List Area End Here -->
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
  name: "blog",
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
       blogsList : [],
       totalResult : 0,
       comments : 0,
       likes : 0,
       perpage : 5 
    };
  },
  methods: {
    getBlogs(page = 1) { 
      let _this = this; 
      this.$store.dispatch("getBlogList",{ page : page })
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
    } 
  },
  created() {
    this.getBlogs();  
  }
};
</script> 
<style lang="scss" scoped>
</style>