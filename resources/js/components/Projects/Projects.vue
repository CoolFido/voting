<template>
<div>
    <div class="min-vh-100 ">
        <div
            class="d-flex justify-content-center flex-column pt-5"
            v-if="loaded"
        >
            <project
                :project="project.name"
                :author="project.user.name"
                :avatar="`https://cdn.discordapp.com/avatars/${project.user.discord_id}/${project.user.avatar_hash}.png`"
                :url="project.code_url"
                :description="project.description"
                :id="project.id"
                v-for="(project, index) in projects" 
                v-bind:key="index"
            />
        </div>
        <div class="spinner-border text-secondary" role="status" v-if="!loaded">
            <span class="visually-hidden">Loading...</span>
        </div>
   </div>
   <UploadButton />
</div>
</template>

<script>
import Project from "./Project.vue"
import UploadButton from "./Upload/Button.vue"

export default {
    props: [
        "id"
    ],
    data() {
        return {
            projects: [],
            loaded: false
        }
    },
    mounted() {
        axios.get(`/api/competitions/${this.id}`)
        .then(response => {
            this.projects = response.data["projects"]
        })
        this.loaded = true
    },
    components: {
        Project,
        UploadButton
    }
}
</script>
