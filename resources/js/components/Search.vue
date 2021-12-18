<template>
    <div class="d-flex justify-content-center w-screen">
        <input type="text" v-model="query" class="m-5">
    </div>
</template>

<script>
export default {
    data() {
        return {
            query: ""
        }
    },
    watch: {
        query(query) {
            this.$parent.projects.forEach((project, index) => {
                this.$parent.projects[index].shown = new RegExp(query).test(project.project)
            })
        }
    }
}
</script>
