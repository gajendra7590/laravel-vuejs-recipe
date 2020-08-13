<template>
  <div class="dashboard_Content">
    <!-- Tap Panel -->
    <div id="home" class>
      <h3>Change Password</h3>
      <div class="dashboard_Panel">
        <form class="submit-recipe-form">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Old Password</label>
                <input
                  type="text"
                  placeholder="Your old password.."
                  class="form-control"
                  name="oldpassword"
                />
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>New Password</label>
                <input type="text" placeholder="New Password" class="form-control" name="name" />
                <div class="help-block with-errors"></div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Confirm New Password</label>
                <input
                  type="text"
                  placeholder="Confirm New Password"
                  class="form-control"
                  name="name"
                />
                <div class="help-block with-errors"></div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn-submit">Update New Password</button>
        </form>
      </div>
    </div>
    <!-- Tap Panel -->
  </div>
</template> 
<script>
export default {
  name: "changePassword",
  data() {
    return {};
  },
  methods: {},
  created() {},
};
</script>

<style>
</style>