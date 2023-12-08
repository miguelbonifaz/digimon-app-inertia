<template>
    <MainLayout title="Digimons">
        <div class="flex justify-end mb-4">
            <div>
                <label for="pageSize" class="block text-sm font-medium leading-6 text-gray-900"
                    >Pagination</label
                >
                <select
                    @change="handlePageSize"
                    v-model="queryString.pageSize"
                    id="pageSize"
                    name="pageSize"
                    class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
            <template v-for="digimon in digimons.content">
                <DigimonCard :digimon="digimon" />
            </template>
        </div>
        <Pagination :pagination="digimons.pageable" :queryString="queryString" />
    </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import DigimonCard from '@/Components/Digimons/DigimonCard.vue';
import Pagination from '@/Components/Digimons/Pagination.vue';
import { router } from '@inertiajs/vue3';

let props = defineProps({
    digimons: {
        type: Object,
        required: true,
    },
    queryString: {
        type: Object,
        required: true,
    },
});

let handlePageSize = (e) => {
    router.get(
        route('digimons.index', {
            ...props.queryString,
            pageSize: e.target.value,
        }),
    );
};
</script>

<style scoped></style>