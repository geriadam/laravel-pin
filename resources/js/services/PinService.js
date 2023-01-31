import * as API from "@/services/API";

export default {
  getIndex(page) {
    return API.apiClient.get(`/pins/?page=${page}`);
  },
  getFavorites(page) {
    return API.apiClient.get(`/pins/favorites?page=${page}`);
  },
  getModeration(page) {
    return API.apiClient.get(`/pins/moderation?page=${page}`);
  },
  paginatePins(link) {
    return API.apiClient.get(link);
  },
  upload(payload) {
    return API.apiClient.post('/pins', payload);
  },
  publishPin(id) {
    return API.apiClient.get(`/pins/publish/${id}`);
  },
  likePin(id) {
    return API.apiClient.get(`/pins/like/${id}`);
  }
};