<template>
    <div class="text-center text-black text-2xl font-normal font-['Lato'] my-[60px]">Checkout Information</div>
    <div class="font-Playfair h-fit flex pb-[100px] px-[100px] gap-[65px] justify-center max-xl:flex-col max-xl:items-center">
        <div class="w-[680px] min-h-[497px] h-fit px-[35px] pt-[52px] pb-[20px] relative border border-black flex-col justify-start items-start inline-flex">
            <div class="text-black text-2xl font-normal font-['Lato']">Shipping Option</div>
            <div class="flex gap-[37px] my-[40px]">
                <button v-on:click="updateSelectedOption('0.99')" :class="{'scale-110 border-gray-800 hover:border-green-600':selectedOption=='0.99'}" class="hover:border-black flex-col border px-[18px] py-[15px] border-stone-300 cursor-pointer hover:scale-110 transition ease-in-out w-[178px] h-[95px] rounded-[10px]">
                    <div class="left-[20px] flex top-[15px] mb-[5px] text-black text-sm font-normal font-['Lato']">Standard Delivery</div>
                    <div class="left-[20px] flex top-[41px] mb-[5px] text-black text-sm font-normal font-['Lato']">0.99 USD</div>
                    <div class="left-[20px] flex top-[67px]  text-stone-400 text-[11px] font-normal font-['Lato']">Estimated 5-10 days delivery</div>
                </button>
                <button v-on:click="updateSelectedOption('1.99')" :class="{'scale-110 border-gray-800 hover:border-green-600 ':selectedOption=='1.99'}" class="hover:border-black border px-[18px] py-[15px] border-stone-300 cursor-pointer hover:scale-110 transition ease-in-out w-[178px] h-[95px] rounded-[10px]">
                    <div class="left-[20px] flex top-[15px] mb-[5px] text-black text-sm font-normal font-['Lato']">Express Delivery</div>
                    <div class="left-[20px] flex top-[41px] mb-[5px] text-black text-sm font-normal font-['Lato']">1.99 USD</div>
                    <div class="left-[20px] flex top-[67px]  text-stone-400 text-[11px] font-normal font-['Lato']">Estimated 3-5 days delivery</div>
                </button>
                <button v-on:click="updateSelectedOption('0.00')" :class="{'scale-110 border-gray-800 hover:border-green-600 ':selectedOption=='0.00'}" class="hover:border-black border px-[18px] py-[15px] border-stone-300 cursor-pointer hover:scale-110 transition ease-in-out w-[178px] h-[95px] rounded-[10px]">
                    <div class="left-[20px] flex top-[15px] mb-[5px] text-black text-sm font-normal font-['Lato']">Store Pickup</div>
                    <div class="left-[20px] flex top-[41px] mb-[5px] text-black text-sm font-normal font-['Lato']">Free</div>
                    <div class="left-[20px] flex top-[67px]  text-stone-400 text-[11px] font-normal font-['Lato']">Pickup your purchase today</div>
                </button>
            </div>
            <div v-if="category" class="text-black text-2xl font-normal font-['Lato'] mb-[35px]">Item Summary ({{ category.length }})</div>
            <div class="no-scroll flex-col w-full max-h-[470px] overflow-y-auto">
                <div v-if="product" class="flex mb-10" v-for="(p, index) in product">
                    <div class="flex justify-center items-center w-[120px]  h-[130px] border border-black">
                        <!-- <img class="max-h-[120px]" :src="`/src/assets/image/${category[index]}/${p.image}`" /> -->
                        <img class="max-h-[120px]" :src="getImageUrl(category[index],p.image)" />
                    </div>
                    <div class="ml-[30px] w-full flex flex-col justify-between">
                        <div class="text-black text-xl font-medium font-['Lato'] line-clamp-1">{{ p.name }}</div>
                        <div class="text-[13px] line-clamp-2 mb-2 h-[35px]">{{ p.description }}</div>
                        <div class="flex justify-between gap-2 -[444px] text-zinc-500 text-sm font-normal font-['Lato']">
                            <div class="flex gap-3">
                                <p class="ml-[0px] font-bold text-black" v-if="p.discount">${{ (p.price*(1-p.discount/100)).toFixed(2) }}</p>
                                <div class="flex gap-2">
                                    <p v-if="p.discount">(-{{ p.discount }}%)</p>
                                    <p :class="{'font-bold text-black': p.discount == 0}">${{ p.price }}</p>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <p class="font-bold text-gray-500">{{ p.pivot.color }}</p>
                                <p class="font-bold text-gray-500">{{ p.pivot.size }}</p>
                            </div>
                        </div>
                        <div class="flex gap-10 justify-between w-full">
                            <p>Quantity: {{ p.pivot.quantity }}</p>
                            <div class="flex font-bold">
                                <p>Total: $</p>
                                <p style="display: none;">{{  calculateTotalPrice(p) }}</p>
                                <p>{{ ((p.price*(1-p.discount/100))*p.pivot.quantity).toFixed(2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            
            
        </div>
        <div class="w-[370px] px-[48px] py-[48px] h-fit border border-black flex-col justify-center flex">
            <div class="text-center mb-[45px] text-[24px] text-black font-bold">Order Summary</div>
            <div class="flex  mb-[8px] justify-between text-black text-lg font-normal font-['Lato']">
                <p v-if="category">Items({{ category.length }}):</p>
                <p>${{ getTotal() }}</p>
            </div>
            <div class="flex mb-[8px] justify-between text-black text-lg font-normal font-['Lato']">
                <p>Shipping & Handling:</p>
                <p>${{ selectedOption }}</p>
            </div>
            <div class=" flex  mb-[8px] justify-between text-black text-lg font-normal font-['Lato']">
                <p>Total before Tax:</p>
                <p>${{  (parseFloat(getTotal())+parseFloat(selectedOption)).toFixed(2) }}</p>
            </div>
            <div class="flex justify-between text-black text-lg font-normal font-['Lato']">
                <p>Estimated Tax(10%):</p>
                <p>${{  ((parseFloat(getTotal())+parseFloat(selectedOption))*1.1).toFixed(2) }}</p>
                <p class="hidden">${{ totalOrder = ((parseFloat(getTotal())+parseFloat(selectedOption))*1.1).toFixed(2) }}</p>
            </div>
            <div class="border border-black my-[25px]"></div>
            <div class="mb-[30px] flex justify-between text-black text-xl font-normal font-['Lato']">
                <p>Total Order:</p>
                <p>${{ totalOrder }}</p>
            </div>
            <div class="text-center ">
                <button @click="scan=true" class="w-[262px] h-[60px] bg-stone-400 rounded-[20px] text-white text-xl font-normal font-['Lato']">Proceed to purchase</button>
            </div>
        </div>

        <div  v-if="scan" class="fixed items-center justify-center flex z-0 left-0 top-0 bg-black bg-opacity-60 w-full h-full">
            <div class="modal my-[15%] bg-white mx-auto font-sans border-black border-[3px] px-16 py-5">
                <span @click="scan = false; this.$router.push({name: 'home'})" class="float-right text-[28px] cursor-pointer">&times;</span>
                <p class="font-bold text-[18px] align-middle mt-2">Scan QR Code to Pay</p>
                <img src="../assets/image/qrcode.png" alt="">
            </div>
        </div>
    </div>

</template>
<script>
import axios from 'axios';
import { ref } from 'vue';

    export default{
        data() {
            return {
                product: ref(null),
                category: ref(null),
                user: ref(null),
                totalprice: [],
                totalOrder: null,
                num:0,
                Option: ['0.99','1.99','0.00'],
                selectedOption: '0.99',
                scan:false,
            }
        },
        mounted(){
            const token = localStorage.getItem('user_token');
            if(token){
                this.getUserFromToken(token).then(users =>{
                    if(users){
                        this.user = users.user;
                        // console.log(this.user);
                        this.getUserProduct(this.user.id);
                        
                    }
                })
            }
        },
        methods:{
            async getUserProduct(user_id){
                await axios.get(`/user/${user_id}/cart/product`)
                .then((res)=>{
                    this.product = res.data.products;
                    this.category = res.data.category;
                    
                    console.log(this.category.length);
                    console.log(this.product);
                }).catch((e)=>{
                    console.log(e);
                })
            },

            getTotal(){
                return this.totalprice.reduce((total,price)=> total + price,0).toFixed(2);
            },
            calculateTotalPrice(product) {
                const total = (product.price * (1 - product.discount / 100)).toFixed(2) * product.pivot.quantity;
                if(this.num < this.category.length){ 
                    this.totalprice.push(total);
                    this.num+=1;
                }
                // Optionally, you can return the total for display purposes
                return total;
            },
            updateSelectedOption(option) {
                this.selectedOption = option;
            },
            getImageUrl(category, filename) {
                return `http://localhost/api/images/${category}/${filename}`;
            },
        },
        
    }
</script>
<style scoped src="../assets/tailwind.css">
    
</style>