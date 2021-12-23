<template>
    <div class="card p-3 shadow-lg bg-dark">
        <h1 class="text-secondary">
            {{ name }}
        </h1>
        <p class="text-primary">
            Od {{ dateFormat(from) }} do {{ dateFormat(to) }}
        </p>

        <button v-on:click="show" class="btn btn-outline-secondary rounded-0">Zobrazit soutěž</button>
    </div>
</template>

<script>

import Projects from '../Projects/Projects.vue';

export default {
    props: [
        'id',
        'name',
        'from',
        'to',
    ],
    methods: {
        show() {
            this.$parent.$parent.id = this.id
            this.$parent.$parent.component = Projects;
        },
        dateFormat(date_string) {
            return new Date(date_string)
                .toLocaleString(
                    'cs-CZ',
                    {
                        weekday: 'long',
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric',
                    },
                );
        }
    },
}
</script>
