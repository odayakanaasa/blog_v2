<template>
  <div class="home">
    <div class="ho_ul">
      <div class="ho_li">
        <img src="//" alt="">
      </div>
    </div>
  </div>
</template>
<script>

import { mapGetters } from 'vuex'

export default {
  data() {
    return {
      article_list:[],
    }
  },
  created() {
    // 文章分类信息
    if(0 === this.article_list.length) {
      api.ArticleList()
        .then(d => {
          this.article_list = d.data;
        });
    }
  },
  computed: {
  },
  methods: {

  }
}

</script>
<style scoped lang="scss">
@import '../assets/css/function';


</style>
