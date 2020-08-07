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
                <h3 class="card-title float-left">Manage All Categories</h3>
                <h3 class="card-title float-right">
                   <router-link to="/add-category" class="btn btn-sm btn-primary">
                      <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New
                   </router-link>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <v-server-table :url="API_URL" :columns="columns" :options="options" ref="table">  
                   <div slot="photo_url" slot-scope="{ row }">
                      <img class="img-circle" width="50" height="50" v-lazy="row.photo_url" />
                    </div>      
                     <div slot="status" slot-scope="{ row }"> 
                       <span v-if="row.status == 1" class="badge badge-success">Active</span>   
                       <span v-if="row.status == 0" class="badge badge-warning">In Active</span> 
                       <span v-if="row.status == 2" class="badge badge-danger">Archieved</span>                  
                     </div>
                    <div slot="actions" slot-scope="{ row }"> 
                      <router-link :to="'/edit-category/'+row.id" title="Edit Item" class="btn btn-sm bg-gradient-success">
                          <i class="fa fa-edit" aria-hidden="true"></i>
                      </router-link> 
                      <button v-if="row.status != '2'" @click="deleteCategory( row.id )" title="Archive Item" class="btn btn-sm bg-gradient-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </button> 
                    </div>                     
                  </v-server-table>   
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
import { mapState } from 'vuex';
import config from '../../../../config';
export default {
  name: 'CategoriesList',
  data() {
    return {
        columns: [
          'photo_url',
          'name', 
          'slug',
          'status',
          'created_at',
          'actions'
        ], 
        API_URL : config.API_URL+'admin/getCategories',
        tableData: [],
        options: { 
          headings: {
            photo_url	: 'Image',
            name : 'Category Name',
            slug : 'Category Slug',
            status : 'Status',
            created_at : 'Created Date'
          },
          perPage : 10, 
          perPageValues:[5,10,25,50,100], 
          requestAdapter(data) { 
              return {                 
                sort: data.orderBy ? data.orderBy : 'created_at',
                direction: (data.ascending) ? 'asc' : 'desc',
                search : data.query,
                limit : data.limit,
                page : data.page
              }
            },
            responseAdapter({data}) { 
              return {
                data : data.data,
                count: data.total
              }
            },
            pagination : {
               nav: '',
               edge : true
            },    
            filterable: true,  
            sortable: [ 'name','slug','status','created_at'],  
            orderBy: {
              column: 'created_at',
              ascending: false
            },
            sortIcon: {
              base : 'fa',
              is: 'fa-sort float-right',
              up: 'fa-sort-alpha-up-alt float-right',
              down: 'fa-sort-alpha-down-alt float-right'
            },
            templates: { 
              created_at(h, row) {
                return moment(row.created_at).format('DD MMM , YYYY');
              } 
            }
        } 
    }
  }, 
  methods:{   
    deleteCategory(id){
      let _this = this; 
      _this.$dialog.confirm('Are you sure want to archieved?')
        .then(function(dialog) {
          loader: true;  
            //Delete Code start
            _this.$store.dispatch('deleteCategory',{ id : id })
            .then(function(result){
                if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                  _this.$toastr.s('Data Saved Successfully','Success!'); 
                  _this.tableRefresh()
                }else if( ( typeof(result.status) != 'undefined' ) && (result.status == false) ){ 
                  _this.$toastr.e('Opps! Unable to save form,please check error log','Error!');  
                }else{
                  _this.$toastr.e('Opps! Something went wrong,please check log','Error!'); 
                } 
              })
              .catch(function(error){
                  _this.$toastr.e(error,'Errors!'); 
              }); 
            //Delete Code end
        }); 
          
    },
    tableRefresh() {
       this.$refs.table.refresh();
    }

  },
  computed: mapState({ 
  }),
  created(){       
  } 
}
</script> 
<style>   
</style>
