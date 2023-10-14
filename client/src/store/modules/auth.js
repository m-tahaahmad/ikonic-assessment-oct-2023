import axiosInstance from "@/helpers/axios";

export const auth = {
  namespaced: true,
  actions: {
    login({ dispatch, commit }, { email, password }) {
      return new Promise((resolve, reject) => {
        axiosInstance
          .post("/user/login", { email, password })
          .then((response) => {
            resolve(response.data);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
    signup({ dispatch, commit }, { name, email, password }) {
      return new Promise((resolve, reject) => {
        axiosInstance
          .post("/user/register", { name, email, password })
          .then((response) => {
            resolve(response.data);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
  },
};
