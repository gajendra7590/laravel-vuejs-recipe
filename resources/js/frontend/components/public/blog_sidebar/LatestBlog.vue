<template>
  <div class="widget">
    <div class="section-heading heading-dark">
      <h3 class="item-heading">LATEST BLOG</h3>
    </div>
    <div class="widget-blog-post">
      <ul class="block-list" v-if="getBlogLatest">
        <li class="single-item" v-for="(blog,index) in getBlogLatest" :key="index">
          <div class="item-img">
            <router-link :to="'/blogs/'+blog.slug">
              <img
                v-lazy="blog.photo_url"
                style="min-width:90px;max-width:110px;min-height:90px;max-height:100px;"
                alt="Post"
              />
            </router-link>
          </div>
          <div class="item-content">
            <div class="item-post-date">
              <a href="javascript:void(0);">
                <i class="fas fa-clock"></i>
                {{ blog.created_at | moment('DD,MMM YYYY') }}
              </a>
            </div>
            <h4 class="item-title">
              <router-link :to="'/blogs/'+blog.slug">{{ blog.title }}</router-link>
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
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "LatestBlog",
  data() {
    return {};
  },
  methods: {
    latestsBlogs() {
      this.$store.dispatch("getBlogLatest", { limit: 4 });
    },
  },
  created() {
    this.latestsBlogs();
  },
  computed: mapState({
    getBlogLatest: (state) => state.data.getBlogLatest,
  }),
};
</script>

<style>
</style>