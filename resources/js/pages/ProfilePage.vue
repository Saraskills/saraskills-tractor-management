<template>
  <div class="container page-shell">
    <div class="row g-4">
      <div class="col-lg-3">
        <div class="card border-0 card-shadow p-3">
          <h5 class="fw-bold">Navigation</h5>
          <ul class="list-unstyled mt-3 mb-0">
            <li class="mb-2"><router-link to="/dashboard" class="text-decoration-none text-dark">Dashboard</router-link></li>
            <li class="mb-2"><router-link to="/profile" class="text-decoration-none text-dark">Profile</router-link></li>
            <li class="mb-2"><router-link to="/settings" class="text-decoration-none text-dark">Settings</router-link></li>
            <li><button class="btn btn-link text-dark p-0" @click="logout">Logout</button></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="card border-0 card-shadow p-4">
          <h2 class="fw-bold">Welcome to SaraSkills</h2>
          <div class="row g-3 mt-2">
            <div class="col-md-3"><div class="card border-0 bg-light p-3"><small>Current Plan</small><div class="fw-bold">{{ currentPlan }}</div></div></div>
            <div class="col-md-3"><div class="card border-0 bg-light p-3"><small>Subscription Status</small><div class="fw-bold">{{ status }}</div></div></div>
            <div class="col-md-3"><div class="card border-0 bg-light p-3"><small>Account Created</small><div class="fw-bold">{{ created }}</div></div></div>
            <div class="col-md-3"><div class="card border-0 bg-light p-3"><small>Next Billing Date</small><div class="fw-bold">{{ billing }}</div></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router';
import authStore from '../stores/auth';

const router = useRouter();
const currentPlan = 'Professional';
const status = 'Active';
const created = 'Today';
const billing = '2026-11-13';

const logout = async () => {
  await authStore.logout();
  router.push('/login');
};
</script>
