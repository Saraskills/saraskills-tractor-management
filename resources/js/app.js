import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';
import api from './services/api';
import authStore from './stores/auth';

const routes = [
  { path: '/', name: 'home', component: () => import('./pages/HomePage.vue'), meta: { title: 'SaraSkills - Smart Software Solutions' } },
  { path: '/about', name: 'about', component: () => import('./pages/AboutPage.vue'), meta: { title: 'About SaraSkills' } },
  { path: '/pricing', name: 'pricing', component: () => import('./pages/PricingPage.vue'), meta: { title: 'SaraSkills Pricing' } },
  { path: '/contact', name: 'contact', component: () => import('./pages/ContactPage.vue'), meta: { title: 'Contact SaraSkills' } },
  { path: '/login', name: 'login', component: () => import('./pages/LoginPage.vue'), meta: { title: 'Login | SaraSkills', guest: true } },
  { path: '/signup', name: 'signup', component: () => import('./pages/SignupPage.vue'), meta: { title: 'Create Account | SaraSkills', guest: true } },
  { path: '/forgot-password', name: 'forgot-password', component: () => import('./pages/ForgotPasswordPage.vue'), meta: { title: 'Forgot Password | SaraSkills' } },
  { path: '/reset-password', name: 'reset-password', component: () => import('./pages/ResetPasswordPage.vue'), meta: { title: 'Reset Password | SaraSkills' } },
  { path: '/dashboard', name: 'dashboard', component: () => import('./pages/DashboardPage.vue'), meta: { title: 'Dashboard | SaraSkills', requiresAuth: true } },
  { path: '/profile', name: 'profile', component: () => import('./pages/ProfilePage.vue'), meta: { title: 'Profile | SaraSkills', requiresAuth: true } },
  { path: '/settings', name: 'settings', component: () => import('./pages/SettingsPage.vue'), meta: { title: 'Settings | SaraSkills', requiresAuth: true } },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach(async (to, from, next) => {
  document.title = to.meta.title || 'SaraSkills';

  try {
    const user = await authStore.init();

    if (to.meta.requiresAuth && !user) {
      return next({ name: 'login' });
    }

    if (to.meta.guest && user) {
      return next({ name: 'dashboard' });
    }

    next();
  } catch (error) {
    if (to.meta.requiresAuth) {
      return next({ name: 'login' });
    }
    next();
  }
});

const app = createApp(App);
app.config.globalProperties.$api = api;
app.use(router);
app.use(authStore);
app.mount('#app');
