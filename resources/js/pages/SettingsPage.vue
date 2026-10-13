<template>
  <div class="container page-shell">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card border-0 card-shadow p-4">
          <h2 class="fw-bold mb-4">Profile</h2>
          <form @submit.prevent="saveProfile">
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Name</label><input v-model="form.name" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Email</label><input v-model="form.email" type="email" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Phone</label><input v-model="form.phone" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Profile Photo</label><input type="file" @change="onFileChange" class="form-control"></div>
            </div>
            <button class="btn primary-btn mt-4" type="submit">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive } from 'vue';
const form = reactive({ name: 'Sara Skills', email: 'demo@saraskills.com', phone: '+91 98765 43210', profile_photo: null });
const onFileChange = (event) => { form.profile_photo = event.target.files[0]; };
const saveProfile = () => alert('Profile updated successfully.');
</script>
