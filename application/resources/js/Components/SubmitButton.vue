<template>
  <button
    class="flex items-center space-x-1 px-4 py-2 duration-100 rounded-md"
    :type="type"
    :disabled="isProcessing"
    :class="{
      'cursor-not-allowed bg-gray-300 text-white ': isProcessing,
      'bg-red-500 text-white': !isProcessing,
    }"
  >
    <slot />
  </button>
</template>

<script>
export default {
  name: 'SubmitButton',
  props: {
    isProcessing: {
      required: false,
      type: Boolean,
    },
    type: {
      type: String,
      required: false,
      default: 'button',
    },
  },
};
</script>
