<template>
  <div class="widget">
    <div class="widget-newsletter-subscribe">
      <h3>GET LATEST UPDATES</h3>
      <p>Newsletter Subscribe</p>
      <form class="newsletter-subscribe-form">
        <div class="form-group">
          <input
            type="text"
            placeholder="your e-mail address"
            class="form-control"
            name="email"
            data-error="E-mail field is required"
            required
          />
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group mb-none">
          <button type="submit" class="item-btn">SUBSCRIBE</button>
        </div>
      </form>
    </div>
  </div>
</template> 
<script>
export default {
  name: "GetLatestUpdates",
  data() {
    return {};
  },
  created() {},
};
</script>

<style>
</style>