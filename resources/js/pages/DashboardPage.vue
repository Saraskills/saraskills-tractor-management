<template>
  <div class="container page-shell">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card border-0 card-shadow p-4">
          <h2 class="fw-bold mb-4">Reset Password</h2>
          <form @submit.prevent="submitForm">
            <div class="mb-3"><label class="form-label">Email</label><input v-model="form.email" type="email" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Password</label><input v-model="form.password" type="password" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Confirm Password</label><input v-model="form.password_confirmation" type="password" class="form-control" required></div>
            <button class="btn primary-btn w-100" type="submit">Reset Password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
const form = reactive({ email: '', password: '', password_confirmation: '' });
const submitForm = () => alert('Password reset submitted.');
</script>
