<script setup>
import SvgIcon from "@/Components/SvgIcon.vue";

const props = defineProps({
    loading: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <button
        type="button"
        class="inline-flex items-center px-3 py-2 space-x-2 text-base font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 sm:w-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition ease-in-out duration-150"
        :disabled="loading"
        :class="{ 'opacity-25': loading }"
    >
        <SvgIcon
            class="w-4 h-4 mr-2"
            v-if="loading"
            icon="sync"
            :loading="true"
        />
        <slot />
    </button>
</template>
