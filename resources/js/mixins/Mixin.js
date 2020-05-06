
window.Vue = require('vue');

Vue.mixin({
    methods: {
      capitalizeFirstLetter(str) {
          return str.charAt(0).toUpperCase() + str.slice(1);
      },
      asset:function(base, url){
        return base + url;
      },
      
      isActiveClass:function(arg1, arg2){
        if(arg1 == arg2){
          return "active";
        }
        return "";
      },

      cloneIt:function(obj){
        return JSON.parse(JSON.stringify(obj));
      },

      baseString:function(str){
        return str.replace(" ", "").toLowerCase();
      },

      sCompare:function(str1, str2){
        return this.baseString(str1).contains(this.baseString(str2));
      },

      checkIfEmpty:function(obj){
        for(i in obj){
          if(!obj[i]){
            return false;
          }
        }
        return true;
      },

      fullName:function(fname, mname, lname){
        return fname + " " + mname.charAt(0) + ". " + lname;
      }
    }
  })