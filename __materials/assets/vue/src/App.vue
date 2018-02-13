<template>
  <div id="app">
    <!-- 这里是全局视图 -->
    <!-- 给予视图过渡效果 -->
    <transition name="slide-fade">
      <!-- 这里是 router里面的视图 -->
      <router-view></router-view>
    </transition>
  </div>
</template>
<script>
export default {
  name: 'App'
}

</script>
<style lang="scss" scoped>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  height: 100%;
  background: #F5F5F5;
  .slide-fade-enter-active {
    animation: fadeInDown .4s
  }
  .slide-fade-leave-active {
    animation: fadeOutDown .1s
  }
}



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
