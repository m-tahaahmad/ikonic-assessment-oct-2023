import { createRouter, createWebHistory } from "vue-router";

// views
import LogIn from "@/views/Auth/LogIn";
import SignUp from "@/views/Auth/SignUp";
import FeedbackIndex from "@/views/Feedback/Index";
import FeedbackCreate from "@/views/Feedback/Create";
import FeedbackShow from "@/views/Feedback/Show";
import User from "@/views/User/Index";

// componenst
import Body from "@/components/body";

const routes = [
  {
    path: "/",
    name: "Login",
    component: LogIn,
  },
  {
    path: "/register",
    name: "SignUp",
    component: SignUp,
  },
  {
    path: "/feedback",
    component: Body,
    children: [
      {
        path: "/feedback",
        component: FeedbackIndex,
      },
      {
        path: "/feedback/create",
        component: FeedbackCreate,
      },
      {
        path: "/feedback/:id",
        component: FeedbackShow,
      },
    ],
  },
  {
    path: "/user",
    component: Body,
    children: [
      {
        path: "/user",
        component: User,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  linkActiveClass: "active",
});

router.beforeEach((to, from, next) => {
  const isAuthenticated = !!localStorage.getItem("token");
  if (!isAuthenticated && to.name !== "Login") next({ name: "Login" });
  else next();
});

export default router;
