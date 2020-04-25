<template>
    <div class="search__wrapper">
        <div class="container">
            <form v-on:submit.prevent="handleFomSubmit">
                <input type="text" v-model="searchString" class="form-control">
            </form>
        </div>
    </div>
</template>
<script>
import Search from './Search';
export default {
    name: 'finder',
    data(){
        return{
            searchString: ''
        }
    },
    methods:{
        handleFomSubmit(){
            window.eventBus.$emit('searchForYoutubeStarted');
                Search({
                apikey: 'AIzaSyAL-Iw9JJ2QpucXGYVmOsXZXvrGd55fhvA',
                term: this.searchString,
                items: 5
            } , data=> {
                window.eventBus.$emit('searchResultFromYoutup' , data);
                this.searchString = "";
            });
        }
    }
}
</script>

<style lang="scss">
    .search__wrapper{
        margin-bottom: 10px;
    }
</style>