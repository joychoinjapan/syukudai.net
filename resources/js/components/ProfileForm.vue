<template>
    <div class="card">
    <div class="card-header label is-medium">プロフィール</div>
    <div class="card-body">
        <div class="field">
            <message-dialog v-if="isUpdated" :isSuccess="isUpdated"></message-dialog>
            <user-avatar :avatar="user.avatar"></user-avatar>
            <label class="label">ユーザー名</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" :class="userNameFromStyle"
                       placeholder="ユーザー名を入力してください"
                       v-model="username"
                       @change="checkName">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                </span>
                <p class="help" v-text="UserNameMessage" :class="colors"></p>
            </div>
            <div class="field">
                <label class="label">自己紹介</label>
                <div class="control">
                    <textarea class="textarea" placeholder="自己紹介を入力してください"
                              v-model="self_introduction" @change="checkName"></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label">所属している組織・企業</label>
                <div class="control">
                    <input class="input" type="text" placeholder="所属している組織・企業を入力してください"
                           v-model="company" @change="checkName">
                </div>
            </div>
            <div class="field">
                <label class="label">居住地</label>
                <div class="control">
                    <input class="input" type="text" placeholder="居住地を入力してください"
                           v-model="address" @change="checkName">
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button class="button is-success mr-2" @click="update" :disabled="!canSendForm">情報更新</button>
        <button class="button">キャンセル</button>
    </div>
    </div>
</template>

<script>
    import Avatar from "./Avatar";
    import MessageDialog from "./MessageDialog";

    const success = "is-success";
    const danger = "is-danger";

    export default {
        name: "ProfileForm",
        components: {Avatar,MessageDialog},
        props: {
            user:{
                type:Object,
                required:true
            }
        },
        data() {
            return {
                username: this.user.name,
                self_introduction: this.user.self_introduction,
                company: this.user.company,
                address: this.user.address,
                UserNameMessage: null,
                colors: null,
                userNameFromStyle: null,
                canSendForm:false,
                isUpdated:null,
            }
        },
        methods: {
            checkName() {
                let checkResult = false;
                checkResult = this.checkNameCount();
                if (checkResult) {
                checkResult = this.checkNameDup();
                }
                return checkResult;
            },
            checkNameCount() {
                let result = true;
                if (this.username.length > 16 || this.username.length < 4) {
                    this.UserNameMessage = "ユーザー名は4文字以上、16文字以下を入力してください";
                    this.colors = danger;
                    this.userNameFromStyle = danger;
                    let result = false;
                    return result;
                } else {
                    this.UserNameMessage = "ユーザー名は使用可能です";
                    this.colors = success;
                    this.userNameFromStyle = success;
                    return result;
                }
            },
            checkNameDup() {
                axios({
                    method: 'post',
                    url: '/api/check',
                    data: {
                        user_id: this.user.id,
                        name: this.username
                    }
                }).then(response => {
                    if (response.data.result) {
                        this.canSendForm=false;
                        this.UserNameMessage = "ユーザー名はすでに使われています";
                        this.colors = danger;
                        this.userNameFromStyle = danger;
                    }else{
                        this.canSendForm=true;
                    }
                }).catch(error => {
                    console.log(error.response);
                })

                return this.canSendForm;
            },
            update(){
                axios({
                    method:'post',
                    url:'/profile/update',
                    data: {
                        user_id: this.user.id,
                        name: this.username,
                        self_introduction:this.self_introduction,
                        company:this.company,
                        address:this.address
                    }
                }).then
                (response=>{
                    window.location.href="/profile"
                    this.isUpdated = response.data.status;
                }).catch(error=>{
                    this.UserNameMessage = error.response.data.errors.name;
                    this.colors = danger;
                    this.userNameFromStyle = danger;
                });
            }
        }
    }
</script>

<style scoped>

</style>
