import axios from "../axios";
export default {
    getAssumeRole:function () {
        return axios.post('ali/getAssumeRole',{});
    },
    preview:function (path) {
        return axios.post('video/preview',{path:path});
    }
}