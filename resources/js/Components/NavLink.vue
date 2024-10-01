<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const props = defineProps({
    routename: {
        type: String,
        required: true,
    },
    activeFor: {
        type: String,
        required: true,
    },
});

const page = usePage();

const linkClasses = computed(() =>
    page.component.includes(props.activeFor)
        ? "bg-gray-100 dark:bg-gray-700 text-primary-600 dark:text-primary-400"
        : "hover:text-primary-600 dark:hover:text-primary-400"
);
</script>

<template>
    <li>
        <Link
            :href="route(routename)"
            :class="linkClasses"
            class="text-gray-900 dark:text-gray-300 h-10 p-4 rounded-lg flex justify-center items-center gap-x-2"
            data-collapse-toggle="navbar-sticky"
            preserve-scroll
            preserve-state
        >
            <span class="">
                <slot />
            </span>
        </Link>
    </li>
</template>
