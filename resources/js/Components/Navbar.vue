<script setup>
import { Link, router } from "@inertiajs/vue3";
import DarkModeButton from "@/Components/DarkModeButton.vue";
import NavLink from "./NavLink.vue";

const props = defineProps({});
</script>

<template>
    <header class="antialiased">
        <nav
            class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800"
        >
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                    <Link href="/" class="flex mr-4">
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900 dark:text-gray-200"
                        >
                            {{ $page.props.appName }}
                        </span>
                    </Link>

                    <button
                        data-collapse-toggle="navbar-sticky"
                        type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
                    </button>
                </div>

                <!-- Nav Links -->
                <div
                    class="hidden w-full md:flex md:w-auto lg:order-1"
                    id="navbar-sticky"
                >
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-medium md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0"
                    ></ul>
                </div>

                <div class="flex items-center lg:order-2">
                    <DarkModeButton />

                    <!-- Notifications -->

                    <!-- Dropdown menu -->

                    <!-- Dropdown menu -->
                    <div
                        class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown"
                    ></div>
                </div>
            </div>
        </nav>
    </header>
</template>
