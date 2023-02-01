<template>
  <div class="container mx-auto pt-10">
    <div v-if="pins.length" class="masonry-1-col md:masonry-2-col lg:masonry-4-col gap-5 mx-auto space-y-3 pb-28">
      <div v-for="(pin, i) in pins" :key="i">
        <PinItem :index="index" :pin="pin" />
      </div>
    </div>
    <div v-if="nextPageUrl && !loading" class="flex justify-center">
      <button @click="handleLoadMore()" class="px-5 py-3 text-blue-100 bg-blue-800 rounded-md text-base font-medium">
        Load More </button>
    </div>
    <div v-if="loading && !pins.length"
      class="masonry-1-col md:masonry-2-col lg:masonry-4-col gap-5 mx-auto space-y-3 pb-28">
      <div v-for="item in dummy">
        <PinItemSkeleton />
      </div>
    </div>
    <div class="flex justify-center" v-if="!loading && !pins.length">
      <img src="@/assets/empty-data.png" />
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
import store from "@/store/index";
import FlashMessage from "@/components/FlashMessage.vue";
import PinItem from '@/components/PinItem.vue';
import PinItemSkeleton from '@/components/PinItemSkeleton.vue';
export default {
  components: {
    PinItem,
    FlashMessage,
    PinItemSkeleton
  },
  data() {
    return {
      dummy: 20
    }
  },
  computed: {
    ...mapGetters("pin", ["loading", "error", "pins", "nextPageUrl"]),
  },
  beforeMount() {
    store.dispatch("pin/getPins", 1)
  },
  mounted() {
    this.handleInfinite()
  },
  methods: {
    handleLoadMore() {
      store.dispatch("pin/paginatePins")
    },
    handleInfinite() {
      window.onscroll = () => {
        let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;
        if (bottomOfWindow) {
          this.handleLoadMore()
        }
      }
    }
  }
}

</script>