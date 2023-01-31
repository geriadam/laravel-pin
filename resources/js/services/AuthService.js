import axios from "axios";
import store from "@/store";

export const authClient = axios.create({
  baseURL: '/api'
});

/*
 * Add a response interceptor
 */
authClient.interceptors.response.use(
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

export default {
  async login(payload) {
    return authClient.post("/auth/login", payload);
  },
  logout() {
    return authClient.get("/auth/logout");
  },
  getAuthUser() {
    return authClient.get("/auth/user");
  },
  async registerUser(payload) {
    return authClient.post("/auth/register", payload);
  },
};