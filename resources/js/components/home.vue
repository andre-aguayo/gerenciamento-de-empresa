<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-4">Lista de empresas</div>
              <div class="offset-md-5">
                <a href="/empresa/cadastro">
                  <button class="btn btn-success">Cadastrar empresa</button>
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="alert alert-success" role="alert"></div>
            <div class="alert alert-danger" role="alert"></div>
            Tabela de empresas
            <tabela-de-empresas :values="this.values"></tabela-de-empresas>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import tabelaDeEmpresas from "./empresa/tabela/tabela-de-empresas.vue";

export default {
  components: { tabelaDeEmpresas },
  props: ["values", "message-success", "message-error"],
  mounted() {},
};
</script>
