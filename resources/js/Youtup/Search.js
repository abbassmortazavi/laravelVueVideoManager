let axios = require('axios');
let BASE_URL = 'https://www.googleapis.com/youtube/v3/search';

module.exports = function(options , callback){
    if(!options.apikey){
        throw new Error('Youtup Search would require!');
    }

    let params = {
        part: 'snippet',
        key: options.apikey,
        q: options.term,
        maxResults: (options.items) ? options.items : 20,
        type: 'video'
    };
    axios.get(BASE_URL , {params})
    .then(response=>{
        if (callback) {
            callback(response.data.items);
        }
        console.log(response);
    }).catch(error=>{
        console.log(error);
    });
//4 didam
}