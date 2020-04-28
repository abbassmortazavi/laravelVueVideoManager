<template>
    <div class="YoutupDashboard">
        <finder></finder>
        <div v-if="!loading">
            <video-group :videos="videos"></video-group>
        </div>

        <div v-if="loading">
            Loading...
        </div>

    </div>
</template>
<script>
import Search from './Search';
import Finder from './Finder';
import videoGroup from './VideoGroup';
export default {
    components:{
        videoGroup,
        Finder
    },
    created(){
        Search({
            apikey: 'AIzaSyAL-Iw9JJ2QpucXGYVmOsXZXvrGd55fhvA',
            term: 'nodejs',
            items: 5,
        } , response=> this.handleSearchResults(response));

        window.eventBus.$on('searchForYoutubeStarted' , ()=>{
            this.loading = true;
        });

        window.eventBus.$on('searchResultFromYoutup' , videos=>{
            //console.log('search' , videos);
            this.loading = false;
            this.videos = videos;
        });
    },
    data(){
        return{
            videos: null,
            loading: true
        }
    },
    methods:{
        handleSearchResults(result){
            this.loading = false;
            this.videos = result;
        }
    }
}
</script>
