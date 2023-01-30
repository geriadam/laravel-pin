<template>
  <div class="break-inside-avoid p-1">
    <div class="relative">
      <img :src="image" alt="" class="rounded-lg">
    </div>
    <div class="text-sm leading-tight pt-2 mb-2">
      <h1 class="block mb-2 text-lg font-bold text-gray-900 dark:text-white"> {{ title }} </h1>
      <p> {{ description }} </p>
    </div>
    <div class="flex flex-row gap-3 items-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
        <path fill="#f05542"
          d="M5.301 3.002c-.889-.047-1.759.247-2.404.893-1.29 1.292-1.175 3.49.26 4.926l.515.515L8.332 14l4.659-4.664.515-.515c1.435-1.437 1.55-3.634.26-4.926-1.29-1.292-3.483-1.175-4.918.262l-.516.517-.517-.517C7.098 3.438 6.19 3.049 5.3 3.002z" />
      </svg>
      <span class="text-sm font-bold">
        {{ countLike ?? 5 }}
      </span>
    </div>
  </div>
</template>
<script>
export default {
  name: 'PinItem',
  props: {
    index: {
      required: true
    },
    image: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    countLike: {
      default: 5
    }
  }
}
</script>