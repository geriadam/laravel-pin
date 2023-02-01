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
  <form class="space-y-4" @submit.prevent="upload">
    <div class="rounded-md shadow-sm -space-y-px">
      <FlashMessage :message="message" :error="error" />
      <div class="flex flex-col gap-5">
        <div class="col-span-12">
          <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
            Image</label>
          <div id="preview" class="mb-2" v-if="imageData">
            <figure class="relative h-60 w-60 flex justify-center mx-auto cursor-pointer" @click="toggleModal">
              <img class="absolute w-full h-full object-cover" :src="imageData" />
            </figure>
          </div>
          <button @click="chooseImage" type="button"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            </span>
            {{ imageData === null ? 'CHOOSE FILE' : 'EDIT' }}
          </button>
          <input class="file-input hidden" ref="fileInput" type="file" @input="onSelectFile">
        </div>
        <div class="col-span-12">
          <FormInput type="text" label="Title" name="title" v-model="title" placeholder="Your amazing image"
            class="mb-2" />
        </div>
        <div class="col-span-12">
          <FormTextArea label="Description" name="description" v-model="description" class="mb-2" />
        </div>
        <div class="col-span-12">
          <button type="submit" :disabled="loading"
            class="disabled:opacity-75 group relative w-full flex items-center justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span v-if="!loading">
              Upload
            </span>
            <span v-else class="flex items-center justify-center">
              <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                  fill="#E5E7EB" />
                <path
                  d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                  fill="currentColor" />
              </svg>
              Loading...
            </span>
          </button>
        </div>
      </div>
    </div>
  </form>
</template>
<script>
import { getError } from "@/utils/helpers";
import PinService from "@/services/PinService";
import FormInput from "@/components/Form/FormInput.vue";
import FormTextArea from "@/components/Form/FormTextArea.vue";
import FlashMessage from "@/components/FlashMessage.vue";
export default {
  name: 'FormUpload',
  components: {
    FormInput,
    FlashMessage,
    FormTextArea
  },
  data() {
    return {
      title: null,
      description: null,
      imageData: null,
      files: null,
      showModal: false,
      message: null,
      error: null,
      loading: false
    }
  },
  methods: {
    clearData() {
      this.title = null
      this.description = null
      this.imageData = null
      this.files = null
    },
    async upload() {
      this.loading = true
      const formData = new FormData();
      formData.append('title', this.title);
      formData.append('description', this.description);
      formData.append('image', this.files);
      this.error = null;
      try {
        PinService.upload(formData)
          .then(() => {
            this.message = "File uploaded.";
            this.$emit("fileUploaded");
            this.clearData()
            this.loading = false
          })
          .catch((error) => {
            this.error = getError(error)
            this.loading = false
          });
      } catch (error) {
        this.error = getError(error);
        this.loading = false
      }
    },
    onSelectFile() {
      const input = this.$refs.fileInput
      const files = input.files
      if (files && files[0]) {
        const reader = new FileReader
        reader.onload = e => {
          this.imageData = e.target.result
        }
        reader.readAsDataURL(files[0])
        this.files = files[0]
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