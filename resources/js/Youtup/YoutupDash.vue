<template>
    <div class="YoutupDashboard">
        <video-group :videos="videos"></video-group>
    </div>
</template>
<script>
import Search from './Search';
import videoGroup from './VideoGroup';
export default {
    components:{
        videoGroup
    },
    created(){
        Search({
            apikey: 'AIzaSyAL-Iw9JJ2QpucXGYVmOsXZXvrGd55fhvA',
            term: 'nodejs'
        } , response=> this.videos = response);
    },
    data(){
        return{
            videos: null
        }
    },
    methods:{
        handleYoutupVideos(videos){

        }
    }
}
</script>