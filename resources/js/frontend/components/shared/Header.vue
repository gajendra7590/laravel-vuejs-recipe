<template>
  <header class="header-one">
    <!-- Search Box Start Here -->
    <div id="search" class="search-wrap">
      <button type="button" class="close">×</button>
      <form class="search-form">
        <input type="search" id="ooooo" value placeholder="Type here........" />
        <button type="submit" class="search-btn">
          <i class="flaticon-search"></i>
        </button>
      </form>
    </div>
    <!-- Search Box End Here -->
    <!-- Modal Start-->
    <div class="modal fade" id="loginModal" role="dialog" v-if="!userDetail.id">
      <div class="modal-dialog">
        <div class="modal-content" v-show="modelOpen1">
          <div class="modal-header">
            <div class="title-default-bold mb-none">Login</div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form id="loginForm" class="login-form" @submit.prevent="loginSubmit">
              <input
                class="main-input-box"
                v-model="login.email"
                name="email"
                type="text"
                autocomplete="off"
                placeholder="Your email address.."
              />
              <span class="text-danger" v-if="loginErrors.email">{{ loginErrors.email }}</span>
              <input
                class="main-input-box"
                v-model="login.password"
                name="password"
                type="password"
                autocomplete="off"
                placeholder="Your password.."
              />
              <span class="text-danger" v-if="loginErrors.password">{{ loginErrors.password }}</span>
              <div class="inline-box mb-5 mt-4">
                <div class="checkbox checkbox-primary">
                  <input v-model="login.rememberMe" id="modal-checkbox" type="checkbox" />
                  <label for="modal-checkbox">Remember Me</label>
                </div>
                <label class="lost-password">
                  <a href="javascript:void(0);" @click.prevent="forgotModal">Lost your password?</a>
                </label>
              </div>
              <div class="inline-box mb-5 mt-4">
                <button class="btn-fill" type="submit" value="Login">Login</button>
                <a href="javascript:void(0);" @click.prevent="registerModal" class="btn-register">
                  <i class="fas fa-user"></i>Register Here!
                </a>
              </div>
            </form>
          </div>
        </div>

        <div class="modal-content" v-show="modelOpen2">
          <div class="modal-header">
            <div class="title-default-bold mb-none">Forgot Your Password</div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form id="forgotForm" class="login-form" @submit.prevent="forgotSubmit">
              <input
                class="main-input-box"
                v-model="forgot.email"
                name="email"
                type="text"
                autocomplete="off"
                placeholder="Enter Your Email Address.."
              />
              <span class="text-danger" v-if="forgotErrors.email">{{ forgotErrors.email }}</span>
              <div class="inline-box mb-5 mt-4">
                <button class="btn-fill btn-block" type="submit" value="Login">Reset Password</button>
              </div>
              <div class="inline-box mb-5 mt-4">
                <a href="javascript:void(0);" @click.prevent="loginModal" class="btn-register">
                  <i class="fas fa-user"></i>Login Here!
                </a>
                <a href="javascript:void(0);" @click.prevent="registerModal" class="btn-register">
                  <i class="fas fa-user"></i>Register Here!
                </a>
              </div>
            </form>
          </div>
        </div>

        <div class="modal-content" v-show="modelOpen3">
          <div class="modal-header">
            <div class="title-default-bold mb-none">Create Your Account</div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form id="regiterForm" class="login-form" @submit.prevent="registerSubmit">
              <input
                class="main-input-box"
                v-model="register.first_name"
                name="first_name"
                autocomplete="off"
                type="text"
                placeholder="Your First Name.."
              />
              <span
                class="text-danger"
                v-if="regiterErrors.first_name"
              >{{ regiterErrors.first_name }}</span>
              <input
                class="main-input-box"
                v-model="register.last_name"
                name="last_name"
                autocomplete="off"
                type="tex"
                placeholder="Your Last Name.."
              />
              <span class="text-danger" v-if="regiterErrors.last_name">{{ regiterErrors.last_name }}</span>
              <input
                class="main-input-box"
                v-model="register.email"
                name="email"
                autocomplete="off"
                type="text"
                placeholder="Your Email.."
              />
              <span class="text-danger" v-if="regiterErrors.email">{{ regiterErrors.email }}</span>
              <input
                class="main-input-box"
                v-model="register.password"
                name="password"
                autocomplete="off"
                type="password"
                placeholder="Choose Your Password"
              />
              <span class="text-danger" v-if="regiterErrors.password">{{ regiterErrors.password }}</span>
              <div class="inline-box mb-5 mt-4">
                <div class="radio checkbox-primary">
                  <span class="account-type-span">Account Type :</span>
                  <input
                    name="user_role"
                    v-model="register.user_role"
                    value="author"
                    id="modal-checkbox1"
                    type="radio"
                  />
                  <label for="modal-checkbox1">Recipe Author</label>
                  <input
                    name="user_role"
                    v-model="register.user_role"
                    value="user"
                    id="modal-checkbox2"
                    type="radio"
                  />
                  <label for="modal-checkbox2">Recipe Lover</label>
                </div>
                <span
                  class="text-danger"
                  v-if="regiterErrors.user_role"
                >{{ regiterErrors.user_role }}</span>
              </div>
              <div class="inline-box mb-5 mt-4">
                <button class="btn-fill btn-block" type="submit">Create Account</button>
              </div>
              <div class="inline-box mb-5 mt-4">
                <a href="javascript:void(0);" @click.prevent="forgotModal" class="btn-register">
                  <i class="fas fa-user"></i>Forgot Password Here!
                </a>
                <a href="javascript:void(0);" @click.prevent="loginModal" class="btn-register">
                  <i class="fas fa-user"></i>Login Here!
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal End-->
    <!-- Mobile Responsive -->
    <div id="header-main-menu" class="header-main-menu header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-3 col-sm-4 col-4 possition-static">
            <div class="site-logo-mobile">
              <router-link to="/" class="sticky-logo-light">
                <img
                  :src="this.$store.state.ASSET_BASE_URL+'app/img/logo-light.png'"
                  alt="Recipe Logo"
                />
              </router-link>
              <router-link to="/" class="sticky-logo-dark">
                <img
                  :src="this.$store.state.ASSET_BASE_URL+'app/img/logo-dark.png'"
                  alt="Recipe Logo"
                />
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
                    v-if="!userDetail.id"
                    @click.prevent="loginModal"
                  >
                    <i class="flaticon-profile"></i>Login
                  </button>

                  <router-link
                    type="button"
                    class="login-btn"
                    v-if="userDetail.id"
                    :to="'/my-account/profile'"
                  >
                    <i class="flaticon-profile"></i>My Account
                  </router-link>
                </li>
                <li>
                  <router-link :to="'/account/cerate-recipe'" class="fill-btn">
                    <i class="flaticon-plus-2"></i>SUBMIT RECIPE
                  </router-link>
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
                  <a
                    :href="( (companyDetail) && (companyDetail.youtube_url!='') )?companyDetail.youtube_url:'javascript:void(0);'"
                    title="Youtube Channel"
                  >
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
                <li>
                  <a
                    :href="( (companyDetail) && (companyDetail.facebook_url!='') )?companyDetail.facebook_url:'javascript:void(0);'"
                    title="Facebook"
                  >
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li>
                  <a
                    :href="( (companyDetail) && (companyDetail.twitter_url!='') )?companyDetail.twitter_url:'javascript:void(0);'"
                    title="Twitter"
                  >
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a
                    :href="( (companyDetail) && (companyDetail.linkedin_url!='') )?companyDetail.linkedin_url:'javascript:void(0);'"
                    title="Linkedin"
                  >
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                </li>
                <li>
                  <a
                    :href="( (companyDetail) && (companyDetail.instagram_url!='') )?companyDetail.instagram_url:'javascript:void(0);'"
                    title="Instagram"
                  >
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li>
                  <a
                    :href="( (companyDetail) && (companyDetail.pinterest_url!='') )?companyDetail.pinterest_url:'javascript:void(0);'"
                    title="Pinterest"
                  >
                    <i class="fab fa-pinterest-p"></i>
                  </a>
                </li>
                <li>
                  <a
                    :href="( (companyDetail) && (companyDetail.telegram_url!='') )?companyDetail.telegram_url:'javascript:void(0);'"
                    title="Telegram"
                  >
                    <i class="fab fa-telegram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 d-none d-lg-block">
            <div class="site-logo-desktop">
              <router-link to="/" class="main-logo">
                <img
                  :src="this.$store.state.ASSET_BASE_URL+'app/img/logo-dark.png'"
                  alt="Recipe Logo"
                />
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
import $ from "jquery";

