import axios from "axios";
import { cartQuantities } from "../stores/quantity.js";

const fetchCartQuantity = async (userId, newCartQuantity, Error) => {
    const cartQuantity = cartQuantities();
    try{
        const res = await axios.get(`/user/${userId}/cart/quantity`);
        const newQuantity = res.data.items;
        cartQuantity.setQuantity(newQuantity);
    }catch(err){
        console.log(err);
        if(Error){
            Error(err);
        }
    }
}

export default fetchCartQuantity;