import { reactive } from 'vue';

const auth = reactive({
  user: null,
  token: localStorage.getItem('saraskills_token') || null,
});

export default {
  ...auth,
  async init() {
    if (!auth.token) {
      auth.user = null;
      return null;
    }

    try {
      const { default: api } = await import('../services/api');
      const response = await api.get('/user');
      auth.user = response.data.data?.user ?? null;
      return auth.user;
    } catch (error) {
      auth.user = null;
      auth.token = null;
      localStorage.removeItem('saraskills_token');
      return null;
    }
  },
  async login(email, password, remember = false) {
    const { default: api } = await import('../services/api');
    const response = await api.post('/login', { email, password });
    const token = response.data.data?.token;
    const user = response.data.data?.user;

    if (token) {
      auth.token = token;
      auth.user = user;
      localStorage.setItem('saraskills_token', token);
      if (!remember) localStorage.setItem('saraskills_remember', '1');
    }

    return response;
  },
  async register(payload) {
    const { default: api } = await import('../services/api');
    const response = await api.post('/register', payload);
    const token = response.data.data?.token;
    const user = response.data.data?.user;

    if (token) {
      auth.token = token;
      auth.user = user;
      localStorage.setItem('saraskills_token', token);
    }

    return response;
  },
  async logout() {
    const { default: api } = await import('../services/api');
    try {
      await api.post('/logout');
    } catch (error) {
      // ignore
    }
    auth.user = null;
    auth.token = null;
    localStorage.removeItem('saraskills_token');
  },
};
