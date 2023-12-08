<template>
    <MainLayout title="Digimons">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
            <template v-for="digimon in digimons.content">
                <DigimonCard :digimon="digimon" />
            </template>
        </div>
        <Pagination :pagination="digimons.pageable" :queryString="queryString"/>
    </MainLayout>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import DigimonCard from '@/Components/Digimons/DigimonCard.vue';
import Pagination from "@/Components/Digimons/Pagination.vue";

defineProps({
    digimons: {
        type: Object,
        required: true,
    },
    queryString: {
        type: Object,
        required: true,
    }
});
</script>

<style scoped></style>