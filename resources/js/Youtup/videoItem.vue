<template>
    <div class="videoItem__wrapper">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Header
            </div>
            <div class="card-body">
                <img v-bind:src="videoImage" alt="" class="card-img-top">
                <h4 class="card-title">{{ videoTitle }}</h4>
                <p class="card-text">{{ videoDescription }}</p>
                <router-link :to="{name: 'youtub-video' , params: {id:videoId , video:video}}" class="btn btn-dark">Show</router-link>
            </div>
            <div class="card-footer text-muted">
                Footer
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['video'],
    computed:{
        videoTitle(){
            return this.video.snippet.title;
        },
        videoDescription(){
            return this.video.snippet.description;
        },
        videoImage(){
           
            return this.video.snippet.thumbnails.medium.url;
        },
        videoId(){
           
            return this.video.id.videoId;
        },
    },
     mounted() {
            return this.video.snippet.thumbnails.high.url;
        },
}
</script>

<style lang="scss">
    .card{
        margin: 0px 5px 0px 0px;
        .card-img-top{
            max-height: 210px;
        }
    }
</style>