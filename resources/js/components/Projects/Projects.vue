<template>
<div>
    <search></search>
    <div class="min-vh-100 container">
        <div class="row d-flex justify-content-center">
            <project
                :project="project.project"
                :author="project.author"
                :avatar="project.avatar"
                :shown="project.shown"
                v-for="(project, index) in projects" 
                v-bind:key="index"
            />
       </div>
   </div>
</div>
</template>

<script>

import Project from "./Project.vue"
import Search from "./Search.vue"

export default {
    props: [
        "id"
    ],
    data() {
        return {
            projects: []
        }
    },
    mounted() {
        axios.get(`/api/competitions/${this.id}`)
        .then(response => {
            this.projects = response.data["projects"]
        })
    },
    components: {
        Project,
        Search
    }
}
</script>
