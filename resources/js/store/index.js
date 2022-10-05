import { createStore } from "vuex";
import { auth } from "./auth.module";
import { admin } from "./admin.module";

const store = createStore({
    modules: {
        auth,
        admin,
    },
});

export default store;
