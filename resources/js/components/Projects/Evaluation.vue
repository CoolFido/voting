<template>
    <div class="card p-4 shadow-lg bg-dark mt-1">
        <div class="d-flex justify-content-between">
            <div v-for="(point, index) in points" :key="index">
                <button 
                    class="btn btn-outline-secondary shadow-none" 
                    :class="{ 'bg-secondary text-dark': evaluation == point+1 }" 
                    v-on:click="evaluate(point+1)"
                >
                    {{ point+1 }}
                </button>   
            </div>
        </div>
    </div>  
</template>


<script>
export default {
    data() {
        return {
            points: [...Array(10).keys()],
            evaluation: null     
        }
    },
    mounted() {
        axios.get(`/api/evaluations/${this.$parent.id}`)
        .then(response => {
            this.evaluation = response.data["score"]
        })
    },
    methods: {
        evaluate(points) {
            if (this.evaluation == points) {
                this.evaluation = null
                axios.post(`/api/projects/${this.$parent.id}/unevaluate`)
                return 
            }
            this.evaluation = points
            axios.post(`/api/projects/${this.$parent.id}`, {
                score: points
            })
        }
    }
}
</script>
