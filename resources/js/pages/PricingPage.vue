<template>
  <div class="container page-shell">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <h1 class="fw-bold">About SaraSkills</h1>
        <p class="text-muted">SaraSkills builds practical and affordable software solutions for businesses, organizations and entrepreneurs.</p>
        <div class="row g-3 mt-2">
          <div class="col-md-6">
            <div class="card border-0 card-shadow p-3 h-100">
              <h5 class="fw-bold">Our Mission</h5>
              <p class="text-muted mb-0">To simplify business operations using modern, affordable, and scalable software.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card border-0 card-shadow p-3 h-100">
              <h5 class="fw-bold">Our Vision</h5>
              <p class="text-muted mb-0">To help businesses grow efficiently through inclusive digital transformation.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card border-0 card-shadow p-4 gradient-box">
          <h4 class="fw-bold">Our Values</h4>
          <ul class="list-unstyled mt-3 mb-0">
            <li class="mb-2">• Innovation</li>
            <li class="mb-2">• Simplicity</li>
            <li class="mb-2">• Reliability</li>
            <li>• Customer First</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mt-5">
      <h3 class="fw-bold mb-4">Technology Stack</h3>
      <div class="row g-3">
        <div class="col-md-2 col-6" v-for="tech in technologies" :key="tech">
          <div class="card border-0 card-shadow text-center p-3">
            <strong>{{ tech }}</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-5">
      <router-link to="/contact" class="btn primary-btn">Let's Build Something Together</router-link>
    </div>
  </div>
</template>

<script setup>
const technologies = ['Laravel', 'Vue.js', 'PHP', 'MySQL', 'REST API'];
</script>
