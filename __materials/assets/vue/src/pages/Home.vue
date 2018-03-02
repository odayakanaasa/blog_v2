<template>
  <div class="home">
    <article-list 
    :list-info="articleList"></article-list>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
import api from '@/fetch';
import ArticleList from '@/components/ArticleList';

export default {
  components:{
    ArticleList,
  },
  data() {
    return {
      articleList: [],
    }
  },
  created() {
    // 文章分类信息
    if(0 === this.articleList.length) {
      api.ArticleList()
        .then(d => {
          this.articleList = d.data.info;
        });
    }
  },
  computed: {},
  methods: {

  }
}

</script>
<style scoped lang="scss">
@import '../assets/css/function';
.home {
}

</style>
