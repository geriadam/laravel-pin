<template>
  <form class="space-y-4" @submit.prevent="registerUser">
    <div class="rounded-md shadow-sm -space-y-px">
      <FlashMessage :error="error" />
      <div class="flex flex-col gap-5">
        <div class="col-span-12">
          <FormInput type="email" label="Email" name="email" v-model="email" autocomplete="email"
            placeholder="your@email.com" class="mb-2" />
        </div>
        <div class="col-span-12">
          <FormInput type="password" label="Password" name="password" v-model="password" class="mb-4" />
        </div>
        <div class="col-span-12">
          <FormInput type="password" label="Password Confirmation" name="passwordConfirm" v-model="passwordConfirm"
            class="mb-4" />
        </div>
        <div class="col-span-12">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Admin</label>
          <select v-model="isAdmin" @change="onChangeIsAdmin($event)"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="0">No</option>
            <option value="1">Yes</option>
          </select>
        </div>
        <div class="col-span-12">
          <button type="submit" :disabled="loading"
            class="disabled:opacity-75 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span v-if="!loading">
              Sign Up
            </span>
            <span v-else class="flex items-center justify-center">
              <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin"
                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
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
import AuthService from "@/services/AuthService";
import FormInput from "@/components/Form/FormInput.vue";
import FlashMessage from "@/components/FlashMessage.vue";
export default {
  name: 'FormRegister',
  components: {
    FormInput,
    FlashMessage,
  },
  data() {
    return {
      email: null,
      password: null,
      passwordConfirm: null,
      isAdmin: 0,
      error: null,
      loading: false
    };
  },
  methods: {
    async registerUser() {
      try {
        this.error = null;
        this.loading = true;
        const payload = {
          email: this.email,
          password: this.password,
          password_confirmation: this.passwordConfirm,
          is_admin: this.isAdmin
        };
        AuthService.registerUser(payload)
          .then(() => {
            this.$router
              .push({ path: '/' })
          })
          .catch((error) => (this.error = getError(error)));
      } catch (error) {
        this.error = getError(error);
      }
      this.loading = false
    },
    onChangeIsAdmin(event) {
      this.isAdmin = event.target.value
    }
  },
}
</script>