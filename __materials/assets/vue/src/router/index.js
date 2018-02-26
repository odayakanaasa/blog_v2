import Vue from 'vue'
import Router from 'vue-router'
// 导入页面渲染的各个组件
import Index from '@/pages/Index'
import NotFound from '@/pages/NotFound'

Vue.use(Router)
// 书写页面信息
const rout_list = [{
    path: '/',
    name: 'Index',
    component: Index,
    meta: {
      "title": "首页",
    },
  },
  {
    path: '/404',
    name: 'NotFound',
    component: NotFound,
    meta: {
      "title": "404页面不存在",
    },
  },
];

const router = new Router({
  // 导入路由信息
  routes: rout_list
})

// 每个都执行
router.beforeEach((to, from, next) => {
  // 先设置标题
  window.document.title = to.meta.title;
  // 最后进入路由
  next()
})


export default router
