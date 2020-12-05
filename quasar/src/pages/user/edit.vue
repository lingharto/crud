<template>
  <q-page padding>
    <div v-if="item" class="q-gutter-md">
      <div class="row">

        <div class=" col-12 col-md-4 offset-md-4">
          <div class="caption text-left q-mb-lg">
              Edit user
              <q-btn @click="$router.go(-1)" label="back" flat icon="las la-arrow-left" class="bg-grey-3 float-right"/>
          </div>
        </div>
      </div>

      <div class="row">
        <div class=" col-12 col-md-4 offset-md-4">
          <q-card>
            <q-card-section class="q-gutter-md">
              <q-input outlined v-model="item.name" label="Name" />
              <q-input outlined v-model="item.email" label="Email" />
              <q-input v-model="item.password" outlined :type="isPwd ? 'password' : 'text'" label="New password">
                <template v-slot:append>
                  <q-icon
                    :name="isPwd ? 'las la-eye' : 'las la-eye-slash'"
                    class="cursor-pointer"
                    @click="isPwd = !isPwd"
                  />
                </template>
              </q-input>

              <q-btn @click="update" unelevated color="green" label="Update"></q-btn>
            </q-card-section>
          </q-card>
        </div>

      </div>

    </div>
  </q-page>
</template>

<script>
  export default {
    name: 'UserEdit',
    data(){
      return {
        isPwd: true,
        item: null,
      }
    },
    mounted(){
      this.getItem();
    },
    methods: {
      getItem() {
        let id = this.$route.params.id;
        let url = "admin/user/find/" + id;
        this.$axios.get(url)
          .then(response => {
            this.item = response.data;
          })
      },
      update() {
        let app = this;
        let id = this.$route.params.id;
        let url = "admin/user/update/" + id;
        this.$axios.post(url, this.item)
          .then(response => {
            app.$q.notify({
              message: "User updated",
              color: "positive",
              position: "top-right"
            });
            app.item.password = "";
          }).catch(error => {
          let errors = error.response.data.errors;
          let html = '';
          for(error in errors) {
            html = html + "<div><b><span class='text-uppercase'>" + error + ": </span></b>" + errors[error] + "</div>";
          }

          app.$q.notify({
            message: html,
            color: "negative",
            position: "top-right",
            html: true
          });

          console.log(html);
        })
      }
    }
  }
</script>
