import { createStore } from "vuex";

import { auth } from "./modules/auth";
import { feedback } from "./modules/feedback";
import { comment } from "./modules/comment";
import { user } from "./modules/user";

export default createStore({
  modules: {
    auth,
    feedback,
    comment,
    user
  },
});
