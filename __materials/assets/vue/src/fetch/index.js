import axios from 'axios'
import qs from 'qs'

// axios 配置
axios.defaults.timeout = 5000;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8';
axios.defaults.baseURL = 'http://web.blog.com/';


/**
* 统一数据返回格式

    {
        "detail": "",
        "code": 200,
        "data": {...}
    }

*/


// POST传参序列化
axios.interceptors.request.use((config) => {
  if(config.method === 'post') {
    config.data = qs.stringify(config.data);
  }
  return config;
}, (error) => {
  console.log('错误的传参');
  return Promise.reject(error);
});

// 返回状态判断
axios.interceptors.response.use((res) => {
  if(200 !== parseInt(res.code)) {
    return Promise.reject(res);
  }
  return res;
}, (error) => {
  console.log('网络异常');
  return Promise.reject(error);
});


export default {
    /**
     * 用户登录
     */
    Login(params) {
        return fetch('/users/api/userLogin', params)
    },

}
