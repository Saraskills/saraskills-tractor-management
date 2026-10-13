<template>
  <div class="container page-shell">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card border-0 card-shadow p-4">
          <h2 class="fw-bold mb-4">Forgot Password</h2>
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input v-model="email" type="email" class="form-control" required>
            </div>
            <button class="btn primary-btn w-100" type="submit">Send Reset Link</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
const email = ref('');
const submitForm = () => alert('Password reset link would be sent to ' + email.value);
</script>
