<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link, usePage } from "@inertiajs/vue3";
import {
    FwbA,
    FwbTable,
    FwbTableBody,
    FwbTableCell,
    FwbTableHead,
    FwbTableHeadCell,
    FwbTableRow,
} from "flowbite-vue";
import TablePagination from "@/Components/TablePagination.vue";

const page = usePage();

defineOptions({ layout: GuestLayout });
</script>

<template>
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
