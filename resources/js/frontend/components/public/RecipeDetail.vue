<template>
  <div id="recipedetail">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image=""
    > 
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Single Recipe With Sidebar Area Start Here -->
    <section class="single-recipe-wrap-layout1 padding-top-74 padding-bottom-50">
      <div class="container">
        <div class="row gutters-60">
          <div class="col-lg-8">
            <div class="single-recipe-layout1">
              <div class="ctg-name">{{ (recipeDetail.category)?recipeDetail.category.name:'' }}</div>
              <h2 class="item-title">{{ (recipeDetail.title)?recipeDetail.title:'' }}</h2>
              <div class="row mb-4">
                <div class="col-xl-9 col-12">
                  <ul class="entry-meta">
                    <li class="single-meta">
                      <a href="javascript:void(0);">
                        <i class="far fa-calendar-alt"></i>{{ recipeDetail.created_at | moment('MMM, DD YYYY') }}
                      </a>
                    </li>
                    <li class="single-meta">
                      <a href="#">
                        <i class="fas fa-user"></i>by
                        <span>
                         {{ (recipeDetail.user)?recipeDetail.user.first_name:'' }}
                        </span>
                      </a>
                    </li>
                    <li class="single-meta">
                      <ul class="item-rating">
                        <li class="star-fill">
                          <i class="fas fa-star"></i>
                        </li>
                        <li class="star-fill">
                          <i class="fas fa-star"></i>
                        </li>
                        <li class="star-fill">
                          <i class="fas fa-star"></i>
                        </li>
                        <li class="star-fill">
                          <i class="fas fa-star"></i>
                        </li>
                        <li class="star-empty">
                          <i class="fas fa-star"></i>
                        </li>
                        <li>
                          <span>
                            9
                            <span>/ 10</span>
                          </span>
                        </li>
                      </ul>
                    </li>
                    <li class="single-meta">
                      <a href="#">
                        <i class="fas fa-heart"></i>
                        <span>02</span>
                        Likes
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-xl-3 col-12">
                  <ul class="action-item">
                    <li>
                      <button>
                        <i class="fas fa-print"></i>
                      </button>
                    </li>
                    <li>
                      <button>
                        <i class="fas fa-expand-arrows-alt"></i>
                      </button>
                    </li>
                    <li class="action-share-hover">
                      <button>
                        <i class="fas fa-share-alt"></i>
                      </button>
                      <div class="action-share-wrap">
                        <a href="#" title="facebook">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" title="twitter">
                          <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" title="linkedin">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" title="pinterest">
                          <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#" title="skype">
                          <i class="fab fa-skype"></i>
                        </a>
                        <a href="#" title="rss">
                          <i class="fas fa-rss"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="item-figure">
                <img v-lazy="recipeDetail.photo_url" style="min-width:760px;" alt="Product" />
              </div>
              <div class="item-feature">
                <ul>
                  <li>
                    <div class="feature-wrap">
                      <div class="media">
                        <div class="feature-icon">
                          <i class="far fa-clock"></i>
                        </div>
                        <div class="media-body space-sm">
                          <div class="feature-title">PREP TIME</div>
                          <div class="feature-sub-title">{{ recipeDetail.prepairation_time }}</div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="feature-wrap">
                      <div class="media">
                        <div class="feature-icon">
                          <i class="fas fa-utensils"></i>
                        </div>
                        <div class="media-body space-sm">
                          <div class="feature-title">COOK TIME</div>
                          <div class="feature-sub-title">{{ recipeDetail.cooking_time }}</div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="feature-wrap">
                      <div class="media">
                        <div class="feature-icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <div class="media-body space-sm">
                          <div class="feature-title">SERVING</div>
                          <div class="feature-sub-title">{{ recipeDetail.serving_peoples }} People</div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="feature-wrap">
                      <div class="media">
                        <div class="feature-icon">
                          <i class="far fa-eye"></i>
                        </div>
                        <div class="media-body space-sm">
                          <div class="feature-title">VIEWS</div>
                          <div class="feature-sub-title">3,450</div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <p class="item-description">
                More off this less hello salamander lied porpoise much over
                tightly circa horse taped so
                innocuously side crudey mightily rigorous plot life. New homes in particular are
                subject.All recipes created with FoodiePress have suport for Micoformats and Google
                Recipe View. Schema.org is a collaboration byo improve the web by creatinegaera
                structured data markup.More off this less hello salamander lied porpoise much over
                tightly circa horse tapedey innocuously side crudey mightily rigorous plot life.
              </p>
              <p class="item-description">
                Salamander lied porpoise much over tightly circa horse taped so
                innocuously side crudey
                mightily rigorous plot life. New homes in particular are subject.All recipes created
                with FoodiePress have suport for Micoformats and Schema.org is a collaboration byo
                improve.s convallis mi et tellus vehicula convallis. Etiam odio eros, viverra id dui
                inrutrum cursus ex. Curabitur et consequatenim.
              </p>
              <div class="making-elements-wrap">
                <div class="row">
                  <div class="col-xl-6 col-12">
                    <div class="ingridients-wrap">
                      <h3 class="item-title">
                        <i class="fas fa-list-ul"></i>Ingridients
                      </h3>
                      <div class="adjust-servings">
                        <div class="servings-title">Adjust Servings</div>
                        <form class="servings-quantity">
                          <div class="input-group quantity-holder" id="quantity-holder">
                            <input
                              type="text"
                              name="quantity"
                              class="form-control quantity-input"
                              value="1"
                              placeholder="1"
                            />
                            <div class="btn-quantity-select">
                              <button class="quantity-plus" type="button">
                                <i class="fas fa-plus"></i>
                              </button>
                              <button class="quantity-minus" type="button">
                                <i class="fas fa-minus"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="checkbox checkbox-primary" v-for="(ingr,index) in recipeDetail.ingredients" :key="index">
                        <input id="checkbox1" type="checkbox" readonly />
                        <label for="checkbox1">{{ ingr.name }}</label>
                      </div> 
                    </div>
                  </div>
                  <div class="col-xl-6 col-12">
                    <div class="nutrition-wrap">
                      <h3 class="item-title">
                        <i class="fas fa-info"></i>Nutrition
                      </h3>
                      <ul class="nutrition-list" v-if="recipeDetail">
                        <li v-for="(nutr,index) in recipeDetail.nutritions" :key="index">
                          <div class="nutrition-name">{{ nutr.nutrition_name }}</div>
                          <div class="nutrition-value">{{ nutr.nutrition_value }}</div>
                        </li> 
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="related-recipe">
                <h4 class="heading-title">FROM OUR SHOP</h4>
                <div
                  class="rc-carousel nav-control-layout3"
                  data-loop="true"
                  data-items="5"
                  data-margin="40"
                  data-autoplay="true"
                  data-autoplay-timeout="5000"
                  data-smart-speed="700"
                  data-dots="false"
                  data-nav="true"
                  data-nav-speed="false"
                  data-r-x-small="1"
                  data-r-x-small-nav="true"
                  data-r-x-small-dots="false"
                  data-r-x-medium="1"
                  data-r-x-medium-nav="true"
                  data-r-x-medium-dots="false"
                  data-r-small="2"
                  data-r-small-nav="true"
                  data-r-small-dots="false"
                  data-r-medium="1"
                  data-r-medium-nav="true"
                  data-r-medium-dots="false"
                  data-r-large="2"
                  data-r-large-nav="true"
                  data-r-large-dots="false"
                  data-r-extra-large="2"
                  data-r-extra-large-nav="true"
                  data-r-extra-large-dots="false"
                >
                  <div class="shop-box-layout1">
                    <div class="mask-item bg--light">
                      <div class="item-figure">
                        <img src="/app/img/product/shop-figure1.png" alt="Product" />
                      </div>
                      <ul class="action-items">
                        <li>
                          <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-exchange-alt"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-heart"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="item-content">
                      <h3 class="item-title">
                        <a href="single-shop.html">Kitchen Utensils</a>
                      </h3>
                      <div class="item-price">
                        <span class="currency">$</span>28.00
                      </div>
                    </div>
                  </div>
                  <div class="shop-box-layout1">
                    <div class="mask-item bg--light">
                      <div class="item-figure">
                        <img src="/app/img/product/shop-figure2.png" alt="Product" />
                      </div>
                      <ul class="action-items">
                        <li>
                          <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-exchange-alt"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-heart"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="item-content">
                      <h3 class="item-title">
                        <a href="single-shop.html">Kitchen Utensils</a>
                      </h3>
                      <div class="item-price">
                        <span class="currency">$</span>28.00
                      </div>
                    </div>
                  </div>
                  <div class="shop-box-layout1">
                    <div class="mask-item bg--light">
                      <div class="item-figure">
                        <img src="/app/img/product/shop-figure3.png" alt="Product" />
                      </div>
                      <ul class="action-items">
                        <li>
                          <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-exchange-alt"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-heart"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="item-content">
                      <h3 class="item-title">
                        <a href="single-shop.html">Kitchen Utensils</a>
                      </h3>
                      <div class="item-price">
                        <span class="currency">$</span>28.00
                      </div>
                    </div>
                  </div>
                  <div class="shop-box-layout1">
                    <div class="mask-item bg--light">
                      <div class="item-figure">
                        <img src="/app/img/product/shop-figure4.png" alt="Product" />
                      </div>
                      <ul class="action-items">
                        <li>
                          <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-exchange-alt"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-heart"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="item-content">
                      <h3 class="item-title">
                        <a href="single-shop.html">Kitchen Utensils</a>
                      </h3>
                      <div class="item-price">
                        <span class="currency">$</span>28.00
                      </div>
                    </div>
                  </div>
                  <div class="shop-box-layout1">
                    <div class="mask-item bg--light">
                      <div class="item-figure">
                        <img src="/app/img/product/shop-figure5.png" alt="Product" />
                      </div>
                      <ul class="action-items">
                        <li>
                          <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-exchange-alt"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-heart"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="item-content">
                      <h3 class="item-title">
                        <a href="single-shop.html">Kitchen Utensils</a>
                      </h3>
                      <div class="item-price">
                        <span class="currency">$</span>28.00
                      </div>
                    </div>
                  </div>
                  <div class="shop-box-layout1">
                    <div class="mask-item bg--light">
                      <div class="item-figure">
                        <img src="/app/img/product/shop-figure6.png" alt="Product" />
                      </div>
                      <ul class="action-items">
                        <li>
                          <a href="#">
                            <i class="fas fa-shopping-cart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-exchange-alt"></i>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="fas fa-heart"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="item-content">
                      <h3 class="item-title">
                        <a href="single-shop.html">Kitchen Utensils</a>
                      </h3>
                      <div class="item-price">
                        <span class="currency">$</span>28.00
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="direction-wrap-layout1">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">DIRECTIONS</h2>
                </div>
                <p class="section-paragraph">
                  Salamander lied porpoise much over tightly circa horse
                  taped so innocuously side crudey mightily rigorous plot life. New homes in
                  particular are subject. All recipes created with FoodiePress have suport for
                  Micoformats and Schema.org is a collaboration byo improve convallis.
                </p>
                <div class="direction-box-layout1">
                  <div class="item-figure">
                    <img src="/app/img/figure/direction1.jpg" alt="DIRECTIONS" />
                  </div>
                  <div class="item-content">
                    <div class="serial-number">01 Step</div>
                    <p>
                      Recipe View
                      <span class="item-time">
                        <i class="far fa-clock"></i>5 Minutes
                      </span> chemaorg is a
                      collaboration improve
                      the web by creat inegaera structured markupinn ocuously
                      side crudey mightily rigorous plot life.
                    </p>
                  </div>
                </div>
                <div class="direction-box-layout1">
                  <div class="item-figure">
                    <img src="/app/img/figure/direction2.jpg" alt="DIRECTIONS" />
                  </div>
                  <div class="item-content">
                    <div class="serial-number">02 Step</div>
                    <p>
                      Recipe View
                      <span class="item-time">
                        <i class="far fa-clock"></i>5 Minutes
                      </span> chemaorg is a
                      collaboration improve
                      the web by creat inegaera structured markupinn ocuously
                      side crudey mightily rigorous plot life.
                    </p>
                  </div>
                </div>
                <div class="direction-box-layout1">
                  <div class="item-figure">
                    <img src="/app/img/figure/direction3.jpg" alt="DIRECTIONS" />
                  </div>
                  <div class="item-content">
                    <div class="serial-number">03 Step</div>
                    <p>
                      Recipe View
                      <span class="item-time">
                        <i class="far fa-clock"></i>5 Minutes
                      </span> chemaorg is a
                      collaboration improve
                      the web by creat inegaera structured markupinn ocuously
                      side crudey mightily rigorous plot life.
                    </p>
                  </div>
                </div>
                <div class="direction-box-layout1">
                  <div class="item-figure">
                    <img src="/app/img/figure/direction4.jpg" alt="DIRECTIONS" />
                  </div>
                  <div class="item-content">
                    <div class="serial-number">04 Step</div>
                    <p>
                      Recipe View
                      <span class="item-time">
                        <i class="far fa-clock"></i>5 Minutes
                      </span> chemaorg is a
                      collaboration improve
                      the web by creat inegaera structured markupinn ocuously
                      side crudey mightily rigorous plot life.
                    </p>
                  </div>
                </div>
              </div>
              <div class="tag-share">
                <ul>
                  <li>
                    <ul class="inner-tag">
                      <li>
                        <a href="#">Burger</a>
                      </li>
                      <li>
                        <a href="#">Dinner</a>
                      </li>
                      <li>
                        <a href="#">Pizza</a>
                      </li>
                      <li>
                        <a href="#">Salad</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <ul class="inner-share">
                      <li>
                        <a href="#">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-google-plus-g"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-pinterest"></i>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="recipe-author">
                <div class="media media-none--xs">
                  <img
                    src="/app/img/blog/author9.jpg"
                    alt="Blog Author"
                    class="rounded-circle media-img-auto"
                  />
                  <div class="media-body">
                    <h4 class="author-title">Michel Jack</h4>
                    <h5 class="author-sub-title">Written by</h5>
                    <p>
                      I love cooking and blogging. Using a fork, break salmon. Halve reserved
                      potatoes and eggs crosswise. The of something of did require met of
                      help have someone.
                    </p>
                    <ul class="author-social">
                      <li>
                        <a href="#">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-pinterest-p"></i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fab fa-skype"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="also-like-wrap">
                <h4 class="also-like-title">YOU MAY ALSO LIKE</h4>
                <div class="row">
                  <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="product-box-layout2">
                      <figure class="item-figure">
                        <img src="/app/img/product/product11.jpg" alt="Product" />
                      </figure>
                      <div class="item-content">
                        <span class="sub-title">BREAKFAST</span>
                        <h3 class="item-title">
                          <a href="single-recipe1.html">
                            Tomatoes Stuffed with Foie and
                            Chanterelles
                          </a>
                        </h3>
                        <ul class="entry-meta">
                          <li>
                            <a href="#">
                              <i class="fas fa-user"></i>by
                              <span>John Martin</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="product-box-layout2">
                      <figure class="item-figure">
                        <img src="/app/img/product/product12.jpg" alt="Product" />
                      </figure>
                      <div class="item-content">
                        <span class="sub-title">DESERT</span>
                        <h3 class="item-title">
                          <a href="single-recipe1.html">
                            Pumpkin Cheesecake With
                            GingersnapCrust
                          </a>
                        </h3>
                        <ul class="entry-meta">
                          <li>
                            <a href="#">
                              <i class="fas fa-user"></i>by
                              <span>John Martin</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 d-block d-md-none d-xl-block col-12">
                    <div class="product-box-layout2">
                      <figure class="item-figure">
                        <img src="/app/img/product/product13.jpg" alt="Product" />
                      </figure>
                      <div class="item-content">
                        <span class="sub-title">JUICE</span>
                        <h3 class="item-title">
                          <a href="single-recipe1.html">Blueberry Juice with Lemon Crema</a>
                        </h3>
                        <ul class="entry-meta">
                          <li>
                            <a href="#">
                              <i class="fas fa-user"></i>by
                              <span>John Martin</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="recipe-reviews">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">RECIPE REVIEWS</h2>
                </div>
                <div class="avarage-rating-wrap">
                  <div class="avarage-rating">
                    Avarage Rating:
                    <span class="rating-icon-wrap">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </span>
                    <span class="rating-number">(5)</span>
                  </div>
                  <div class="total-reviews">
                    Total Reviews:
                    <span class="review-number">(02)</span>
                  </div>
                </div>
                <ul>
                  <li class="reviews-single-item">
                    <div class="media media-none--xs">
                      <img src="/app/img/blog/comment1.jpg" alt="Comment" class="media-img-auto" />
                      <div class="media-body">
                        <h4 class="comment-title">Liza Zaman</h4>
                        <span class="post-date">September 27, 2018</span>
                        <p>
                          Absolutely great recipe. I cooked it for my kids and they loved it, even
                          asked for more, can you believe it?
                        </p>
                        <ul class="item-rating">
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-empty">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item">
                            <span>
                              9
                              <span>/ 10</span>
                            </span>
                          </li>
                        </ul>
                        <a href="#" class="item-btn">
                          REPLY
                          <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                      </div>
                    </div>
                  </li>
                  <li class="reviews-single-item">
                    <div class="media media-none--xs">
                      <img src="/app/img/blog/comment2.jpg" alt="Comment" class="media-img-auto" />
                      <div class="media-body">
                        <h4 class="comment-title">John Martin</h4>
                        <span class="post-date">September 12, 2018</span>
                        <p>
                          Absolutely great recipe. I cooked it for my kids and they loved it, even
                          asked for more, can you believe it?
                        </p>
                        <ul class="item-rating">
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-fill">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item star-empty">
                            <i class="fas fa-star"></i>
                          </li>
                          <li class="single-item">
                            <span>
                              7
                              <span>/ 10</span>
                            </span>
                          </li>
                        </ul>
                        <a href="#" class="item-btn">
                          REPLY
                          <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="leave-review">
                <div class="section-heading heading-dark">
                  <h2 class="item-heading">LEAVE A REVIEW</h2>
                </div>
                <div class="rate-wrapper">
                  <div class="rate-label">Rating</div>
                  <div class="rate">
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="rate-item">
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
                <form class="leave-form-box">
                  <div class="row">
                    <div class="col-12 form-group">
                      <label>Comment :</label>
                      <textarea
                        placeholder
                        class="textarea form-control"
                        name="message"
                        rows="7"
                        cols="20"
                        data-error="Message field is required"
                        required
                      ></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-4 form-group">
                      <label>Name :</label>
                      <input
                        type="text"
                        placeholder
                        class="form-control"
                        name="name"
                        data-error="Name field is required"
                        required
                      />
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-4 form-group">
                      <label>E-mail :</label>
                      <input
                        type="email"
                        placeholder
                        class="form-control"
                        name="email"
                        data-error="E-mail field is required"
                        required
                      />
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-4 form-group">
                      <label>Website :</label>
                      <input
                        type="email"
                        placeholder
                        class="form-control"
                        name="email"
                        data-error="E-mail field is required"
                        required
                      />
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-12 form-group mb-0">
                      <button type="submit" class="item-btn">POST REVIEW</button>
                    </div>
                  </div>
                  <div class="form-response"></div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
            <LatestRecipes />
            <SubscribeAndFollow />  
            <FeaturedRecipe />  
            <GetLatestUpdates /> 
            <Categories /> 
            <PopularTags />   
          </div>
        </div>
      </div>
    </section>
  </div>
