<template>
    <div
        class="rounded-lg mt-4 bg-white shadow flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6"
    >
        <div class="sm:flex sm:items-center sm:justify-between w-full">
            <div>
                <p class="hidden text-sm text-gray-700 sm:block">
                    Page
                    <span class="font-medium">{{ pagination.currentPage + 1 }}</span>
                    to
                    <span class="font-medium">{{ pagination.totalPages }}</span>
                    of
                    <span class="font-medium">{{ pagination.totalElements }}</span>
                    results
                </p>
            </div>
            <div class="flex justify-between">
                <button
                    :disabled="pagination.currentPage === 0"
                    type="button"
                    @click="previousPage"
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Previous
                </button>
                <button
                    :disabled="pagination.currentPage === pagination.totalPages - 1"
                    type="button"
                    @click="nextPage"
                    class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>
<script setup>
import { router } from '@inertiajs/vue3';

let props = defineProps({
    pagination: {
        type: Object,
        required: true,
    },
    queryString: {
        type: Object,
        required: true,
    },
});

let nextPage = () => {
    router.get(
        route('digimons.index', {
            pageSize: props.queryString.pageSize,
            page: Number(props.queryString.page) + 1,
        }),
    );
};

let previousPage = () => {
    router.get(
        route('digimons.index', {
            pageSize: props.queryString.pageSize,
            page: Number(props.queryString.page) - 1,
        }),
    );
};
</script>
<style scoped></style>