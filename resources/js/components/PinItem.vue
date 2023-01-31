<template>
  <div class="break-inside-avoid p-1">
    <div class="relative">
      <img :src="pin.image" alt="" class="rounded-lg w-full">
    </div>
    <div class="text-sm leading-tight pt-2 mb-2">
      <h1 class="block mb-2 text-lg font-bold text-gray-900 dark:text-white"> {{ pin.title }} </h1>
      <p> {{ pin.description }} </p>
    </div>
    <div v-if="pin.is_publish === 'yes'">
      <div class="flex flex-row justify-between">
        <div class="flex flex-row gap-3 items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
            <path fill="#f05542"
              d="M5.301 3.002c-.889-.047-1.759.247-2.404.893-1.29 1.292-1.175 3.49.26 4.926l.515.515L8.332 14l4.659-4.664.515-.515c1.435-1.437 1.55-3.634.26-4.926-1.29-1.292-3.483-1.175-4.918.262l-.516.517-.517-.517C7.098 3.438 6.19 3.049 5.3 3.002z" />
          </svg>
          <span class="text-sm font-bold">
            {{ pin.like_count ?? 0 }}
          </span>
        </div>
        <div v-if="loggedIn">
          <span @click="favoritePin(pin.id)">
            <svg class="w-8 h-8 cursor-pointer fill-red-500 hover:fill-red-300" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 122.88">
              <title>{{ pin.is_like ? 'Remove Faforite' : 'Favorite' }}</title>
              <path class="" d="M61.44,0A61.44,61.44,0,1,1,0,61.44,61.44,61.44,0,0,1,61.44,0Z" />
              <path class="fill-white"
                d="M32.5,53.39H43.06a2.18,2.18,0,0,1,2.17,2.18V84.52a2.19,2.19,0,0,1-2.17,2.18H32.5a2.19,2.19,0,0,1-2.18-2.18V55.57a2.19,2.19,0,0,1,2.18-2.18ZM60.2,31.68c1.14-5.82,10.66-.46,11.29,8.91a40.41,40.41,0,0,1-.81,9.93H84.29c5.65.23,10.59,4.28,7.1,10.93.8,2.9.92,6.3-1.24,7.65.27,4.57-1,7.41-3.37,9.65A11.42,11.42,0,0,1,85,84.63c-1.83,2.58-3.31,2-6.19,2h-23c-3.64,0-5.62-1-8-4V57C54.72,55.17,58.36,45.8,60.2,39.65v-8Z" />
            </svg>
          </span>
        </div>
      </div>
      <span v-if="pin.user" class="text-sm font-bold mt-3">
        Author : {{ pin.user.email }}
      </span>
    </div>
    <div v-if="pin.is_publish === 'no'" class="flex w-full mt-4">
      <FlashMessage :message="message" :error="error" />
      <button @click="approvePin(pin.id)" class="w-full px-5 py-2 text-blue-100 bg-blue-800 rounded-md text-base font-medium"> Allow </button>
    </div>
  </div>
</template>
<script>
import { getError } from "@/utils/helpers";
import { mapGetters } from "vuex";
import PinService from "@/services/PinService";
import FlashMessage from "@/components/FlashMessage.vue";
export default {
  name: 'PinItem',
  components: {
    FlashMessage
  },
  props: {
    index: {
      required: true
    },
    pin: {
      required: true,
      type: Object
    }
  },
  data() {
    return {
      error: null,
    }
  },
  computed: {
    ...mapGetters("auth", ["loggedIn"]),
  },
  methods: {
    async approvePin(id) {
      try {
        PinService.publishPin(id)
          .then(() => {
            this.$store.dispatch("pinModeration/getPins", 1)
          })
          .catch((error) => (this.error = getError(error)));
      } catch (error) {
        this.error = getError(error);
      }
    },
    async favoritePin(id) {
      try {
        PinService.likePin(id)
          .then(() => {
            this.$store.dispatch("pin/getPins", 1)
            this.$store.dispatch("pinFavorite/getPins", 1)
          })
          .catch((error) => (this.error = getError(error)));
      } catch (error) {
        this.error = getError(error);
      }
    }
  }
}
</script>