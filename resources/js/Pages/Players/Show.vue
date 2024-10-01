<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineOptions({ layout: GuestLayout });
</script>

<template>
    <div class="col-span-4">
        <h1 class="text-gray-900 dark:text-gray-200 font-medium text-2xl">
            {{ $page.props.player.lastname }} -
            {{ $page.props.player.firstname }}
        </h1>
    </div>
</template>
