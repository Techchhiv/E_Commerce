<template>
        <div class="list-container" style="">
            <!-- <div class="arrival-box">
                <p class="arrival">New Arrival</p>
                <div class="see-all"> 
                    <p>See All</p>
                    <i class="fas fa-arrow-right" ></i>
                </div>
            </div> -->
            <router-link :to="{name: 'home'}">
                <img style="width: 25px; margin: 10px 0;" src="../assets/svg/left-arrow.svg" alt="">
            </router-link>
            <div class="clothes-box clothes-box-media" style="width: 100%;  justify-content: start; display: flex; flex-wrap: wrap;">
                <div class="card" v-for="p in product.value">
                    <div class="badge">
                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                        <p v-if="p.discount" class="discount"> &#37; {{ p.discount }}</p>
                    </div>
                    <div class="tumb">
                        <img :src="getImageUrl(p.categories.name,p.image)">
                    </div>
                    <div class="details">
                        <!-- <span class="category">Women, bag</span> -->
                        <h3 class="brands"> <router-link :to="{name: 'productDetails', params: {productId: p.id}}">{{ p.name }}</router-link></h3>
                        <p class="modes">{{ p.description }}</p>
                        <div class="bottom-details">
                            <div class="price">
                                <p class="discount-price">$ {{ (p.price*(1-p.discount/100)).toFixed(2) }}</p>
                                <p v-if="p.discount" class="main-price">$ {{ p.price }}</p>
                            </div>
                            <div class="cart">
                                <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
           
            

        </div>
</template>

<style scoped src="../assets/css/57-productList.css"></style>

<script>
import axios from 'axios';
    import { ref } from 'vue';

    export default{
        data() {
            return {
                product: ref([]),
            }
        },

        mounted() {
            this.getAllProduct();
        },

        methods:{
            async getAllProduct(){
                await axios.get('/products')
                .then((res)=>{
                    this.product.value = res.data.product;
                    console.log(this.product.value);
                }).catch((err)=>{
                    console.log(err);
                });
            },
            getImageUrl(category, filename) {
                return `http://localhost/api/images/${category}/${filename}`;
            }
        }

    }

</script>
