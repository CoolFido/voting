<template>
    <div class="card p-4 shadow-lg bg-dark mt-1">
        <div class="d-flex justify-content-between">
            <div v-for="point in points" :key="point">
                <button
                    class="btn btn-outline-secondary shadow-none"
                    :class="{ 'bg-secondary text-dark': score == point + 1 }"
                    v-on:click="evaluate(point + 1)"
                >
                    {{ point + 1 }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'given_score',
    ],
    data() {
        return {
            points: [...Array(10).keys()],
            score: null,
        }
    },
    mounted() {
        this.score = this.given_score;
    },
    methods: {
        evaluate(points) {
            if (this.score == points)
                return axios.post(`/api/projects/${this.$parent.id}/unevaluate`)
                    .then(res => this.score = null)
                    .catch(err => alert('Při změně hodnocení došlo k chybě! Zkus to prosím znovu.'))

            axios.post(`/api/projects/${this.$parent.id}`, {
                    score: points,
                })
                .then(res => this.score = points)
                .catch(err => alert('Při změně hodnocení došlo k chybě! Zkus to prosím znovu.'));
        },
    },
}
</script>
