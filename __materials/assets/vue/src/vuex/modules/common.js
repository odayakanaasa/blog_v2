import * as types from '../types';
// 通用配置


// -----------------------------------------------------------:
//     设置初始状态
// -----------------------------------------------------------:
const state = {
  loading: false, // false -> 关 true -> 开
  collapse: true, // false -> 隐藏 true -> 显示
};

// -----------------------------------------------------------:
//     处理逻辑[可以异步]，数据交互常用。 它提交的是 Mutation 
// -----------------------------------------------------------:
/**
    外部通过类似
    this.$store.dispatch('setLoadingState', false)
    来实现访问 actions 方法 
*/
const actions = {
  // loading 层  显示状态
  setLoadingState({ commit }, status) {
    commit(types.common_loading, status);
  },
  setCollapseState({ commit }, status) {
    commit(types.common_collapse, status);
  }
}

// -----------------------------------------------------------:
//     通过 getters 实现 向外暴露状态参数
// -----------------------------------------------------------:
const getters = {
  loading: state => state.loading,
  collapse: state => state.collapse,
}

// -----------------------------------------------------------:
//     状态变更[同步执行] - 可接收 actions 中调用，来实现更新状态
// -----------------------------------------------------------:
const mutations = {
  // loading层 切换
  [types.common_loading](state, status) {
    state.loading = !status;
  },
  // 手风琴 切换
  [types.common_collapse](state, status) {
    state.collapse = !status;
  }
}

export default {
  state,
  actions,
  getters,
  mutations
}
