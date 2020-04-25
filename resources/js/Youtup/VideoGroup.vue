<template>
    <div class="videoGroup__wrapper row grid">
        <video-item 
        v-images-loaded:on.progress="imageProgress"
        v-for="video in videos"
        :video="video" 
        :key="video.id.videoId">
            
        </video-item>
    </div>
</template>
<script>
import Isotope from 'isotope-layout';
import imagesLoaded from 'vue-images-loaded';
import VideoItem from './videoItem'; 
export default {
    props:['videos'],
    components:{
        VideoItem
    },
    data(){
        return{
            isotope: null,
            counter: 0
        }
    },
    created(){
        
    },
    methods:{
        relayoutTheGrid(){
            setTimeout(()=>{
                let elem = document.querySelector('.grid');
                this.isotope = new Isotope(elem , {
                    itemSelector: '.card',
                    layoutMode: 'masonry'
                });
            },1)
        },
        imageProgress(instance , img){
            console.log('instance' , instance , 'img' , img);
            this.counter++;
            if(this.counter == this.videos.length){
                this.relayoutTheGrid();
            }
        }
    },
    directives:{
        imagesLoaded
    }
}
</script>