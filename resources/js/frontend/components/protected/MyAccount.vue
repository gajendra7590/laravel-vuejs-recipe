<template>
  <div>
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image="/app/img/figure/inner-page-banner1.jpg"
    ></section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Submit Recipe Area Start Here -->
    <section class="submit-recipe-page-wrap padding-top-74 padding-bottom-50">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-3 col-sm-12 col-xs-12 dashboard-nav-container">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <router-link
                  class="nav-link"
                  :class="(this.$route.name == 'profile')?'active':''"
                  :to="'/my-account/profile'"
                >Profile</router-link>
              </li>
              <li class="nav-item">
                <router-link
                  class="nav-link"
                  :class="(this.$route.name == 'changePassword')?'active':''"
                  :to="'/my-account/change-password'"
                >Change Password</router-link>
              </li>
              <!-- <li class="nav-item">
                <router-link
                  class="nav-link"
                  :class="(this.$route.name == 'favRecipes')?'active':''"
                  :to="'/my-account/fav-recipes'"
                >My Fav Recipes</router-link>
              </li> -->
              <li class="nav-item" v-if="userDetail.role == 'author'">
                <router-link
                  class="nav-link"
                  :class="(this.$route.name == 'recipesList' || this.$route.name == 'createRecipe' || this.$route.name == 'editRecipe')?'active':''"
                  :to="'/my-account/recipes-list'"
                >My Recipes</router-link>
              </li>
              <li class="nav-item">
                <a class="nav-link" @click.prevent="userLogout" href="javascript:void(0);">Logout</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 col-sm-12 col-xs-12">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </section>
    <!-- Submit Recipe Area End Here -->
  </div>
</template> 
<script>
import { mapState } from "vuex";
export default {
  name: "userProfile",
  data() {
    return {
      loader: null,
    };
  },
  computed: mapState({}),
  methods: {
    getUserToken() {
      let token = null;
      let userData = localStorage.getItem("USER_SESSION");
      if (!!userData) {
        try {
          userData = JSON.parse(userData);
          token =
            typeof userData.userToken != "undefined"
              ? userData.userToken
              : null;
        } catch (e) {
          token = null;
        }
      }
      return token;
    },
    validateAccount() {
      let _this = this;
      _this.loader = this.$loading.show({
        zIndex: 9999999,
        backgroundColor: "#dc3545",
        color: "#fff",
        opacity: 1,
      });
      setTimeout(function () {
        if (!_this.$store.state.loggedIn) {
          _this.$toastr.e("Opps! Your session has been expired");
          _this.loader.hide();
          _this.$router.push("/home");
        } else {
          _this.loader.hide();
        }
      }, 1000);
    },
    userLogout() {
      let userDetail = this.$store.state.data.userDetail;
      let _this = this;
      _this.$dialog
        .confirm("ARE YOU SURE TO SIGN OFF YOUR SESSION?")
        .then(function (dialog) { 
          _this.loader = _this.$loading.show({
            zIndex: 9999999,
            backgroundColor: "#dc3545",
            color: "#fff",
          });
          if (userDetail.id) {
            _this.$store
              .dispatch("signout")
              .then(function (result) {
                if (
                  typeof result.status != "undefined" &&
                  result.status == true
                ) {
                  _this.$toastr.s("You have been logged out successfully");
                  localStorage.removeItem("USER_SESSION");
                  window.location.href = "/home";
                }
              })
              .catch(function (error) {
                console.log(error);
                _this.loader.hide();
              });
          } else {
            _this.$router.push("/home");
          }
        });
    },
  },
  created() {
    this.validateAccount();
  },
  computed: mapState({ 
    userDetail: (state) => state.data.userDetail,
  }),
};
</script>

<style>
.dashboard-nav-container {
  background: linear-gradient(-142deg, #fbf9eb, #fff);
  padding-bottom: 10px;
}

.dashboard-nav-container li.nav-item a {
  font-size: 18px;
}

.dashboard-nav-container {
  background: linear-gradient(-142deg, #fbf9eb, #fff);
  padding-bottom: 10px;
  max-height: 300px;
  min-height: 300px;
}
.dashboard-nav-container li.active a {
  border-bottom: 1px solid #cd040b;
  color: #cd040b;
}
.dashboard-nav-container li a {
  font-size: 14px;
  color: #202125;
  font-weight: 500;
  text-transform: capitalize;
  border-radius: 0px;
  border-bottom: 1px solid #ededed;
  padding: 10px 15px;
}
.dashboard-nav-container li a:hover,
.dashboard-nav-container li a:focus,
.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  border-bottom: 1px solid #cd040b;
  color: #cd040b;
  background-color: transparent;
}
.dashboard-nav-container li {
  border-bottom: none;
}
.dashboard-nav-container li:last-child {
  margin-bottom: 0;
}

.dashboard_Panel {
  float: left;
  width: 100%;
  border: 1px solid #ededed;
  min-height: 30vh;
  margin-top: 10px;
  padding: 15px;
}

.dashboard_Content h3 {
  font-size: 16px;
  line-height: 36px;
  padding: 5px 10px;
  text-transform: uppercase;
  color: #fff;
  background: #232323;
  font-weight: 500;
}
</style>