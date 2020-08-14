<template>
  <div class="dashboard_Content">
    <!-- Tap Panel -->
    <div id="home" class>
      <h3>My Recipes List</h3>
      <div class="dashboard_Panel">
        <div class="add-btn float-right">
          <a href="" class="btn btn-xl btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</a>
        </div>
        <v-client-table :data="recipesList" :columns="columns" :options="options">
            <div slot="photo" slot-scope="{ row }">
              <img v-lazy="row.photo_url" class="img-thumbnail" width="75" height="75"/>
            </div>
            <div slot="updated_at" slot-scope="{ row }" class="in_inspec_des">
               {{ row.updated_at | moment('DD, MMMM YYYY') }}
            </div> 
            <div slot="actions" slot-scope="{ row }" class="in_inspec_des">
               <router-link :to="'edit-recipe/'+row.slug" class="btn-submit btn btn-warning btn-xl" title="Edit Recipe">
                  <i class="fa fa-pencil-alt" aria-hidden="true"></i>
               </router-link>
               <a @click.prevent="deleteRecipe(row.id)" href="javascript:void(0);" class="btn-submit btn btn-danger btn-xl" title="Delete Recipe">
                  <i class="fa fa-trash-alt" aria-hidden="true"></i>
               </a>
            </div>
            
        </v-client-table> 
      </div>
    </div>
    <!-- Tap Panel -->
  </div>
</template> 
<script>
import { mapState } from 'vuex';
export default {
  name: "userProfile",
  data() {
    return {
      recipesList : [],
      loader : null,
      columns: [
        "photo",
        "category",
        "title",        
        "updated_at",
        "actions",
      ],
      options: {
        headings: {
          photo: "",
          category: "Category",
          title: "Title", 
          updated_at: "Creation time",
          actions: "Action",
        },
        texts: {
          filterPlaceholder: "Search....",
        },
        perPage: 5,
        perPageValues: [5, 10, 20],
        pagination: {
          nav: "",
          edge: true,
        },
        filterable: true,
        orderBy: {
          column: "title",
          ascending: false,
        },
        sortable: [ 
          "category",
          "title",
          "updated_at" 
        ],
        sortIcon: {
          base: "fa",
          is: "fa-sort float-right",
          up: "fa-sort-up float-right",
          down: "fa-sort-down float-right",
        },
        templates: { 
           category(h, row) {
              return (
                row.category.name.charAt(0).toUpperCase() + row.category.name.slice(1)
              );
           } 
        },
      },
    };
  },
  methods: {
    getRecipesList(){
      let _this = this;
       this.$store.dispatch('getAuthorsRecipes')
       .then(function(result){
         _this.recipesList = result.data
       })
       .catch(function(error){
           console.log( error );
       });
    },
    deleteRecipe(id){
       let _this = this;
       _this.$dialog.confirm('Are you sure want to archieved?').then(function(dialog) {
              _this.loader = _this.$loading.show({zIndex:9999999,color:'#fff'});
              _this.$store.dispatch('deleteAuthorsRecipe',{id : id}).then(function(result){
                _this.loader.hide();
                  if( typeof(result.status)!='undefined' && (result.status == true)){
                    _this.$toastr.s('Recipe Deleted successfully','SUCCESS');
                    _this.getRecipesList(); 
                  } 
                })
                .catch(function(error){
                   _this.$toastr.e('Something Went Wrong','ERROR');
                   console.log( error )
                  _this.loader.hide();
                })
        }); 

    }
  },
  created() {
    this.getRecipesList();
  } 
};
</script>

<style>
.VueTables__search {
    float: right;
 }

 .VueTables__limit {
    float: left;
 }

 .VueTables__search-field label {
    float: left;
    margin-right: 6px;
}
.VueTables__limit-field label {
    float: left;
    margin-right: 6px;
}
</style>