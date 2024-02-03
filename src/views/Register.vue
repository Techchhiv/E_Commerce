<template>
     <div class="m-auto flex items-center h-screen justify-center">
          <div class="overflow-hidden flex relative w-fit justify-center items-center">
               <form class="flex-col items-center px-[45px] py-[40px] w-[450px] h-fit font-Playfair">
                   <p class="italic font-bold text-[26px]">Spotlight</p>
                   <p class="italic font-bold">Sign Up</p>
                   <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="email" v-model="email" placeholder="Email">
                   <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="password" name="password" v-model="password" placeholder="Password">
                   <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="password" name="confirm_password" v-model="confirm_password" placeholder="Re-Password">
                   <button type="submit" class="bg-blue-500 hover:bg-blue-700 transition w-full py-4 rounded-2xl font-bold text-white">Sign Up</button>
                   <p>Or</p>
                   <button class="hover:bg-green-500 hover:text-white hover:border-green-500 transition flex w-full gap-3 justify-center border border-black py-3 rounded-2xl">
                       <img src="../assets/image/googleLogo.png" class="w-[25px]" alt="">
                       <p>Sign Up with Google</p>
                   </button>
                   <p class="text-black">Already have an account! <a href="./login" class="text-blue-400 font-semibold">Sign In</a></p>
               </form>
               <div class="w-[32px] left-10 absolute top-10">
                    <a href="./">
                         <img  src="../assets/svg/left-arrow.svg" alt="">
                    </a>
               </div>
               <div class="opacity-35 transform relative  mr-10 bg-[url('/src/assets/image/3e9a70ad0377274284d99208dd054279.jpg')] w-[450px] h-[800px] bg-s bg-no-repeat" >
                    <div class="h-full top-0 bg-white w-[120px] absolute -left-10 -skew-x-6"></div>
               </div>
          </div>
     </div>
 </template>
 <style scoped src="../assets/tailwind.css">  
 </style>