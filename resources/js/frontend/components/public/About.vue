<template>
    <div id="aboutcomponent">
        <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common" data-bg-image="">             
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Recipe With Sidebar Area Start Here -->
        <section class="all-recipes-page-wrap padding-top-80 padding-bottom-50">
            <div class="container">
                <div class="row gutters-60">
                    <div class="col-lg-8">
                        <div class="about-box">
                            <div class="about-figure">
                                <img v-lazy="companyDetail.photo_url" alt="About" width="770" height="380">
                            </div>
                            <h2 class="about-title title-bar bar-center">{{ companyDetail.company_name }}</h2>
                            <p class="item-description">{{ companyDetail.about }}</p>
                            <div class="section-heading heading-dark">
                                <h2 class="item-heading">QUICK CONTACT ME</h2>
                            </div>
                               <ValidationObserver v-slot="{ handleSubmit }" ref="observer"> 
                                <form id="contact-form" @submit.prevent="handleSubmit(contactSubmit)" class="contact-form-box">
                                    <div class="row">
                                    <div class="col-md-6 form-group">
                                        <ValidationProvider name="name" rules="required" v-slot="{ errors }"> 
                                        <input
                                            name="name"
                                            v-model="contactData.name"
                                            type="text"
                                            placeholder="Name *"
                                            class="form-control" 
                                        />
                                        <div class="help-block text-danger">{{ errors[0] }}</div>
                                        </ValidationProvider> 
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <ValidationProvider name="email" rules="required|email" v-slot="{ errors }"> 
                                        <input
                                            name="email"
                                            v-model="contactData.email"
                                            type="text"
                                            placeholder="Email *"
                                            class="form-control" 
                                        />
                                        <div class="help-block text-danger">{{ errors[0] }}</div>
                                        </ValidationProvider> 
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <ValidationProvider name="subject" rules="required" v-slot="{ errors }"> 
                                        <input
                                            name="subject"
                                            v-model="contactData.subject"
                                            type="text"
                                            placeholder="Subject *"
                                            class="form-control" 
                                        />
                                        <div class="help-block text-danger">{{ errors[0] }}</div>
                                        </ValidationProvider> 
                                    </div>
                                    <div class="col-12 form-group">
                                        <ValidationProvider name="message" rules="required" v-slot="{ errors }">
                                        <textarea 
                                        name="message" 
                                        v-model="contactData.message"
                                        rows="7"
                                        cols="20" 
                                        placeholder="Type your text"
                                        class="textarea form-control"
                                        ></textarea>
                                        <div class="help-block text-danger">{{ errors[0] }}</div>
                                        </ValidationProvider>  
                                    </div>
                                    <div class="col-12 form-group mb-0 mt-3">
                                        <button type="submit" class="item-btn">SUBMIT MESSAGE</button>
                                    </div>
                                    <div class="form-response"></div>
                                    </div>
                                </form>
                                </ValidationObserver>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <SubscribeAndFollow />
                        <LatestRecipes />
                        <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="/app/img/figure/figure4.jpg" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Recipe With Sidebar Area End Here -->
    </div>
</template>

<script>
import { mapState } from 'vuex';
//Import Component 
import SubscribeAndFollow from './sidebar/SubscribeAndFollow';
import LatestRecipes from './sidebar/LatestRecipes'; 
export default {
    name : 'about',
    components: {  
        SubscribeAndFollow,
        LatestRecipes 
    },
    data() {
        return {
             contactData : {name : '',email : '',subject : '',message : ''}           
        }
    },
    methods:{
        contactSubmit(){
            let _this = this;
            _this.$store.dispatch('saveContactUsEnquiry',_this.contactData)
            .then(function(result){
            if( (typeof(result)!='undefined') && (result.status == true) ){
                _this.$toastr.s('Your contact enquiry submitted successfully','SUCCESS!');
                _this.contactData  = {name : '',email : '',subject : '',message : ''};
                _this.$nextTick(() => _this.$refs.observer.reset());

            } else {
                _this.$toastr.e('Getting some error','ERROR!');
            } 
            }).catch(function(error){
            _this.$toastr.e('Getting some error','ERROR!');
            }); 
        } 
    },
    computed: mapState({
        companyDetail: (state) => state.data.companyDetail 
    }), 
}
</script>

<style lang="scss" scoped>

</style>