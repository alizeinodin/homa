<script setup>

import ChevronDown from "vue-material-design-icons/ChevronDown.vue";
import Earth from "vue-material-design-icons/Earth.vue";
import Close from "vue-material-design-icons/Close.vue";
import ArrowLeft from "vue-material-design-icons/ArrowLeft.vue";
import FileGifBox from "vue-material-design-icons/FileGifBox.vue";
import Emoticon from "vue-material-design-icons/Emoticon.vue";
import ImageOutline from "vue-material-design-icons/ImageOutline.vue";
import {router} from "@inertiajs/vue3";
import {ref, toRef} from "vue";

const props = defineProps({
    createTweet: Boolean
})

const emit = defineEmits([
    'onClose'
])

const tweet = ref('')
const file = ref('')
const createTweet = toRef(props, 'createTweet')
const textarea = ref(null)
const showUpload = ref('')
const uploadType = ref('')
const closeMessageBox = () => {
    tweet.value = ''
    showUpload.value = ''
    uploadType.value = ''

    emit('onClose')
}

const textareaInput = (e) => {
    textarea.value.style.height = "auto";
    textarea.value.style.height = `${e.target.scrollHeight}px`;
}

const addTweet = () => {
    if (!tweet.value) return

    let data = new FormData()

    data.append('tweet', tweet.value)
    data.append('file', file.value)

    router.post(route('tweets.store'), data)

    closeMessageBox()
}

</script>

<template>
    <div id="OverlaySection" v-if="createTweet"
         class="fixed top-0 left-0 w-full h-screen bg-black md:bg-gray-400 md:bg-opacity-30 md:p-3 z-100">
        <div class="md:max-w-2xl md:mx-auto md:mt-10 md:rounded-xl bg-black">
            <div class="flex items-center justify-between md:inline-block p-2 m-2 rounded-full cursor-pointer">
                <div @click="closeMessageBox()" class="hover:bg-gray-800 inline-block p-2 rounded-full cursor-pointer">
                    <Close fill-color="#FFFFFF" :size="28" class="md:block hidden"/>
                    <ArrowLeft fill-color="#FFFFFF" :size="28" class="md:hidden block"/>
                </div>

                <button
                    @click="addTweet"
                    :disabled="!tweet"
                    :class="tweet ? 'bg-[#1C9CEF] text-white': 'bg-[#124D77] text-gray-400'"
                    class="md:hidden font-extrabold text-[16px] p-1.5 px-4 rounded-full cursor-pointer">
                    Tweet
                </button>
            </div>

            <div class="w-full flex">
                <div class="ml-3.5 mr-2">
                    <img class="rounded-full" width="55" :src="randImg1" alt="">
                </div>
                <div class="w-[calc(100%-100px)]">
                    <div class="inline-block">
                        <div class="flex items-center border border-gray-700 rounded-full">
                            <span class="text-[#1C9CEF] p-0.5 pl-3.5 font-extrabold">Everyone</span>
                            <ChevronDown class="pr-2" fill-color="#1C9CEF" :size="25"/>
                        </div>
                    </div>
                    <div>
                        <textarea
                            :oninput="textareaInput"
                            cols="30"
                            rows="4"
                            placeholder="What's happening?"
                            v-model="tweet"
                            ref="textarea"
                            class="w-full bg-black border-0 mt-2 focus:ring-0 text-white text-[19px] font-extrabold min-h-[120px]"
                        ></textarea>
                    </div>
                    <div class="w-full">
                        <video controls v-if="uploadType === 'mp4'" :src="showUpload"
                               class="rounded-xl overflow-auto"></video>
                        <img v-else :src="showUpload" class="rounded-xl min-w-full" alt="">
                    </div>
                    <div class="flex py-2 items-center text-[#1C9CEF] font-extrabold">
                        <Earth class="pr-2" fill-color="#1C9CEF" :size="20"/>
                        Everyone can reply
                    </div>
                    <div class="border-b border-b-gray-700"></div>
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center">
                            <div class="hover:bg-gray-700 inline-block p-2 rounded-full cursor-pointer">
                                <label for="fileUpload" class="cursor-pointer">
                                    <ImageOutline fill-color="#1C9CEF" :size="25"/>
                                </label>
                                <input type="file" id="fileUpload" class="hidden" @change="getFile">
                            </div>

                            <div class="hover:bg-gray-700 inline-block p-2 rounded-full cursor-pointer">
                                <FileGifBox fill-color="#1C9CEF" :size="25"/>
                            </div>

                            <div class="hover:bg-gray-700 inline-block p-2 rounded-full cursor-pointer">
                                <Emoticon fill-color="#1C9CEF" :size="25"/>
                            </div>
                        </div>
                        <button
                            @click="addTweet"
                            :disabled="!tweet"
                            :class="tweet ? 'bg-[#1C9CEF] text-white': 'bg-[#124D77] text-gray-400'"
                            class="hidden md:block font-extrabold text-[16px] p-1.5 px-4 rounded-full cursor-pointer">
                            Tweet
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
