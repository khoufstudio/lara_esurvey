

export default function() {

  Vue.component(
    'top-bar',
    require('./components/Topbar.vue').default
  );

  Vue.component(
    'header-bar',
    require('./components/Header.vue').default
  );

  Vue.component(
    'slider-section',
    require('./components/Slider.vue').default
  );

  Vue.component(
    'hightlight-section',
    require('./components/Highlight.vue').default
  );

}