<template>
    <div class="card-body">
        <div class="field">
            <user-avatar></user-avatar>
            <label class="label">ユーザー名</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="text" :class="userNameFromStyle"
                       placeholder="Text input"
                       v-model="username"
                       @change="checkName"
                >
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
                    <textarea class="textarea" placeholder="Textarea" v-model="self_introduction"></textarea>
                </div>
                <p class="help">This is a help text</p>
            </div>
            <div class="field">
                <label class="label">所属している組織・企業</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Text input">
                </div>
                <p class="help">This is a help text</p>
            </div>
            <div class="field">
                <label class="label">居住地</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Text input">
                </div>
                <p class="help">This is a help text</p>
            </div>
        </div>
    </div>
</template>

<script>
    import Avatar from "./Avatar";
    const success = "is-success";
    const danger = "is-danger" ;

    export default {
        name: "ProfileForm",
        components: {Avatar},
        props:['user_id'],
        data() {
            return {
                username: null,
                self_introduction: null,
                company: null,
                address: null,
                UserNameMessage: null,
                colors: null,
                userNameFromStyle:null,
            }
        },
        methods: {
            checkName() {
                let checkResult;
                checkResult=this.checkNameCount();
                if(checkResult){
                    this.checkNameDup();
                }
            },
            checkNameCount() {
                if (this.username.length > 16 || this.username.length < 4) {
                    this.UserNameMessage = "ユーザー名は4文字以上、16文字以下を入力してください";
                    this.colors = danger;
                    this.userNameFromStyle = danger;
                    let result=false;
                    return result;
                }else{
                    this.UserNameMessage = "ユーザー名は使用可能です";
                    this.colors = success;
                    this.userNameFromStyle = success;
                    let result=true;
                    return result;
                }

            },
            checkNameDup() {

            }
        }

    }
</script>

<style scoped>

</style>
