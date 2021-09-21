<template>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Logotipo</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Açoes</th>
      </tr>
    </thead>
  </table>
</template>
<script>
export default {
  props: ["values"],
  data() {
    return { empresas: this.values.data };
  },
  mounted() {
    console.log(this.empresas);
  },
};
</script>
