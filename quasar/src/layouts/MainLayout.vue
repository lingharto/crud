<template>
  <q-layout view="lHh Lpr lFf">
    <q-header>
      <q-toolbar class="toolbar-main">
        <q-btn
          flat
          dense
          round
          icon="las la-bars"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />

        <q-toolbar-title>
          Admin panel
        </q-toolbar-title>

        <div>User</div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
      content-class="bg-grey-1"
    >
      <q-list>
        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import EssentialLink from 'components/EssentialLink.vue'

const linksData = [
  {
    title: 'Main',
    icon: 'las la-home',
    link: 'home'
  },
  {
    title: 'Pages',
    icon: 'las la-file-alt',
    link: 'page.index'
  },
  {
    title: 'Settings',
    icon: 'las la-tools',
    link: 'settings.index'
  },
  {
    title: 'Users',
    icon: 'las la-user',
    link: 'user.index'
  },
  {
    title: 'Analytics',
    icon: 'las la-chart-area',
    link: 'analytics.index'
  },
  {
    title: 'Help',
    icon: 'las la-question',
    link: 'help.index'
  },
];

export default {
  name: 'MainLayout',
  components: { EssentialLink },
  data () {
    return {
      leftDrawerOpen: false,
      essentialLinks: linksData
    }
  }
}
</script>
