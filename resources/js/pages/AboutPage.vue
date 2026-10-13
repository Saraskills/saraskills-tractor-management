<template>
  <main>
    <section class="hero py-5">
      <div class="container py-5">
        <div class="row align-items-center g-4">
          <div class="col-lg-6">
            <div class="badge badge-success px-3 py-2 rounded-pill">Smart solutions for modern business</div>
            <h1 class="display-5 fw-bold mt-4">Smart Software Solutions for Your Business</h1>
            <p class="lead text-muted mt-3">Build, manage and grow your business with powerful, simple and affordable software solutions from SaraSkills.</p>
            <div class="d-flex gap-3 flex-wrap mt-4">
              <router-link to="/signup" class="btn primary-btn">Get Started</router-link>
              <router-link to="/pricing" class="btn secondary-btn">Explore Pricing</router-link>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-shadow border-0 p-4 gradient-box">
              <div class="row g-3">
                <div class="col-6"><div class="bg-white text-dark p-3 rounded-4"><strong>Fleet</strong><div class="fs-4 fw-bold mt-2">92%</div></div></div>
                <div class="col-6"><div class="bg-white text-dark p-3 rounded-4"><strong>Orders</strong><div class="fs-4 fw-bold mt-2">1.2k</div></div></div>
                <div class="col-12"><div class="bg-white text-dark p-3 rounded-4"><strong>Team Efficiency</strong><div class="progress mt-3" style="height:8px"><div class="progress-bar bg-success" style="width: 84%"></div></div></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <TechStackBanner />
    <ServicesGrid />
    <WhyChooseUs />
    <ProductsGrid />

    <section class="container py-5">
      <div class="text-center mb-4">
        <h3 class="fw-bold">Pricing Preview</h3>
      </div>
      <div class="row g-4" v-if="plans.length">
        <div class="col-md-4" v-for="plan in plans" :key="plan.id">
          <div class="card h-100 border-0 card-shadow p-4 price-card" :class="{ popular: plan.is_popular }">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="fw-bold mb-0">{{ plan.name }}</h5>
              <span v-if="plan.is_popular" class="badge bg-success rounded-pill">Popular</span>
            </div>
            <div class="mt-3">
              <span class="display-6 fw-bold">₹{{ plan.price }}</span>
              <span class="text-muted">/month</span>
            </div>
            <ul class="list-unstyled mt-3">
              <li v-for="feature in plan.features" :key="feature.id" class="mb-2">✓ {{ feature.feature }}</li>
            </ul>
            <button class="btn primary-btn w-100 mt-3">Choose Plan</button>
          </div>
        </div>
      </div>
    </section>

    <section class="container py-5">
      <div class="text-center mb-4">
        <h3 class="fw-bold">Testimonials</h3>
      </div>
      <div class="row g-4">
        <div class="col-md-4" v-for="item in testimonials" :key="item.name">
          <div class="card border-0 card-shadow h-100 p-4">
            <div class="text-warning mb-3">★★★★★</div>
            <p class="text-muted">“{{ item.quote }}”</p>
            <div class="fw-bold">{{ item.name }}</div>
            <small class="text-muted">{{ item.role }}</small>
          </div>
        </div>
      </div>
    </section>

    <section class="container py-5">
      <div class="text-center mb-4">
        <h3 class="fw-bold">FAQ</h3>
      </div>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item" v-for="(item, index) in faqs" :key="item.question">
          <h2 class="accordion-header">
            <button class="accordion-button" :class="{ collapsed: index !== 0 }" type="button" data-bs-toggle="collapse" :data-bs-target="'#faq-' + index">
              {{ item.question }}
            </button>
          </h2>
          <div :id="'faq-' + index" class="accordion-collapse collapse" :class="{ show: index === 0 }" data-bs-parent="#faqAccordion">
            <div class="accordion-body text-muted">{{ item.answer }}</div>
          </div>
        </div>
      </div>
    </section>

    <section class="container py-5">
      <div class="gradient-box p-5 text-center">
        <h3 class="fw-bold mb-3">Ready to simplify your business?</h3>
        <router-link to="/signup" class="btn btn-light text-success fw-bold">Get Started Today</router-link>
      </div>
    </section>
  </main>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import api from '../services/api';
import TechStackBanner from '../components/TechStackBanner.vue';
import ServicesGrid from '../components/ServicesGrid.vue';
import WhyChooseUs from '../components/WhyChooseUs.vue';

const ProductsGrid = {
  template: `
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
  `,
  setup() {
    const products = [
      { title: 'AgriManager', icon: 'A', description: 'Smart agriculture operations management for farms and agribusiness growth.' },
      { title: 'Tractor Management', icon: 'T', description: 'Monitor fleet utilization, maintenance, and field operations efficiently.' },
      { title: 'Inventory Management', icon: 'I', description: 'Handle stock, procurement, and movement across your supply chain.' },
      { title: 'Business ERP', icon: 'E', description: 'Connect finance, HR, sales, and operations in one unified system.' },
      { title: 'Employee Management', icon: 'M', description: 'Simplify attendance, payroll, and workforce planning for your company.' },
      { title: 'Expense Management', icon: '₹', description: 'Track costs, submit claims, and improve financial visibility instantly.' },
    ];
    return { products };
  }
};

const testimonials = [
  { name: 'Amit Verma', role: 'Operations Manager', quote: 'SaraSkills helped us simplify our business operations and gave our team real-time visibility.' },
  { name: 'Riya Sharma', role: 'Business Owner', quote: 'The system is easy to use, affordable, and built for how businesses actually work.' },
  { name: 'Naveen Patel', role: 'Agritech Lead', quote: 'Their ERP and tracking tools gave us better control over tractors, inventory, and daily tasks.' },
];

const faqs = [
  { question: 'What kind of businesses do you work with?', answer: 'We work with SMEs, farms, logistics teams, and growing businesses that need operational efficiency.' },
  { question: 'Can the software be customized?', answer: 'Yes. We can tailor workflows, modules, and dashboards to match your business processes.' },
  { question: 'Do you provide support after launch?', answer: 'We provide onboarding, training, and ongoing support as part of our service model.' },
  { question: 'Is pricing flexible?', answer: 'Yes. We offer plans designed for startups, growing businesses, and larger organizations.' },
];

const plans = ref([]);

onMounted(async () => {
  try {
    const response = await api.get('/plans');
    plans.value = response.data.data ?? [];
  } catch (error) {
    plans.value = [];
  }
});
</script>
