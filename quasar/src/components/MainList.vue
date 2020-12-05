<template>
  <div class="q-pa-md">

    <div class="table-title row q-pb-md">
      <div class="col-12">
        <span class="table-title-text">{{entity}}</span>
      </div>
    </div>

    <q-page-sticky position="top-left" :offset="[40, 30]">
      <q-btn @click="create" size="sm" fab icon="las la-plus" color="green" />
    </q-page-sticky>


    <q-table
      :data="data"
      :columns="columns"
      row-key="name"
      :pagination.sync="pagination"
      :loading="loading"
      @request="onRequest"
      binary-state-sort
    >
      <template v-slot:body-cell-avatar="props">
        <q-td :props="props">
          <q-avatar size="32px" rounded>
            <img :src="props.row.profile.avatar" alt="">
          </q-avatar>
        </q-td>
      </template>

      <template v-slot:body-cell-action="props">
        <q-td :props="props">
          <q-btn
            icon-right="las la-edit"
            no-caps
            flat
            dense
            @click="edit(props.row.id)"
          />
          <q-btn
            icon-right="las la-eye"
            no-caps
            flat
            dense
            @click="view(props.row.id)"
          />
          <q-btn
            icon-right="lar la-trash-alt"
            no-caps
            flat
            dense
            @click="remove(props.row.id)"
          />
        </q-td>
      </template>
    </q-table>
  </div>
</template>

<script>
  import WhereFilter from "components/Filters/WhereFilter";
  export default {
    props: ['entity'],
    data () {
      return {
        filtering: [],
        filter: '',
        loading: false,
        pagination: {
          sortBy: 'name',
          descending: false,
          page: 1,
          rowsPerPage: 10,
          rowsNumber: 50
        },
        columns: [],
        defaultColumns: [
          { name: 'action', label: 'Action', field: 'action' },
        ],
        data: [],
        defaultFilter: {
          where: {
            column: 'name',
            operator: '=',
            value: 'Aaron Gleason',
          }
        }
      }
    },
    mounted () {
      let app = this;
      this.onRequest({
        pagination: this.pagination
      });

      this.getFields()
        .then(data => {
          let columns = Object.values(data);
          app.columns = columns.concat(app.defaultColumns);
        }).catch(error => {
          console.log('error', error)
      });

    },
    methods: {
      remove(id){
        let app = this;
        let url = "admin/user/delete/" + id;
        this.$axios.get(url)
          .then(response => {
            console.log(response);
            app.onRequest({
              pagination: app.pagination
            });
            app.$q.notify({
              message: "User deleted",
              color: "positive",
              position: "top-right"
            });

          })
      },
      create(){
        this.$router.push({name: 'user.create'});
      },
      view(id){
        this.$router.push({'name': 'user.view', params: {'id': id}})
      },
      edit(id){
        this.$router.push({'name': 'user.edit', params: {'id': id}})
      },
      onRequest (props) {
        const { page, rowsPerPage, sortBy, descending } = props.pagination
        this.getPaginatedItems(page, rowsPerPage, sortBy, descending)
          .then(data => {
            console.log(data);
            this.data = data.data
            this.pagination.rowsNumber = data.total
          })
        this.pagination.page = page
        this.pagination.rowsPerPage = rowsPerPage
        this.pagination.sortBy = sortBy
        this.pagination.descending = descending
        this.loading = false
      },
      getPaginatedItems (page, rowsPerPage, sortBy, descending) {
        let fetchData = [];
        let sort = descending ? '-' : '';
        let url = "admin/" + this.entity + "/all?page=" + page + "&perPage=" + rowsPerPage + "&sort=" + sort + sortBy + "&include=profile";
        const promise = this.$axios.post(url, []);
        const dataPromise = promise.then((response) => response.data)
        return dataPromise;
      },
      getFields() {
        let data = {
          "entity": this.entity,
          "entityModel": this.entity,
        };
        let url = "admin/common/entityFields";
        const promise = this.$axios.post(url, data);
        const dataPromise = promise.then((response) => response.data)
        return dataPromise;
      }

    },
    components: {
      WhereFilter
    },
  }
</script>
