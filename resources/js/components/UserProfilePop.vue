<template>
    <div class="media profile-small-box" @mouseenter="mouseEnter" @mouseleave="mouseOut">
        <div class="media-left">
            <figure class="image is-48x48">
                <img :src=avatar>
            </figure>
        </div>
        <div class="media-content">
            <p class="title is-6 mb-1">{{name}}</p>
            <span class="tag is-info is-light is-rounded">{{field}}</span>
        </div>
        <div class="box profile-box" v-show="isActive">
            <article class="media">
                <div class="media-left">
                    <figure class="image is-64x64">
                        <img :src=avatar>
                    </figure>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p>
                            <strong>{{name}}</strong>
                            <br>
                            <span class="profile-text">経験3年目のエンジニア、案件の連絡はメールまで</span>
                        </p>
                    </div>
                </div>
            </article>
            <div class="profile-info-container">
                <div class="profile-block"><p>回答</p> <strong>{{userInfo.answers}}</strong></div>
                <div class="profile-block"><p>文章</p> <strong>12,8773</strong></div>
                <div class="profile-block"><p>フォロワー</p> <strong>{{userInfo.followers}}</strong></div>
            </div>
            <div class="container button-container mt-2">
                <user-follow-button :followed_id="answerUserId" :follower_id="loginUserId" v-if="showButtons"></user-follow-button>
                <button class="button  is-info is-outlined" v-show="showButtons" @click="openModal">メッセージ</button>
            </div>
        </div>
        <message-modal v-if="showModal"  @close="closeModal" :user_id="answerUserId" :user_name="name"></message-modal>
    </div>
</template>

<script>
    import UserFollowButton from "./UserFollowButton";
    import MessageModal from "./MessageModal";

    export default {
        name: "UserProfilePop",
        components: {UserFollowButton,MessageModal},
        props: {
            name: String,
            field: String,
            login: Number|String,
            user:Number|String,
            avatar:String
        },
        mounted() {
            axios.post('/api/user/follower', {'user_id': this.answerUserId})
                .then(response => {
                    this.userInfo.followers = response.data.followers;
                    this.userInfo.answers = response.data.answers;
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        data() {
            return {
                isActive: false,
                userInfo: {
                    followers: 0,
                    answers: 0,
                    name:this.name
                },
                loginUserId:this.login,
                answerUserId:this.user,
                showModal:false
            }
        },
        computed:{
            showButtons(){
                return !!this.loginUserId
            }
        },
        methods: {
            mouseEnter() {
                this.isActive = true
            },
            mouseOut() {
                this.isActive = false
            },
            openModal()  {
                this.showModal = true;
            },
            closeModal() {
                this.showModal = false;
            }
        }
    }
</script>

<style scoped>
    .profile-small-box {
        position: relative;
    }

    .profile-box {
        position: absolute;
        top: 50%;
        z-index: 2;
        width: 21rem;
    }

    .profile-block {
        width: 6rem;
    }

    .media {
        border-top: none;
    }

    .profile-text {
        word-break: break-word;
    }

    .profile-info-container {
        display: flex;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
    }

    .button {
        width: 7rem
    }


</style>
