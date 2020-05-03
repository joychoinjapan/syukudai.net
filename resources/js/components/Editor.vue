<template>

        <ckeditor v-model="editorData" :config="editorConfig"></ckeditor>

</template>

<script>
    export default {
        name: 'ckeditor',
        data() {
            return {
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {
                    // The configuration of the editor.
                }
            };
        }
    }
</script>

<style scoped>

</style>
