<script>
// import onMounted from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();

// onMounted(() => {
// console.log(page.props.players);
// });
</script>

<template>
    <table>
        <thead>
            <th>Name</th>
        </thead>

        <tbody>
            <!-- {{
                $page.props.players
            }} -->
            <tr v-for="player in $page.props.players.data">
                <td>
                    <a :href="route('players.show', player.id)">{{
                        player.lastname
                    }}</a>
                </td>
            </tr>
        </tbody>
    </table>

    <a
        :href="$page.props.players.prev_page_url"
        style="margin-right: 10px; margin-top: 10px"
        >Prev</a
    >
    <a :href="$page.props.players.next_page_url">Next</a>
</template>
