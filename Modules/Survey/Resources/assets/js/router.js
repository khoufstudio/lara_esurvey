const routes = [
  {
    path: '/survey/:id', 
    props: true,
    component: require('./components/Survey.vue').default
  },

]

export default routes