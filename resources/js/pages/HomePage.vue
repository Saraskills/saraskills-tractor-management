<template>
  <div class="container py-5">
    <div class="text-center mb-4">
      <h3 class="fw-bold">Our Products & Solutions</h3>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4" v-for="product in products" :key="product.title">
        <div class="card h-100 border-0 card-shadow p-4">
          <div class="feature-icon mb-3">{{ product.icon }}</div>
          <h5 class="fw-bold">{{ product.title }}</h5>
          <p class="text-muted">{{ product.description }}</p>
          <button class="btn secondary-btn w-100 mt-auto">View Details</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const products = [
  { title: 'AgriManager', icon: 'A', description: 'Smart agriculture operations management for farms and agribusiness growth.' },
  { title: 'Tractor Management', icon: 'T', description: 'Monitor fleet utilization, maintenance, and field operations efficiently.' },
  { title: 'Inventory Management', icon: 'I', description: 'Handle stock, procurement, and movement across your supply chain.' },
  { title: 'Business ERP', icon: 'E', description: 'Connect finance, HR, sales, and operations in one unified system.' },
  { title: 'Employee Management', icon: 'M', description: 'Simplify attendance, payroll, and workforce planning for your company.' },
  { title: 'Expense Management', icon: '₹', description: 'Track costs, submit claims, and improve financial visibility instantly.' },
];
</script>
