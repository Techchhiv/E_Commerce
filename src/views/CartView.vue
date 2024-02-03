<template>
    <div class="text-center text-black text-2xl font-normal font-['Lato'] my-[60px]">Checkout Information</div>
    <div class="font-Playfair flex pb-[100px] px-[100px] gap-[65px] justify-center max-xl:flex-col max-xl:items-center">
        <div class="w-[680px] h-[497px] px-[35px] py-[52px] relative border border-black flex-col justify-start items-start inline-flex">
            <div class="text-black text-2xl font-normal font-['Lato']">Shipping Option</div>
            <div class="flex gap-[37px] my-[40px]">
                <div class="hover:border-black border px-[18px] py-[15px] border-stone-300 cursor-pointer hover:scale-110 transition ease-in-out w-[178px] h-[95px] rounded-[10px]">
                    <div class="left-[20px] top-[15px] mb-[5px] text-black text-sm font-normal font-['Lato']">Standard Delivery</div>
                    <div class="left-[20px] top-[41px] mb-[5px] text-black text-sm font-normal font-['Lato']">0.99 USD</div>
                    <div class="left-[20px] top-[67px]  text-stone-400 text-[11px] font-normal font-['Lato']">Estimated 5-10 days delivery</div>
                </div>
                <div class="hover:border-black border px-[18px] py-[15px] border-stone-300 cursor-pointer hover:scale-110 transition ease-in-out w-[178px] h-[95px] rounded-[10px]">
                    <div class="left-[20px] top-[15px] mb-[5px] text-black text-sm font-normal font-['Lato']">Express Delivery</div>
                    <div class="left-[20px] top-[41px] mb-[5px] text-black text-sm font-normal font-['Lato']">1.99 USD</div>
                    <div class="left-[20px] top-[67px]  text-stone-400 text-[11px] font-normal font-['Lato']">Estimated 3-5 days delivery</div>
                </div>
                <div class="hover:border-black border px-[18px] py-[15px] border-stone-300 cursor-pointer hover:scale-110 transition ease-in-out w-[178px] h-[95px] rounded-[10px]">
                    <div class="left-[20px] top-[15px] mb-[5px] text-black text-sm font-normal font-['Lato']">Store Pickup</div>
                    <div class="left-[20px] top-[41px] mb-[5px] text-black text-sm font-normal font-['Lato']">Free</div>
                    <div class="left-[20px] top-[67px]  text-stone-400 text-[11px] font-normal font-['Lato']">Pickup your purchase today</div>
                </div>
            </div>
            <div class="text-black text-2xl font-normal font-['Lato'] mb-[35px]">Item Summary (1)</div>
            <div class="flex">
                <img class="w-20 h-[123px] border border-black" src="https://via.placeholder.com/80x123" />
                <div class="ml-[50px] flex flex-col justify-between">
                    <div class="grow text-black text-xl font-medium font-['Lato']">Brown Sweater</div>
                    <div class="flex -[444px] text-zinc-500 text-sm font-normal font-['Lato']">
                        <p>$24.00</p>
                        <p>(-20%)</p>
                        <p class="ml-[40px]">$19.20</p>
                    </div>
                    <div class="flex gap-10">
                        <p>Quantity: 1</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[370px] px-[48px] py-[48px] h-fit border border-black flex-col justify-center flex">
            <div class="text-center mb-[45px] text-black text-base font-normal font-['Lato']">Order Summary</div>
            <div class="flex  mb-[8px] justify-between text-black text-lg font-normal font-['Lato']">
                <p>Items(0):</p>
                <p>$0.00</p>
            </div>
            <div class="flex mb-[8px] justify-between text-black text-lg font-normal font-['Lato']">
                <p>Shipping & Handling:</p>
                <p>$0.00</p>
            </div>
            <div class=" flex  mb-[8px] justify-between text-black text-lg font-normal font-['Lato']">
                <p>Total before Tax:</p>
                <p>$0.00</p>
            </div>
            <div class="flex justify-between text-black text-lg font-normal font-['Lato']">
                <p>Estimated Tax(10%):</p>
                <p>$0.00</p>
            </div>
            <div class="border border-black my-[25px]"></div>
            <div class="mb-[30px] flex justify-between text-black text-xl font-normal font-['Lato']">
                <p>Total Order:</p>
                <p>$0.00</p>
            </div>
            <div class="text-center ">
                <button class="w-[262px] h-[60px] bg-stone-400 rounded-[20px] text-white text-xl font-normal font-['Lato']">Proceed to purchase</button>
            </div>
        </div>

        
    </div>

</template>

<style scoped src="../assets/tailwind.css"></style>