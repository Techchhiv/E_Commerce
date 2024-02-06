<template>
    <body>
        <div class="header-container">
            <div class="name-box">
                <h1 class="brandname"><router-link style="text-decoration: none; color: black;" :to="{name: 'home'}">Spotlight</router-link></h1>
                <div class="search-container" style="position: relative;">
                    <form @submit.prevent>
                        <input type="text" placeholder="Search" class="search-input" style="outline: none;">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        <router-link :to="{name: 'checkout'}" style="text-decoration: none;position: relative;"><i class="fa fa-shopping-cart relative" aria-hidden="true" style=""></i>
                            <div v-if="quantity" style="font-size: 12px; position: absolute; right: -10px; top: 0;z-index: 0;color: white;padding: 2px 4px; background-color: red; border-radius: 100%;">{{ quantity }}</div>
                        </router-link>
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
import { onMounted, ref, watchEffect } from 'vue';
import { cartQuantities } from '../stores/quantity.js';
import fetchCartQuantity from '../stores/fetchQuantity';

    export default{
        data() {
            return {
                show: false,
            }
        },
        setup(){
            let user = ref(null);
            const store = cartQuantities();
            let quantity = ref(cartQuantities.quantity);

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
                    // await axios.get(`/user/${res.data.user.id}/cart/quantity`)
                    // .then((response)=>{
                    //     quantity.value = response.data.items;
                    //     console.log(quantity.value);
                    // }).catch((e)=>{
                    //     console.log(e);
                    // });
                    fetchCartQuantity(user.value.id);
                    console.log(user.value.name);  // Access name directly without .user
                } catch (error) {
                    console.log(error);
                }

                // watch(() => store.quantity, (newQuantity, oldQuantity) => {
                //     console.log(`Quantity changed from ${oldQuantity} to ${newQuantity}`);
                //     // Update the local quantity in the component
                //     quantity.value = newQuantity;
                //     // Perform additional actions if needed
                // });
                // watchEffect((oldQuantity, newQuantity)=>{
                //     store.quantity = newQuantity;
                // });
                watchEffect(()=>{
                    quantity.value = store.quantity;
                });

            });

            return {
                user,
                // store,
                quantity,
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

