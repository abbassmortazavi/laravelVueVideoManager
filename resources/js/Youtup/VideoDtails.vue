<template>
    <div class="videoDtails__wrapper row" v-if="video">
        <div class="col-sm-8 col-sm-push-2">
            <h2>{{ video.snippet.title }}</h2>
            <small>{{ video.snippet.channelTitle }}</small>
            <p>{{ video.snippet.description }}</p>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe :src="url" class="embed-responsive-item" frameborder="0"></iframe>
            </div>
        </div>

        <div class="col-sm-8 col-sm-push-2">
            <CommentWrapper/>
        </div>
    </div>



</template>
<script>
import CommentWrapper from './comments/CommentWrapper';
import GetVideos from './GetVideos';
export default {
    components:{
        CommentWrapper
    },
    data(){
        return{
            videoId: null,
            video: null,
            url: null
        }
    },
    created(){
        /*if (this.$route.params.video === undefined) {
            this.$router.push('/');
        }*/

        this.videoId = this.$route.params.id;
        this.url = `https://www.youtube.com/embed/${this.videoId}`;
        GetVideos({
            apikey: 'AIzaSyAL-Iw9JJ2QpucXGYVmOsXZXvrGd55fhvA',
            videoId: this.videoId
        } , response=>{
            console.log('res' , response);
            this.video = response[0];
        });
        // this.video = this.$route.params.video;
        //console.log(this.$route.params.video);
    },
    computed:{

    }

}
</script>
