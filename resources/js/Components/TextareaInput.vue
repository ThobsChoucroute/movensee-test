<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
    required: true
});

const input = ref(null);

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <textarea 
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Leave a comment..."
        rows="4"
        v-model="model"
        ref="input"
    ></textarea>
</template>
