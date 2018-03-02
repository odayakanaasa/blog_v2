import qs from 'qs' // 类似 php 中的 http_build_query
import { get, fetch } from './axios'

export default {
  /**
   * 分类列表
   */
  CategoryList() {
    return get('Api?con=Common_basic&act=blog_category_list_info')
  },
  /**
   * 分类列表
   * param Object payload
   *  {
   *    "to_page":"",
   *    "search":"",
   *    "cate_id":"",
   *  }
   */
  ArticleList(payload = null) {
    let params = '';
    if(payload) {
      params = qs.stringify(payload);
    }
    return get('Api?con=Common_basic&act=get_index_article_list&' + params)
  },

}
