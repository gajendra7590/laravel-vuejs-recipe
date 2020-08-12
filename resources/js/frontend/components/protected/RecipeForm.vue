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
                    <div class="col-lg-12">
                        <div class="section-heading heading-dark">
                                <h2 class="item-heading">CREATE NEW RECIPE</h2>
                            </div>
                        <form class="submit-recipe-form">
                            <div class="form-group">
                                <label>Recipe Title</label>
                                <input type="text" placeholder="Recipe Name" class="form-control" name="name"
                                    data-error="Subject field is required" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label>Choose Category</label>
                                <select class="select2" name="filter-by">
                                    <option value="0">Breakfast</option>
                                    <option value="1">Newest</option>
                                    <option value="2">Top Sell</option>
                                    <option value="3">Top Rated</option>
                                    <option value="4">Price High</option>
                                    <option value="5">Low Price</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea placeholder="Type your text" class="textarea form-control" name="message" id="form-message"
                                    rows="7" cols="20" data-error="Message field is required" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="additional-input-wrap">
                                <label>Upload your photos</label>
                                <div class="form-group">
                                    <ul class="upload-img">
                                        <li><img src="/app/img/figure/upload-banner1.jpg" alt="Upload Image"></li>
                                        <li><img src="/app/img/figure/upload-banner1.jpg" alt="Upload Image"></li>
                                        <li><img src="/app/img/figure/upload-banner1.jpg" alt="Upload Image"></li>
                                        <li><img src="/app/img/figure/upload-banner1.jpg" alt="Upload Image"></li>
                                        <li><img src="/app/img/figure/upload-banner1.jpg" alt="Upload Image"></li>
                                    </ul>
                                    <button type="submit" class="btn-upload"><i class="fas fa-cloud-upload-alt"></i>UPLOAD</button>
                                </div>
                            </div>
                            <div class="additional-input-wrap">
                                <label>Additional Informations:</label>
                                <div class="row gutters-5">
                                    <div class="col-lg-6">
                                        <div class="form-group additional-input-box icon-left">
                                            <i class="far fa-clock"></i>
                                            <input type="text" placeholder="Preparation Time: 00.00.00" class="form-control"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group additional-input-box icon-left">
                                            <i class="fas fa-utensils"></i>
                                            <input type="text" placeholder="Cooking Time: 00.00.00" class="form-control"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group additional-input-box icon-left">
                                            <i class="fas fa-users"></i>
                                            <input type="text" placeholder="Serving People: 00" class="form-control"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group additional-input-box icon-left">
                                            <i class="fas fa-eye"></i>
                                            <input type="text" placeholder="People Views: 00" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="additional-input-wrap">
                                <label>Ingredients:</label>
                                <div class="row no-gutters">
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-left">
                                            <i class="fas fa-arrows-alt"></i>
                                            <input type="text" placeholder="Preparation Time: 00.00.00" class="form-control"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-right">
                                            <input type="text" placeholder="Cooking Time: 00.00.00" class="form-control"
                                                name="name">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-left">
                                            <i class="fas fa-arrows-alt"></i>
                                            <input type="text" placeholder="Serving People: 00" class="form-control"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-right">
                                            <input type="text" placeholder="People Views: 00" class="form-control" name="name">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-upload"><i class="flaticon-add-plus-button"></i>ADD NEW
                                    INGREDIENT</button>
                            </div>
                            <div class="additional-input-wrap">
                                <label>Nutrition Facts:</label>
                                <div class="row gutters-5">
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-right">
                                            <input type="text" placeholder="People Views: 00" class="form-control" name="name">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-right">
                                            <input type="text" placeholder="People Views: 00" class="form-control" name="name">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-right">
                                            <input type="text" placeholder="People Views: 00" class="form-control" name="name">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-right">
                                            <input type="text" placeholder="People Views: 00" class="form-control" name="name">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-right">
                                            <input type="text" placeholder="People Views: 00" class="form-control" name="name">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group additional-input-box icon-right">
                                            <input type="text" placeholder="People Views: 00" class="form-control" name="name">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-upload"><i class="flaticon-add-plus-button"></i>ADD NEW
                                    INGREDIENT</button>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <div class="summernote"></div>
                            </div>
                            <button type="submit" class="btn-submit">SUBMIT RECIPE</button>
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
    name : 'recipeForm',
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