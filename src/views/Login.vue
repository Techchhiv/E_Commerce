<template>
    <div class="m-auto flex items-center h-screen justify-center">
        <div  class="overflow-hidden flex relative w-fit justify-center items-center">
            <div class="opacity-55 transform relative  mr-10 bg-[url('/src/assets/image/3e9a70ad0377274284d99208dd054279.jpg')] w-[450px] h-[800px] bg-s bg-no-repeat" >
                <div class="h-full top-0 bg-white w-[120px] absolute -right-10 -skew-x-6"></div>
            </div>
            <div class="w-[32px] left-10 absolute top-10">
                    <a href="./">
                         <img  src="../assets/svg/left-arrow.svg" alt="">
                    </a>
               </div>
               <form @submit.prevent="submitInfo()" class="flex-col relative items-center px-[45px] py-[40px] w-[450px] h-fit font-Playfair">
                <transition class="absolute transition-all ease-in-out -top-5 bg-red-500 px-10 py-2 text-white font-bold rounded-lg">
                 <p v-if="isError">{{ error }}</p>
                </transition>
                <p class="italic font-bold text-[24px]">Spotlight</p>
                <p class="italic font-bold">Log in</p>
                <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="email" v-model="email" placeholder="Email">
                <input class="w-[360px] pl-5 border border-black rounded-lg py-2" type="password" name="password" v-model="password" placeholder="Password">
                <div class="flex justify-between w-full">
                    <div class="flex">
                        <input name="remember" id="remember" type="checkbox" class="form-checkbox rounded-full bg-gray-400">
                        <label for="remember" class="font-semibold ml-3">Remember Me</label>
                    </div>
                    <p class="font-semibold text-gray-400">Forgot Password?</p>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 transition w-full py-4 rounded-2xl font-bold text-white">Sign In</button>
                <p>Or</p>
                <button class="hover:bg-green-500 hover:text-white hover:border-green-500 transition flex w-full gap-3 justify-center border border-black py-3 rounded-2xl">
                    <img src="../assets/image/googleLogo.png" class="w-[25px]" alt="">
                    <p>Log in with Google</p>
                </button>
                <p class="text-black">Don't have an account! <a href="./register" class="text-blue-400 font-semibold">Sign Up</a></p>
            </form>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
    
    export default{
        data() {
            return {
                error: null,
                isError: false,
            }
        },
        methods:{
            async submitInfo(){
                try{
                    const res = await axios.post('/login',{
                        email: this.email,
                        password: this.password
                    });
                    if(res.data.message != "success"){
                        this.error = res.data.message;
                        this.isError = true;
                        console.log(res.data.message);
                    }else{
                        localStorage.setItem('user_token', res.data.token);
                        this.$router.push({name: 'home'});
                    }
                }catch(error){
                    this.error = "Please input all the information!";
                    this.isError = true;
                    console.log(error);
                }

                setTimeout(()=>{
                    this.error = null;
                    this.isError = false;
                },3000);
            }
        }
    }
</script>
<style src="../assets/tailwind.css">
</style>