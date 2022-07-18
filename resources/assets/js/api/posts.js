import axios from "../axios";

export default {
    index:function () {
        return axios.post('posts/index',{});
    }
};