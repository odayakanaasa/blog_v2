<template>
  <transition name="slide-left">
    <div v-show="sidebar" class="bar">
      <div class="left">
        <h5 class="title"><i class="el-icon-goods"></i></h5>
        <ul>
          <li v-for="item in article_list">
            <router-link :to="'/article/'+item.id"></router-link>
          </li>
          <!-- 批量测试域 -->
          <li>
            <router-link to="/article/">1</router-link>
          </li>
          <li>
            <router-link to="/article/">2</router-link>
          </li>
          <li>
            <router-link to="/article/">3</router-link>
          </li>
        </ul>
      </div>
      <div class="right" @click="change_action"></div>
    </div>
  </transition>
</template>
<script>
import { mapGetters } from 'vuex'
import api from '../fetch/index'

export default {
  data() {
    return {
      article_list: []
    }
  },
  created() {
    if(0 === this.article_list.length) {
      api.CategoryList()
        .then(d => {
          console.log(d);
          console.log('ok');
        });
    }
  },
  methods: {
    change_action() {
      this.$store.dispatch('setSidebarState', this.sidebar)
    },
  },
  computed: {
    ...mapGetters([
      'sidebar'
    ])
  }
}

</script>
<style lang="scss" scoped>
@import '../assets/css/function';
a {
  text-decoration: none;
}
.bar {
  position: fixed;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  z-index: 5;
  color: #f5f5f5;
  display: flex;
  .left {
    width: 60%;
    height: 100%;
    background: #262826;
    padding-left: px2rem(40px);
    .title {
      width: 100%;
      font-size: px2rem(75px);
      &:after {
        padding-left: px2rem(40px);
        content: '文章分类';
      }
    }
  }
  .right {
    width: 40%;
    height: 100%;
    background: #fff;
    opacity: 0;
  }
}

// 过渡效果

// 动画 -- 左边进入
@keyframes slideInLeft {
  0% {
    opacity: 0;
    transform: translateX(-2000px)
  }
  100% {
    transform: translateX(0)
  }
}

// 动画 -- 左边回来
@keyframes slideOutLeft {
  0% {
    transform: translateX(0)
  }
  100% {
    opacity: 0;
    transform: translateX(-2000px)
  }
}

.slide-left-enter-active {
  animation: slideInLeft .3s
}

.slide-left-leave-active {
  animation: slideOutLeft .3s
}

</style>
