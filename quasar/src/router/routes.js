
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', name: 'home', component: () => import('pages/Index.vue') },
    ],
  },
  {
    path: '/help',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: 'index', name: 'help.index', component: () => import('pages/help/index.vue') }
    ]
  },
  {
    path: '/page',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: 'index', name: 'page.index', component: () => import('pages/page/index.vue') }
    ]
  },
  {
    path: '/settings',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: 'index', name: 'settings.index', component: () => import('pages/settings/index.vue') }
    ]
  },
  {
    path: '/user',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: 'index', name: 'user.index', component: () => import('pages/user/index.vue') },
      { path: 'view/:id', name: 'user.view', component: () => import('pages/user/view.vue') },
      { path: 'edit/:id', name: 'user.edit', component: () => import('pages/user/edit.vue') },
      { path: 'create', name: 'user.create', component: () => import('pages/user/create.vue') }
    ]
  },
  {
    path: '/analytics',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: 'index', name: 'analytics.index', component: () => import('pages/analytics/index.vue') }
    ]
  },
  {
    path: '/unauthorized',
    component: () => import('layouts/LoginLayout.vue'),
    children: [
      { path: 'login', name: 'login', component: () => import('pages/auth/login.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
