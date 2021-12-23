<template>
    <div>
        <div 
            v-for="competition in competitions"
            :key="competition.id"
            class="d-block mx-auto col-xl-4 col-lg-6 m-4"
        >
            <competition
                :id="competition.id"
                :name="competition.name"
                :from="competition.from"
                :to="competition.to"
            />
        </div>
    </div>
</template>

<script>

import Competition from "./Competition.vue";

export default {
    data() {
        return {
            competitions: []
        }
    },
    mounted() {
        axios.get("/api/competitions")
        .then(response => this.competitions = response.data)
    },
    components: {
        Competition
    }
}
</script>
