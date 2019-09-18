

export default function() {

  Vue.component(
    'top-bar',
    require('./components/Topbar.vue').default
  );

  Vue.component(
    'header-bar',
    require('./components/Header.vue').default
  );
}