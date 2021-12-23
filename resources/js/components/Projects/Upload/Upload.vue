<template>
<div>
    <div class="position-fixed start-0 top-0 w-100 h-100 bg-dark opacity-50" v-on:click="end">
    </div>
    <div class="position-fixed start-0 top-0 w-100 d-flex justify-content-center p-5 shadow-xl">
        <div class="card bg-dark rounded-0 border-secondary p-5 col-lg-6 col-xl-4 col-11">

            <h1 class="text-secondary">
                Přihlásit projekt
            </h1>

            <div class="card border-secondary rounded-0 bg-dark mb-2 p-2 text-secondary" v-if="error">
                {{ error }}
            </div>

            <input type="text" class="form-control bg-dark border-secondary shadow-none rounded-0 mb-2 text-secondary" placeholder="Projekt" v-model="name">
            <input type="text" class="form-control bg-dark border-secondary shadow-none rounded-0 mb-2 text-secondary" placeholder="Popis" v-model="description">
            <input type="url" class="form-control bg-dark border-secondary shadow-none rounded-0 text-secondary" placeholder="Odkaz na repozitář s kódem" v-model="code_url">
            <input type="url" class="form-control bg-dark border-secondary shadow-none rounded-0 text-secondary" placeholder="(Nepovinné) odkaz na web" v-model="production_url">

            <button v-on:click="upload" class="btn btn-outline-secondary rounded-0 col-4 mt-2">
               Nahrát
            </button>
       </div>
    </div></div>
</template>

<script>
export default {
    data() {
        return {
            name: null,
            description: null,
            code_url: null,
            production_url: null,
            error: null,
        }
    },
    methods: {
        end() {
            this.$parent.shown = false;
        },
        upload() {
            if (this.name == null || this.description == null || this.code_url == null)
                return this.error = 'Některá povinná pole nebyla vyplněna!';

            if (!new RegExp("^(https?:\/\/)?git(hub|lab|bucket).com\/.+$").test(this.code_url))
                return this.error = 'Špatný odkaz! Odkaz musí dodržet regulární výraz /https?://git(hub|lab|bucket).com/.+/';

            axios.post(`/api/projects/`, {
                    competition_id: this.$parent.$parent.id,
                    name: this.name,
                    description: this.description,
                    code_url: this.code_url,
                    production_url: this.production_url,
                })
                .then(res => {
                    if (res.status == 201)
                    {
                        this.$parent.$parent.projects.push(res.data);
                        this.end();
                    }
                })
                .catch(err => {
                    if (err.response.status == 421)
                        this.error = err.response.data.errors.join('; ');
                    else
                        alert('Při přihlašování projektu do soutěže došlo k chybě! Zkus to znovu.');
                });
            }
    }
}
</script>
