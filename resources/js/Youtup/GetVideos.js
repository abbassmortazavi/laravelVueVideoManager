let axios = require('axios');
let BASE_URL = 'https://www.googleapis.com/youtube/v3/videos';

module.exports = function(options , callback){
    if(!options.apikey){
        throw new Error('Youtup Search would require!');
    }

    let params = {
        part: 'snippet',
        key: options.apikey,
        id: options.videoId,
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
}
