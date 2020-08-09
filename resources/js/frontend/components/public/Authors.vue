    <template>
  <div id="authorsList">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image=""
    > 
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
             <AboutMe />
             <SubscribeAndFollow />
             <LatestRecipes />
          </div>
        </div>
      </div>
    </section>
    <!-- Author Area End Here -->
  </div>
</template>

    <script>
import { mapState } from "vuex";
//custom Components
import AboutMe from './sidebar/AboutMe';
import SubscribeAndFollow from './sidebar/SubscribeAndFollow';
import LatestRecipes from './sidebar/LatestRecipes'; 
export default {
  name: "authorsList",
  components: {  
    AboutMe,
    SubscribeAndFollow,
    LatestRecipes,
  },
  data() {
    return {};
  },
  methods: {
    getAuthorsList() {
      this.$store.dispatch("authorsList");
    } 
  },
  created() {
    this.getAuthorsList(); 
  },
  computed: mapState({
    authorsList: (state) => state.data.authorsList 
  }),
};
</script>

    <style lang="scss" scoped>
</style>