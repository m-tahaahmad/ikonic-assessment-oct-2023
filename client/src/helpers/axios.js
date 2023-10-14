import axios from "axios";

const axiosInstance = axios.create({
  baseURL: `http://localhost:8000/api`,
});

if (localStorage.getItem("token") !== null) {
  const token = "Bearer " + localStorage.getItem("token");
  axiosInstance.interceptors.request.use((request) => {
    request.headers = {
      Authorization: token,
      Accept: "application/json",
    };
    return request;
  });
}

export default axiosInstance;
