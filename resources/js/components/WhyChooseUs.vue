<template>
  <div class="container py-5">
    <div class="text-center mb-4">
      <h3 class="fw-bold">Why Choose SaraSkills</h3>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3" v-for="feature in features" :key="feature.title">
        <div class="card border-0 h-100 card-shadow p-4 text-center">
          <div class="feature-icon mx-auto mb-3">{{ feature.icon }}</div>
          <h6 class="fw-bold">{{ feature.title }}</h6>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const features = [
  { title: 'Affordable Solutions', icon: '₹' },
  { title: 'Modern Technology', icon: 'T' },
  { title: 'Easy to Use', icon: 'U' },
  { title: 'Dedicated Support', icon: 'S' },
];
</script>
