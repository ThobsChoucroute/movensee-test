<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import TextareaInput from "@/Components/TextareaInput.vue";
import SuccessButton from "@/Components/SuccessButton.vue";

import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    message: "",
});

const submit = () => {
    form.post(route("contact.sendMail"), {
        preserveScroll: true,
        preserveState: true,
        onError: () => alert(__("Something went wrong... Please try again.")),
        onSuccess: () => {
            form.reset();
            alert("Email successfully sended !");
        },
    });
};

defineOptions({ layout: GuestLayout });
</script>

<template>
    <div
        class="col-span-4 p-4 bg-white rounded-lg shadow-md sm:p-6 dark:bg-gray-800 text-gray-900 dark:text-white"
    >
        <form @submit.prevent="submit" class="grid grid-cols-2 gap-4">
            <div class="col-span-1">
                <InputLabel for="name" value="Name" required="true" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    placeholder="Amélie Poulain"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="col-span-1">
                <InputLabel for="email" value="Email" required="true" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    placeholder="amelie.poulain@gmail.com"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="col-span-2">
                <InputLabel for="message" value="Message" required="true" />

                <TextareaInput
                    id="message"
                    class="mt-1 block w-full"
                    v-model="form.message"
                    placeholder="..."
                    required
                />

                <InputError class="mt-2" :message="form.errors.message" />
            </div>

            <div class="col-span-2 flex justify-end">
                <SuccessButton :loading="form.processing" type="submit">
                    {{ __("Send") }}
                </SuccessButton>
            </div>
        </form>
    </div>
</template>
