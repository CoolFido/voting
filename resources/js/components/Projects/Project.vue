<template>
    <div class="col-xl-5 col-lg-6 col-11 d-block mx-auto m-2">
        <div class="card p-3 shadow-lg bg-dark">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center col-9">
                    <img :src="avatar" :alt="author" class="w-25 rounded-circle">
                    <div class="ms-3">
                        <div>{{ author }}</div>
                        <h3 class="text-secondary">
                            {{ project }}
                        </h3>
                        <p>{{ description }}</p>
                    </div>
                </div>
                <div class="me-3 col-3 text-end">
                    <a
                        class="btn btn-outline-secondary rounded-0"
                        :href="code_url"
                    >
                        Repozitář
                    </a>
                    <a
                        class="btn btn-outline-secondary rounded-0"
                        :href="production_url"
                        v-if="production_url"
                    >
                        Odkaz
                    </a>
                </div>
            </div>
        </div>
        <evaluation :given_score="given_score"></evaluation>
    </div>
</template>

<script>
import Evaluation from './Evaluation.vue';

export default {
    props: [
        'project',
        'author',
        'avatar',
        'id',
        'description',
        'given_score',
        'code_url',
        'production_url',
    ],
    data() {
        return {
            evaluation: false,
        }
    },
    components: {
        Evaluation,
    },
}
</script>
