import axios from "../axios";

export default {
    sdkLogin:function (code) {
        let obj = {
            'code' : code,
        };
        return axios.post('user/sdkLogin',obj);
    },
    refreshToken:function (authorization) {
        let obj = {
            'authorization' : authorization,
        }
        return axios.post('user/refreshToken',obj);
    }
};