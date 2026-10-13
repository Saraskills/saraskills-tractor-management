<template>
  <div class="container page-shell">
    <div class="text-center mb-5">
      <h1 class="fw-bold">Pricing</h1>
      <div class="btn-group mt-3" role="group" aria-label="Billing cycle toggle">
        <button type="button" class="btn" :class="billing === 'monthly' ? 'btn-success text-white' : 'btn-outline-success'" @click="billing = 'monthly'">Monthly</button>
        <button type="button" class="btn" :class="billing === 'yearly' ? 'btn-success text-white' : 'btn-outline-success'" @click="billing = 'yearly'">Yearly</button>
      </div>
      <div class="mt-3 text-success fw-semibold">Save 20%</div>
    </div>

    <div class="row g-4" v-if="plans.length">
      <div class="col-md-4" v-for="plan in plans" :key="plan.id">
        <div class="card h-100 border-0 card-shadow p-4 price-card" :class="{ popular: plan.is_popular }">
          <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold mb-0">{{ plan.name }}</h4>
            <span v-if="plan.is_popular" class="badge bg-success rounded-pill">Popular</span>
          </div>
          <p class="text-muted mt-3">{{ plan.description }}</p>
          <div class="display-6 fw-bold">
            ₹{{ billing === 'monthly' ? plan.price : Math.round(plan.price * 12 * 0.8) }}
            <small class="fs-6 text-muted">/{{ billing === 'monthly' ? 'month' : 'year' }}</small>
          </div>
          <ul class="list-unstyled mt-4">
            <li v-for="feature in plan.features" :key="feature.id" class="mb-2">✓ {{ feature.feature }}</li>
          </ul>
          <button class="btn primary-btn w-100 mt-3">Get Started</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import api from '../services/api';

const plans = ref([]);
const billing = ref('monthly');

onMounted(async () => {
  try {
    const response = await api.get('/plans');
    plans.value = response.data.data ?? [];
  } catch (error) {
    plans.value = [];
  }
});
</script>
