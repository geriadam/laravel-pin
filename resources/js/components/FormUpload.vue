<template>
  <div v-if="showModal"
    class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
    <div class="relative w-auto my-6 mx-auto max-w-6xl">
      <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
        <!--body-->
        <div class="relative p-6 flex-auto">
          <img class="w-full h-full" v-if="imageData" :src="imageData" />
        </div>
        <!--footer-->
        <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
          <button
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
            type="button" v-on:click="toggleModal()">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
  <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
  <form class="space-y-4" action="#" method="POST">
    <div class="rounded-md shadow-sm -space-y-px">
      <div class="flex flex-col gap-5">
        <div class="col-span-12">
          <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
          <div id="preview" class="mb-2">
            <figure class="relative h-60 w-60 flex justify-center mx-auto cursor-pointer" @click="toggleModal">
              <img class="absolute w-full h-full object-cover" v-if="imageData" :src="imageData" />
            </figure>
          </div>
          <button
            @click="chooseImage"
            type="button"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            </span>
            {{ imageData === null ? 'CHOOSE FILE' : 'EDIT' }}
          </button>
          <input class="file-input hidden" ref="fileInput" type="file" @input="onSelectFile">
        </div>
        <div class="col-span-12">
          <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
          <input type="text"
            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="col-span-12">
          <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
          <textarea
            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </textarea>
        </div>
        <div class="col-span-12">
          <button type="submit"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            </span>
            Upload
          </button>
        </div>
      </div>
    </div>
  </form>
</template>
<script>
export default {
  name: 'FormUpload',
  data() {
    return {
      imageData: null,
      showModal: true
    }
  },
  methods: {
    onSelectFile() {
      const input = this.$refs.fileInput
      const files = input.files
      if (files && files[0]) {
        const reader = new FileReader
        reader.onload = e => {
          this.imageData = e.target.result
        }
        reader.readAsDataURL(files[0])
        this.$emit('input', files[0])
      }
    },
    chooseImage() {
      this.$refs.fileInput.click()
    },
    toggleModal() {
      this.showModal = !this.showModal;
    }
  }
}
</script>