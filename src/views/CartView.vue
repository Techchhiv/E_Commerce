<template>
    <div class="px-14 pt-10 font-Playfair flex-col h-fit w-full items-center justify-center">
        <p class="text-[18px] mb-5 self-start">Cart</p>
        <div v-if="products.value" class="flex-col mb-10 items-center">
            <div class="max-h-[500px] overflow-y-auto no-scroll flex-col ">
                <div class="flex shadow-lg gap-2 mb-10 px-5 py-5 w-full h-[146px]" v-for="(p, index) in products.value">
                    <div class=" w-[100px] flex justify-center items-center">
                        <img class="max-h-[120px]" :src="`/src/assets/image/${category.value[index]}/${p.image}?${Date.now()}`" alt="">
                    </div>
                    <div class="flex-col w-full ml-10">
                        <div class="flex justify-between items-center w-full">
                            <p class="line-clamp-1 font-bold">{{ p.name }}</p>
                            <span @click="
                                deleteProductCart(user.id,p.id);
                            " class="font-bold cursor-pointer text-[24px]">&times;</span>
                        </div>
                        <div class="flex w-full gap-10 items-center">
                            <p class="line-clamp-1 max-lg:w-[360px] xl:w-[500px]  text-[12px]">{{ p.description }}</p>
                            <div class="flex items-center  gap-5">
                                <button class="text-[24px] cursor-pointer"  @click="
                                    if(quantity[index]>1){
                                        quantity[index]-=1;
                                        updateCart(user.id,p.id,p.pivot.color,quantity[index],p.pivot.size);
                                    }   
                                ">-</button>
                                <span class="font-bold text-[18px]">{{ quantity[index] }}</span>
                                <button class="text-[24px] cursor-pointer" @click="
                                    quantity[index]+=1;
                                    updateCart(user.id,p.id,p.pivot.color,quantity[index],p.pivot.size);
                                ">+</button>
                            </div>
                            <span>${{ (p.price*(1-p.discount/100)).toFixed(2) }}</span>
                        </div>
                        <div class="flex gap-5 my-1">
                            <span class="text-[14px]">{{ p.pivot.color }}</span>
                            <span class="text-[14px]">{{ p.pivot.size }}</span>
                        </div>
                        <div class="flex gap-2">
                            <p class="text-green-500 font-semibold">${{ (p.price*(1-p.discount/100)).toFixed(2) }}</p>
                            <p class="text-green-500 font-semibold" v-if="p.discount">(-%{{ p.discount }})</p>
                            <p v-if="p.discount" class="ml-10 text-green-500 font-semibold">${{ p.price }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10 text-[18px] font-bold flex gap-3">Total Price: <p class="text-red-500">${{ totalPrice }}</p></div>
            <div class="  flex mt-10 items-start" ><router-link :to="{name: 'cart'}" class="bg-[#97B093] px-5 py-2 rounded-md text-white font-bold">Checkout</router-link></div>
        </div>
        <div v-else class="mt-[300px] w-full flex items-center justify-center">
            <p class="text-center font-bold text-[32px] ">No items in cart Yet</p>
        </div>
    </div>
</template>
<style scoped src="../assets/tailwind.css"></style>
<script >
    import axios from 'axios';
    import { ref } from 'vue';
    import fetchCartQuantity from '@/stores/fetchQuantity';

    export default{
        data() {
            return {
                quantity: [],
                user: ref(null),
                products: ref([]),
                category: ref([]),
                total: 0,
            }
        },

        mounted(){
            const token = localStorage.getItem('user_token');

            if( token){
                this.getUserFromToken(token).then((users)=>{
                    if(users){
                        this.fetchData(users.user.id);
                        this.user = users.user;
                        console.log(this.user.id);
                    }
                });


            }
        },

        methods:{
            async fetchData(user_id){
                await axios.get(`/user/${user_id}/cart/product`).then((res)=>{
                    if(res.data.products){
                        this.products.value = res.data.products;
                        this.category.value = res.data.category;
                        console.log(this.products.value);

                       this.products.value.forEach(p => {
                            this.quantity.push(p.pivot.quantity);
                        });

                    }
                }).catch((err)=>{
                    console.log(err);
                });
            },

            async updateCart(userId, productId, Color, Quantity,Size) {
                await axios.post('/cart', {
                    user_id: userId,
                    product_id: productId,
                    color: Color,
                    quantity: Quantity,
                    size: Size
                })
                .then((res) => {
                    if (res.data.message === 'success') {
                    console.log('Product updated successfully');
                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            },

            async deleteProductCart(userId,productId){
                await axios.delete(`/cart/${userId}/${productId}`)
                .then((res)=>{
                    const index = this.products.value.findIndex(product => product.id == productId);


                    if( index !== -1){
                        this.products.value.splice(index,1);
                        this.category.value.splice(index,1);
                    }

                    fetchCartQuantity(userId);
                    this.quantity = []; 
                    this.products.value.forEach(p => {
                        this.quantity.push(p.pivot.quantity);
                    });

                    console.log(res.data.message)
                    // window.location.reload();
                }).catch((err)=>{
                    console.log(err);
                })
            },

        },

        computed: {
            totalPrice() {
            // Compute total price by summing the price of each item in the cart
                return this.products.value.reduce((total, product) => {
                    const price = (product.price * (1 - product.discount / 100)) * product.pivot.quantity;
                    return total + price;
                }, 0).toFixed(2);
            }
        }
    }

</script>