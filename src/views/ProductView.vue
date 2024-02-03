<template>
    <div class="product-list m-auto flex-col font-Playfair px-10 max-w-[1280px]">
        <div class="flex mb-[100px] mt-[50px] gap-3 font-semibold">
            <p v-if="category">{{ category.name }}</p>
            <p>></p>
            <p v-if="product" >{{ product.name }}</p>
        </div>

        <div class="flex">
            <div class="flex-col w-2/12">
                <img v-if="product" class="max-w-[120px] p-2 mb-[35px] border-black border" :src="`/src/assets/image/${category.name}/${product.image}`" alt="">
                <img v-if="product" class="max-w-[120px] p-2 mb-[35px]" src="../assets/image/lega.png" alt="">
                <img v-if="product" class="max-w-[120px] p-2 mb-[35px]" src="../assets/image/lega.png" alt="">
            </div>
            <div class=" w-5/12">
                <img v-if="product" :src="`/src/assets/image/${category.name}/${product.image}`" alt="">
            </div>
            <div class="flex-col w-5/12">
                <p v-if="product" class="font-bold text-[24px]">{{ product.name }}</p>
                <p v-if="product" class="mt-[14px] text-[14px] line-clamp-2 mb-[12px] h-[2.6rem]">{{ product.description }}</p>
                <div class="flex items-center gap-10">
                    <p v-if="product" class="text-red-500 font-bold text-[22px]">${{ (product.price*(1-product.discount/100)).toFixed(2) }}</p>
                    <p v-if="product" class="text-gray-400-500 font-bold text-[18px] line-through">${{ product.price }}</p>
                </div>
                <div class="my-[20px] border-t border black"></div>
                <div class="mb-[12px] flex gap-10">
                    <p>Color</p>
                    <select v-model="selectedColor" name="" id="" class="font-bold transition" :required="true">
                        <option v-for="color in colors" :value="color">{{ color }}</option>
                    </select>
                </div>
                <div class="mb-[12px] flex gap-[50px]">
                    <p>Size</p>
                    <div class="flex items-center gap-4">
                        <button class="rounded-md px-2 transition transform" v-for="size in sizes" :class="{ 'bg-black text-white': selectedSize === size}" @click="selectedSize = size">{{ size }}</button>
                    </div>
                </div>
                <div class="flex mb-[12px] gap-[20px] items-center">
                    <p>Quantity</p>
                    <div class="flex gap-5">
                        <button class="text-[23px]" @click="
                            if(this.quantity > 1) this.quantity-=1;
                        ">-</button>
                        <span class="text-[23px] text-center w-[20px]">{{ quantity }}</span>
                        <button class="text-[23px]" @click="
                            this.quantity++;
                        ">+</button>
                    </div>
                </div>
                <button v-on:click="insertCart()" class="py-2 my-[20px] rounded-xl w-full hover:border-black hover:bg-white hover:text-black border-[#97B093] border bg-blue-500 font-bold transition text-white">Add To Cart</button>
                <button class="py-2 rounded-xl w-full hover:border-[#97B093] transition border-black border hover:bg-[#97B093] font-bold text-black hover:text-white">Add To Favorite</button>
            </div>
        </div>
    </div>
</template>

<style scoped src="../assets/tailwind.css">
</style>
<script>
    import axios from 'axios';
import { ref } from 'vue';

    export default{
        data(){
            return{
                user: ref(null),
                quantity: 1,
                selectedColor: 'Black',
                selectedSize: 'M',
                colors: ['Black','Blue','Red','Green'],
                sizes: ['S','M','L','XL'],
                product: null,
                category: null,
            }
        },

        beforeRouteEnter(to, from, next){
            const productId = to.params.productId;
             axios.get(`/product/${productId}`).then(res => {
                next(vm =>{
                    vm.product = res.data.product;
                    vm.category = res.data.category;
                });
            }).catch(e => {
                console.error(e);
                next(vm =>{
                    vm.error = 'Error fetching product data';
                });
            });
        },
        mounted(){
            const token = localStorage.getItem('user_token');
            if(token){
                this.getUserFromToken(token).then(users =>{
                    if(users){
                        this.user = users.user;
                        console.log(this.user);
                    }
                })
            }
        },
        methods:{
            async insertCart(){
                await axios.post('/cart',{
                    user_id: this.user.id,
                    product_id: this.$route.params.productId,
                    color: this.selectedColor,
                    quantity: this.quantity,
                    size: this.selectedSize,
                }).then(res=>{
                    if(res.data.message=='success'){
                        console.log(res.data.message);
                    }
                }).catch((e)=>{
                    console.log(e.message);
                })
            }
        }
        // mounted(){
        //     this.fetchProduct();
        // },

        // methods: {
        //     fetchProduct(){
        //         axios.get('/product/'+this.$route.params.productId)
        //         .then(res => {
        //             this.product = res.data.product;
        //             console.log(this.product);
        //         }).catch(e =>{
        //             console.log(e);
        //         })
        //         ;
        //     },
        //     async getImage(x){
        //         const image = await import(`@/assets/image/clothes/${x}`);
        //         return image;
        //     }
        // }
        
    }
</script>