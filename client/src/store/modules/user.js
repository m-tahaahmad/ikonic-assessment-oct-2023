import axiosInstance from "@/helpers/axios";

export const user = {
  namespaced: true,
  actions: {
    store({ dispatch, commit }, { data }) {
      return new Promise((resolve, reject) => {
        axiosInstance
          .post("/user/register", { data })
          .then((response) => {
            resolve(response.data);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
    update({ dispatch, commit }, { data, id }) {
      return new Promise((resolve, reject) => {
        axiosInstance
          .put(`/user/${id}`, { data })
          .then((response) => {
            resolve(response.data);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
    fetch() {
      return new Promise((resolve, reject) => {
        axiosInstance
          .get("/user")
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
