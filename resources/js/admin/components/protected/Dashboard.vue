<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <router-link to="/dashboard">Home</router-link>
               </li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 v-html="(dashboardData.recipes)?dashboardData.recipes:'0'"></h3> 
                <p>Total Recipes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <router-link to="/recipes" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 v-html="(dashboardData.authors)?dashboardData.authors:'0'"></h3> 
                <p>Total Authors</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <router-link to="/authors" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 v-html="(dashboardData.clients)?dashboardData.clients:'0'"></h3> 
                <p>Total Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <router-link to="/clients" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
               </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 v-html="(dashboardData.categories)?dashboardData.categories:'0'"></h3> 
                <p>Total Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <router-link to="/categories" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row --> 
         <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 v-html="(dashboardData.recipeTags)?dashboardData.recipeTags:'0'"></h3> 
                <p>Total Recipes Tags</p>
              </div>
              <div class="icon">
                <i class="ion ion-pricetag"></i>
              </div>
              <router-link to="/tags" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 v-html="(dashboardData.recipeBlogs)?dashboardData.recipeBlogs:'0'"></h3> 
                <p>Total Blogs</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <router-link to="/blogs" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 v-html="(dashboardData.recipeBlogCategories)?dashboardData.recipeBlogCategories:'0'"></h3> 
                <p>Total Blog Categories </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <router-link to="/blog-categories" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
               </router-link>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 v-html="(dashboardData.recipeBlogTags)?dashboardData.recipeBlogTags:'0'"></h3> 
                <p>Total Blog Tags</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <router-link to="/blog-tags" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row --> 
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
  name: 'Dashboard',
  data : function(){
    return {
      loader : null,
      dashboardData : {}
    }
  },
  methods : {
    getDashboardData(){
      let _this = this;
      _this.$store.dispatch('getDashboardData')
      .then(function(result){
         _this.dashboardData = result;
         _this.loader.hide();
       }) 

    }
  },
  created(){ 
    this.loader = this.$loading.show(); 
    this.getDashboardData();
  }    
}
</script> 
<style scoped> 
</style>
