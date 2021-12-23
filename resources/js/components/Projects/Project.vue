<template>
    <div class="col-xl-5 col-lg-6 col-11 d-block mx-auto m-2">
        <div class="card p-3 shadow-lg bg-dark">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center col-9">
                    <img :src="avatar" :alt="author" class="w-25 rounded-circle">
                    <div class="ms-3">
                        <div>{{ author }}</div>
                        <h3><a :href="url" class="text-secondary text-decoration-none">{{ project }}</a></h3>
                        <p>{{ description }}</p>
                    </div>
                </div>
                <div class="ms-3 col-3">
                    <button 
                        v-on:click="evaluation = !evaluation" 
                        class="btn btn-outline-secondary rounded-0"
                    >
                        Hodnotit 
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
        "id",
        "url",
        "description"
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
