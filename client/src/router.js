import { createRouter, createWebHistory } from "vue-router";
import LogIn from "@/views/Auth/LogIn";
import SignUp from "@/views/Auth/SignUp";

const routes = [
  {
    path: "/",
    component: LogIn,
  },
  {
    path: "/register",
    component: SignUp,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
