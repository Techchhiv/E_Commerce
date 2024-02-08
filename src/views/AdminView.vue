<template>
    <div class="px-14 py-70vh flex flex-col relative ">
        <div class="flex justify-between text-2xl font-bold mb-10">
            <p>List of Product</p>
            <p>Admin</p>
        </div>

        <div class="flex h-[600px] mb-24px w-full justify-center items-center" v-if="products.value && products.value.length === 0">
            <p class="text-2xl font-bold">There are no items yet!</p>
        </div>
        <div v-else
            class=" mb-24px overflow-y-auto no-scroll w-full max-h-[600px]">

            <table class="table-fixed w-full">
                <thead class="mb-4">
                    <tr>
                        <th class="">#</th>
                        <th class="w-[200px] mr-1">Name</th>
                        <th class="w-[400px]">Description</th>
                        <th class="text-center">Price</th>
                        <th >Image</th>
                        <th >Category</th>
                        <th  class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="p in products.value" class="align-middle" style="padding-bottom: 10px;">
                        <td class="flex items-center justify-center">
                            <!-- <img class="mt-1 w-[50px]" :src="`/src/assets/image/${p.categories.name}/${p.image}`" alt=""> -->
                            <img class="mt-1 w-[50px]" :src="getImageUrl(p.categories.name,p.image)" alt="">
                        </td>
                        <td class="truncate">{{ p.name }}</td>
                        <td class="truncate">{{ p.description }}</td>
                        <td class="text-center truncate">${{ p.price }}</td>
                        <td class="text-center truncate">{{ p.image }}</td>
                        <td class="text-center truncate">{{ p.categories.name }}</td>
                        <td class="align-middle text-center">
                            <button @click="deleteProduct(p.id)" class="text-red-600 font-semibold cursor-pointer">Remove</button>
                            <router-link :to="{name: 'updateProduct', params: { productId : p.id}}" class="text-red-600 font-semibold ml-4">Edit</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-between">
            <router-link :to="{name: 'home'}" class="px-8 py-2 text-white font-bold bg-gray-500 rounded-lg flex">Back</router-link>
            <router-link  :to="{name: 'insertProduct'}" class="px-8 py-2 text-white font-bold bg-gray-500 rounded-lg flex">Insert</router-link>
        </div>
        </div>
</template>

<style scoped src="../assets/tailwind.css"></style>
<script>
import axios from 'axios';
import { ref } from 'vue';

    export default{
        data() {
            return {
                products: ref([]),
            }
        },

        mounted() {
            this.getAllProduct();
        },

        methods:{
            async getAllProduct(){
                await axios.get('/products')
                .then((res)=>{
                    if(res.data.product){
                        this.products.value = res.data.product;
                    }
                }).catch((err)=>{
                    console.log(err);
                });
            },

            async deleteProduct(id){
                await axios.delete(`/product/${id}`)
                .then((res)=>{
                    if(res.data.message=='success'){
                        this.getAllProduct();
                    }else{
                        console.log(res.data.message);
                    }
                }).catch((err)=>{
                    console.log(err);
                })
            },

            getImageUrl(category, filename) {
                return `http://localhost/api/images/${category}/${filename}`;
            }
        }
    }
</script>