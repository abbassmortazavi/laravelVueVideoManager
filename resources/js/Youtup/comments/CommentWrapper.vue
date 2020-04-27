<template>
    <div class="comment-wrapper">
        <CommentAdd/>
        <Comment/>
    </div>
</template>
<script>
import Comment from './Comment';
import CommentAdd from './CommentAdd';
export default {
    components:{
        Comment,
        CommentAdd
    }
}
</script>