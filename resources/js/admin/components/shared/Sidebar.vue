<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link to="/dshboard" class="brand-link">
      <img
        v-lazy="userProfile.photo_url"
        alt="Admin"
        class="brand-image img-circle elevation-3"
        style="opacity: .8"
      />
      <span class="brand-text font-weight-light">Recipe Dashboard</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img 
           v-lazy="userProfile.photo_url"
           class="img-circle elevation-2" 
          alt="User Image">-->
        </div>
        <div class="info">
          <router-link
            to="/update-profile"
            title="Edit Profile"
            class="d-block"
          >{{ (userProfile.display_name)?userProfile.display_name:'User Name' }}</router-link>
          <span style="color:#fff;">( {{ (userProfile.role)?userProfile.role:' ROLE ' }} }</span>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <router-link to="/dashboard" title="View Dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              to="/clients"
              :class="( (this.$route.name == 'clients-list') || (this.$route.name == 'add-clients') || (this.$route.name == 'edit-clients') )?'active':''"
              title="View Clients List"
              class="nav-link"
            >
              <i class="nav-icon fas fa-users"></i>
              <p>Clients</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              to="/authors"
              title="View Users List"
              class="nav-link"
              :class="( (this.$route.name == 'authors-list') || (this.$route.name == 'add-authors') || (this.$route.name == 'edit-authors') )?'active':''"
            >
              <i class="nav-icon fas fa-user-secret"></i>
              <p>Authors</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              :class="( (this.$route.name == 'recipes-list') || (this.$route.name == 'add-recipe') || (this.$route.name == 'edit-recipe') )?'active':''"
              to="/recipes"
              title="View Recipes List"
              class="nav-link"
            >
              <i class="nav-icon fas fa-hamburger"></i>
              <p>Recipes</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              :class="( (this.$route.name == 'categories-list') || (this.$route.name == 'add-category') || (this.$route.name == 'edit-category') )?'active':''"
              to="/categories"
              title="View Recipes Categories"
              class="nav-link"
            >
              <i class="nav-icon fas fa-list"></i>
              <p>Recipe Categories</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              :class="( (this.$route.name == 'tags-list') || (this.$route.name == 'add-tag') || (this.$route.name == 'edit-tag') )?'active':''"
              to="/tags"
              title="View Recipe Tags"
              class="nav-link"
            >
              <i class="nav-icon fas fa-tags"></i>
              <p>Recipe Tags</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              :class="( (this.$route.name == 'blogs-list') || (this.$route.name == 'add-blog') || (this.$route.name == 'edit-blog') )?'active':''"
              to="/blogs"
              title="View Blogs List"
              class="nav-link"
            >
              <i class="nav-icon fas fa-blog"></i>
              <p>Blogs</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              :class="( (this.$route.name == 'blog-categories-list') || (this.$route.name == 'add-blog-category') || (this.$route.name == 'edit-blog-category') )?'active':''"
              to="/blog-categories"
              title="View Blog Tags"
              class="nav-link"
            >
              <i class="nav-icon fas fa-list"></i>
              <p>Blog Categories</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link
              :class="( (this.$route.name == 'blog-tags-list') || (this.$route.name == 'add-blog-tag') || (this.$route.name == 'edit-blog-tag') )?'active':''"
              to="/blog-tags"
              title="View Blog Tags"
              class="nav-link"
            >
              <i class="nav-icon fas fa-tags"></i>
              <p>Blog Tags</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/products" title="View Products List" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>Prodcuts</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/change-password" title="Change Your Password" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>Change Password</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/update-profile" title="Update Your Profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Update Profile</p>
            </router-link>
          </li>

          <li class="nav-item">
            <a
              href="javascript:void(0);"
              @click.prevent="signOutAccount"
              title="SignOut Your Account"
              class="nav-link"
            >
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Sign Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
  name: "Sidebar",
  data: function () {
    return {
      userProfile: {},
    };
  },
  methods: {
    getProfile() {
      let _this = this;
      _this.$store.dispatch("loggedProfile").then(function (result) {
        _this.userProfile = result;
      });
    },
    signOutAccount() {
      let _this = this;
      _this.$dialog
        .confirm("Are you sure to signout your account?")
        .then(function (dialog) {
          loader: true;
          //Delete Code start
          _this.$loading.show();
          _this.$store
            .dispatch("adminLogout", _this.loginData)
            .then((res) => {
              if (typeof res.status != "undefined" && res.status == true) {
                localStorage.removeItem("current_user");
                localStorage.removeItem("token");
                _this.$toastr.s("You have been logged out", "SUCCESS!!");
                setTimeout(function () {
                  window.location.href = "/admin/login";
                }, 500);
              } else if (
                typeof res.status != "undefined" &&
                res.status == false
              ) {
                _this.$toastr.s("Error in logged out", "ERROR!!");
              }
            })
            .catch((e) => {
              _this.$toastr.s("Error in logged out", "ERROR!!");
            });
        });
    },
  },
  created() {
    if (!!localStorage.getItem("token")) {
      this.getProfile();
    }
  },
};
</script> 
<style scoped>
</style>
