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
        name: "AnswersCardGuest",
        components:{QuestionsList},
        props:{
            questions:Array,
        },
        data(){
            return {
                selectedQuestions: this.questions,
                tabs: [
                    {id:1,name: "questions", des: "おすすめ"},
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
