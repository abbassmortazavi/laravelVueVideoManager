<template>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="body"></label>
                <textarea class="form-control" v-model="body" name="body" id="body" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" @click="saveNewComment()">Save</button>
            </div>
        </div>
    </div>
</template>
<script>
import Axios from 'axios';
export default {
    data(){
        return{
            body: ''
        }
    },
    methods:{
        saveNewComment(){
            let url = window.laravel.basePath + 'api/comment';
            let postData = {
                body: this.body,
                video_id: this.$route.params.id
            };
            Axios.post(url , postData)
            .then(response=>{
                //console.log(response);
                window.eventBus.$emit('commentAddEvent' , response.data);
                this.body = '';
            }).catch(error=>{
                console.log(error);
            })
        }
    },
    created(){
       // console.log(this.$route.params.id);
    }
}
</script>
