<template>
  <div class="container page-shell">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card border-0 card-shadow p-4">
          <h1 class="fw-bold mb-4">Contact SaraSkills</h1>
          <form @submit.prevent="submitForm">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <input v-model="form.name" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input v-model="form.email" type="email" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input v-model="form.phone" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Subject</label>
                <input v-model="form.subject" class="form-control" required>
              </div>
              <div class="col-12">
                <label class="form-label">Message</label>
                <textarea v-model="form.message" class="form-control" rows="5" required></textarea>
              </div>
            </div>
            <button class="btn primary-btn mt-4" type="submit">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
import api from '../services/api';

const form = reactive({
  name: '',
  email: '',
  phone: '',
  subject: '',
  message: '',
});

const submitForm = async () => {
  try {
    await api.post('/contact', form);
    alert('Your message has been sent successfully.');
    Object.keys(form).forEach((key) => form[key] = '');
  } catch (error) {
    alert('There was an issue sending your message.');
  }
};
</script>
