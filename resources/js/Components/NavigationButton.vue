<script setup>
import { Link } from "@inertiajs/vue3";
import AlternativeButton from "@/Components/AlternativeButton.vue";

const props = defineProps({
    icon: {
        type: String,
        required: true,
    },
    link: {
        required: true,
    },
});
</script>

<template>
    <Link :href="link" v-if="link" preserve-scroll>
        <AlternativeButton :icon="icon" />
    </Link>

    <AlternativeButton
        :icon="icon"
        class="cursor-not-allowed"
        disabled
        v-else
    />
</template>
