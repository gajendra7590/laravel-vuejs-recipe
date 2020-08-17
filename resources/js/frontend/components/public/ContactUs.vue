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
                </div>{{ (companyDetail.company_email)?companyDetail.company_email:'' }}
              </li>
              <li>
                <div class="item-icon">
                  <i class="fas fa-phone"></i>
                </div>{{ (companyDetail.company_contact)?companyDetail.company_contact:'' }}
              </li>
              <li>
                <div class="item-icon">
                  <i class="fas fa-fax"></i>
                </div>{{ (companyDetail.company_mobile)?companyDetail.company_mobile:'' }}
              </li>
            </ul>
          </div>
          <div class="section-heading heading-dark">
            <h3 class="item-heading-big">Send Us Message</h3>
          </div>
          <form id="contact-form" class="contact-form-box">
            <div class="row">
              <div class="col-md-6 form-group">
                <input
                  type="text"
                  placeholder="Name *"
                  class="form-control"
                  name="name"
                  data-error="Name field is required"
                  required
                />
                <div class="help-block with-errors"></div>
              </div>
              <div class="col-md-6 form-group">
                <input
                  type="email"
                  placeholder="E-mail *"
                  class="form-control"
                  name="email"
                  data-error="E-mail field is required"
                  required
                />
                <div class="help-block with-errors"></div>
              </div>
              <div class="col-12 form-group">
                <input
                  type="text"
                  placeholder="Subject *"
                  class="form-control"
                  name="subject"
                  data-error="Subject field is required"
                  required
                />
                <div class="help-block with-errors"></div>
              </div>
              <div class="col-12 form-group">
                <textarea
                  placeholder="Type your text"
                  class="textarea form-control"
                  name="message"
                  id="form-message"
                  rows="7"
                  cols="20"
                  data-error="Message field is required"
                  required
                ></textarea>
                <div class="help-block with-errors"></div>
              </div>
              <div class="col-12 form-group mb-0 mt-3">
                <button type="submit" class="item-btn">SUBMIT MESSAGE</button>
              </div>
              <div class="form-response"></div>
            </div>
          </form>
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
      companyDetail : []       
    };
  },
  methods:{
    getCompanyDetail(){
      this.$store.dispatch('companyDetail');
    }
  },
  created(){
     let _this = this;
     setTimeout(function(){
       _this.companyDetail = _this.$store.state.data.companyDetail
     },1000);
  } 
};
</script>

<style lang="scss" scoped>
</style>