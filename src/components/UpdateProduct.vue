<template>
    <div class="flex justify-center items-center w-full h-screen">
        <div class="flex-col flex items-center bg-gray-100 p-10 rounded-xl justify-center">
            <p class="font-Playfair font-bold mb-10 text-[32px]">Edit Data</p>
            <form @submit.prevent="updateProduct" v-if="product.value" action="" class="flex-col gap-4 ">
                <div class="flex gap-4">
                    <div  class="flex-col flex gap-2 items-center">
                        <label  class="self-start">Name</label>
                        <input v-model="name" type="text" class="outline-none w-80 py-2 px-2 placeholder:font-bold placeholder:truncate placeholder:w-[200px] bg-gray-50 border border-gray-300 rounded-lg" placeholder="Product Name">
                    </div>
                    <div class="col-span-1 flex flex-col gap-2">
                        <label >Price ($)</label>
                        <input v-model="price" type="text" class="outline-none w-80 py-2 px-2 placeholder:font-bold bg-gray-50 border border-gray-300 rounded-lg" placeholder="Product Price" >
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="flex flex-col gap-2">
                        <label >Discount</label>
                        <input v-model="discount" type="text" class="outline-none w-80 py-2 px-2 placeholder:font-bold bg-gray-50 border border-gray-300 rounded-lg" placeholder="Product Discount" >
                    </div>
                    <div class="flex flex-col gap-2">
                        <label >Category</label>
                        <select v-model="selectedCategory" name="" class="w-[100px]" id="">
                            <option v-for="c in categories.value" :value="c.name">{{ c.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-2">
                    <input type="file" @change="handleFileChange">
                </div>
                <div class="col-span-2 flex flex-col gap-2">
                    <label for="">Description</label>
                    <textarea v-model="description" class="outline-none border border-gray-400" name="" id="" cols="30" rows="10"></textarea>
                </div>
                
                <div class="flex justify-between items-center">
                    <router-link :to="{name: 'admin'}" class="col-span-1 bg-gray-500 px-5 py-2 rounded-lg text-white font-bold">Cancel</router-link>
                    <button class="col-span-1 bg-blue-500 px-5 py-2 rounded-lg text-white font-bold">Submit</button>
                </div>
            </form>
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
                product: ref([]),
                category: ref([]),
                categories: ref([]),
                selectedCategory: null,
                name: '',
                price: 0.0,
                discount: '',
                description: '',
                image: null,
                selectedImage: null,
            }
        },

        mounted(){
            this.getProductById();
            this.getAllCategories();
        },

        methods:{
            async getProductById(){
                await axios.get(`/product/${this.$route.params.productId}`)
                .then((res)=>{
                    this.product.value = res.data.product;
                    this.category.value = res.data.category;

                    this.selectedCategory = this.category.value.name;
                    this.name = this.product.value.name;
                    this.price = this.product.value.price;
                    this.description = this.product.value.description;
                    this.discount = this.product.value.discount;
                }).catch((err)=>{
                    console.log(err);
                })
            },
            async getAllCategories(){
                await axios.get('/categories')
                .then((res)=>{
                    this.categories.value = res.data.categories;
                }).catch((err)=>{
                    console.log(err);
                })
            },

            async updateProduct(){
                await axios.put(`/product/${this.$route.params.productId}`,{
                    name: this.name,
                    price: this.price,
                    description: this.description,
                    image: this.image,
                    discount: this.discount,
                    category_id: parseInt(this.categories.value.find(cat => cat.name == this.selectedCategory).id),
                }).then((res)=>{
                    if(this.uploadImage())
                        this.$router.push({name: 'admin'});
                })
                .catch((err)=>{
                    console.log(err);
                });
            },
            handleFileChange(event) {
                const file = event.target.files[0];
                if (file) {
                    this.selectedImage = file;
                    this.saveFileToAssetsImage(file);
                }
            },
            async saveFileToAssetsImage(file) {
                try {
                        // Read the file
                        const fileContents = await this.readFileContents(file);
                        
                        this.image=file.name;
                        console.log('File saved to assets/image:', file.name);
                    } 
                    catch (error) {
                        console.error('Error saving file:', error);
                }
            },
            async readFileContents(file) {
                return new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = () => resolve(reader.result);
                    reader.onerror = reject;
                    reader.readAsArrayBuffer(file);
                });
            },
            async uploadImage(){
                const formData = new FormData();
                formData.append('image', this.selectedImage);
                formData.append('category', this.selectedCategory);

                await axios.post('/upload-image', formData).then((res)=>{
                    console.log(res.data);
                }).catch((error)=>{
                    console.log('Error uploading image:', error);
                });
                
            }
        }
    }

</script>