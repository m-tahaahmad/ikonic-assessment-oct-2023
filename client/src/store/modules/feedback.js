import axiosInstance from "@/helpers/axios";

export const feedback = {
  namespaced: true,
  actions: {
    store({ dispatch, commit }, { data }) {
      return new Promise((resolve, reject) => {
        axiosInstance
          .post("/feedback", { data })
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
          .put(`/feedback/${id}`, { data })
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
