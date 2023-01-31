<template>
  <form class="space-y-4" @submit.prevent="login">
    <div class="rounded-md shadow-sm -space-y-px">
      <FlashMessage :error="error" />
      <div class="flex flex-col gap-5">
        <div class="col-span-12">
          <FormInput type="email" label="Email" name="email" v-model="email" autocomplete="email" placeholder="your@email.com"
            class="mb-2" />
        </div>
        <div class="col-span-12">
          <FormInput type="password" label="Password" name="password" v-model="password" class="mb-4" />
        </div>
        <div class="col-span-12">
          <button type="submit"
            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            </span>
            Sign In
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
  name: 'FormLogin',
  components: {
    FormInput,
    FlashMessage
  },
  data() {
    return {
      email: null,
      password: null,
      error: null,
    };
  },
  methods: {
    async login() {
      const payload = {
        email: this.email,
        password: this.password,
      };
      this.error = null;
      try {
        await AuthService.login(payload);
        const authUser = await this.$store.dispatch("auth/getAuthUser");
        if (authUser) {
          this.$store.dispatch("auth/setGuest", { value: "isNotGuest" });
          this.$router.push("/");
        } else {
          const error = Error(
            "Unable to fetch user after login, check your API settings."
          );
          error.name = "Fetch User";
          throw error;
        }
      } catch (error) {
        this.error = getError(error);
      }
    },
  },
}
</script>