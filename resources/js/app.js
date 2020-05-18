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


Vue.component('question-follow-button',require('./components/QuestionFollowButton').default);
Vue.component('user-profile-pop',require('./components/UserProfilePop').default);
Vue.component('user-vote-button',require('./components/UserVoteButton').default);
Vue.component('message-modal',require('./components/MessageModal').default);
Vue.use( CKEditor );
Vue.component('editor',require('./components/Editor').default);


const app = new Vue({
    el: '#app'
});
