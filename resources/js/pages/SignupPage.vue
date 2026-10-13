<template>
  <div class="container page-shell">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card border-0 card-shadow p-4">
          <h2 class="fw-bold mb-4">Login</h2>
          <form @submit.prevent="handleLogin">
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input v-model="form.email" type="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input v-model="form.password" type="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
              <label class="form-check-label"><input type="checkbox" v-model="remember"> Remember me</label>
              <router-link to="/forgot-password" class="text-success">Forgot Password?</router-link>
            </div>
            <button class="btn primary-btn w-100" type="submit">Login</button>
            <p class="text-center mt-3 mb-0">Don't have an account? <router-link to="/signup" class="text-success">Create Account</router-link></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { useRouter } from 'vue-router';
import authStore from '../stores/auth';

const router = useRouter();
const form = reactive({ email: '', password: '' });
const remember = ref(false);

const handleLogin = async () => {
  try {
    await authStore.login(form.email, form.password, remember.value);
    router.push('/dashboard');
  } catch (error) {
    alert('Invalid credentials. Please try again.');
  }
};
</script>
