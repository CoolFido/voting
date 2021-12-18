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
    data() {
        return {
            projects: [
                {
                    author: "Majkel",
                    avatar: "https://avatars.githubusercontent.com/u/61601336?v=4",
                    project: "Tvojemama generator",
                    shown: true
                },
                {
                    author: "Majkel",
                    avatar: "https://avatars.githubusercontent.com/u/61601336?v=4",
                    project: "pezotak api",
                    shown: true
                },
                {
                    author: "Majkel",
                    avatar: "https://avatars.githubusercontent.com/u/61601336?v=4",
                    project: "parek",
                    shown: true
                },
            ]
        }
    },
    components: {
        Project,
        Search
    }
}
</script>
