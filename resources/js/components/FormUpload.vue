<template>
  <form class="space-y-4" action="#" method="POST">
    <div class="rounded-md shadow-sm -space-y-px">
      <div class="flex flex-col gap-5">
        <div class="col-span-12">
          <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
          <input class="form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFileMultiple"
            multiple>
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
  name: 'FormUpload'
}
</script>