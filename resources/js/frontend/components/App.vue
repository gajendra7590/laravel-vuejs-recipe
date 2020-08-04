<template>
  <div id="appcomponent">
    <Header />
    <router-view></router-view>
    <Footer />
  </div>
</template> 
<script>
import Header from "./shared/Header";
import Footer from "./shared/Footer";
export default {
  name: "appcomponent",
  components: {
    Header,
    Footer,
  },
  data() {
    return {};
  },
};
</script>
<style scoped>
</style>
