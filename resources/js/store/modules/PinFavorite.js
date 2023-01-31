import { getError } from "@/utils/helpers";
import PinService from "@/services/PinService";

export const namespaced = true;

function setPaginatedPins(commit, response) {
  commit("SET_PINS", response.data.data);
  commit("SET_LINKS", response.data.links);
  commit("SET_LOADING", false);
}

export const state = {
  pins: [],
  links: null,
  loading: false,
  error: null,
};

export const mutations = {
  SET_PINS(state, pins) {
    state.pins = pins;
  },
  SET_LINKS(state, links) {
    state.links = links;
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
        setPaginatedPins(commit, response.data);
      })
      .catch((error) => {
        commit("SET_LOADING", false);
        commit("SET_ERROR", getError(error));
      });
  },
  paginatePins({ commit }, link) {
    commit("SET_LOADING", true);
    PinService.paginatePins(link)
      .then((response) => {
        setPaginatedPins(commit, response.data);
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
  links: (state) => {
    return state.links;
  },
  loading: (state) => {
    return state.loading;
  },
  error: (state) => {
    return state.error;
  },
};