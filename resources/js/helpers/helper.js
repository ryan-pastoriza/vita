window.Vue = require('vue');

Vue.mixin({
    methods: {
      asset:function(base, url){
        return base + url;
      },
      navActive:function(nav1, nav2){
        if(nav1 == nav2){
            return 'active';
        }
        return '';
      },
    }
  })