    <template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="row" v-if="this.$route.name == 'empresa.show'">
              <div class="col-md-3">Atualizar empresa</div>
              <div class="col-md-2" v-if="data.empresa.logotipo != null"></div>
            </div>
            <div v-else>Nova empresa</div>
          </div>

          <div class="card-body">
            <form
              method="POST"
              action="/empresa/salvar"
              enctype="multipart/form-data"
            >
              <div class="form-group row">
                <label for="nome" class="col-md-4 col-form-label text-md-right"
                  >Nome da empresa</label
                >
                <div class="col-md-6">
                  <input
                    id="nome"
                    type="nome"
                    class="form-control @error('nome') is-invalid @enderror"
                    name="nome"
                    required
                    autocomplete="nome"
                    autofocus
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"
                  >Email da empresa</label
                >

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    autocomplete="email"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label
                  for="logotipo"
                  class="col-md-4 col-form-label text-md-right"
                  >Logotipo da empresa</label
                >

                <div class="col-md-6">
                  <input
                    id="logotipo"
                    type="file"
                    class="form-control @error('logotipo') is-invalid @enderror"
                    name="logotipo"
                    accept="image/*"
                  />
                </div>
              </div>
              <div class="row">
                <div class="offset-md-10">
                  <button class="btn btn-success" type="submit">Salvar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  setup() {},
};
</script>
