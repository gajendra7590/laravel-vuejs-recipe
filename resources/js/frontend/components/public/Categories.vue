<template>
    <div id="categories">
        <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common" data-bg-image="/app/img/figure/inner-page-banner1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Recipe Categories</h1>
                            <ul>
                                <li>
                                    <router-link to="/">Home</router-link>
                                </li>
                                <li>Categories</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Category Area Start Here -->
        <section class="category-page-wrap padding-top-80 padding-bottom-50">
            <div class="container">
                <div class="row" v-if="categoriesList">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12" v-for="(cat,index) in categoriesList" :key="index">
                        <div class="category-box-layout1">
                            <figure class="item-figure">
                                <router-link :to="cat.slug+'/recipes'">
                                    <img :src="cat.photo_url" alt="Product">
                                </router-link>
                            </figure>
                            <div class="item-content">
                                <h3 class="item-title">
                                    <router-link :to="cat.slug+'/recipes'">
                                       {{ cat.name }}
                                    </router-link>
                                </h3>
                                <span class="sub-title"> {{ cat.recipes_count }} Recipes</span>
                            </div>
                        </div>
                    </div> 

                </div>
            </div> 
        </section>
        <!-- Category Area End Here -->
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        name : 'categories',
        data() {
            return {
                
            }
        },
        methods : {
            Categories() {
                this.$store.dispatch('getCategories'); 
            },
        },
        created(){
            this.Categories(); 
        },
        computed:mapState({ 
            categoriesList : state => state.data.categoriesList, 
        })
        
    }
</script>

<style>
    .category-box-layout1 img {
        min-height: 350px;
        max-height: 350px;
        min-width: 371px;
        max-width: 371px; 
    }
</style>