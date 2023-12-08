<template>
    <div
        class="cursor-pointer overflow-hidden rounded-lg bg-white shadow divide-y divide-gray-200 lg:transition-all lg:duration-500 lg:ease-in-out lg:hover:scale-[1.1] lg:hover:shadow-lg"
        @click="isModalOpen = true"
    >
        <div class="flex flex-col items-center justify-center px-4 py-5 sm:p-6">
            <img :src="digimon.image" alt="" />
        </div>
        <div class="px-4 py-4 sm:px-6">
            <h2
                class="text-center text-xl font-bold text-blue-900 lg:text-base"
                v-text="digimon.name"
            ></h2>
        </div>
    </div>
    <DigimonModal :digimon-id="digimon.id" v-if="isModalOpen" @on-close-modal-click="handleCloseModal" />
</template>
<script setup>
import DigimonModal from '@/Components/Digimons/DigimonModal.vue';
import { ref } from 'vue';

let isModalOpen = ref(false);

let handleCloseModal = () => {
    isModalOpen.value = false;
};

defineProps({
    digimon: {
        type: Object,
        required: true,
    },
});
</script>

<style scoped></style>