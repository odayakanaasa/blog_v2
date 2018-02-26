<template>
  <div id="app">
    <!-- 这里是全局视图 -->
    <!-- z-index: 4-->
    <v-topnav></v-topnav>
    <!-- z-index: 5-->
    <v-sidebar></v-sidebar>
    <!-- 给予视图过渡效果 -->
    <transition name="slide-fade">
      <!-- 这里是 router里面的视图 -->
      <router-view></router-view>
    </transition>
  </div>
</template>
<script>

import TopNav from '@/components/TopNav'
import Sidebar from '@/components/Sidebar'
export default {
  name: 'App',
  components: {
    'v-topnav': TopNav,
    'v-sidebar': Sidebar,
  },
}

</script>


<style lang="scss" scoped>
// @import './assets/css/global.scss';

#app {
  // background: #f5f5f5;
  .slide-fade-enter-active {
    animation: fadeInDown .4s
  }
  .slide-fade-leave-active {
    animation: fadeOutDown .2s
  }
}


// 过渡动画
@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-20px)
  }
  100% {
    opacity: 1;
    transform: translateY(0)
  }
}

@keyframes fadeOutDown {
  0% {
    opacity: 1;
    transform: translateY(0)
  }
  100% {
    opacity: 0;
    transform: translateY(20px)
  }
}

</style>
