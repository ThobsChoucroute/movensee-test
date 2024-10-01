<script setup>
defineProps({
    value: {
        type: String,
    },
    required: {
        default: false,
    },
});
</script>

<template>
    <!-- text-gray-900 dark:text-white -->
    <label
        class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400 select-none"
    >
        <span v-if="value">{{ __(value) }}</span>
        <span v-else><slot /></span>
        <span
            class="text-red-500 dark:text-red-400 font-semibold"
            v-if="required"
        >
            *
        </span>
    </label>
</template>
