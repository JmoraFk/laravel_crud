<script>

import CardElement from './extra_components/Card.vue';

export default {
  components: {
    CardElement
  },
  data() {
    console.log("Data");
    return {
      products: [],
    }
  },
  setup(props, context) {
    console.log("Setup function");
    console.log(props);
    console.log(context);

  },
  mounted() {
    console.log("cmounted");
    this.get_products();
  },
  methods: {
    async get_products(){
      let api_url = "api/product";
      await this.axios.get(api_url)
      .then(response => {
        this.products = response.data;
      })
      .catch(error => {
        console.log(error);
      });
    }
  },
  computed: {
    default_cards(){
      console.log("Esta tomando la información de cache");
      return this.products.products;
    }
  }
}
</script>

<template>
  <div class="container mt-4">
    <div class="row">
      <div class="col text-center">
        <ul>
          <li v-for="product in default_cards" :key="product.id">
            <CardElement :price="product.price" :name="product.name" :description="product.description"></CardElement>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style>
.greeting {
  color: red;
  font-weight: bold;
}
</style>