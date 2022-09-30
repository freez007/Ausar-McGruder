<script setup>

import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {notify} from "@kyvg/vue3-notification";

const form = useForm({
    firstName: '',
    lastName: '',
    middleName: '',
    dateOfBirth: '2022-09-30',
    remember: false
});

const submit = () => {
    form.post(route('home'), {
        onSuccess: () => {
            notify({
                title: "Form submitted successfully",
                text: "Test send done",
                type: 'success',
            });
        },
    });
};

</script>
<template>
    <form @submit.prevent="submit" class="w-full max-w-lg form-test">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <InputLabel for="firstName" value="First Name" />
                <TextInput id="firstName" type="text" class="mt-1 block w-full" v-model="form.firstName" />
                <InputError class="mt-2" :message="form.errors.firstName" />
            </div>
            <div class="w-full md:w-1/2 px-3">
                <InputLabel for="lastName" value="Last Name" />
                <TextInput id="lastName" type="text" class="mt-1 block w-full" v-model="form.lastName" />
                <InputError class="mt-2" :message="form.errors.lastName" />
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <InputLabel for="middleName" value="Middle Name" />
                <TextInput id="middleName" type="text" class="mt-1 block w-full" v-model="form.middleName" />
                <InputError class="mt-2" :message="form.errors.middleName" />
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <InputLabel for="middleName" value="Date of birth" />
                <TextInput id="middleName" type="date" class="mt-1 block w-full" v-model="form.dateOfBirth" />
                <InputError class="mt-2" :message="form.errors.dateOfBirth" />
            </div>
        </div>
        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Submit</PrimaryButton>
    </form>
    <notifications />
</template>

<style scoped lang="scss">
.form-test {
    padding-top: 20%;
}
</style>
