<template>
    <div class="card">
        <header class="card-content">
            <div class="tabs">
                <ul>
                    <li v-for="tab in tabs" :class="isActive(tab.id)">
                        <a :name="tab.name" @click="selectTab(tab)">{{tab.des}}</a>
                    </li>
                </ul>
            </div>
            <questions-list :questions="selectedQuestions"></questions-list>
        </header>
    </div>
</template>

<script>
    import QuestionsList from "./QuestionsList";
    export default {
        name: "AnswersCard",
        components:{QuestionsList},
        props:{
            rec_questions:Array,
            following_questions:Array,
            popular_questions:Array
        },
        data(){
            return {
                selectedQuestions: this.rec_questions,
                tabs: [
                    {id:1,name: "rec_questions", des: "おすすめ"},
                    {id:2,name: "following_questions", des: "フォロー"},
                    {id:3,name: "popular_questions", des: "人気の質問"}
                ],
                selectedTabId:1,
            }
        },
        computed:{
            isActive(){
                return function(id){
                    return this.selectedTabId==id?'is-active':'';
                }
            }
        },
        methods:{
            selectTab(tab){
               let that = this;
               this.selectedTabId= tab.id;
               this.selectedQuestions = that[`${tab.name}`]
            }
        }
    }
</script>

<style scoped>

</style>
