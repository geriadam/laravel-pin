<template>
  <div class="break-inside-avoid p-1">
    <div class="relative">
      <Skeletor width="100%" height="200" class="rounded-lg w-full" />
    </div>
    <div class="text-sm leading-tight pt-2 mb-2">
      <div class="block mb-2">
        <Skeletor width="100%" />
      </div>
      <Skeletor width="100%" />
      <Skeletor width="100%" />
    </div>
    <div>
      <div class="flex flex-row justify-between">
        <div class="flex flex-row gap-3 items-center">
          <Skeletor circle size="16px" />
          <span class="text-sm font-bold">
            <Skeletor width="30px" />
          </span>
        </div>
        <div>
          <span>
            <Skeletor circle size="2rem" />
          </span>
        </div>
      </div>
      <Skeletor width="100px" />
    </div>
  </div>
</template>
<script>
import "vue-skeletor/dist/vue-skeletor.css";
import { Skeletor } from "vue-skeletor";
export default {
  name: 'PinItemSkeleton',
  components: {
    Skeletor
  }
}
</script>