<template>
     <div class="m-auto flex items-center h-screen justify-center">
          <div class="overflow-hidden flex relative w-fit justify-center items-center">
               <div v-if="isLoading" class="absolute bg-gray-700 opacity-75 h-full w-full flex items-center justify-center">
                    <p class="text-white font-bold">Signing up...</p>
               </div>                                 
               <form @submit.prevent="register()" class="flex-col relative items-center px-[45px] py-[40px] w-[450px] h-fit font-Playfair">
                    <transition class="absolute  transition-all ease-in-out -top-5 bg-red-500 px-5 py-2 text-white font-bold rounded-lg">
                         <p v-if="isError" class=" break-words">{{ error }}</p>
                    </transition>
                   <p class="italic font-bold text-[26px]">Spotlight</p>
                   <p class="italic font-bold">Sign Up</p>
                   <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="text" v-model="name" placeholder="Username" required>
                   <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="email" v-model="email" placeholder="Email" required>
                   <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="password" name="password" v-model="password" placeholder="Password" required>
                   <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="password" name="confirm_password" v-model="confirm_password" placeholder="Re-Password" required>
                   <button type="submit" class="bg-blue-500 hover:bg-blue-700 transition w-full py-4 rounded-2xl font-bold text-white">Sign Up</button>
                   <p>Or</p>
                   <button class="hover:bg-green-500 hover:text-white hover:border-green-500 transition flex w-full gap-3 justify-center border border-black py-3 rounded-2xl">
                       <img src="../assets/image/googleLogo.png" class="w-[25px]" alt="">
                       <p>Sign Up with Google</p>
                   </button>
                   <p class="text-black">Already have an account! <a href="./login" class="text-blue-400 font-semibold">Sign In</a></p>
               </form>
               <div class="w-[32px] left-10 absolute top-[30px]">
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
 <style src="../assets/tailwind.css">  
 </style>

 <script>
import axios from 'axios';

     export default{
          data() {
               return {
                    error: null,
                    isError: false,
                    isLoading: false,
               }
          },
          methods:{
               async register(){
                    try {
                         await axios.post('/register',{
                              email: this.email,
                              password: this.password,
                              name: this.name,
                              confirm_password: this.confirm_password,
                         }).then((res)=>{
                              if(res.data.message == 'success'){
                                   this.$router.push({name: 'login'});
                              }
                              this.error = res.data.message;
                              this.isError = true;
                         })
                    } catch (error) {
                         console.log(error.message);
                    }

                    setTimeout(()=>{
                         this.error = null;
                         this.isError = false;
                    },3000);
               }
          }
     }
</script>