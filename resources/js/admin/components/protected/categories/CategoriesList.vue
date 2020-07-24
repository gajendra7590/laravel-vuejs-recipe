<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <router-link to="/dashboard" >Home</router-link>
              </li>
              <li class="breadcrumb-item active">Categories List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manage All Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <datatable
                    class="table table-bordered table-striped"
                   :columns="columns"                      
                   :data="rows">
                </datatable> 

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  name: 'CategoriesList',
  data() {
    return {
       columns: [
            { label: 'id', field: 'id' },
            { label: 'Name', field: 'name' },
            { label: 'Slug', field: 'slug' } ,
            { label: 'Status', field: 'status' ,sortable : false } ,
            { label: 'Created At', field: 'created_at',sortable : false} 
        ] 
    }
  }, 
  methods:{  
    getCategories(){
      this.$store.dispatch("getCategories");
    }
  },
   computed: mapState({
    rows: state => state.data.getCategories, 
  }),
  created(){ 
    this.getCategories();
  } 
}
</script> 
<style scoped> 
</style>
