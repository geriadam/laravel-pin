<template>
  <div class="container mx-auto pt-10">
    <h1 class="text-3xl font-bold text-center mb-10">IMAGE MODERATION</h1>
    <FlashMessage message="loading..." v-if="loading && !pins.length" key="loading" />
    <div v-if="pins.length" class="masonry-1-col md:masonry-2-col lg:masonry-4-col gap-5 mx-auto space-y-3 pb-28">
      <div v-for="(pin, i) in pins" :key="i">
        <PinItem :index="index" :pin="pin" />
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
export default {
  components: {
    PinItem,
    FlashMessage
  },
  computed: {
    ...mapGetters("pinModeration", ["loading", "error", "pins", "links"]),
  },
  mounted() {
    store.dispatch("pinModeration/getPins", 1)
  },
}

</script>