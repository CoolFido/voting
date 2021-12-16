<template>
    <div class="col-xl-3 col-lg-4 col-sm-6 m-4">
        <div class="card p-3 shadow-lg bg-dark">
            <div class="d-flex">
                <img :src="avatar" alt="" class="w-25 rounded-circle">
                <div class="ms-3">
                    <div class="text-primary">{{ author }}</div>
                    <h3 class="text-secondary">{{ project }}</h3>
                </div>
            </div>                
        </div>
        <evaluation></evaluation>
    </div> 
</template>

<script>

import Evaluation from './Evaluation.vue';

export default {
    data() {
        return {
            // todo
            avatar: 'https://avatars.githubusercontent.com/u/61601336?v=4',
            author: 'Vak modry',
            project: 'Lemon',
        }
    },
    components: {
        Evaluation,
    },
}
</script>
