import axios from 'axios'
import qs from 'qs'

// axios 配置
axios.defaults.timeout = 5000;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8';
// axios.defaults.baseURL = 'http://web.blog.com/';
axios.defaults.baseURL = 'http://www.hlzblog.top/';


/**
* 统一数据返回格式

    {
        "detail": "",
        "code": 200,
        "data": {...}
    }

*/


// POST传参序列化
axios.interceptors.request.use(config => {
  if(config.method === 'post') {
    config.data = qs.stringify(config.data);
  }
  return config;
}, error => {
  console.log('错误的传参');
  return Promise.reject(error);
});

// 返回状态判断
axios.interceptors.response.use(res => {
  if(200 !== parseInt(res.code)) {
    return Promise.reject(res);
  }
  return res;
}, error => {
  console.log('网络异常');
  return Promise.reject(error);
});

// 封装 post 请求
export function fetch(url, params) {
  return new Promise((resolve, reject) => {
    axios.post(url, params)
      .then(response => {
        resolve(response.data);
      }, err => {
        reject(err);
      })
      .catch(error => {
        reject(error)
      })
  })
}
// 封装 get 请求
export function get(url) {
  return new Promise((resolve, reject) => {
    axios.get(url)
      .then(response => {
        resolve(response.data);
      }, err => {
        reject(err);
      })
      .catch(error => {
        reject(error)
      })
  })
}


export default {
  /**
   * 用户登录
   */
  CategoryList() {
    return get('Api?con=Admin_article&act=blog_category_list_info')
  },
  /**
   * 分类列表
   */

}
