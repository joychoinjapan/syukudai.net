<template>
    <div class="dropdown is-active" ref="messageBox">
        <div class="dropdown-trigger mr-2 mt-1">
           <span class="icon is-small" @click="showDropDownMessageBox">
              <i class="fas fa-comment" aria-hidden="true"></i>
           </span>
        </div>
        <div class="dropdown-menu" id="dropdown-menu2" role="menu" v-if="isActive">
            <div class="box-header">{{isEmpty?'メッセージはありません':'メッセージ'}}</div>
            <div class="message-block media m-0" v-for="messageList in messageLists"
                 @click="showMessageModal(messageList)">
                <div class="media-left">
                    <figure class="image is-48x48">
                        <img class="is-rounded" src="https://bulma.io/images/placeholders/48x48.png">
                    </figure>
                </div>
                <div class="media-content">
                    <p class="title is-6 mb-1">
                        {{partnerName(messageList)}}
                    </p>
                    <span class="mt-1">{{messageList.body}}</span>
                </div>
            </div>
        </div>
        <message-modal v-if="showModal" @close="closeModal" :user_id="answerUserId" :user_name="name"></message-modal>
    </div>
</template>

<script>
    import MessageModal from "./MessageModal";

    export default {
        name: "MessageDropDown",
        components: {MessageModal},
        props: ['login_user_id'],
        data() {
            return {
                isActive: false,
                messageLists: [],
                isEmpty: undefined,
                showModal: false,
                answerUserId: null,
                name: null
            }
        },
        mounted() {
            let _this = this;
            document.addEventListener('click', function (e) {
                if (!!_this.$refs.messageBox.contains(e.target)) return;
                _this.isActive = false
                this.messageLists = [];
            })
        },
        methods: {
            showDropDownMessageBox() {
                if (this.messageLists.length == 0) {
                    this.getMessagesList();
                } else {
                    this.messageLists = [];
                }
                this.isActive = !this.isActive;
            },
            getMessagesList() {
                axios({
                    method: 'post',
                    url: '/api/message/listbox'
                }).then(response => {
                    this.messageLists = response.data.data
                    if (this.messageLists.length > 0) {
                        this.isEmpty = false
                    } else {
                        this.isEmpty = true
                    }
                }).catch(function (error) {
                    console.log('error')
                })
            },
            partnerName(messageList) {
                return messageList.from_user_id == this.login_user_id ?
                    messageList.to_user.name : messageList.from_user.name
            },
            showMessageModal(messageList) {
                this.showModal = true;
                this.name = this.partnerName(messageList);
                this.answerUserId =
                    messageList.from_user_id == this.login_user_id ?
                        messageList.to_user.id : messageList.from_user.id;
                this.isActive = false
                this.messageLists = [];
            },
            closeModal() {
                this.showModal = false;
            }
        },

    }
</script>

<style scoped>
    .dropdown-menu {
        position: fixed;
        left: calc(100% - 25rem);
        top: 4rem;
        max-height: 30rem;
        overflow: hidden;
        overflow-y: scroll;
        padding: 0;
        width: 23rem;
    }

    .message-block {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        padding: 0.5rem;
    }

    .navbar-item img {
        max-height: 48px
    }

    .box-header {
        background-color: #efefef;
        font-size: 1.1rem;
        text-align: center;
        padding: 0.5rem;
    }


</style>
