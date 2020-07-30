<template>
    <div id="wrapper" class="wrapper"> 
        <!-- Slider Area Start Here --> 
        <section class="ranna-slider-area">
            <div class="container">
                <div v-if="homeSlider" class="rc-carousel nav-control-layout2" data-loop="true" data-items="30" data-margin="5"
                    data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="700" data-dots="false"
                    data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                    data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
                    data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
                    data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="1" data-r-large-nav="true"
                    data-r-large-dots="false" data-r-extra-large="1" data-r-extra-large-nav="true"
                    data-r-extra-large-dots="false"> 
                    <div v-for="(sld,index) in homeSlider.slider" :key="index" class="ranna-slider-content-layout1">
                        <figure class="item-figure"><a href="single-recipe1.html"><img src="/app/img/slider/slide1-3.jpg" alt="Product"></a></figure>
                        <div class="item-content">
                            <span class="sub-title">{{ sld.category.name }}</span>
                            <h2 class="item-title"><a href="single-recipe1.html">{{ sld.title }}</a></h2>
                            <ul class="item-rating">
                                <li class="star-fill"><i class="fas fa-star"></i></li>
                                <li class="star-fill"><i class="fas fa-star"></i></li>
                                <li class="star-fill"><i class="fas fa-star"></i></li>
                                <li class="star-fill"><i class="fas fa-star"></i></li>
                                <li class="star-empty"><i class="fas fa-star"></i></li>
                                <li><span>9<span> / 10</span></span> </li>
                            </ul>
                            <p v-html="sld.short_desc"></p>
                            <ul class="entry-meta">
                                <li><a href="javascript:void(0);"><i class="fas fa-clock"></i>{{ sld.cooking_time }}</a></li>
                                <li><a href="javascript:void(0);"><i class="fas fa-user"></i>by <span>{{ sld.user.display_name }}</span></a></li>
                                <li><a href="javascript:void(0);"><i class="fas fa-heart"></i><span>02</span> Likes</a></li>
                            </ul>
                        </div>
                    </div>                    
                </div>
            </div>
        </section>
        <!-- Slider Area End Here --> 
        <!-- Random Recipe Start Here -->
        <section class="padding-bottom-18">
            <div class="container">
                <div class="row" v-if="trending">                     
                    <div v-for="(rec,index) in homeSlider.padbottom18" :key="index" class="col-lg-4 d-block d-md-none d-lg-block col-sm-12">
                        <div class="product-box-layout1">
                            <figure class="item-figure"><a href="single-recipe1.html"><img src="/app/img/product/product3.jpg"
                                        alt="Product"></a></figure>
                            <div class="item-content">
                                <span class="sub-title">{{ rec.category.name }}</span>
                                <h3 class="item-title">
                                    <a href="single-recipe1.html">{{ rec.title }}</a>
                                </h3>
                                <ul class="item-rating">
                                    <li class="star-fill"><i class="fas fa-star"></i></li>
                                    <li class="star-fill"><i class="fas fa-star"></i></li>
                                    <li class="star-fill"><i class="fas fa-star"></i></li>
                                    <li class="star-fill"><i class="fas fa-star"></i></li>
                                    <li class="star-empty"><i class="fas fa-star"></i></li>
                                    <li><span>9<span> / 10</span></span> </li>
                                </ul>
                                <ul class="entry-meta">
                                    <li><a href="#"><i class="fas fa-clock"></i>{{ rec.cooking_time }}</a></li>
                                    <li><a href="#"><i class="fas fa-user"></i>by <span>{{ rec.user.display_name }}</span></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i><span>02</span> Likes</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Random Recipe End Here -->
        <!-- Trending Recipe Start Here -->
        <section class="padding-bottom-45">
            <div class="container">
                <div class="row gutters-60">
                    <div class="col-lg-8">
                        <div class="section-heading heading-dark">
                            <h2 class="item-heading">TRENDING RECIPES</h2>
                        </div>
                        <div class="row" v-if="trending"> 
                            <div v-for="(rec,index) in trending" :key="index" :class=" (index == 0)?'col-12':'col-md-6 col-sm-6'">
                                <div class="product-box-layout1">
                                    <figure class="item-figure"><a href="single-recipe1.html"><img src="/app/img/product/product4.jpg"
                                                alt="Product"></a></figure>
                                    <div class="item-content">
                                        <span class="sub-title">{{ rec.category.name }}</span>
                                        <h2 class="item-title">
                                            <a href="single-recipe1.html">{{ rec.title }}</a>
                                        </h2>
                                        <ul class="item-rating">
                                            <li class="star-fill"><i class="fas fa-star"></i></li>
                                            <li class="star-fill"><i class="fas fa-star"></i></li>
                                            <li class="star-fill"><i class="fas fa-star"></i></li>
                                            <li class="star-fill"><i class="fas fa-star"></i></li>
                                            <li class="star-empty"><i class="fas fa-star"></i></li>
                                            <li><span>9<span> / 10</span></span> </li>
                                        </ul>
                                        <p>{{ rec.short_desc }}</p>
                                        <ul class="entry-meta">
                                    <li><a href="#"><i class="fas fa-clock"></i>{{ rec.cooking_time }}</a></li>
                                    <li><a href="#"><i class="fas fa-user"></i>by <span>{{ rec.user.display_name }}</span></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i><span>02</span> Likes</a></li>
                                </ul>
                                    </div>
                                </div>
                            </div>                              
                        </div>
                        <div class="ranna-ad-box">
                            <a href="#"><img src="/app/img/figure/figure1.jpg" alt="ad"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">ABOUT ME</h3>
                            </div>
                            <div class="widget-about">
                                <figure class="author-figure"><img src="/app/img/figure/about.jpg" alt="about"></figure>
                                <figure class="author-signature"><img src="/app/img/figure/signature.png" alt="about"></figure>
                                <p>Fusce mauris auctor ollicituder teary iner hendrerit risusey aeenean rauctor pibus
                                    doloer.</p>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
                            </div>
                            <div class="widget-follow-us">
                                <ul>
                                    <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-twitter"></i>LIKE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i>LIKE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i>LIKE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-instagram"></i>LIKE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-youtube"></i>Subscribe</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">LATEST RECIPES</h3>
                            </div>
                            <div class="widget-latest">
                                <ul class="block-list" v-if="homeSiderbar">
                                    <li v-for="(lr ,index) in homeSiderbar.latest_recipes" :key="index" class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="/app/img/product/latest1.jpg" alt="Post"></a>
                                            <div class="count-number">1</div>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-ctg">{{ lr.category.name }}</div>
                                            <h4 class="item-title">
                                                <a href="#">{{ lr.title }}</a>
                                            </h4>
                                            <div class="item-post-by">
                                                <a href="single-blog.html">
                                                    <i class="fas fa-user"></i><span>by</span> {{ lr.user.display_name }}
                                               </a>
                                            </div>
                                        </div>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="/app/img/figure/figure2.jpg" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">CATEGORIES</h3>
                            </div>
                            <div class="widget-categories">
                                <ul v-if="homeSiderbar">
                                    <li v-for="(cat,index) in homeSiderbar.categories" :key="index">
                                        <a href="#">{{ cat.name }}
                                            <span>25</span>
                                        </a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-newsletter-subscribe">
                                <h3>GET LATEST UPDATES</h3>
                                <p>Newsletter Subscribe</p>
                                <form class="newsletter-subscribe-form">
                                    <div class="form-group">
                                        <input type="text" placeholder="your e-mail address" class="form-control" name="email"
                                            data-error="E-mail field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group mb-none">
                                        <button type="submit" class="item-btn">SUBSCRIBE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Trending Recipe End Here -->
        <!-- Editor’s Choice Start Here -->
        <section class="padding-bottom-45">
            <div class="container">
                <div class="section-heading heading-dark">
                    <h2 class="item-heading">EDITOR'S CHOICE</h2>
                </div>
                <div class="row" v-if="homeSection3InOne"> 
                    
                    <div v-for="(ec,index) in homeSection3InOne.editorsChoice" :key="index" class="col-lg-4 d-block d-md-none d-lg-block col-sm-12 col-12">
                        <div class="product-box-layout2">
                            <figure class="item-figure"><a href="single-recipe1.html"><img src="/app/img/product/product13.jpg"
                                        alt="Product"></a></figure>
                            <div class="item-content">
                                <span class="sub-title">JUICE</span>
                                <h3 class="item-title"><a href="single-recipe1.html">Blueberry Juice with Lemon Crema</a></h3>
                                <ul class="item-rating">
                                    <li class="star-fill"><i class="fas fa-star"></i></li>
                                    <li class="star-fill"><i class="fas fa-star"></i></li>
                                    <li class="star-fill"><i class="fas fa-star"></i></li>
                                    <li class="star-fill"><i class="fas fa-star"></i></li>
                                    <li class="star-empty"><i class="fas fa-star"></i></li>
                                    <li><span>9<span> / 10</span></span> </li>
                                </ul>
                                <ul class="entry-meta">
                                    <li><a href="#"><i class="fas fa-clock"></i>15 Mins</a></li>
                                    <li><a href="#"><i class="fas fa-user"></i>by <span>John Martin</span></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i><span>02</span> Likes</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Editor’s Choice End Here -->
        <!-- Popular Recipe Start Here -->
        <section class="padding-bottom-45">
            <div class="container">
                <div class="row gutters-60">
                    <div class="col-lg-8">
                        <div class="section-heading heading-dark">
                            <h2 class="item-heading">POPULAR RECIPES</h2>
                        </div>
                        <div class="row" v-if="homeSection3InOne">
                            <div v-for="(pr,index) in homeSection3InOne.popular" :key="index" class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="product-box-layout3">
                                    <figure class="item-figure"><a href="single-recipe1.html"><img src="/app/img/product/product14.jpg"
                                                alt="Product"></a></figure>
                                    <div class="item-content">
                                        <span class="sub-title">BREAKFAST</span>
                                        <h3 class="item-title"><a href="single-recipe1.html">Asian Chicken Noodles</a></h3>
                                        <ul class="item-rating">
                                            <li class="star-fill"><i class="fas fa-star"></i></li>
                                            <li class="star-fill"><i class="fas fa-star"></i></li>
                                            <li class="star-fill"><i class="fas fa-star"></i></li>
                                            <li class="star-fill"><i class="fas fa-star"></i></li>
                                            <li class="star-empty"><i class="fas fa-star"></i></li>
                                            <li><span>9<span> / 10</span></span> </li>
                                        </ul>
                                        <p>Pro sint falli definitiones noel ei verear intellegatpri civibus
                                            consequat efficiantue.Vestibulum ante ipsum primis in fau
                                            cibus orci luctus et ultrices posuere cubilia Curae; Nunc
                                            mattis turpis id aliquet.</p>
                                        <ul class="entry-meta">
                                            <li><a href="#"><i class="fas fa-clock"></i>15 Mins</a></li>
                                            <li><a href="#"><i class="fas fa-user"></i>by <span>John Martin</span></a></li>
                                            <li><a href="#"><i class="fas fa-heart"></i><span>02</span> Likes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">FEATURED ARTICLE</h3>
                            </div>
                            <div class="widget-featured-feed" v-if="homeSection3InOne">
                                <div class="rc-carousel nav-control-layout1" data-loop="true" data-items="3"
                                    data-margin="5" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="700"
                                    data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1"
                                    data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1"
                                    data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1"
                                    data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
                                    data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="1"
                                    data-r-large-nav="true" data-r-large-dots="false" data-r-extra-large="1"
                                    data-r-extra-large-nav="true" data-r-extra-large-dots="false">
                                    <div v-for="(fa,index) in homeSection3InOne.featured" :key="index" class="featured-box-layout1">
                                        <div class="item-img">
                                            <img src="/app/img/product/product17.jpg" alt="Brand" class="img-fluid">
                                        </div>
                                        <div class="item-content">
                                            <span class="ctg-name">BREAKFAST</span>
                                            <h4 class="item-title"><a href="single-recipe1.html">Baked Garlic Prawn</a></h4>
                                            <p>Definitiones noel ei verear intelle
                                                gatpri civibus consequat area
                                                refund efficiantue.</p>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">POPULAR TAGS</h3>
                            </div>
                            <div class="widget-tag">
                                <ul v-if="homeSiderbar">
                                    <li v-for="(tag,index) in homeSiderbar.popuplar_tags" :key="index">
                                        <a href="javascript:void(0);">{{ tag.name }}</a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popular Recipe End Here -->
        <!-- Instagram Start Here -->
        <section class="instagram-feed-wrap">
            <div class="instagram-feed-title"><a href="#"><i class="fab fa-instagram"></i>Follow On Instagram</a></div>
            <ul class="instagram-feed-figure" v-if="followOnInsta">
                <li v-for="(insta,index) in followOnInsta" :key="index">
                    <a href="single-recipe1.html"><img src="/app/img/social-figure/social-figure1.jpg" alt="Social"></a>
                </li> 
            </ul>
        </section>
        <!-- Instagram End Here --> 
    </div>
</template>

<script>
    import { mapState } from 'vuex';
    export default {
        name : "home",
        data() {
            return { 

             };
        },
        methods: {
            getHomeSlider() {
                this.$store.dispatch('getHomeSlider'); 
            },
            homeTrendingRecipe() {
                this.$store.dispatch('homeTrendingRecipe'); 
            },
            homeSection3In1() {
                this.$store.dispatch('homeSection3In1'); 
            },
            homeSidebarSection3In1() {
                this.$store.dispatch('homeSidebarSection3In1'); 
            },
            followOnInstagram() {
                this.$store.dispatch('followOnInstagram'); 
            }               
        },
        created(){
            this.getHomeSlider();
            this.homeTrendingRecipe();
            this.homeSection3In1();
            this.homeSidebarSection3In1();
            this.followOnInstagram();
        },
        computed:mapState({ 
            homeSlider : state => state.data.getHomeSlider,
            trending : state => state.data.homeTrendingRecipe,
            homeSection3InOne : state => state.data.homeSection3In1,
            homeSiderbar : state => state.data.homeSidebarSection3In1,
            followOnInsta : state => state.data.followOnInstagram,
        })
    }
</script>

<style lang="scss" scoped>

</style>