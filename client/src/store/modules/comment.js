import axiosInstance from "@/helpers/axios";

export const comment = {
  namespaced: true,
  actions: {
    store({ dispatch, commit }, { data }) {
      return new Promise((resolve, reject) => {
        axiosInstance
          .post("/comment", { data })
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
          .get("/feedback")
          .then((response) => {
            resolve(response.data);
          })
          .catch((e) => {
            reject(e);
          });
      });
    },
    fetchSingle({ dispatch, commit }, { id }) {
      return new Promise((resolve, reject) => {
        axiosInstance
          .get(`/feedback/${id}`)
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
