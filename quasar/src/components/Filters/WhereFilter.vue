<template>
  <q-card flat bordered class="bg-grey-1 text-white">
    <q-card-section>
      <div class="row q-col-gutter-md">

        <div class="col-3">
          <q-select bg-color="white" dense outlined v-model="column" :options="columnOptions" label="Field" />
        </div>

        <div class="col-3">
          <q-select bg-color="white" dense outlined v-model="operator" :options="operatorOptions" label="Operator" />
        </div>

        <div class="col-6">
          <q-input bg-color="white" dense outlined v-model="value" label="Value"></q-input>
        </div>

      </div>
    </q-card-section>
  </q-card>
</template>

<script>
    export default {
        name: "WhereFilter",
        data(){
          return {
            column: "name",
            columnOptions: ['id', 'name', 'email'],
            operator: '=',
            operatorOptions: ['>', '<', '!='],
            value: '',
          }
        }
    }
</script>

<style scoped>

</style>
