<template>
  <div v-show="scrollLoading" class="scroll-loading">
    <img src="../assets/img/scroll-loading.gif" alt="">
  </div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters([
      'scrollLoading'
    ]),
  }
}

</script>
<style lang="scss" scoped>
@import '../assets/css/function';

$scroll_loadin_h: px2rem(300px);
.scroll-loading {
  width: 100%;
  margin-top: $scroll_loadin_h * 0.2;
  margin-bottom: $scroll_loadin_h * 0.2;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  img {
    width: $scroll_loadin_h;
    text-align: center;
  }
}

</style>
