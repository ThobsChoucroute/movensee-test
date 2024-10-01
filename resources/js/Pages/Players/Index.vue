<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link, usePage, router } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import {
    FwbTable,
    FwbTableBody,
    FwbTableCell,
    FwbTableHead,
    FwbTableHeadCell,
    FwbTableRow,
} from "flowbite-vue";
import TablePagination from "@/Components/TablePagination.vue";

const page = usePage();

const filters = ref({});
const filterByTeam = ref();
const filterByRole = ref();

onMounted(() => {
    filterByTeam.value = route().params.filterByTeam
        ? route().params.filterByTeam
        : null;

    filterByRole.value = route().params.filterByRole
        ? route().params.filterByRole
        : null;
});

const filterTeam = (e) => {
    filterByTeam.value = e.target.value;
    console.log(filterByTeam.value);

    // To add all previous parameters in the next request
    Object.entries(route().params).forEach((param) => {
        filters.value[param[0]] = param[1];
    });

    if (filterByTeam.value == "null") {
        delete filters.value.filterByTeam;
    } else {
        filters.value.filterByTeam = filterByTeam.value;
    }

    router.get(route("players.index"), filters.value, {
        only: ["players"],
        preserveScroll: true,
        preserveState: true,
    });
};

const filterRole = (e) => {
    filterByRole.value = e.target.value;

    // To add all previous parameters in the next request
    Object.entries(route().params).forEach((param) => {
        filters.value[param[0]] = param[1];
    });

    if (filterByRole.value == "null") {
        delete filters.value.filterByRole;
    } else {
        filters.value.filterByRole = filterByRole.value;
    }

    router.get(route("players.index"), filters.value, {
        only: ["players"],
        preserveScroll: true,
        preserveState: true,
    });
};

defineOptions({ layout: GuestLayout });
</script>

<template>
    <div class="grid grid-cols-6 col-span-4 gap-4">
        <div class="col-span-1 space-y-2">
            <label for="teams" class="font-semibold">
                {{ __("Filter by teams") }}
            </label>

            <select
                id="teams"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                @change="filterTeam"
            >
                <option selected disabled>{{ __("Select Team") }}</option>
                <option value="null">{{ __("None") }}</option>
                <option
                    :value="team.id"
                    v-for="team in $page.props.teams"
                    :selected="filterByTeam == team.id"
                >
                    {{ team.name }}
                </option>
            </select>
        </div>

        <div class="col-span-1 space-y-2">
            <label for="roles" class="font-semibold">
                {{ __("Filter by roles") }}
            </label>

            <select
                id="roles"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                @change="filterRole"
            >
                <option selected disabled>{{ __("Select Role") }}</option>
                <option value="null">{{ __("None") }}</option>
                <option
                    :value="role.value"
                    v-for="role in $page.props.roles"
                    :selected="filterByRole == role.value"
                >
                    {{ role.label }}
                </option>
            </select>
        </div>
    </div>

    <div class="col-span-4">
        <fwb-table>
            <fwb-table-head>
                <fwb-table-head-cell>{{ __("Name") }}</fwb-table-head-cell>
                <fwb-table-head-cell>{{
                    __("Strong Foot")
                }}</fwb-table-head-cell>
                <fwb-table-head-cell>{{ __("Role") }}</fwb-table-head-cell>
                <fwb-table-head-cell>
                    {{ __("Arrived At") }}
                </fwb-table-head-cell>
                <fwb-table-head-cell></fwb-table-head-cell>
            </fwb-table-head>

            <fwb-table-body>
                <fwb-table-row v-for="player in $page.props.players.data">
                    <fwb-table-cell>
                        <Link
                            :href="route('players.show', player.id)"
                            class="hover:underline"
                            preserve-scroll
                            preserve-state
                        >
                            {{ player.lastname }}
                            {{ player.firstname }}
                        </Link>
                    </fwb-table-cell>

                    <fwb-table-cell>
                        {{ __(player.strong_foot) }}
                    </fwb-table-cell>

                    <fwb-table-cell>{{ player.role }}</fwb-table-cell>

                    <fwb-table-cell>{{ player.arrived_at }}</fwb-table-cell>

                    <fwb-table-cell></fwb-table-cell>
                </fwb-table-row>
            </fwb-table-body>
        </fwb-table>

        <TablePagination
            :table="$page.props.players"
            class="mt-4"
        ></TablePagination>
    </div>
</template>
