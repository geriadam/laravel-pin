import { createStore } from 'vuex'
import * as auth from "@/store/modules/Auth";
import * as pin from "@/store/modules/Pin";
import * as pinFavorite from "@/store/modules/PinFavorite";
import * as pinModeration from "@/store/modules/PinModeration";
import * as loader from "@/store/modules/Loader";

const store = createStore({
  modules: {
    auth,
    pin,
    pinFavorite,
    pinModeration,
    loader
  },
})

// add this line to access store wherever you need
export default store