<script setup>
import NavigationButton from "@/Components/NavigationButton.vue";

const emit = defineEmits(["updatePerPage"]);

const props = defineProps({
    table: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div
        class="sticky bottom-0 right-0 items-center w-full sm:flex sm:justify-between"
    >
        <div class="flex items-center sm:mb-0 grid grid-cols-2">
            <span
                class="text-sm font-normal text-gray-500 dark:text-gray-400 col-span-2 mb-2"
            >
                Affiche
                <span class="font-semibold text-gray-900 dark:text-white">{{
                    table.from
                }}</span>
                -
                <span class="font-semibold text-gray-900 dark:text-white">{{
                    table.to
                }}</span>
                sur
                <span class="font-semibold text-gray-900 dark:text-white">{{
                    table.total
                }}</span>
                résultat(s)
            </span>

            <!-- <SelectPerPage class="col-span-1" :perPage="perPage" @updatePerPage="(perPage) => updatePerPage(perPage)"/> -->
        </div>

        <div class="flex items-center space-x-2">
            <NavigationButton icon="angles-left" :link="table.first_page_url" />
            <NavigationButton icon="angle-left" :link="table.prev_page_url" />
            <NavigationButton icon="angle-right" :link="table.next_page_url" />
            <NavigationButton icon="angles-right" :link="table.last_page_url" />
        </div>
    </div>
</template>
