<template>
<div>
    <my-upload field="img"
               @crop-success="cropSuccess"
               @crop-upload-success="cropUploadSuccess"
               @crop-upload-fail="cropUploadFail"
               v-model="show"
               :width="300"
               :height="300"
               url="/upload"
               :params="params"
               :headers="headers"
               img-format="png"></my-upload>
    <img :src="imgDataUrl">
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
                    token: '123456798',
                    name: 'avatar'
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
            cropUploadSuccess(jsonData, field) {
                console.log('-------- upload success --------');
                console.log(jsonData);
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
