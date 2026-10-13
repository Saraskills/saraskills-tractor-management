<template>
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <router-link class="navbar-brand fw-bold brand-text" to="/">SARA SKILLS</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><router-link class="nav-link" to="/">Home</router-link></li>
          <li class="nav-item"><router-link class="nav-link" to="/about">About</router-link></li>
          <li class="nav-item"><router-link class="nav-link" to="/pricing">Pricing</router-link></li>
          <li class="nav-item"><router-link class="nav-link" to="/contact">Contact</router-link></li>
        </ul>

        <div class="d-flex align-items-center gap-2">
          <template v-if="auth.user">
            <router-link class="btn btn-link text-dark" to="/dashboard">Dashboard</router-link>
            <button class="btn primary-btn" @click="logout">Logout</button>
          </template>
          <template v-else>
            <router-link class="btn btn-link text-dark" to="/login">Login</router-link>
            <router-link class="btn primary-btn" to="/signup">Get Started</router-link>
          </template>
        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { computed } from 'vue';
import { useRouter } from 'vue-router';
import authStore from '../stores/auth';

const router = useRouter();
const auth = authStore;
const user = computed(() => auth.user);

const logout = async () => {
  await auth.logout();
  router.push('/login');
};
</script>
