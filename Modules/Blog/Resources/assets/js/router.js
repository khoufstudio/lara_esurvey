const routes = [
  {
    path: '/berita', 
    component: require('./components/Berita.vue').default
  },

  {
      path: '/berita/baca/:id/:slug', 
      name: 'baca',
      props: true,
      component: require('./components/Baca.vue').default
  },
]

export default routes