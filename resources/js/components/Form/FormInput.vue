<template>
  <div>
    <label :for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :class="{ 'sr-only': !showLabel }" v-if="label">
      {{ label }}
    </label>
    <input :id="name" :type="type" :value="modelValue" :required="required" @input="$emit('update:modelValue', $event.target.value)" :placeholder="placeholder"
      :autocomplete="autocomplete"
      class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
  </div>
</template>

<script>
export default {
  name: "FormInput",
  emits: ['update:modelValue'],
  props: {
    name: {
      type: String,
      required: true,
    },
    label: {
      type: String,
      default: "",
    },
    modelValue: {
      type: [String, Number],
    },
    type: {
      type: String,
      default: "text",
    },
    showLabel: {
      type: Boolean,
      default: true,
    },
    required: {
      type: Boolean,
      default: false,
    },
    placeholder: {
      type: String,
      default: null,
    },
    autocomplete: {
      type: String,
      default: null,
    },
  }
};
</script>