<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>
<template>
  <header class="shadow border border-b-2">
    <nav class="container w-full flex justify-around py-8 bg-white mx-auto">
      <div class="flex items-center">
        <router-link :to="{ name: 'Main' }" custom v-slot="{ navigate }">
          <h3 @click="navigate" class="text-2xl font-medium text-blue-500 cursor-pointer">Laravel Pin</h3>
        </router-link>
      </div>
      
      <button data-collapse-toggle="navbar-default" type="button"
        class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
      <div class="hidden lg:flex items-center space-x-4">
        <span class="pr-2" v-if="loggedIn">
          {{ authUser?.email }}
        </span>
        <router-link to="/moderation" custom v-slot="{ navigate }" v-if="loggedIn && isAdmin">
          <button @click="navigate" class="px-4 py-2 text-white bg-blue-400 rounded-md">
            Moderation
          </button>
        </router-link>
        <router-link to="/favorites" custom v-slot="{ navigate }" v-if="loggedIn">
          <button @click="navigate"
            class="flex flex-row gap-2 items-center justify-center px-4 py-2 text-gray-800 bg-white border border-gray-800 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="15px"
              width="15px" version="1.1" id="Layer_1" viewBox="0 0 495 495" xml:space="preserve">
              <g>
                <path style="fill:#C70024;"
                  d="M362.96,14.24c-49.72,0-92.95,27.53-115.46,68.13v398.39C284.67,452.84,495,288.55,495,146.28   C495,73.36,435.88,14.24,362.96,14.24z" />
                <path style="fill:#FF0C38;"
                  d="M132.04,14.24C59.12,14.24,0,73.36,0,146.28c0,142.26,210.33,306.55,247.5,334.48V82.37   C224.99,41.77,181.76,14.24,132.04,14.24z" />
              </g>
            </svg>
            <span>Favorites</span>
          </button>
        </router-link>
        <router-link to="/upload" custom v-slot="{ navigate }" v-if="loggedIn">
          <button @click="navigate" class="px-4 py-2 text-gray-100 bg-gray-400 rounded-md">
            Upload
          </button>
        </router-link>
        <router-link to="/login" custom v-slot="{ navigate }" v-if="!loggedIn">
          <button @click="navigate" class="px-4 py-2 text-blue-100 bg-blue-800 rounded-md">
            Login
          </button>
        </router-link>
        <Logout v-if="loggedIn" />
      </div>
    </nav>
  </header>
  <div class="min-h-screen bg-gray-100">
    <RouterView />
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Logout from "@/components/Logout.vue";
export default {
  components: {
    Logout
  },
  computed: {
    ...mapGetters("auth", ["authUser", "isAdmin", "loggedIn"]),
  },
}
</script>