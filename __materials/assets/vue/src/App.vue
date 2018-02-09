<template>
    <div id="app">
        <!-- 这里是全局视图 -->
        <!-- 给予视图过渡效果 -->
        <transition name="slide-left">
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
<style>
html,body {
  height: 100%;
}

a.active {
  text-decoration: none;
}

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  height: 100%;
  background: #F5F5F5;
  .content{
    padding-top: px2rem(100px);
    background: #F5F5F5;
  }
  .tabar {
    margin-bottom: px2rem(120px);
  }
  .slide-left-enter-active,
  .slide-left-leave-active {
    transition: all .1s ease-in;
    opacity: 1;
  }
  .slide-left-enter,
  .slide-left-leave-active {
    opacity: 0;
  }

}

@keyframes slideLeft {
  from {
    transform: translate3d(100%, 0, 0);
    visibility: visible;
  }

  to {
    transform: translate3d(0, 0, 0);
  }
}
</style>