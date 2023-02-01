<template>
  <div v-if="message || error">
    <transition-group name="fade">
      <p v-if="message" class="bg-green-200 border border-green-500 text-sm p-4 text-green-500 mb-4" key="message">
        {{ message }}
      </p>
      <p v-if="error && getType(error) === 'string'" key="error" class="text-sm text-red-500 py-4">
        {{ error }}
      </p>
      <ul v-if="getType(error) === 'object'" class="bg-red-100 border border-red-400 mb-4 rounded text-sm text-red-500 p-4" key="error-list">
        <li v-for="key in errorKeys" :key="key">
          <ul class="ml-0">
            <li v-for="(item, index) in getErrors(key)" :key="`${index}-error`">
              {{ item }}
            </li>
          </ul>
        </li>
      </ul>
    </transition-group>
  </div>
</template>

<script>
export default {
  name: "FlashMessage",
  props: {
    message: {
      type: String,
      default: null,
    },
    error: {
      type: [Object, String],
      default: null,
    },
  },
  computed: {
    errorKeys() {
      if (!this.error || this.getType(this.error) === "string") {
        return null;
      }
      return Object.keys(this.error);
    },
  },
  methods: {
    getErrors(key) {
      return this.error[key];
    },
    getType(obj) {
      return Object.prototype.toString.call(obj).slice(8, -1).toLowerCase();
    },
  },
  filters: {
    titleCase(value) {
      return value.replace("_", " ");
    },
  },
};
</script>