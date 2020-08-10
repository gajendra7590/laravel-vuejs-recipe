<template>
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
              <img
                v-lazy="fa.photo_url"
                alt="Brand"
                class="img-fluid"
                style="min-width:352px;max-width:352px;min-height:250px;max-height:250px;"
              />
            </div>
            <div class="item-content">
              <span class="ctg-name recipe_category_name">{{ fa.category.name }}</span>
              <h4 class="item-title recipe_title">
                <router-link :to="'/recipe/'+fa.slug">{{ fa.title }}</router-link>
              </h4>
              <p class="recipe_short_desc">{{ fa.short_desc }}</p>
            </div>
          </template>
        </vueper-slide>
      </vueper-slides>
    </div>
  </div>
</template> 
<script>
import { mapState } from "vuex";
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
export default {
  name: "FeaturedBlog",
  components: { VueperSlides, VueperSlide },
  data() {
    return {};
  },
  methods: {
    featuredBlogs() {
      this.$store.dispatch("getBlogFeatured", {limit : 3});
    },
  },
  created() {
    this.featuredBlogs();
  },
  computed: mapState({
    getBlogFeatured: (state) => state.data.getBlogFeatured,
  }),
};
</script>

<style>
</style>