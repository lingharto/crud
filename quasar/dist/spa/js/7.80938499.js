(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[7],{e37c:function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("q-page",{staticClass:"window-height window-width row justify-center items-center"},[s("div",{staticClass:"column q-pa-md"},[s("div",{staticClass:"row"},[s("q-card",{staticClass:"shadow-24",staticStyle:{width:"300px",height:"338px"},attrs:{square:""}},[s("q-card-section",{staticClass:"bg-blue-9"},[s("h4",{staticClass:"text-h5 text-white q-my-none"},[t._v("Login")])]),s("q-card-section",[s("q-form",{staticClass:"q-px-none"},[s("q-input",{attrs:{outlined:"",clearable:"",type:"email",label:"Email"},scopedSlots:t._u([{key:"prepend",fn:function(){return[s("q-icon",{attrs:{name:"las la-at"}})]},proxy:!0}]),model:{value:t.email,callback:function(e){t.email=e},expression:"email"}}),s("q-input",{staticClass:"q-mt-md",attrs:{outlined:"",clearable:"",type:"password",label:"Password"},scopedSlots:t._u([{key:"prepend",fn:function(){return[s("q-icon",{attrs:{name:"las la-key"}})]},proxy:!0}]),model:{value:t.password,callback:function(e){t.password=e},expression:"password"}})],1)],1),s("q-card-actions",{staticClass:"q-px-md"},[s("q-btn",{staticClass:"full-width text-white",attrs:{unelevated:"",size:"lg",color:"primary",label:"Sign In"},on:{click:t.login}})],1),s("q-card-section",{staticClass:"text-center q-pa-sm"},[s("p",{staticClass:"text-grey-6"},[t._v("Forgot your password?")])])],1)],1)])])},o=[],n={name:"Login",data(){return{email:"",password:"",rememberMe:!0}},methods:{login(){this.$auth.attemptLogin({email:this.email,password:this.password},this.rememberMe).then((t=>{console.log(JSON.stringify(t)),console.log("You were logged in"),this.$router.push({name:"home"})})).catch((t=>{console.log(JSON.stringify(t)),console.log(t&&t.response&&401===t.response.status?"Wrong e-mail or password":"Something went wrong")}))}}},i=n,l=s("2877"),r=Object(l["a"])(i,a,o,!1,null,null,null);e["default"]=r.exports}}]);