<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Recipes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><router-link to="/dashboard">Home</router-link></li>
              <li class="breadcrumb-item active">Manage Recipes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Recipes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="vueForm" name="vueForm" enctype="multipart/form-data" @submit.prevent="submitForm(this)"> 
                    <div class="card-body">  
                        <div class="row logo-container card-footer">
                            <div class="col-sm-2 col-xs-12 profile_image_container">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                       <img 
                                            class="profile-user-img img-fluid img-circle _img_thumb_preview" 
                                            :src="( editData.photo_url)?editData.photo_url:'/images/default/default.jpg'" 
                                            alt="User profile picture"
                                       >
                                    </div>   
                                </div> 
                                <div class="customInput">
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload-alt" aria-hidden="true"></i>
                                        Feature Image
                                    </label>
                                    <input id="file-upload" class="_img_thumb_input" accept="image/*" name="image" type="file"/>
                                </div>
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Recipe Title</label> 
                                    <input 
                                        type="text" 
                                        name="title"
                                        v-model="editData.title"
                                        class="form-control"  
                                        placeholder="Enter title...">
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Recipe Category</label>
                                    <select class="form-control" name="category_id" v-model="editData.category_id">
                                        <option value="" selected>---Select Recipe Category</option> 
                                        <option v-for="(category,index) in categories" :key="index" :value="category.id">
                                          {{ category.name }}
                                        </option>
                                    </select>   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="form-group">
                                    <label>Recipe Description</label>
                                    <vue-editor
                                    name="description" 
                                    placeholder='Full article note..'
                                    v-model="editData.description">
                                    </vue-editor>
                                </div>
                            </div>
                        </div>  
                        <div class="row"> 
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Prepairation Time</label> 
                                    <input 
                                        type="text" 
                                        name="prepairation_time"
                                        v-model="editData.prepairation_time"
                                        class="form-control"  
                                        placeholder="Ex. : 5 Min">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Cooking Time</label> 
                                    <input 
                                        type="text" 
                                        name="cooking_time"
                                        v-model="editData.cooking_time"
                                        class="form-control"  
                                        placeholder="Ex. : 10 Min">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Total Serving Peoples</label> 
                                    <input 
                                        type="text" 
                                        name="serving_peoples"
                                        v-model="editData.serving_peoples"
                                        class="form-control"  
                                        placeholder="Ex : number of peoples">
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Ingredients</label>
                                    <div class="row ingredients-container card-footer">  
                                       <div class="col-sm-12">
                                          <a href="javascript:void(0);" @click.prevent="addIngredient" class="add-more-btn btn btn-sm btn-primary">
                                             <i aria-hidden="true" class="fa fa-plus-circle"></i> Add More Ingredient
                                           </a>
                                        </div>  
                                        <div v-for="(ig,index) in editData.ingredients" :key="index" class="col-sm-12" :class="(ig.is_deleted == '1')?'hideContainer':''"> 
                                          <div class="form-group additional-input-box icon-right">
                                                <input 
                                                    type="text"
                                                    placeholder="Ex: 1 Cup Hari Dhaniya" 
                                                    class="form-control" 
                                                    :name="`recipe_ingredients[${index}][name]`"
                                                    v-model="editData.ingredients[index].name">
                                                <i class="fas fa-times" @click.prevent="removeIngredient(index)"></i>
                                                <input type="hidden" :name="`recipe_ingredients[${index}][id]`" v-model="editData.ingredients[index].id">
                                                <input type="hidden" :name="`recipe_ingredients[${index}][is_deleted]`" v-model="editData.ingredients[index].is_deleted">
                                            </div> 
                                          </div>  
                                    </div>                                     
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nutrition Facts</label>
                                     <div class="row nutritions-container card-footer">  
                                       <div class="col-sm-12">
                                          <a href="javascript:void(0);" @click.prevent="addNutrition" class="add-more-btn btn btn-sm btn-primary">
                                             <i aria-hidden="true" class="fa fa-plus-circle"></i> Add More Nutrition
                                           </a>
                                        </div>  
                                        <div v-for="(nut,index) in editData.nutritions" :key="index" class="col-sm-12" :class="(nut.is_deleted == '1')?'hideContainer':''"> 
                                            <div class="form-group additional-input-box icon-right"> 
                                                <div class="col-sm-5">
                                                  <label>Nutrition Name</label>
                                                  <input 
                                                    type="text"
                                                    placeholder="Ex: Protein" 
                                                    class="form-control" 
                                                    :name="`recipe_nutritions[${index}][nutrition_name]`"
                                                    v-model="editData.nutritions[index].nutrition_name"> 
                                                </div>
                                                <div class="col-sm-5"> 
                                                  <label>Nutrition Value</label>
                                                  <input 
                                                      type="text"
                                                      placeholder="Ex: 22.5g" 
                                                      class="form-control" 
                                                      :name="`recipe_nutritions[${index}][nutrition_value]`"
                                                      v-model="editData.nutritions[index].nutrition_value">
                                                 </div>   
                                                 <div class="col-sm-2" style="margin-top: 31px;">
                                                    <i class="fas fa-times" @click.prevent="removeNutrition(index)"></i>
                                                    <input type="hidden" :name="`recipe_nutritions[${index}][id]`" v-model="editData.nutritions[index].id">
                                                    <input type="hidden" :name="`recipe_nutritions[${index}][is_deleted]`" v-model="editData.nutritions[index].is_deleted">
                                                 </div>  
                                            </div> 
                                          </div>  
                                    </div>                                                        
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category Status</label>
                                    <select class="form-control" name="status" v-model="editData.status">
                                        <option value="0">In Active</option>
                                        <option value="1">Active</option>
                                        <option value="2">Archive</option> 
                                    </select>   
                                </div>
                            </div>
                        </div>
                        <div class="card-footer"> 
                            <button type="submit" class="btn btn-success">Submit</button>
                            <router-link to="/recipes" class="btn btn-danger">Back</router-link>
                        </div>
                    </div>
              </form>
            </div>
            <!-- /.card --> 
          </div>
          <!--/.col (left) --> 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
    import { VueEditor } from "vue2-editor"; 
    import { mapState } from 'vuex';
    import config from '../../../../config';
    // config
    export default {
      name: 'RecipesForm',
      components: {
         VueEditor
      }, 
      data:function(){
        return {
          editData : {  
              id: 0,
              category_id : '',
              title: "",
              description: "",
              prepairation_time : '',
              cooking_time : '',
              serving_peoples : '',
              ingredients : [
                {
                  id : 0,
                  recipe_id : 0,
                  name : '',
                  is_deleted : 0
                }
              ],
              nutritions : [
                {
                  id : 0,
                  recipe_id : 0,
                  nutrition_name : '',
                  nutrition_value : '',
                  is_deleted : 0
                }
              ],
              photo_url: config.ASSET_BASE_URL+'default_img/default.jpg', 
              status: "1",
          },
          errors : {},
        }
      },
      methods : {
          editRecipes(id){
            let _this = this;
            this.$store.dispatch('editRecipes',{id : id})
            .then(function(result){ 
                _this.editData = result;                  
                if(result.ingredients.length == '0'){ 
                  _this.editData.ingredients = [{id : 0,recipe_id : 0,name : '',is_deleted : 0}];
                } 
                if(result.nutritions.length == '0'){ 
                  _this.editData.nutritions = [{id : 0,recipe_id : 0,nutrition_name : '',nutrition_value : '',is_deleted : 0}];
                }
            }).catch(function(error){
                console.log(error);
            }); 
          },
           getCategories(){
            let _this = this;
            this.$store.dispatch('categories');  
          },
          addIngredient(){
              let oldObj = this.editData.ingredients;
              oldObj.push({
                 id : 0,
                  recipe_id : 0,
                  name : '',
                  is_deleted : 0
              });   
              this.editData.ingredients = oldObj;
          },
          removeIngredient(index){ 
              let oldObj = this.editData.ingredients;  
              var newObj = [];
              var counts = oldObj.filter(function(ig) { return (ig.is_deleted!==1); }).length;  
              if(counts > 1){     
                  if(oldObj[index].id > 0){  
                    oldObj[index].is_deleted = 1;   
                    this.editData.ingredients = oldObj; 
                    this.$forceUpdate();
                  } else { 
                    var newObj =  oldObj.filter(function(ig,i) { return (i!==index); });  
                    this.editData.ingredients = newObj;  
                  }    
              } else{
                this.$toastr.e('Opps! you can not remove all the ingredient','Error!'); 
              }  
          },
           addNutrition(){
              let oldObj = this.editData.nutritions;
              oldObj.push({
                 id : 0,
                  recipe_id : 0,
                  nutrition_name : '',
                  nutrition_value : '',
                  is_deleted : 0
              });   
              this.editData.nutritions = oldObj;
          },
          removeNutrition(index){ 
              let oldObj = this.editData.nutritions;  
              var newObj = [];              
              var counts = oldObj.filter(function(ig) { return (ig.is_deleted!==1); }).length;  
              if(counts > 1){   
                  if(oldObj[index].id > 0){  
                    oldObj[index].is_deleted = 1;   
                    this.editData.nutritions = oldObj; 
                    this.$forceUpdate();
                  } else { 
                    var newObj =  oldObj.filter(function(ig,i) { return (i!==index); }); 
                    this.editData.nutritions = newObj;  
                  }    
              } else{
                this.$toastr.e('Opps! you can not remove all the nutritions','Error!'); 
              }  
          },
          submitForm(){
            var vueForm = new FormData( $('#vueForm')[0]);
            vueForm.append('description',this.editData.description);
            let _this = this;
            if( this.editData.id > 0){
               this.$store.dispatch('updateRecipes',{ id : this.editData.id,data : vueForm})
               .then(function(result){
                   if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!');
                    setTimeout(function(){ _this.$router.push('/recipes'); },500);
                  }else if( ( typeof(result.status) != 'undefined' ) && (result.status == false) ){ 
                    _this.$toastr.e('Opps! Unable to save form,please check error log','Error!');  
                  }else{
                    _this.$toastr.e('Opps! Something went wrong,please check log','Error!'); 
                  }  
                })
               .catch(function(error){
                 console.log(error);
               });
            } else {
              this.$store.dispatch('createRecipes',{ id : this.editData.id,data : vueForm})
              .then(function(result){
                  if( ( typeof(result.status) != 'undefined' ) && (result.status == true) ){ 
                    _this.$toastr.s('Data Saved Successfully','Success!');
                    setTimeout(function(){ _this.$router.push('/recipes'); },500);
                  }else if( ( typeof(result.status) != 'undefined' ) && (result.status == false) ){ 
                    _this.$toastr.e('Opps! Unable to save form,please check error log','Error!');  
                  }else{
                    _this.$toastr.e('Opps! Something went wrong,please check log','Error!'); 
                  } 
                })
               .catch(function(error){
                   _this.$toastr.e(error,'Errors!'); 
               });
            }
             
          }
      }, 
      created(){ 
          this.getCategories();
          if( typeof(this.$route.params.id)!='undefined' ){
              this.editRecipes(this.$route.params.id);    
          }
      },
      computed: mapState({ 
          categories : state => state.data.categories
      })

    }
</script> 
<style> 
  .additional-input-box {
        margin-bottom: 5px;
        padding: 15px;
        background-color: #eeeeee;
        display: flex;
        align-items: center;
   }
   .additional-input-box .form-control {
        background-color: #ffffff;
        border: none;
        border-radius: 4px;
        height: 40px;
        padding: 10px 15px;
    }
    .additional-input-box.icon-right i {
        margin-left: 10px;
        background-color: #ffffff;
        padding: 13px;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -ms-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }
    .additional-input-box.icon-right i:hover {
        background-color: #ff4a52;
        color: #ffffff;
    }
    .additional-input-box i {
        color: #989898;
        font-size: 20px;
        width: 35px;
    }  
    .add-more-btn{
        margin: 9px;
        float: right;
    }
    .hideContainer {
      display: none !important;
    }
</style>
