<template>
    <div>
      <h2 v-if="isNewCategory">Add Category</h2>
      <h2 v-else>Edit Category</h2>
        <form @submit.prevent="submitForm">
          <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input class="form-control" type="text" id="title" v-model="category.title" required />
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" v-model="category.description" required></textarea>
          </div>
          <button type="submit" v-if="isNewCategory" class="btn btn-primary">Add Category</button>
          <button type="submit" v-else class="btn btn-primary">Update Category</button>
        </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        category: {
          title: '',
          description: '',
        }
      }
    },
    computed: {
      isNewCategory() {
        return !this.$route.path.includes('edit');
      }
    },
    async created() {
      if (!this.isNewCategory) {
        const response = await axios.get(`/api/categories/${this.$route.params.id}`);
        this.category = response.data;
      }
    },
    methods: {
      async submitForm() {
        try {
          if (this.isNewCategory) {
            await axios.post('/api/categories', this.category);
          } else {
            await axios.put(`/api/categories/${this.$route.params.id}`, this.category);
          }
          this.$router.push('/');
        } catch (error) {
          console.error(error);
        }
      }
    }
  }
  </script>