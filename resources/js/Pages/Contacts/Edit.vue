<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Link, Head, router} from '@inertiajs/vue3';
import {computed, reactive} from "vue";

const props = defineProps({
    contact: Object,
    accounts: Array
})

const form = reactive({
    first_name: props.contact.first_name,
    last_name: props.contact.last_name,
    email: props.contact.email,
    phone: props.contact.phone,
    position: props.contact.position,
    account_id: props.contact.account_id,
    errors: []
})
const title = computed(() => `Edit - ${props.contact.first_name} ${props.contact.last_name}`)

function submit() {
    router.put(`/contacts/${props.contact.id}`, form, {
        onError: (errors) => form.errors = errors
    })
}

function deleteContact() {
    router.delete(`/contacts/${props.contact.id}`, {
        onError: (errors) => form.errors = errors
    })
}
</script>

<template>
    <Head :title="title" />

    <BreezeAuthenticatedLayout>
        <div class="max-w-screen-lg mx-auto my-6 space-y-6">
            <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Contact Information</h3>
                        <ul class="mt-6">
                            <li class="text-red-500" v-for="error in form.errors">{{ error }}</li>
                        </ul>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form @submit.prevent="submit()">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input
                                        id="first-name"
                                        v-model="form.first_name"
                                        type="text"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    >
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input
                                        id="last-name"
                                        v-model="form.last_name"
                                        type="text"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    >
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input
                                        id="email"
                                        v-model="form.email"
                                        type="email"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    >
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                    <input
                                        id="phone"
                                        v-model="form.phone"
                                        type="tel"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    >
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="position" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input
                                        id="position"
                                        v-model="form.position"
                                        type="text"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    >
                                </div>

                                <div class="col-span-6">
                                    <label for="account_id" class="block text-sm font-medium text-gray-700">Account</label>
                                    <select
                                        id="account_id"
                                        v-model="form.account_id"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    >
                                        <option
                                            v-for="account in accounts"
                                            :key="account.id"
                                            :value="account.id"
                                            :selected="account.id === form.account_id"
                                        >
                                            {{ account.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-between mt-6">
                                <button
                                    @click="deleteContact()"
                                    type="button"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                >
                                    Delete
                                </button>
                                <div>
                                    <Link :href="route('contacts.index')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</Link>
                                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
