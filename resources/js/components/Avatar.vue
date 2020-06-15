<template>
<div>
    <my-upload field="img"
               @crop-success="cropSuccess"
               @crop-upload-success="cropUploadSuccess"
               @crop-upload-fail="cropUploadFail"
               v-model="show"
               :width="300"
               :height="300"
               url="/avatar"
               :params="params"
               :headers="headers"
               img-format="png"></my-upload>
    <figure class="image is-128x128">
        <img :src="imgDataUrl">
    </figure>
    <a class="btn" @click="toggleShow">プロフィール画像を設定</a>
</div>
</template>

<script>
    import 'babel-polyfill'; // es6 shim
    import Vue from 'vue';
    import myUpload from 'vue-image-crop-upload';
    export default {
        props:['avatar'],
        data() {
            return {
                show: false,
                params: {
                    _token: Laravel.csrfToken,
                    name: 'img'
                },
                headers: {
                    smail: '*_~'
                },
                imgDataUrl: this.avatar
            }
        },
        components: {
            'my-upload': myUpload
        },
        methods: {
            toggleShow() {
                this.show = !this.show;
            },
            cropSuccess(imgDataUrl, field) {
                console.log('-------- crop success --------');
                this.imgDataUrl = imgDataUrl;
            },
            cropUploadSuccess(response, field) {
                console.log('-------- upload success --------');
                console.log(response);
                console.log('field: ' + field);
            },

            cropUploadFail(status, field) {
                console.log('-------- upload fail --------');
                console.log(status);
                console.log('field: ' + field);
            }
        }
    }
</script>

<style scoped>

</style>
