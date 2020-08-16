<template> 
 <div> 
        <ul class="item-rating" v-if="rating == 0"> 
            <li class="star-empty" v-for="(n,index) in 5" :key="index+5"><i class="fas fa-star"></i></li> 
            <li><span>{{ rating }}<span>/5</span></span></li>
        </ul>
        <ul class="item-rating" v-if="(rating >= 1) && (rating < 2)"> 
            <li class="star-fill" v-for="(n,index) in 1" :key="index+10"><i class="fas fa-star"></i></li> 
            <li class="star-empty" v-for="(n,index) in 4" :key="index+15"><i class="fas fa-star"></i></li>  
            <li><span>{{ rating }}<span>/5</span></span></li>
        </ul>
        <ul class="item-rating" v-if="(rating >= 2) && (rating < 3)"> 
            <li class="star-fill" v-for="(n,index) in 2" :key="index+20"><i class="fas fa-star"></i></li> 
            <li class="star-empty" v-for="(n,index) in 3" :key="index+25"><i class="fas fa-star"></i></li>  
            <li><span>{{ rating }}<span>/5</span></span></li>
        </ul>
        <ul class="item-rating" v-if="(rating >= 3) && (rating < 4)"> 
            <li class="star-fill" v-for="(n,index) in 3" :key="index+30"><i class="fas fa-star"></i></li> 
            <li class="star-empty" v-for="(n,index) in 2" :key="index+35"><i class="fas fa-star"></i></li>  
            <li><span>{{ rating }}<span>/5</span></span></li>
        </ul>
        <ul class="item-rating" v-if="(rating >= 4) && (rating < 5)"> 
            <li class="star-fill" v-for="(n,index) in 4" :key="index+40"><i class="fas fa-star"></i></li> 
            <li class="star-empty" v-for="(n,index) in 1" :key="index+45"><i class="fas fa-star"></i></li>  
            <li><span>{{ rating }}<span>/5</span></span></li>
        </ul>
        <ul class="item-rating" v-if="(rating >= 5)">  
            <li class="star-empty" v-for="(n,index) in 5" :key="index+50"><i class="fas fa-star"></i></li>  
            <li><span>{{ rating }}<span>/5</span></span></li>
        </ul>
    </div>
</template> 
<script>
export default {
    name : 'Rating',
    props: {
        rating : { default : 0 }
    },
    data(){
        return {

        }
    },
    methods : {
        getInteger(rating){
            let fraction = ((rating % 1).toFixed(2));
            if(fraction != '0.00'){ 
            return (rating - fraction);
            } else {
            return rating;
            } 
        },
        getFloat(rating){
            let fraction = ((rating % 1).toFixed(2));
            if(fraction != '0.00'){
            return 1;
            } else {
            return 0;
            } 
        },
    } 
}
</script> 
<style> 
</style>