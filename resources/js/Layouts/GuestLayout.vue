<script setup>
import { onMounted } from "vue";
import Navbar from "@/Components/Navbar.vue";
import { initFlowbite } from "flowbite";

onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <Navbar />

    <div
        class="flex justify-center bg-gray-100 dark:bg-gray-900 overflow-hidden relative"
    >
        <div
            id="main-content"
            class="mb-16 mt-8 w-full max-w-screen-2xl px-4 dark:text-gray-400 md:px-12"
        >
            <main :key="$page.component">
                <div class="px-4 pt-6 grid grid-cols-4 gap-4 dark:bg-gray-900">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
