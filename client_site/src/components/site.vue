<template>
    <div class="slideshow-container">
        <div v-for="(slide, index) in slides" :key="index" class="mySlides fade" v-show="currentSlide === index">
            <img :src="slide.image" style="width:100%">
            <div class="text">{{ slide.caption }}</div>
        </div>
        <a class="prev" @click="changeSlide(-1)">&#10094;</a>
        <a class="next" @click="changeSlide(1)">&#10095;</a>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const slides = ref([
    { image: 'img1.jpg', caption: 'Caption 1' },
    { image: 'img2.jpg', caption: 'Caption 2' },
    { image: 'img3.jpg', caption: 'Caption 3' }
]);

const currentSlide = ref(0);

function changeSlide(n) {
    currentSlide.value = (currentSlide.value + n + slides.value.length) % slides.value.length;
}
</script>

<style scoped>
.slideshow-container {
    position: relative;
    max-width: 1000px;
    margin: auto;
}

.mySlides {
    display: none;
}

.mySlides img {
    width: 100%;
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
}

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
}

.text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
}
