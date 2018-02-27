<template>
  <div class="top_nav">
    <img src="//tencent.cdn.hlzblog.top/static/img/default/logo_detail.png" class="logo" alt="logo">
    <div class="nav_logo">
      <i class="el-icon-menu" @click="change_action"></i>
    </div>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return {

    }
  },
  methods: {

    change_action() {
      this.$store.dispatch('setSidebarState', this.sidebar )
    },
  },
  computed: {
    ...mapGetters([
      'sidebar'
    ])
  }
}

</script>
<style scoped lang="scss">
@import '../assets/css/function';
.top_nav {
  position: fixed;
  transform: translateZ(0);
  top: 0;
  left: 0;
  z-index: 4;
  height: px2rem(300px);
  line-height: px2rem(300px);
  width: 100%;
  background: #262826;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  .logo {
    margin-left: px2rem(300px)*0.2;
    margin-top: px2rem(300px) *0.1;
    height: px2rem(300px) * 0.8;
  }
  .nav_logo {
    color: #f5f5f5;
    padding-right: px2rem(300px) * 0.3;
  }
}

</style>
