<template>
    <div>
        <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="トピックスを検索、または追加してください"
                     label="name" track-by="id"
                     :options="options"
                     :multiple="true"
                     :taggable="true"
                     @tag="addTag"
                     @search-change="search"
        >
        </multiselect>
    </div>
</template>

<script>
    import Multiselect from "vue-multiselect";

    export default {
        components: {
            Multiselect
        },
        data () {
            return {
                value: [],
                options: []
            }
        },
        methods: {
            addTag (newTag) {
                const tag = {
                    name: newTag,
                    id:null
                }
                this.options.push(tag)
                this.value.push(tag)
            },
            search(searchValue){
                let self=this;
                if(searchValue){
                    axios({
                        method:'get',
                        url:'/api/topics',
                        params:{
                            q:searchValue
                        }
                    }).then(function(response){
                        self.options=response.data
                    },650)
                }else{
                    self.options=[];
                }
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>

</style>
