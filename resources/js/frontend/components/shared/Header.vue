<template>
  <header class="header-one">
    <!-- Mobile Responsive -->
    <div id="header-main-menu" class="header-main-menu header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-3 col-sm-4 col-4 possition-static">
            <div class="site-logo-mobile">               
              <router-link to="/" class="sticky-logo-light"> 
                <img :src="this.$store.state.ASSET_BASE_URL+'app/img/logo-light.png'" alt="Recipe Logo" />
              </router-link>
              <router-link to="/" class="sticky-logo-dark">
                <img :src="this.$store.state.ASSET_BASE_URL+'app/img/logo-dark.png'" alt="Recipe Logo" />
              </router-link>
            </div>
            <nav class="site-nav">
              <ul id="site-menu" class="site-menu">
                <li> 
                  <router-link to="/home">Home</router-link>
                </li>
                <li>
                  <router-link to="/categories">Categories</router-link>
                </li>
                <li>
                  <router-link to="/recipes">Recipes</router-link>
                </li>
                <li>
                  <router-link to="/authors">Authors</router-link>
                </li>
                <li>
                  <router-link to="/blogs">Blog</router-link>
                </li>
                <li>
                  <router-link to="/shop">Shop</router-link>
                </li>
                <li>
                  <router-link to="/contact-us">Contact Us</router-link>
                </li>
                <li>
                  <router-link to="/about-us">About Us</router-link>
                </li>
              </ul>
            </nav>
          </div>
          <div
            class="col-lg-4 col-md-9 col-sm-8 col-8 d-flex align-items-center justify-content-end"
          >
            <div class="nav-action-elements-layout1">
              <ul>
                <li>
                  <div class="cart-wrap cart-on-mobile d-lg-none">
                    <div class="cart-info">
                      <i class="flaticon-shopping-bag"></i>
                      <div class="cart-amount">
                        <span class="item-currency">$</span>00
                      </div>
                    </div>
                    <div class="cart-items">
                      <div class="cart-item">
                        <div class="cart-img">
                          <a href="#">
                            <img
                              :src="this.$store.state.ASSET_BASE_URL+'app/img/product/top-product1.jpg'"
                              alt="product"
                              class="img-fluid"
                            />
                          </a>
                        </div>
                        <div class="cart-title">
                          <a href="#">Pressure</a>
                          <span>Code: STPT601</span>
                        </div>
                        <div class="cart-quantity">X 1</div>
                        <div class="cart-price">$249</div>
                        <div class="cart-trash">
                          <a href="#">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-img">
                          <a href="#">
                            <img
                              :src="this.$store.state.ASSET_BASE_URL+'app/img/product/top-product2.jpg'"
                              alt="product"
                              class="img-fluid"
                            />
                          </a>
                        </div>
                        <div class="cart-title">
                          <a href="#">Stethoscope</a>
                          <span>Code: STPT602</span>
                        </div>
                        <div class="cart-quantity">X 1</div>
                        <div class="cart-price">$189</div>
                        <div class="cart-trash">
                          <a href="#">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-img">
                          <a href="#">
                            <img
                              :src="this.$store.state.ASSET_BASE_URL+'app/img/product/top-product3.jpg'"
                              alt="product"
                              class="img-fluid"
                            />
                          </a>
                        </div>
                        <div class="cart-title">
                          <a href="#">Microscope</a>
                          <span>Code: STPT603</span>
                        </div>
                        <div class="cart-quantity">X 2</div>
                        <div class="cart-price">$379</div>
                        <div class="cart-trash">
                          <a href="#">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-btn">
                          <a href="#" class="item-btn">View Cart</a>
                          <a href="#" class="item-btn">Checkout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <button
                    type="button"
                    class="login-btn"
                    data-toggle="modal"
                    data-target="#myModal"
                  >
                    <i class="flaticon-profile"></i>Login
                  </button>
                </li>
                <li>
                  <a href="submit-recipe.html" class="fill-btn">
                    <i class="flaticon-plus-1"></i>SUBMIT
                    RECIPE
                  </a>
                </li>
              </ul>
            </div>
            <div class="mob-menu-open toggle-menu">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Web -->
    <div class="header-bottom d-none d-lg-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 d-none d-lg-block">
            <div class="nav-action-elements-layout2"> 
              <ul class="nav-social">
                <li>
                  <a :href="( (companyDetail) && (companyDetail.youtube_url!='') )?companyDetail.youtube_url:'javascript:void(0);'" title="Youtube Channel">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
                <li>
                  <a :href="( (companyDetail) && (companyDetail.facebook_url!='') )?companyDetail.facebook_url:'javascript:void(0);'" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li>
                  <a :href="( (companyDetail) && (companyDetail.twitter_url!='') )?companyDetail.twitter_url:'javascript:void(0);'" title="Twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a :href="( (companyDetail) && (companyDetail.linkedin_url!='') )?companyDetail.linkedin_url:'javascript:void(0);'" title="Linkedin">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
                <li>
                  <a :href="( (companyDetail) && (companyDetail.instagram_url!='') )?companyDetail.instagram_url:'javascript:void(0);'" title="Instagram">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li>
                  <a :href="( (companyDetail) && (companyDetail.pinterest_url!='') )?companyDetail.pinterest_url:'javascript:void(0);'" title="Pinterest">
                    <i class="fab fa-pinterest-p"></i>
                  </a>
                </li>
                <li>
                  <a :href="( (companyDetail) && (companyDetail.telegram_url!='') )?companyDetail.telegram_url:'javascript:void(0);'" title="Telegram">
                    <i class="fab fa-telegram"></i>
                  </a>
                </li> 
              </ul>
            </div>
          </div>
          <div class="col-lg-4 d-none d-lg-block">
            <div class="site-logo-desktop">
              <router-link to="/" class="main-logo">
                <img :src="this.$store.state.ASSET_BASE_URL+'app/img/logo-dark.png'" alt="Recipe Logo" />
              </router-link>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="nav-action-elements-layout3">
              <ul>
                <li>
                  <div class="header-search-box">
                    <a href="#search" title="Search" class="search-button">
                      <i class="flaticon-search"></i>
                    </a>
                  </div>
                </li>
                <li>
                  <div class="cart-wrap d-none d-lg-block">
                    <div class="cart-info">
                      <i class="flaticon-shopping-bag"></i>
                      <div class="cart-amount">
                        <span class="item-currency">$</span>00
                      </div>
                    </div>
                    <div class="cart-items">
                      <div class="cart-item">
                        <div class="cart-img">
                          <a href="#">
                            <img
                              :src="this.$store.state.ASSET_BASE_URL+'app/img/product/top-product1.jpg'"
                              alt="product"
                              class="img-fluid"
                            />
                          </a>
                        </div>
                        <div class="cart-title">
                          <a href="#">Pressure</a>
                          <span>Code: STPT601</span>
                        </div>
                        <div class="cart-quantity">X 1</div>
                        <div class="cart-price">$249</div>
                        <div class="cart-trash">
                          <a href="#">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-img">
                          <a href="#">
                            <img
                              :src="this.$store.state.ASSET_BASE_URL+'app/img/product/top-product2.jpg'"
                              alt="product"
                              class="img-fluid"
                            />
                          </a>
                        </div>
                        <div class="cart-title">
                          <a href="#">Stethoscope</a>
                          <span>Code: STPT602</span>
                        </div>
                        <div class="cart-quantity">X 1</div>
                        <div class="cart-price">$189</div>
                        <div class="cart-trash">
                          <a href="#">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-img">
                          <a href="#">
                            <img
                              :src="this.$store.state.ASSET_BASE_URL+'app/img/product/top-product3.jpg'"
                              alt="product"
                              class="img-fluid"
                            />
                          </a>
                        </div>
                        <div class="cart-title">
                          <a href="#">Microscope</a>
                          <span>Code: STPT603</span>
                        </div>
                        <div class="cart-quantity">X 2</div>
                        <div class="cart-price">$379</div>
                        <div class="cart-trash">
                          <a href="#">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                      <div class="cart-item">
                        <div class="cart-btn">
                          <a href="#" class="item-btn">View Cart</a>
                          <a href="#" class="item-btn">Checkout</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapState } from "vuex";
export default {
  name: "headercomponent",
  data() {
    return {}
  },
  created(){ 
  },
  computed:mapState({
    companyDetail : (state) => state.data.companyDetail
  })
};
</script>

<style scoped>
.site-menu > li > a.router-link-active {
  background: #e92731;
  padding: 3px 8px;
  border-radius: 0px 9px;
}
</style>