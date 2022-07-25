import axios from "axios";
import qs from "qs";

const env = process.env.NODE_ENV;
axios.defaults.baseURL = 'http://mblog-lhp.top/blog/';
axios.defaults.withCredentials = true; //  在跨域中允许携带凭证(cookie等)
axios.defaults.headers['Content-Type'] = "application/x-www-form-urlencoded";
axios.defaults.timeout = 3000;
axios.defaults.retry = 3;
axios.defaults.retryDelay = 1000;

//请求拦截器,能拦截请求主体信息
axios.defaults.transformRequest = function (data, request) {
    if (window.localStorage.getItem('authorization')) {
        request['Authorization'] = "Bearer " + window.localStorage.getItem('authorization');
    }
    if (typeof data === 'object') {
        return qs.stringify(data);
    } else {
        return data;
    }
};

const instance = axios.create({
    validateStatus: function (status) {
        var reg_exp = new RegExp('^[2|3|4][\\d]{2}$');
        let ret = reg_exp.test(status);
        return ret;
    }
});

//返回拦截器
instance.interceptors.response.use(function onFultfilled(response) {
    return Promise.resolve(response.data);
}, function onRejected(reason) {
    return Promise.reject(reason);
});

export default instance;