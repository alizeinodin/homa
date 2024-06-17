<script setup>
import Twitter from "vue-material-design-icons/Twitter.vue";
import MenuItem from "@/Components/MenuItem.vue";
import Feather from "vue-material-design-icons/Feather.vue";
import {ref} from "vue";

const createTweet = ref(false)


</script>

<template>
    <div class="lg:w-3/12 w-[60px] h-[100vh] max-w-[350px] lg:px-4 lg:mx-auto">
        <div class="p-2 px-3 mb-4">
            <Twitter fill-color="#FFFFFF" :size="37"/>
        </div>

        <MenuItem iconString="Home"/>
        <MenuItem iconString="Explore"/>
        <MenuItem iconString="Notifications"/>
        <MenuItem iconString="Messages"/>
        <MenuItem iconString="Profile"/>

        <button
            @click="createTweet = true"
            class="lg:w-full mt-8 ml-2 text-white font-extrabold text-[22px] bg-[#1C9CEF] p-3 px-3 rounded-full cursor-pointer">
            <span class="lg:block hidden">Tweet</span>
            <span class="block lg:hidden"><Feather/></span>
        </button>
    </div>
</template>
