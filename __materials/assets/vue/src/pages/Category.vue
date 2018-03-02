<template>
  <div class="home">
    <article-list :list-info="articleList"></article-list>
    <loading :flag="is_loading"></loading>
  </div>
</template>
<script>
import api from '@/fetch';

import ArticleList from '@/components/ArticleList';
import Loading from '@/components/Loading';

export default {
  components: {
    ArticleList,
    Loading,
  },
  data() {
    return {
      articleList: [],
      is_loading: true,
      // 下拉相关
      timerIndex: 0,
      pageNow: 0,
      pageEnd: false,
    }
  },
  created() {
    // 文章分类信息 --- 每秒检测屏幕滚动到的高度
    this.timerIndex = setInterval(() => {
      let scroll_body = document.body.scrollHeight;
      let scroll_now = document.body.scrollTop;
      let navigator_h = window.innerHeight;
      let scroll_need = scroll_body - scroll_now - navigator_h;
      // console.log(scroll_now);
      // console.log(scroll_total);
      // console.log(navigator_h);
      // console.log(scroll_need);
      if(scroll_need <= 0 && false === this.pageEnd) {
        this.pageNow++;
        let params = {
          "to_page": this.pageNow,
          "cate_id": this.$route.params.id,
        };
        api.ArticleList(params)
          .then(d => {
            this.is_loading = false; // 关闭加载层
            // 关闭底部按钮的选中
            this.$store.dispatch('setBottombarState','');
            // 如果数据为空
            if( 0===d.data.page_count ){
              //
            }
            if(d.data.page_count >= this.pageNow) {
              // 分类名
              window.document.title = d.data.info[0].cate_name +' | 文章分类 | 云天河博客';
              // 加载数据
              if(d.data.page_count === this.pageNow) {
                this.pageEnd = true;
              }
              this.articleList = [].concat.call(
                this.articleList,
                d.data.info
              );
            }
          });
      }
    }, 1000);

  },
  beforeDestroy() {
    // 销毁定时器
    clearInterval(this.timerIndex);
  },
  computed: {},
  methods: {

  }
}

</script>
<style scoped lang="scss">
@import '../assets/css/function';
.home {}

</style>
