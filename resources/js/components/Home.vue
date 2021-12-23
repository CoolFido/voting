<template>
<div class="text-secondary"><component :is="component" :id="id"></component></div>
</template>

<script>

import Competitions from './Competitions/Competitions.vue';

export default {
    data() {
        return {
            component: '',
            id: 0
        }
    },
    mounted() {
        this.component = Competitions;
    }
}
</script>
