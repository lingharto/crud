<template>
  <q-page padding>
    <div v-if="item" class="q-gutter-md">
      <div class="row">
        <div class=" col-12 col-md-4 offset-md-4">
          <div>
            <q-btn @click="$router.go(-1)" label="back" flat icon="las la-arrow-left" class="bg-grey-3 q-mb-md"/>
          </div>
          <q-card class="my-card" flat bordered>
            <q-item>
              <q-item-section avatar>
                <q-avatar>
                  <img :src="item.profile.avatar">
                </q-avatar>
              </q-item-section>

              <q-item-section>
                <q-item-label>{{item.name}}</q-item-label>
                <q-item-label caption>
                  {{item.email}}
                </q-item-label>
              </q-item-section>
            </q-item>

            <q-separator />

            <q-card-section>
              <p><b>Created: </b> {{item.created_at}}</p>
              <p><b>Updated: </b> {{item.updated_at}}</p>
            </q-card-section>
          </q-card>
        </div>
      </div>

    </div>
  </q-page>
</template>

<script>
  export default {
    name: 'UserView',
    data(){
      return {
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
    }
  }
</script>
