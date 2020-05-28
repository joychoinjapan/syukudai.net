<template>
    <div class="dropdown is-active" ref="messageBox">
        <div class="dropdown-trigger mr-2 mt-1">
           <span class="icon is-small" @click="isActive=!isActive">
              <i class="fas fa-comment" aria-hidden="true"></i>
           </span>
        </div>
        <div class="dropdown-menu" id="dropdown-menu2" role="menu" v-if="isActive">
            <div class="dropdown-content">
                <div class="dropdown-item">
                    message message messagemessagemessagemessagemessagemessagemessage
                </div>
                <hr class="dropdown-divider">
                <div class="dropdown-item">
                    messagemessagemessage messagemessagemessagemessagemessagemessagemessage
                </div>
                <hr class="dropdown-divider">
                <div class="dropdown-item">
                    messagemessagemessage messagemessagemessagemessagemessagemessagemessage
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MessageDropDown",
        data(){
            return {
                isActive:false
            }
        },
        mounted() {
            let _this=this;
            document.addEventListener('click',function(e){
                if(!!_this.$refs.messageBox.contains(e.target)) return;
                _this.isActive = false
            })
        },
        methods:{

        },

    }
</script>

<style scoped>
    .dropdown-menu{
        position:fixed;
        left: calc(100% - 32rem);
        top: 5rem;

    }

    .dropdown-item{
        width:28rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
    }

</style>
