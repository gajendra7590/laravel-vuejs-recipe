    <template>
  <div id="authorsList">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image="/app/img/figure/inner-page-banner1.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="breadcrumbs-area">
              <h1>Our All Author</h1>
              <ul>
                <li>
                  <router-link to="/">Home</router-link>
                </li>
                <li>Authors</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Author Area Start Here -->
    <section class="author-page-wrap padding-top-80 padding-bottom-50">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8">
            <div class="author-box-layout1">
              <div class="adv-search-wrap">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Author Name Search . . ." />
                  <div class="btn-group">
                    <div class="input-group-btn">
                      <button type="submit" class="btn-search">
                        <i class="flaticon-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <h3 class="author-section-title">Total {{ authorsList.length }} Authors</h3>
              <div class="table-responsive">
                <table class="table table-striped">
                  <tbody v-if="authorsList">
                    <tr v-for="(author,index) in authorsList" :key="index">
                      <th>
                        <div class="author-personal-info">
                          <router-link :to="(author.recipes_count==0)?'javascript:void(0);':'/author/'+author.id" 
                          class="item-figure">
                            <img
                              v-lazy="author.photo_url"
                              alt="Author"
                              style="height:60px;width:60px;"
                            />
                          </router-link>
                          <div class="item-content">
                            <div class="item-title">
                              <router-link :to="(author.recipes_count==0)?'javascript:void(0);':'/author/'+author.id">
                                 {{ author.display_name }}
                              </router-link>
                            </div>
                            <div class="item-designation">Dessert Specialist</div>
                          </div>
                        </div>
                      </th>
                      <td>
                        <div class="author-social-info">
                          <ul>
                            <li>
                              <div>
                                <h4 class="item-title">Recipes</h4>
                                <span
                                  class="item-number"
                                  v-if="author.recipes_count == 0">
                                    {{ author.recipes_count }}
                                </span>
                                <router-link :to="`/author/`+author.id" v-else title="view recipe lists">
                                  <span
                                    class="item-number">
                                      {{ author.recipes_count }}
                                  </span>
                                </router-link>
                              </div>
                            </li>
                            <li>
                              <div>
                                <h4 class="item-title">Reviews</h4>
                                <span class="item-number">29</span>
                              </div>
                            </li>
                            <li>
                              <div>
                                <h4 class="item-title">Favourite</h4>
                                <span class="item-number">35+</span>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
              </ul>-->
            </div>
          </div>
          <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
            <div class="widget">
              <div class="section-heading heading-dark">
                <h3 class="item-heading">ABOUT ME</h3>
              </div>
              <div class="widget-about">
                <figure class="author-figure">
                  <img src="/app/img/figure/about.jpg" alt="about" />
                </figure>
                <figure class="author-signature">
                  <img src="/app/img/figure/signature.png" alt="about" />
                </figure>
                <p>
                  Fusce mauris auctor ollicituder teary iner hendrerit risusey aeenean rauctor pibus
                  doloer.
                </p>
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
                  <li class="single-item" v-for="(lr,index) in latestsRecipes" :key="index">
                    <div class="item-img">
                      <a href="#">
                        <img :src="lr.photo_url" alt="Post" style="width:90px;height:70px;" />
                      </a>
                      <div class="count-number">1</div>
                    </div>
                    <div class="item-content">
                      <div class="item-ctg">{{ lr.category.name }}</div>
                      <h4 class="item-title">
                        <a href="#">{{ lr.title }}</a>
                      </h4>
                      <div class="item-post-by">
                        <a href="single-blog.html">
                          <i class="fas fa-user"></i>
                          <span>by</span>
                          {{ lr.user.display_name }}
                        </a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Author Area End Here -->
  </div>
</template>

    <script>
import { mapState } from "vuex";
export default {
  name: "authorsList",
  data() {
    return {};
  },
  methods: {
    getAuthorsList() {
      this.$store.dispatch("authorsList");
    },
    getLatestsRecipes() {
      this.$store.dispatch("latestsRecipes");
    },
  },
  created() {
    this.getAuthorsList();
    this.getLatestsRecipes();
  },
  computed: mapState({
    authorsList: (state) => state.data.authorsList,
    latestsRecipes: (state) => state.data.latestsRecipes,
  }),
};
</script>

    <style lang="scss" scoped>
</style>