</template> 
<script>
import { mapState } from "vuex";
//custom Components
import LatestRecipes from './sidebar/LatestRecipes';
import SubscribeAndFollow from './sidebar/SubscribeAndFollow';
import FeaturedRecipe from './sidebar/FeaturedRecipe';
import Categories from './sidebar/Categories';
import PopularTags from './sidebar/PopularTags';
import GetLatestUpdates from './blog_sidebar/GetLatestUpdates';
export default {
  name: "recipedetail",
  components: { 
    LatestRecipes, 
    SubscribeAndFollow,
    FeaturedRecipe,
    Categories,
    PopularTags,
    GetLatestUpdates 
  },
  data() {
    return {
        recipeDetail : []
    };
  },
  methods: {
    getRecipeDetail(slug) {
      let _this = this;
      _this.$store
        .dispatch("recipeDetail", { slug: slug })
        .then(function (result) {
          if (result.id != undefined) {
            _this.recipeDetail = result;
          } else {
            _this.$toastr.e("Opps! Invalid Request");
            _this.$router.push("/recipes");
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    }, 
  },
  created() {
    let slug = this.$route.params.slug;
    if (slug != undefined) {
      this.getRecipeDetail(slug); 
    }
  },
  watch: {
    '$route.params.slug'(newId, oldId) {
        let slug = this.$route.params.slug;
        if (slug != undefined) {
          this.getRecipeDetail(slug); 
        }
     }
  } 
};
</script> 
<style lang="scss" scoped>
</style>