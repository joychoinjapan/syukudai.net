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


const app = new Vue({
    el: '#app',
    data: {
        displayComments: false,
        type: null,
        id: null,
        commentListing:[]
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
        }
    }
});
