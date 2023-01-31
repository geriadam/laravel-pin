import { getError } from "@/utils/helpers";
import PinService from "@/services/PinService";

export const namespaced = true;

export const state = {
  pins: [],
  nextPageUrl: null,
  loading: false,
  error: null,
};

export const mutations = {
  SET_PINS(state, pins) {
    state.pins = pins;
  },
  SET_NEXT_PAGE_URL(state, nextPageUrl) {
    state.nextPageUrl = nextPageUrl;
  },
  SET_LOADING(state, loading) {
    state.loading = loading;
  },
  SET_ERROR(state, error) {
    state.error = error;
  },
};

export const actions = {
  getPins({ commit }, page) {
    commit("SET_LOADING", true);
    PinService.getFavorites(page)
      .then((response) => {
        commit("SET_PINS", response.data.data.data);
        commit("SET_NEXT_PAGE_URL", response.data.data.next_page_url);
        commit("SET_LOADING", false);
      })
      .catch((error) => {
        commit("SET_LOADING", false);
        commit("SET_ERROR", getError(error));
      });
  },
  paginatePins({ commit, state }) {
    commit("SET_LOADING", true);
    PinService.paginatePins(state.nextPageUrl)
      .then((response) => {
        const pins = [...state.pins, ...response.data.data.data]
        commit("SET_PINS", pins);
        commit("SET_NEXT_PAGE_URL", response.data.data.next_page_url);
        commit("SET_LOADING", false);
      })
      .catch((error) => {
        commit("SET_LOADING", false);
        commit("SET_ERROR", getError(error));
      });
  },
};

export const getters = {
  pins: (state) => {
    return state.pins;
  },
  nextPageUrl: (state) => {
    return state.nextPageUrl;
  },
  loading: (state) => {
    return state.loading;
  },
  error: (state) => {
    return state.error;
  },
};