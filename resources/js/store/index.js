import { createStore } from 'vuex'
import * as auth from "@/store/modules/Auth";

const store = createStore({
  modules: {
    auth
  },
})

// add this line to access store wherever you need
export default store