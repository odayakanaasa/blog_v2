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
   */
  ArticleList() {
    return get('Api?con=Common_basic&act=get_index_article_list')
  },

}
