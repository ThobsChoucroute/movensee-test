<script setup>
import { onMounted } from "vue";
// import Navbar from "@/Components/Navs/Navbar.vue";
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
            <!-- <Transition
                enter-active-class="transition ease-in-out duration-300"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out duration-300"
                leave-to-class="opacity-0"
            >
            </Transition> -->
            <main :key="$page.component">
                <div class="px-4 pt-6 grid grid-cols-6 gap-4 dark:bg-gray-900">
                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>
