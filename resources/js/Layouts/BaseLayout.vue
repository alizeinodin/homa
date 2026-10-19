<script setup>
import {ref} from 'vue';
import Twitter from 'vue-material-design-icons/Twitter.vue'
import Magnify from 'vue-material-design-icons/Magnify.vue'
import DotsHorizontal from 'vue-material-design-icons/DotsHorizontal.vue'
import Feather from 'vue-material-design-icons/Feather.vue'
import MenuItem from '@/Components/MenuItem.vue'
import CreateTweet from "@/Components/Tweet/CreateTweet.vue";

const randImg2 = ref('https://picsum.photos/seed/homa/100')
const createTweet = ref(false)

</script>

<template>
    <div class="fixed w-full">
        <div class="max-w-[1400px] flex mx-auto">
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
            <div class="lg:w-7/12 w-11/12 border-x border-gray-800 relative">
                <div class="bg-black bg-opacity-50 backdrop-blur-md z-10 relative w-full">
                    <div class="border-gray-800 border-b w-full">
                        <div class="flex">
                            <div
                                class="flex items-center justify-center w-full h-[60px] text-white text-[17px] font-extrabold p-4 hover:bg-gray-500 hover:bg-opacity-30 cursor-pointer transition duration-200 ease-in-out">
                                <div class="inline-block text-center border-b-4 border-b-[#1C9CEF] h-[60px]">
                                    <div class="my-auto mt-4">For you</div>
                                </div>
                            </div>
                            <div
                                class="w-full h-[60px] text-gray-500 text-[17px] font-extrabold p-4 hover:bg-gray-500 hover:bg-opacity-30 cursor-pointer transition duration-200 ease-in-out">
                                <div class="text-center">Following</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute top-0 z-0 h-full overflow-auto">
                    <div class="mt-[60px]"></div>
                    <slot/>
                    <div class="pb-4"></div>
                </div>

            </div>

            <div class="lg:block hidden lg:w-4/12 h-screen border-l border-gray-800 pl-4">
                <div class="w-full p-1 mt-2 px-4 lg:flex items-center rounded-full hidden bg-[#212327]">
                    <Magnify fill-color="#5e5c5c" :size="25"/>
                    <input type="text" placeholder="Search Twitter"
                           class="appearance-none w-full border-0 py-2 bg-[#212327] text-gray-100 placeholder-gray-500 leading-tight focus:ring-0">
                </div>

                <div class="w-full mt-4 rounded-lg lg:block hidden bg-[#212327]">
                    <div class="w-full p-4 text-white font-extrabold mb-6 text-[20px]">
                        What's happening
                    </div>

                    <div class="h-[80px] hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                        <div class="flex p-3 justify-between h-[80px] py-3">
                            <div>
                                <div class="text-[14px] text-gray-400">Tennis Tournament LIVE</div>
                                <div class="w-full text-white font-extrabold mb-6 text-[17px]">Australian Open 2023
                                </div>
                            </div>
                            <img class="rounded-xl" :src="randImg2" alt="">
                        </div>
                    </div>

                    <div class="hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                        <div class="flex p-3 justify-between">
                            <div>
                                <div class="text-[14px] text-gray-400">Trending in United Kingdom</div>
                                <div class="w-full text-white font-extrabold text-[17px]">Doomsday Clock</div>
                                <div class="text-[14px] text-gray-400">5,921 Tweets</div>
                            </div>
                            <DotsHorizontal fill-color="#5e5c5c"/>
                        </div>
                    </div>

                    <div class="hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                        <div class="flex p-3 justify-between">
                            <div>
                                <div class="text-[14px] text-gray-400">Politics . Trending</div>
                                <div class="w-full text-white font-extrabold text-[17px]">Sunak</div>
                                <div class="text-[14px] text-gray-400">98,745 Tweets</div>
                            </div>
                            <DotsHorizontal fill-color="#5e5c5c"/>
                        </div>
                    </div>

                    <div class="hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                        <div class="flex p-3 justify-between ">
                            <div>
                                <div class="text-[14px] text-gray-400">Sports . Trending</div>
                                <div class="w-full text-white font-extrabold text-[17px]">Poro</div>
                                <div class="text-[14px] text-gray-400">12,432 Tweets</div>
                            </div>
                            <DotsHorizontal fill-color="#5e5c5c"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <CreateTweet
            :create-tweet="createTweet"
            @on-close="createTweet = false"
        />
    </div>
</template>

<style>
body {
    background-color: #000;
}
</style>
