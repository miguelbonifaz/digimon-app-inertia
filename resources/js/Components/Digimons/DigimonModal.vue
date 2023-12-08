<template>
    <Modal @on-close-modal-click="handleCloseModal">
        <div v-if="loading" class="flex justify-center items-center">
            <span>Cargando...</span>
        </div>
        <div v-else class="flex flex-col justify-center items-center">
            <h4 class="text-2xl font-bold text-gray-800">{{ digimon.name }}</h4>
            <img :src="digimon.images[0].href" :alt="digimon.name" />
        </div>
        <div class="space-y-8" v-if="!loading">
            <div class="flex mt-4">
                <div class="flex-1" v-if="digimon.levels.length">
                    <h6 class="text-center font-bold">Level</h6>
                    <ul>
                        <template v-for="level in digimon.levels">
                            <li class="text-center text-sm">{{ level.level }}</li>
                        </template>
                    </ul>
                </div>
                <div class="flex-1" v-if="digimon.attributes.length">
                    <h6 class="text-center font-bold">Attribute</h6>
                    <ul>
                        <template v-for="attribute in digimon.attributes">
                            <li class="text-center text-sm">{{ attribute.attribute }}</li>
                        </template>
                    </ul>
                </div>
                <div class="flex-1" v-if="digimon.fields.length">
                    <h6 class="text-center font-bold">Type</h6>
                    <ul>
                        <template v-for="type in digimon.types">
                            <li class="text-center text-sm">{{ type.type }}</li>
                        </template>
                    </ul>
                </div>
            </div>
            <div v-if="digimon.fields.length">
                <h6 class="text-center font-bold">Fields</h6>
                <div class="flex justify-center gap-4 pt-2">
                    <span v-for="field in digimon.fields">
                        <img :src="field.image" :alt="field.field">
                    </span>
                </div>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import Modal from '@/Components/Modal.vue';
import { onMounted, ref } from 'vue';
import axios from 'axios';

let props = defineProps({
    digimonId: {
        type: Number,
        required: true,
    },
});

let emit = defineEmits(['onCloseModalClick']);
let loading = ref(true);
let error = ref(null);
let digimon = ref(null);

let handleCloseModal = () => {
    emit('onCloseModalClick');
};

onMounted(() => {
    let endpoint = `https://digi-api.com/api/v1/digimon/${props.digimonId}`;
    axios
        .get(endpoint)
        .then((response) => {
            digimon.value = response.data;
            loading.value = false;
        })
        .catch((err) => {
            error.value = err;
            loading.value = false;
        });
});
</script>

<style scoped></style>