<template>
   <div>
        <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common" 
          data-bg-image="/app/img/figure/inner-page-banner1.jpg">
         </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Submit Recipe Area Start Here -->
        <section class="submit-recipe-page-wrap padding-top-74 padding-bottom-50">
            <div class="container">
                <div class="row gutters-60"> 
                    <div class="col-lg-2 col-sm-12 col-xs-12"> 
                         <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-10 col-sm-12 col-xs-12"> 
                        <div class="section-heading heading-dark">
                                <h2 class="item-heading">USER PROFILE</h2>
                            </div>
                        <form class="submit-recipe-form">
                            <div class="row"> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Recipe Title</label>
                                    <input type="text" placeholder="Recipe Name" class="form-control" name="name"
                                        data-error="Subject field is required" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Recipe Title</label>
                                <input type="text" placeholder="Recipe Name" class="form-control" name="name"
                                    data-error="Subject field is required" required>
                                <div class="help-block with-errors"></div>
                            </div> 
                            </div>
                            </div> 
                            <button type="submit" class="btn-submit">Update Profile</button>
                        </form>
                    </div> 
                </div>
            </div>
        </section>
        <!-- Submit Recipe Area End Here -->
   </div>
</template> 
<script>
export default {
    name : 'userProfile',
    data(){
        return {}
    },
    methods:{

    },
    created(){} 
}
</script>

<style>

</style>