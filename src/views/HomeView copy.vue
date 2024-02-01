<template>
        <!-- ************************  section 1 "header"  ********************************-->
        <div class="header-container">
            <div class="name-box">
                <h1 class="brandname">Spotlight</h1>
                <div class="search-container">
                    <form>
                        <input type="text" placeholder="Search" class="search-input">
                        <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <button type="submit" class="login">Login</button>
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
                <p><a href="./61-viewList.html">coat & jacket</a></p>
                <p>jeans</p>
                <p>pants</p>
                <p>sportwears</p>
            </div>
        </div>

        <!-- ***************** section 2 "home page" ************************ -->
        <div class="page-container">
            <h1 class="text">Style & &nbsp &nbsp Fashion</h1>
            <img class="model" src="../image/yyyyyy.png">
            <div class="description-box">
                <p class="desc">The ultimate destination for fashion-forward individuals seeking to elevate their style fame! Our mission is to empower you with the most inspiring fashion trends.</p>
                <button class="shop">Shop Now</button>
            </div>
        </div>

        <!-- ****************** section 3 "collaboration" *************************** -->
        <div class="collab-box">
            <img src="../image/nike.png" class="logo">
            <img src="../image/fendi.png" class="logo">
            <img src="../image/gucci.png" class="logo">
            <img src="../image/chanel.png" class="logo">
            <img src="../image/addidas.png" class="logo">
            <img src="../image/dior.png" class="logo">
        </div>

        <!-- **************************  section 4 "image slider"  **********************************-->
        <div class="container-slider">
            <div>
              <h1 class="productbox">Upcoming Collections</h1>
              <h4 class="txt">The ultimate for fashion-forward individuals seeking</h4>
            </div>
            
            <div class="slider">
              <div class="box1">
              </div>
              <div class="box2">
              </div>
              <div class="box3">
              </div>
              <div class="box4">
              </div>
              <div class="box5">
              </div>
              <div class="box6">
              </div>
              <div class="box7">
              </div>
            </div>
            
            <div class="navigation">
                <div class="icon-box">
                  <i class="fas fa-arrow-left" onclick="prevSlide()"></i>
                </div>
                <div class="icon-box">
                  <i class="fas fa-arrow-right" onclick="nextSlide()"></i>
                </div>
            </div>

            <!-- **************************  section 5 "product list"  **********************************-->

            <div class="list-container">
                <div class="arrival-box">
                    <p class="arrival">New Arrival</p>
                    <div class="see-all"> 
                        <p>See All</p>
                        <i class="fas fa-arrow-right" ></i>
                    </div>
                </div>
                <div class="clothes-box">
             
                    <div class="card">
                        <div class="badge">
                            <p class="discount"> &#37; 50</p>
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                        </div>
                        <div class="tumb">
                            <img src="../image/photo_2024-01-30_02-21-00-removebg-preview.png">
                        </div>
                        <div class="details">
                            <!-- <span class="category">Women, bag</span> -->
                            <h3 class="brands"> <a href="">Cinq a Sept</a></h3>
                            <p class="modes">Lorem ipsum sdfasdfadfadadfdsa </p>
                            <div class="bottom-details">
                                <div class="price">
                                    <p class="main-price">$ 90.00</p>
                                    <p class="discount-price">$ 45.00</p>
                                </div>
                                <div class="cart">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="badge">
                            <p class="no-discount"> &#37; 50</p>
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                        </div>
                        <div class="tumb">
                            <img src="../image/cr-removebg-preview.png">
                        </div>
                        <div class="details">
                            <h3 class="brands">OFF-WHITE <a href=""></a></h3>
                            <p class="modes">Varsity wool blend bomber red jacket</p>
                            <div class="bottom-details">
                                <div class="price">
                                    <p class="main-price no-strike">$ 90.00</p>
                                    <p class="discount-price no-discount">$ 45.00</p>
                                </div>
                                <div class="cart">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="badge">
                            <p class="discount"> &#37; 50</p>
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                        </div>
                        <div class="tumb">
                            <img src="../image/mc-rm.png">
                        </div>
                        <div class="details">
                            <!-- <span class="category">Women, bag</span> -->
                            <h3 class="brands"> <a href="">Alexander McQueen</a></h3>
                            <p class="modes">Wool Tweed A-Line Minidress</p>
                            <div class="bottom-details">
                                <div class="price">
                                    <p class="main-price">$ 90.00</p>
                                    <p class="discount-price">$ 45.00</p>
                                </div>
                                <div class="cart">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="badge">
                            <p class="no-discount"> &#37; 50</p>
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                        </div>
                        <div class="tumb">
                            <img src="../image/flow-removebg-preview.png">
                        </div>
                        <div class="details">
                            <!-- <span class="category">Women, bag</span> -->
                            <h3 class="brands"> <a href="">RHUDE</a></h3>
                            <p class="modes">Rhude Printed Silk Shirt</p>
                            <div class="bottom-details">
                                <div class="price">
                                    <p class="main-price no-strike">$ 90.00</p>
                                    <p class="discount-price no-discount">$ 45.00</p>
                                </div>
                                <div class="cart">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="badge">
                            <p class="no-discount"> &#37; 50</p>
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                        </div>
                        <div class="tumb">
                            <img src="../image/jj.png">
                        </div>
                        <div class="details">
                            
                            <h3 class="brands"> <a href="">Toteme</a></h3>
                            <p class="modes">Women's Natural Shearling Aviator Jacket</p>
                            <div class="bottom-details">
                                <div class="price">
                                    <p class="main-price no-strike">$ 2,908.00</p>
                                    <p class="discount-price no-discount">$ 45.00</p>
                                </div>
                                <div class="cart">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="badge">
                            <p class="no-discount"> &#37; 50</p>
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                        </div>
                        <div class="tumb">
                            <img src="../image/sdif.png">
                        </div>
                        <div class="details">
                            
                            <h3 class="brands"> <a href="">Nudie Jeans</a></h3>
                            <p class="modes">Robby Vintage Logo-Appliquéd </p>
                            <div class="bottom-details">
                                <div class="price">
                                    <p class="main-price no-strike">$ 147.00</p>
                                    <p class="discount-price no-discount">$ 45.00</p>
                                </div>
                                <div class="cart">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
    
                <!-- <div class="navi-bar">
                    <i class="scroll-icon scroll-left fas fa-chevron-left"></i>
                    <i class="scroll-icon scroll-right fas fa-chevron-right"></i>
                </div> -->
               
            </div>

             <!-- **************************  section 6 "why choose us?"  **********************************-->
             <div class="whyUs-container">
                <div class="why">Why Choose Us?</div>
                <div class="content-wrapper">
                    <div class="content-left-box">
                        <img src="../image/stars.png">
                        <h2>The Ultimate destination</h2>
                        <p>Discover a world of fashion where each garment tells a story. From casual wear to sophisticated ensembles, our carefully selected range includes everything you need to express your individuality and make a statement. We believe that fashion is a powerful form of self-expression, and our goal is to provide you with the perfect pieces to showcase your style.
    
                            Quality is at the forefront of our ethos. We source clothing from trusted designers and brands, ensuring that every item in our collection meets the highest standards of craftsmanship. Whether you're looking for comfortable everyday essentials or eye-catching statement pieces, we have something for every occasion.</p>
                        <h3>Custom your own unique design</h3>
                        <h3>Different style of outfit</h3>
                        <h3>Super cozy & flexible</h3>
                    </div>
                    <div class="img-clothes">
    
                    </div>
                </div>
            </div>
            <!-- ************************  section 1 "header"  ********************************-->
            <div class="info-container">
              <div class="contact-box">
                  <h3>Spotlight</h3>
                  <div>
                      <i class="fab fa-facebook"></i>
                      <i class="fab fa-instagram"></i>
                      <i class="fab fa-skype"></i> 
                  </div>
              </div>

              <div class="contact-box line">
                  <p>What's to wear</p>
                  <p>Vacation wear</p>
                  <p>Day-Off Uniform</p>
                  <p>Party Look</p>
              </div>

              <div class="contact-box line">
                  <p>SERVICES</p>
                  <p>Sample Development</p>
                  <p>Label Tag Packaging</p>
                  <p>Global Shipping</p>
              </div>

              <div class="contact-box line">
                  <p>INFO</p>
                  <p>About Us</p>
                  <p>Blog</p>
                  <p>FAQ</p>
              </div>

              <div class="contact-box line">
                  <p>CONTACT US</p>
                  <p>+855 12 74 324</p>
                  <p>hello@gmail.com </p>
                  <p>Phnom Penh Cambodia</p>
              </div>
          </div>

          </div>

</template>
<style src="../assets/css/60-fullEcommerce.css"></style>