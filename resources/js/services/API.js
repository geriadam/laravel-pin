/*
 * This is the initial API interface
 * we set the base URL for the API
 */

import axios from "axios";
import store from "@/store";

export const apiClient = axios.create({
  baseURL: '/api',
  withCredentials: true, // required to handle the CSRF token
});

/*
 * Add a response interceptor
 */
apiClient.interceptors.response.use(
  (response) => {
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