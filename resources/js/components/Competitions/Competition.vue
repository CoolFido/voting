<template>
    <div class="col-xl-4 col-lg-6 m-4">
        <div class="card p-3 shadow-lg bg-dark">
            {{ name }} {{ from }} {{ to }}
            <button v-on:click="show">toz klikaj</button>
        </div>
   </div>
</template>

<script>

import Projects from "../Projects/Projects.vue";

export default {
    props: [
        "id",
        "name",
        "from",
        "to"
    ],
    methods: {
        show() {
            this.$parent.$parent.id = this.id
            this.$parent.$parent.component = Projects;
        }
    }
}
</script>
