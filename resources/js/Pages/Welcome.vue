<script setup>
import { Head } from '@inertiajs/vue3';
import BaseLayout from '@/Layouts/BaseLayout.vue';
import Tweet from '@/Components/Tweet/ShowTweet.vue';

defineProps({ tweets: Array });
</script>

<template>
    <Head title="Home" />
    <BaseLayout>
        <div class="text-white">
            <div
                v-for="tweet in tweets"
                :key="tweet.id"
                class="flex border-b border-b-gray-800"
            >
                <Tweet :tweet="tweet" />
            </div>
        </div>
    </BaseLayout>
</template>
