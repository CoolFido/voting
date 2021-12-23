<template>
<div>
    <div class="min-vh-100 w-100 d-flex justify-content-center align-items-center" v-if="!this.projects || !this.projects.length">
        <div class="spinner-border text-secondary" role="status" v-if="!this.projects">
            <span class="visually-hidden">Loading...</span>
        </div>

        <div v-else>
            <span class="h1">Bohužel v této soutěži zatím nejsou žádné projekty :(</span>
        </div>
    </div>

    <div
        class="d-flex justify-content-center flex-column pt-5"
        v-else
    >
        <project
            :project="project.name"
            :author="project.user.name"
            :avatar="`https://cdn.discordapp.com/avatars/${project.user.discord_id}/${project.user.avatar_hash}.png`"
            :description="project.description"
            :id="project.id"
            v-for="project in projects"
            :key="project.id"
            :given_score="project.given_score"
            :code_url="project.code_url"
            :production_url="project.production_url"
        />
    </div>
    <UploadButton />
</div>
</template>

<script>
import Project from './Project.vue';
import UploadButton from './Upload/Button.vue';

export default {
    props: [
        'id',
    ],
    data() {
        return {
            projects: null,
        }
    },
    mounted() {
        axios.get(`/api/competitions/${this.id}`)
            .then(res => {
                this.projects = res.data.projects;
            })
            .catch(err => alert('Při načítání projektů soutěže došlo k chybě! Zkus to znovu.'));
    },
    components: {
        Project,
        UploadButton,
    },
}
</script>
