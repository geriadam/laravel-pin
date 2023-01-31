/*
 * This is the initial API interface
 * we set the base URL for the API
 */

import axios from "axios";
import store from "@/store";

export const apiClient = axios.create({
  baseURL: '/api'
});

/*
 * Add a response interceptor
 */
apiClient.interceptors.response.use(
  async (response) => {
    const token = localStorage.getItem('access_token');
    if (token) {
      response.headers['Authorization'] = 'Bearer ' + token;
    }
    response.headers['Content-Type'] = 'application/json';
    response.headers['Accept'] = 'application/json';
    delete response.headers['X-XSRF-TOKEN']
    return response;
  },
  function (error) {
    if (
      error.response &&
      [401, 419].includes(error.response.status) &&
      store.getters["auth/authUser"] &&
      !store.getters["auth/guest"]
    ) {
      store.dispatch("auth/logout");
    }
    return Promise.reject(error);
  }
);