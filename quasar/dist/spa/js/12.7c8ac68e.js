(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[12],{b290:function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("q-page",{attrs:{padding:""}},[t.item?s("div",{staticClass:"q-gutter-md"},[s("div",{staticClass:"row"},[s("div",{staticClass:" col-12 col-md-4 offset-md-4"},[s("div",{staticClass:"caption text-left q-mb-lg"},[t._v("\n            Edit user\n            "),s("q-btn",{staticClass:"bg-grey-3 float-right",attrs:{label:"back",flat:"",icon:"las la-arrow-left"},on:{click:function(e){return t.$router.go(-1)}}})],1)])]),s("div",{staticClass:"row"},[s("div",{staticClass:" col-12 col-md-4 offset-md-4"},[s("q-card",[s("q-card-section",{staticClass:"q-gutter-md"},[s("q-input",{attrs:{outlined:"",label:"Name"},model:{value:t.item.name,callback:function(e){t.$set(t.item,"name",e)},expression:"item.name"}}),s("q-input",{attrs:{outlined:"",label:"Email"},model:{value:t.item.email,callback:function(e){t.$set(t.item,"email",e)},expression:"item.email"}}),s("q-input",{attrs:{outlined:"",type:t.isPwd?"password":"text",label:"New password"},scopedSlots:t._u([{key:"append",fn:function(){return[s("q-icon",{staticClass:"cursor-pointer",attrs:{name:t.isPwd?"las la-eye":"las la-eye-slash"},on:{click:function(e){t.isPwd=!t.isPwd}}})]},proxy:!0}],null,!1,2821230918),model:{value:t.item.password,callback:function(e){t.$set(t.item,"password",e)},expression:"item.password"}}),s("q-btn",{attrs:{unelevated:"",color:"green",label:"Update"},on:{click:t.update}})],1)],1)],1)])]):t._e()])},i=[],l={name:"UserEdit",data(){return{isPwd:!0,item:null}},mounted(){this.getItem()},methods:{getItem(){let t=this.$route.params.id,e="admin/user/find/"+t;this.$axios.get(e).then((t=>{this.item=t.data}))},update(){let t=this,e=this.$route.params.id,s="admin/user/update/"+e;this.$axios.post(s,this.item).then((e=>{t.$q.notify({message:"User updated",color:"positive",position:"top-right"}),t.item.password=""})).catch((e=>{let s=e.response.data.errors,a="";for(e in s)a=a+"<div><b><span class='text-uppercase'>"+e+": </span></b>"+s[e]+"</div>";t.$q.notify({message:a,color:"negative",position:"top-right",html:!0}),console.log(a)}))}}},o=l,n=s("2877"),r=Object(n["a"])(o,a,i,!1,null,null,null);e["default"]=r.exports}}]);