import CKEditor from 'ckeditor4-vue';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message-drop-down', require('./components/MessageDropDown').default);
Vue.component('question-follow-button', require('./components/QuestionFollowButton').default);
Vue.component('user-profile-pop', require('./components/UserProfilePop').default);
Vue.component('user-vote-button', require('./components/UserVoteButton').default);
Vue.component('message-modal', require('./components/MessageModal').default);
Vue.component('answer-comments-button', require('./components/AnswerCommentsButton').default);
Vue.component('comments', require('./components/Comments').default);
Vue.component('question-comments-button', require('./components/QuestionCommentsButton').default),
Vue.use(CKEditor);
Vue.component('editor', require('./components/Editor').default);
Vue.component('selector',require('./components/Selector').default);
Vue.component('user-avatar',require('./components/Avatar').default);
Vue.component('profile-form',require('./components/ProfileForm').default);
Vue.component('message-dialog',require('./components/MessageDialog').default);
Vue.component('answers-card',require('./components/AnswersCard').default);
Vue.component('questions-list',require('./components/QuestionsList').default);



const app = new Vue({
    el: '#app',
    data: {
        displayComments: false,
        type: null,
        id: null,
        commentListing:[],
        editorData:null,
        questionTitle:null,
        title_e:null,
        topic_e:null,
        content_e:null,
        question_id:null
    },
    computed:{
        selectorData() {
            return this.$refs.selectorData.value
        }
    },
    methods: {
        showCommentModal() {
            this.displayComments = true;
            this.getList(this.type,this.id);
        },
        getList(type,id){
            axios({
                method: 'get',
                url: '/api/' +type + '/' + id + '/comments',
            }).then(response => {
                this.commentListing = response.data.data
            }).catch(error => {
                console.log(error)
            })
        },
        closeCommentModal() {
            this.displayComments = false;
        },
        sendQuestion(){
            let check_result = !!this.checkForm();
            if(!check_result){
                axios({
                    method:'post',
                    url:'/questions',
                    data:{
                        topics:this.selectorData,
                        title:this.questionTitle,
                        content:this.editorData,
                    }
                }).then(function (response) {
                    window.location.href="/questions/"+response.data.question_id;
                }).catch(function (error) {
                    console.log(error)
                });
            }
        },

        checkForm(){
            if(this.questionTitle.length<6){
                this.title_e = true;
            }

            if(this.editorData.length<26){
                this.content_e = true;
            }

            if(this.selectorData.length<1){
                this.topic_e = true;
            }

            return this.title_e||this.content_e||this.topic_e;
        },

        sendAnswer(question_id){
            if(this.editorData<26){
                this.content_e = true;
                return;
            }
            axios({
                method:'post',
                url:'/question/'+question_id+"/answer",
                data:{
                    content:this.editorData
                }
                }).then(function (response) {
                    window.location.href="/questions/"+question_id;
                }).catch(function (error) {
                    console.log(error)
                })
        }
    }
});
