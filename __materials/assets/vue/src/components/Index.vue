<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <!-- 属性示例绑定 -->
    <div v-bind:id="'list-' + id">{{ name }}</div>
    <div 
      v-html="message"
      v-on:click.prevent="alert_box"
    ></div>
    <!-- 判断语句块 -->
    <div>
      <div v-if="id===2">
        这里是一
      </div>
      <div v-else>
        这里是二
      </div>
    </div>
    <!-- 组件 -->
    <index-header
      :begin-time="indexHeader.beginTime"
      :end-time="indexHeader.endTime"
      :cant-join-time="indexHeader.cantJoinTime"
      :destination="indexHeader.destination"
      :release-username="indexHeader.releaseUsername">
    </index-header>
    <!-- 组件 - 模型 -->
    <index-model></index-model>
  </div>
</template>

<script>

import IndexHeader from '@/components/IndexHeader'
import IndexModel from '@/components/IndexModel'
export default {
  name: 'Index',
  components: {
    IndexHeader,
    IndexModel,
  },
  data(){
    return {
      msg: '云天河移动端首页',
      id: 1,
      name: "云天河",
      message:"<h5>这里是v-html</h5>",
      indexHeader:{
        beginTime: "2018-02-05 18:16:03",
        endTime: "2018-02-05 20:16:03",
        cantJoinTime: "2018-02-05 22:16:03",
        destination: "云天河商城",
        releaseUsername: "云天河Icon",
      }
    }
  },
  methods:{
    alert_box(){
      alert('text_box');
    }
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
