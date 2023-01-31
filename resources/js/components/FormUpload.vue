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
          <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
          <div id="preview" class="mb-2" v-if="imageData">
            <figure class="relative h-60 w-60 flex justify-center mx-auto cursor-pointer" @click="toggleModal">
              <img class="absolute w-full h-full object-cover" :src="imageData" />
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
          <FormInput type="text" label="Title" name="title" v-model="title" placeholder="Fantastic Image"
            class="mb-2" />
        </div>
        <div class="col-span-12">
          <FormTextArea label="Description" name="description" v-model="description" class="mb-2" />
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
    }
  },
  methods: {
    clearData() {
      this.title = null
      this.description = null,
      this.imageData = null
      this.files = null
    },
    async upload() {
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
          })
          .catch((error) => (this.error = getError(error)));
      } catch (error) {
        this.error = getError(error);
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