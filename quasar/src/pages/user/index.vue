<template>
  <q-page padding>
    <MainList entity="user"/>
  </q-page>
</template>

<script>
import MainList from "components/MainList";
export default {
  name: 'UserIndex',
  components: {
    MainList
  }
}
</script>
