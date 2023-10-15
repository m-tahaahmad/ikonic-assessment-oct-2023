import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import Vue3EasyDataTable from "vue3-easy-data-table";
import CKEditor from "@ckeditor/ckeditor5-vue";

// styles
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import "@/assets/app.css";
import "vue3-easy-data-table/dist/style.css";

createApp(App)
  .use(store)
  .use(router)
  .use(CKEditor)
  .component("EasyDataTable", Vue3EasyDataTable)
  .mount("#app");
