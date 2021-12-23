<template>
    <div>
        <upload v-if="shown"></upload>
        <i class="bi bi-upload text-secondary fs-1 position-fixed top-0 end-0 me-3" v-on:click="shown = !shown"></i>
    </div>
</template>

<script>

import Upload from './Upload.vue';

export default {
    data() {
        return {
            shown: false
        }
    },
    components: {
        Upload,
    },
}
</script>
