<template>
  <div class="home">
    <article-list :list-info="articleList"></article-list>
    <scroll-loading></scroll-loading>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
import api from '@/fetch';

import ArticleList from '@/components/ArticleList';
import scrollLoading from '@/components/scrollLoading';

export default {
  components: {
    ArticleList,
    scrollLoading,
  },
  data() {
    return {
      articleList: [],
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
        };
        api.ArticleList(params)
          .then(d => {
            if(d.data.page_count >= this.pageNow) {
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
