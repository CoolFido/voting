<template>
   <component :is="component" :id="id"></component>
</template>

<script>

import Competitions from "./Competitions/Competitions.vue";

export default {
    data() {
        return {
            component: "", 
            id: 0
        }
    },
    mounted() {
        this.component = Competitions;
    }
}
</script>
