<template>
  <Page></Page>
  <Collaboration></Collaboration>
  <Slider></Slider>
  <ProductList></ProductList>
  <WhyUs></WhyUs>
  <AboutUs></AboutUs>
</template>
<script>
  import Page from '../components/CoverHomePage.vue'
  import Collaboration from '../components/Collaboration.vue'
  import Slider from '../components/Slider.vue';
  import ProductList from '@/components/ProductList.vue';
  import WhyUs from '../components/WhyUs.vue';
  import AboutUs from '../components/AboutUs.vue';

  export default{
    components:{
      Page,
      Collaboration,
      Slider,
      ProductList,
      WhyUs,
      AboutUs
    }
  }
</script>
