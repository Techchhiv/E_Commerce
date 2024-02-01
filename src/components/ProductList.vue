<template>
        <div class="list-container">
            <div class="arrival-box">
                <p class="arrival">New Arrival</p>
                <a :href="'./products'">
                    <div class="see-all"> 
                        <p>See All</p>
                        <i class="fas fa-arrow-right" ></i>
                    </div>
                </a>
            </div>
            <div class="clothes-box" style="overflow-y: scroll;width: 100%;">
                <div v-for="p in products" to="" class="card">
                    <div class="badge">
                        <p v-if="p.discount" class="discount"> &#37; {{ p.discount }}</p>
                        <a href="#"><i class="fa-solid fa-heart"></i></a>
                    </div>
                    <div class="tumb">
                        <img src="../assets/image/photo_2024-01-30_02-21-00-removebg-preview.png">
                    </div>
                    <div class="details">
                        <!-- <span class="category">Women, bag</span> -->
                        <h3 class="brands"> <a href="" style="text-decoration: none;">{{ p.name }}</a></h3>
                        <p class="modes">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque molestiae eum totam repellendus vero libero vel, neque distinctio quod quisquam placeat ut omnis consequatur facilis hic corporis officiis voluptatibus provident doloremque ullam beatae nisi. Est ea impedit laboriosam ad aut, tempora mollitia, esse dolorum laborum eveniet dignissimos cupiditate tenetur dolorem! </p>
                        <div class="bottom-details">
                            <div class="price">
                                <p class="discount-price">$ {{ (p.price*(1-p.discount/100)).toFixed(2) }}</p>
                                <p v-if="p.discount" class="main-price">$ {{ p.price }}</p>
                            </div>
                            <div class="cart">
                                <a :href="'./product/'+p.id"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navi-bar">
                <i class="scroll-icon scroll-left fas fa-chevron-left"></i>
                <i class="scroll-icon scroll-right fas fa-chevron-right"></i>
            </div>
        </div>
</template>

<style src="../assets/css/57-productList.css"></style>

<script>
    import axios from 'axios';
    import { ref, onMounted } from 'vue';

    export default{
        setup(){
            let products = ref(null);

            onMounted( async() =>{
                let res = await axios('http://localhost/api/products');
                if(res.data){
                    products.value = res.data.product;
    
                }
                console.log(res.data);
            });
        
            return{
                products,
            }
        }

        
    }

</script>
