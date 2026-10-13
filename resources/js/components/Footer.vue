<template>
  <footer class="footer py-5 mt-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3">
          <h5 class="brand-text mb-3">SaraSkills</h5>
          <p class="mb-0">Smart software solutions for modern businesses.</p>
        </div>
        <div class="col-md-2">
          <h6>Quick Links</h6>
          <ul class="list-unstyled">
            <li><router-link class="text-decoration-none text-light" to="/">Home</router-link></li>
            <li><router-link class="text-decoration-none text-light" to="/about">About</router-link></li>
            <li><router-link class="text-decoration-none text-light" to="/pricing">Pricing</router-link></li>
            <li><router-link class="text-decoration-none text-light" to="/contact">Contact</router-link></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h6>Solutions</h6>
          <ul class="list-unstyled">
            <li>ERP</li>
            <li>CRM</li>
            <li>Inventory</li>
            <li>Agriculture</li>
            <li>Employee Management</li>
          </ul>
        </div>
        <div class="col-md-2">
          <h6>Support</h6>
          <ul class="list-unstyled">
            <li><router-link class="text-decoration-none text-light" to="/contact">Contact</router-link></li>
            <li>Privacy Policy</li>
            <li>Terms & Conditions</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>Company</h6>
          <p class="mb-0">Smart software solutions for modern businesses.</p>
        </div>
      </div>
      <hr class="border-secondary my-4" />
      <div class="text-center small">© 2026 SaraSkills. All Rights Reserved.</div>
    </div>
  </footer>
</template>
