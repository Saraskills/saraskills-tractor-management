<template>
  <div class="container page-shell">
    <div class="row justify-content-center">
      <div class="col-md-7 col-lg-6">
        <div class="card border-0 card-shadow p-4">
          <h2 class="fw-bold mb-4">Create Account</h2>
          <form @submit.prevent="handleSubmit">
            <div class="mb-3"><label class="form-label">Name</label><input v-model="form.name" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Email</label><input v-model="form.email" type="email" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Phone</label><input v-model="form.phone" class="form-control"></div>
            <div class="mb-3"><label class="form-label">Password</label><input v-model="form.password" type="password" class="form-control" required></div>
            <div class="mb-3"><label class="form-label">Confirm Password</label><input v-model="form.password_confirmation" type="password" class="form-control" required></div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" v-model="acceptTerms" required>
              <label class="form-check-label">I agree to Terms & Conditions</label>
            </div>
            <button class="btn primary-btn w-100" type="submit">Create Account</button>
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
const acceptTerms = ref(false);
const form = reactive({
  name: '',
  email: '',
  phone: '',
  password: '',
  password_confirmation: '',
});

const handleSubmit = async () => {
  try {
    await authStore.register(form);
    router.push('/dashboard');
  } catch (error) {
    alert('Unable to create account. Please check the form and try again.');
  }
};
</script>
