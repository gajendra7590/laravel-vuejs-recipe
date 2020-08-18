<template>
  <div id="contactus">
    <!-- Inne Page Banner Area Start Here -->
    <section
      class="inner-page-banner bg-common"
      data-bg-image=""
    > 
    </section>
    <!-- Inne Page Banner Area End Here -->
    <!-- Contact Page Area Start Here -->
    <section class="contact-page-wrap">
      <div class="contact-box-left">
        <div class="container">
          <div class="section-heading heading-dark">
            <h3 class="item-heading-big">Our Address</h3>
          </div> 
          <p>
            {{ (companyDetail.about)?companyDetail.about:'' }}
          </p>
          <div class="contact-address">
            <ul>
              <li>
                <div class="item-icon">
                  <i class="fas fa-map"></i>
                </div>
                {{ 
                   (companyDetail.address_line_one)
                    ?( companyDetail.address_line_one 
                      +' '+companyDetail.address_line_two 
                      +' '+companyDetail.city
                      +' '+companyDetail.state
                      +' '+companyDetail.country
                      +' '+companyDetail.zip
                      )
                    :''  
                 }}
              </li>
              <li>
                <div class="item-icon">
                  <i class="far fa-envelope"></i>
                </div>{{ (companyDetail.company_email)?companyDetail.company_email:'--' }}
              </li>
              <li>
                <div class="item-icon">
                  <i class="fas fa-phone"></i>
                </div>{{ (companyDetail.company_contact)?companyDetail.company_contact:'--' }}
              </li>
              <li>
                <div class="item-icon">
                  <i class="fas fa-fax"></i>
                </div>{{ (companyDetail.company_mobile)?companyDetail.company_mobile:'--' }}
              </li>
            </ul>
          </div>
          <div class="section-heading heading-dark">
            <h3 class="item-heading-big">Send Us Message</h3>
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
      <div class="contact-box-right">
        <div class="google-map-wrap-layout1">
          <iframe
            src="https://maps.google.com/maps?q=-37.81618%2C%20144.95692&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
          ></iframe>
        </div>
      </div>
    </section>
    <!-- Contact Page Area End Here -->
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
  name: "contactus",
  data() {
    return {
      contactData : {name : '',email : '',subject : '',message : ''}
      //companyDetail : null       
    };
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

};
</script>

<style lang="scss" scoped>
</style>