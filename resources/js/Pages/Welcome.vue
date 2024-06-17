<script setup>
import {Head, Link} from '@inertiajs/vue3';
import BaseLayout from "@/Layouts/BaseLayout.vue";
import Tweet from "@/Components/Tweet/ShowTweet.vue";

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}

defineProps({tweets: Array})
</script>

<template>
    <Head title="Welcome"/>
    <BaseLayout>
        <div class="text-white">
            <div class="flex" v-for="tweet in tweets" :key="tweet">
                <Tweet :tweet="tweet"/>
            </div>
            <div class="border-b border-b-gray-800 mt-2"></div>
        </div>
    </BaseLayout>
</template>
