<template>
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-md-6 col-lg-4" v-for="service in services" :key="service.title">
        <div class="card h-100 border-0 card-shadow p-4">
          <div class="feature-icon mb-3">{{ service.icon }}</div>
          <h5 class="fw-bold">{{ service.title }}</h5>
          <p class="text-muted mb-3">{{ service.description }}</p>
          <a href="#" class="text-decoration-none text-success fw-semibold">Learn More</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const services = [
  { title: 'Web Application Development', icon: 'W', description: 'Custom web platforms designed for speed, scalability, and business performance.' },
  { title: 'Business Management Software', icon: 'B', description: 'Operational dashboards that keep your teams aligned and your processes visible.' },
  { title: 'Custom ERP Solutions', icon: 'E', description: 'Smart ERP workflows built around your unique business rules and data.' },
  { title: 'CRM Solutions', icon: 'C', description: 'Close more opportunities with streamlined lead, customer, and pipeline management.' },
  { title: 'Inventory Management', icon: 'I', description: 'Monitor stock movement, optimize purchasing, and prevent shortages with precision.' },
  { title: 'Mobile & API Integration', icon: 'A', description: 'Connect mobile apps, third-party tools, and services through reliable APIs.' },
];
</script>
