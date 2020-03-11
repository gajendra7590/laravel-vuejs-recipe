<template>
    <div id="appcomponent">
         <h1>Test</h1>
         <Header />
         <router-view></router-view>
         <Footer />
    </div>
</template>

<script>  
    import Header from './shared/header';
    import Footer from './shared/footer';
    export default {
        name : 'appcomponent',
        components : {
            Header,
            Footer
        },
        data() {
            return {
                
            }
        }, 
    }
</script>
<style scoped>
    
</style>
