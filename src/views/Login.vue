<template>

    <div class="flex border-black">
        <img src="" alt="">
        <form class="flex-col items-center border-black border px-[45px] py-[40px] w-[450px] h-fit font-Playfair">
            <p class="italic font-bold">Spotlight</p>
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
</template>
<style src="../assets/tailwind.css">

</style>