export default {
  name: "headercomponent",
  data() {
    return {
      loader: null,
      loginErrors: {},
      forgotErrors: {},
      regiterErrors: {},
      login: {
        email: "",
        passwrod: "",
        rememberMe: "",
      },
      forgot: {
        email: "",
      },
      register: {
        first_name: "",
        last_name: "",
        email: "",
        user_role: "author",
        password: "",
      },
      modelOpen1: true,
      modelOpen2: false,
      modelOpen3: false,
    };
  },
  methods: { 
    loginSubmit() {
      let _this = this;
      _this.loginErrors = {};
      _this.loader = _this.$loading.show({
        zIndex: 9999999,
        backgroundColor: "#dc3545",
        color: "#fff",
      });
      _this.$store
        .dispatch("login", _this.login)
        .then(function (result) {
          _this.loader.hide();
          if (typeof result.status != "undefined" && result.status == false) {
            _this.loginErrors = result.errors;
            _this.$toastr.e("ERROR", "Please Check Error Log");
          } else if (
            typeof result.status != "undefined" &&
            result.status == true
          ) {
            localStorage.setItem(
              "USER_SESSION",
              JSON.stringify({
                userToken: result.token.access_token,
                userRole: result.role,
                currentUser: result.current_user,
              })
            );
            _this.$toastr.s("SUCCESS", "You have been logged in successfully");
            _this.resetFunction();
            _this.loginModalHide();
            setTimeout(function () {
              window.location.href = "/";
            }, 500);
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    forgotSubmit() {
      let _this = this;
      _this.loader = _this.$loading.show({
        zIndex: 9999999,
        backgroundColor: "#dc3545",
        color: "#fff",
      });
      _this.forgotErrors = {};
      _this.$store
        .dispatch("forgotPassword", _this.forgot)
        .then(function (result) {
          _this.loader.hide();
          if (typeof result.status != "undefined" && result.status == false) {
            _this.forgotErrors = result.errors;
            _this.$toastr.e("ERROR", "Please Check Error Log");
          } else if (
            typeof result.status != "undefined" &&
            result.status == true
          ) {
            _this.$toastr.s(
              "SUCCESS",
              "Please check you email,we have sent reset link to you."
            );
            _this.resetFunction();
            _this.loginModalHide();
            window.location.href = "";
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    registerSubmit() {
      let _this = this;
      _this.loader = _this.$loading.show({
        zIndex: 9999999,
        backgroundColor: "#dc3545",
        color: "#fff",
      });
      _this.forgotErrors = {};
      _this.$store
        .dispatch("register", _this.register)
        .then(function (result) {
          _this.loader.hide();
          if (typeof result.status != "undefined" && result.status == false) {
            _this.regiterErrors = result.errors;
            _this.$toastr.e("ERROR", "Please Check Error Log");
          } else if (
            typeof result.status != "undefined" &&
            result.status == true
          ) {
            _this.$toastr.s(
              "SUCCESS",
              "You have been register successfully,please check email to verify account"
            );
            _this.resetFunction();
            _this.loginModalHide();
            window.location.href = "";
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    resetFunction() {
      this.loginErrors = {};
      this.forgotErrors = {};
      this.regiterErrors = {};
      this.login = { email: "", passwrod: "", rememberMe: "" };
      this.forgot = { email: "" };
      this.register = {
        first_name: "",
        last_name: "",
        email: "",
        user_role: "author",
        password: "",
      };
    },
    loginModalHide() { 
      $("#loginModal").modal("hide"); 
    },
    loginModal() {
      this.resetFunction(); //Reset All Forms
      $("#loginModal").modal("show");
      this.modelOpen1 = true;
      this.modelOpen2 = false;
      this.modelOpen3 = false;
    },
    forgotModal() {
      this.modelOpen1 = false;
      this.modelOpen2 = true;
      this.modelOpen3 = false;
    },
    registerModal() {
      this.modelOpen1 = false;
      this.modelOpen2 = false;
      this.modelOpen3 = true;
    },
  },
  created() {},
  computed: mapState({
    companyDetail: (state) => state.data.companyDetail,
    userDetail: (state) => state.data.userDetail,
  }),
};
</script>

<style scoped>
.site-menu > li > a.router-link-active {
  background: #e92731;
  padding: 3px 8px;
  border-radius: 0px 9px;
}
.account-type-span {
  background: #f54a52;
  color: #fff;
  padding: 2px 6px;
  margin-right: 9px;
  border-radius: 5px;
}
</style>