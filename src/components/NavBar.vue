<template>
    <body>
        <div class="header-container">
            <div class="name-box">
                <h1 class="brandname"><router-link style="text-decoration: none; color: black;" :to="{name: 'home'}">Spotlight</router-link></h1>
                <div class="search-container" style="position: relative;">
                    <form @submit.prevent>
                        <input type="text" placeholder="Search" class="search-input" style="outline: none;">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        <router-link :to="{name: 'cart'}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></router-link>
                        <button @click="show=!show" v-if="user" class="" style="width: fit-content;display: flex; align-items: center; font-weight: bold;border: none;background-color: white;">{{ user.name }}</button>
                        <div v-if="show" class="dropdown-options">
                            <button v-on:click="logOut()">Log Out</button>
                        </div>
                        <a v-if="!user" href="./login" class="login" style="text-decoration: none;">Login</a>
                    </form>
                </div>
            </div>
            <div class="gender-box">
                <div class="gender ">Women</div>
                <div class="gender">Men</div>
            </div>
            <div class="types">
                <p>new</p>
                <p>prom</p>
                <p>top</p>
                <p>hoodies</p>
                <p>suit</p>
                <p><a href="#">coat & jacket</a></p>
                <p>jeans</p>
                <p>pants</p>
                <p>sportwears</p>
            </div>
        </div>
    </body>
</template>

<script src="" async defer>
import axios from 'axios';
import { onMounted, ref } from 'vue';

    export default{
        data() {
            return {
                show: false,
            }
        },
        setup(){
            let user = ref(null);


            onMounted(async () => {
                try {
                    let token = localStorage.getItem("user_token");

                    if (!token) {
                        return;
                    }

                    const headers = {
                        Authorization: `Bearer ${token}`,
                    };

                    const res = await axios.get('/user', { headers });
                    user.value = res.data.user;
                    console.log(user.value.name);  // Access name directly without .user
                } catch (error) {
                    console.log(error);
                }
            });

            return {
                user,
            };
        },
        methods:{
            logOut(){
                localStorage.removeItem("user_token");
                window.location.reload();
            }
        }

    }
</script>
<style src="../assets/css/54-headerProduct.css">
</style>

