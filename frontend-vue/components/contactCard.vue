<template>
  <NuxtLink :to="{ name: 'contactProfile', params: { id: contact.id } }" @click="selectContact(contact.id)">
    <div class="contactCard bg-white rounded-lg p-4 flex items-center shadow mb-4">
      <img
        v-if="contact.image"
        :src="contact.image"
        :alt="contact.name"
        class="profileImageCard"
      />
      <img
        v-else
        src="../static/emptyContact.png"
        :alt="contact.name"
        class="profileImageCard"
      />
      <div class="contactInfo flex-grow truncate">
        <p class="contactName text-lg font-bold mb-1 truncate">{{ contact.name }}</p>
        <p class="description text-sm text-gray-400 mb-2 truncate">{{ contact.position }}</p>
        <i class="fas fa-arrow-right"></i>
      </div>
    </div>
  </NuxtLink>
</template>

<script>
import { useContactStore } from '#imports';

export default {
  props: {
    contact: {
      type: Object,
      required: true,
    },
  },
  methods: {
    selectContact(id) {
      useContactStore().setSelectedContactId(id);
    },
  },
};
</script>

<style>
</style>