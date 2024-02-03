<template>
    <div class="product-list m-auto flex-col font-Playfair px-10 max-w-[1280px]">
        <div class="flex mb-[100px] mt-[50px] gap-3 font-semibold">
            <p>Women's clothing</p>
            <p>></p>
            <p>Coats & Jackets</p>
        </div>

        <div class="flex">
            <div class="flex-col w-2/12">
                <img class="max-w-[120px] p-2 mb-[35px] border-black border" src="../assets/image/lega.png" alt="">
                <img class="max-w-[120px] p-2 mb-[35px]" src="../assets/image/lega.png" alt="">
                <img class="max-w-[120px] p-2 mb-[35px]" src="../assets/image/lega.png" alt="">
            </div>
            <div class=" w-5/12">
                <img class="" src="../assets/image/lega.png" alt="">
            </div>
            <div class="flex-col w-5/12">
                <p class="font-bold text-[24px]">White Shirt</p>
                <p class="mt-[14px] text-[14px] line-clamp-2 mb-[12px] h-[2.6rem]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos assumenda eveniet quisquam atque autem praesentium totam laudantium repellat error, saepe provident dolores eaque officiis commodi quis dignissimos ex. Est voluptas, impedit neque a voluptates, facere nisi sapiente corporis saepe aliquam magni perferendis labore officia, fugiat perspiciatis sed omnis harum ab.</p>
                <div class="flex items-center gap-10">
                    <p class="text-red-500 font-bold text-[22px]">${{ (10.99*(1-10/100)).toFixed(2) }}</p>
                    <p class="text-gray-400-500 font-bold text-[18px] line-through">$10.99</p>
                </div>
                <div class="my-[20px] border-t border black"></div>
                <div class="mb-[12px] flex gap-10">
                    <p>Color</p>
                    <p class="font-bold">Black</p>
                </div>
                <div class="mb-[12px] flex gap-[50px]">
                    <p>Size</p>
                    <div class="flex gap-4 font-bold">
                        <p>S</p>
                        <p>M</p>
                        <p>L</p>
                        <p>XL</p>
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
                <button class="py-2 mb-[12px] rounded-xl w-full hover:border-black hover:bg-white hover:text-black border-[#97B093] border bg-[#97B093] font-bold transition text-white">Add To Cart</button>
                <button class="py-2 rounded-xl w-full hover:border-[#97B093] transition border-black border hover:bg-[#97B093] font-bold text-black hover:text-white">Add To Favorite</button>
            </div>
        </div>
    </div>
</template>

<style scoped src="../assets/tailwind.css">
</style>
<script>
    export default{
        data(){
            return{
                quantity: 1,
            }
        }
    }
</script>