<template>
    <div class="modal is-active">
        <div class="modal-background">background</div>
        <div class="modal-content">
            <div class="box">
                <slot></slot>
            </div>
        </div>
        <button class="modal-close is-large" aria-label="close" @click="$emit('close')"></button>
    </div>
</template>

<script>
    export default {
        name: "MessageModal",
    }
</script>

<style scoped>
    .modal{
        z-index: 3;
    }


</style>
