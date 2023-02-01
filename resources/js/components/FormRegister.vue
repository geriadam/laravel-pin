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
          <FormButton text="Sign Up" />
        </div>
      </div>
    </div>
  </form>
</template>
<script>
import { mapGetters } from "vuex";
import { getError } from "@/utils/helpers";
import AuthService from "@/services/AuthService";
import FormInput from "@/components/Form/FormInput.vue";
import FlashMessage from "@/components/FlashMessage.vue";
import FormButton from "@/components/Form/FormButton.vue";
export default {
  name: 'FormRegister',
  components: {
    FormInput,
    FormButton,
    FlashMessage,
  },
  data() {
    return {
      email: null,
      password: null,
      passwordConfirm: null,
      isAdmin: 0,
      error: null
    };
  },
  computed: {
    ...mapGetters("loader", ["isStateLoading"]),
  },
  methods: {
    async registerUser() {
      this.error = null;
      const payload = {
        email: this.email,
        password: this.password,
        password_confirmation: this.passwordConfirm,
        is_admin: this.isAdmin
      };
      try {
        this.$store.dispatch('loader/show');
        await AuthService.registerUser(payload)
          .then(() => {
            this.$router
              .push({ path: '/' })
          })
          .catch((error) => (this.error = getError(error)));
      } catch (error) {
        this.error = getError(error);
      }
      this.$store.dispatch('loader/hide');
    },
    onChangeIsAdmin(event) {
      this.isAdmin = event.target.value
    }
  },
}
</script>