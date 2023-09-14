<template>
    <div>
        <h5 id="associating-form-text-with-form-controls">Title:</h5>
        <h6>{{ category.title }}</h6>
        <h5 id="associating-form-text-with-form-controls">Description:</h5>
        <p>{{ category.description }}</p>
        <router-link :to="`/categories/${category.id}/edit`" class="btn btn-primary">Edit</router-link>
    </div>
</template>

<script>
import axios from 'axios';

export default {
data() {
    return {
    category: {}
    }
},
async created() {
    try {
    const response = await axios.get(`/api/categories/${this.$route.params.id}`);
    this.category = response.data;
    } catch (error) {
    console.error(error);
    }
}
}
</script>