<template>
    <div class="comment-wrapper">
        <CommentAdd/>

        <div v-for="comment in comments" :key="comment.id">
            <Comment :comment="comment"/>
        </div>

    </div>
</template>
<script>
import Comment from './Comment';
import CommentAdd from './CommentAdd';
export default {
    components:{
        Comment,
        CommentAdd
    },
    data(){
        return{
            comments:[]
        }
    },
    methods:{
        loadComments(){
            let video_id = this.$route.params.id;
            axios.post('api/video/comments' , {video_id:video_id})
            .then(response=>{
                //console.log(response);
                this.comments = response.data;
            }).catch(error=>{
                console.log(error);
            });
        },
        handleNewAddCommentAdded(comment){
            this.comments.unshift(comment);
        }
    },
    created() {
        window.eventBus.$on('commentAddEvent' , comment=>this.handleNewAddCommentAdded(comment));
        this.loadComments();
        window.Echo.channel('comments').listen('.comment.created' , event=>{
            //console.log('event' , event);
            this.handleNewAddCommentAdded(event.comment);
        });
    }

}
</script>
