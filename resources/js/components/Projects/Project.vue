<template>
    <div 
        class="col-xl-4 col-lg-6 m-4"
        v-if="shown"
    >
        <div class="card p-3 shadow-lg bg-dark">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img :src="avatar" :alt="author" class="w-25 rounded-circle">
                    <div class="ms-3">
                        <div class="text-primary">{{ author }}</div>
                        <h3 class="text-secondary">{{ project }}</h3>
                    </div>
                </div>
                <div class="ms-3">
                    <button 
                        v-on:click="evaluation = !evaluation" 
                        class="btn btn-outline-secondary rounded-0"
                    >
                        Evaluate
                    </button>
                </div>
            </div>                
        </div>
        <evaluation v-if="evaluation"></evaluation>
    </div>
</template>

<script>

import Evaluation from './Evaluation.vue';

export default {
    props: [
        "project",
        "author",
        "avatar",
        "shown"
    ],
    data() {
        return {
            evaluation: false
        }
    },
    components: {
        Evaluation,
    }
}
</script>
