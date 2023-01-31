import { createStore } from 'vuex'
import * as auth from "@/store/modules/Auth";
import * as pin from "@/store/modules/Pin";
import * as pinFavorite from "@/store/modules/PinFavorite";
import * as pinModeration from "@/store/modules/PinModeration";

const store = createStore({
  modules: {
    auth,
    pin,
    pinFavorite,
    pinModeration
  },
})

// add this line to access store wherever you need
export default store