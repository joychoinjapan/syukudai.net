<template>
    <div class="dropdown is-active" ref="messageBox">
        <div class="dropdown-trigger mr-2 mt-1">
           <span class="icon is-small" @click="showDropDownMessageBox">
              <i class="fas fa-comment" aria-hidden="true"></i>
           </span>
        </div>
        <div class="dropdown-menu" id="dropdown-menu2" role="menu" v-if="isActive">
            <div class="message-block media m-0" v-for="messageList in messageLists">
                <div class="media-left">
                    <figure class="image is-48x48">
                        <img class="is-rounded" src="https://bulma.io/images/placeholders/48x48.png">
                    </figure>
                </div>
                <div class="media-content">
                    <p class="title is-6 mb-1">
                        {{messageList.from_user_id==login_user_id?
                        messageList.to_user.name:messageList.from_user.name}}
                    </p>
                    <span class="mt-1">{{messageList.body}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MessageDropDown",
        props:['login_user_id'],
        data(){
            return {
                isActive:false,
                messageLists:[]
            }
        },
        mounted() {
            let _this=this;
            document.addEventListener('click',function(e){
                if(!!_this.$refs.messageBox.contains(e.target)) return;
                _this.isActive = false
                this.messageLists=[];
            })
        },
        methods:{
            showDropDownMessageBox(){
               if(this.messageLists.length == 0){
                   this.getMessagesList();
               }else{
                   this.messageLists=[];
               }
                this.isActive=!this.isActive;
            },
            getMessagesList(){
                axios({
                    method:'post',
                    url:'/api/message/listbox'
                }).then(response=>{
                    this.messageLists = response.data.data
                }).catch(function(error){
                    console.log('error')
                })
            }
        },

    }
</script>

<style scoped>
    .dropdown-menu{
        position:fixed;
        left: calc(100% - 30rem);
        top: 5rem;
        max-height: 30rem;
        overflow:hidden;
        overflow-y:scroll;
    }

    .message-block{
        width:24rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        padding:0.5rem;
    }

    .navbar-item img {
        max-height: 48px
    }


</style>
