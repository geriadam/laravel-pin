import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// Use a new variable and export values to change default behaviour.
let store = null

/*
 * If not building with SSR mode, you can
 * directly export the Store instantiation;
 *
 * The function below can be async too; either use
 * async/await or return a Promise which resolves
 * with the Store instance.
 */

export default function (/* { ssrContext } */) {
  const Store = new Vuex.Store({
    // enable strict mode (adds overhead!)
    // for dev mode only
    strict: process.env.DEBUGGING
  })

  // add this so that we export store
  store = Store

  return Store
}

// add this line to access store wherever you need
export { store }