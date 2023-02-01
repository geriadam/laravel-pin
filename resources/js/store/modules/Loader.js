export const namespaced = true;

export const state = {
  isStateLoading: false
};

export const mutations = {
  SET_IS_STATE_LOADING(state, isStateLoading) {
    state.isStateLoading = isStateLoading;
  },
};

export const actions = {
  show({ commit }) {
    commit("SET_IS_STATE_LOADING", true);
  },
  hide({ commit }) {
    commit("SET_IS_STATE_LOADING", false);
  },
};

export const getters = {
  isStateLoading: (state) => {
    return state.isStateLoading;
  }
};