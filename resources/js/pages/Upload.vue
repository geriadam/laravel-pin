<template>
  <div class="container mx-auto flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 lg:py-28">
    <div class="max-w-md w-full space-y-8 min-w-[40%]">
      <h1 class="text-3xl font-bold text-center">UPLOAD YOUR IMAGE</h1>
      <div class="bg-white w-full rounded overflow-hidden shadow-xl p-5">
        <FormUpload />
      </div>
    </div>
  </div>
</template>
<script>
import FormUpload from '@/components/FormUpload.vue';
export default {
  components: {
    FormUpload
  }
};
</script>