!function(e){var t={};function n(i){if(t[i])return t[i].exports;var r=t[i]={i:i,l:!1,exports:{}};return e[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(i,r,function(t){return e[t]}.bind(null,r));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){"use strict";n.r(t);var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"container"},[n("div",{staticClass:"test-item-view-mode gr-gallery",attrs:{id:"gr-gallery"}},[n("div",{staticClass:"gr-main",staticStyle:{display:"none"}}),e._v(" "),n("div",{staticClass:"gr-main"},e._l(e.items,(function(t,i){return n("figure",{key:i},[n("div",[null!=t.thumbnail?n("img",{attrs:{alt:t.thumbnail_alt?t.thumbnail_alt:e.$i18n.get("label_thumbnail"),src:t.thumbnail["tainacan-medium"]?t.thumbnail["tainacan-medium"][0]:t.thumbnail.medium?t.thumbnail.medium[0]:e.thumbPlaceholderPath}}):e._e()]),e._v(" "),n("figcaption",[n("h2",[n("span",[e._v(e._s(t.title))])]),e._v(" "),n("div",[n("p",[e._v(e._s(t.description))])])])])})),0),e._v(" "),e._m(0),e._v(" "),e._m(1)])])};i._withStripped=!0;var r=function(e,t,n,i,r,s,a,o){var l,u="function"==typeof e?e.options:e;if(t&&(u.render=t,u.staticRenderFns=n,u._compiled=!0),i&&(u.functional=!0),s&&(u._scopeId="data-v-"+s),a?(l=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),r&&r.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(a)},u._ssrRegister=l):r&&(l=o?function(){r.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:r),l)if(u.functional){u._injectStyles=l;var d=u.render;u.render=function(e,t){return l.call(t),d(e,t)}}else{var c=u.beforeCreate;u.beforeCreate=c?[].concat(c,l):[l]}return{exports:e,options:u}}({name:"ViewModeExtraTest",data:()=>({thumbPlaceholderPath:tainacan_plugin.base_url+"/assets/images/placeholder_square.png",isSlideshowViewModeEnabled:!1}),props:{collectionId:Number,displayedMetadata:Array,items:{type:Array,default:()=>[],required:!0},isLoading:!1,totalItems:Number,isFiltersMenuCompressed:Boolean,enabledViewModes:Array},computed:{queries(){let e=JSON.parse(JSON.stringify(this.$route.query));return e&&(delete e.view_mode,delete e.fetch_only,delete e.fetch_only_meta),e}},mounted(){this.isSlideshowViewModeEnabled=this.enabledViewModes.findIndex(e=>"slideshow"==e)>=0},methods:{getItemLink(e,t){return this.queries?(this.queries.pos=(this.queries.paged-1)*this.queries.perpage+t,this.queries.source_list=this.$root.termId?"term":this.$root.collectionId&&"default"!=this.$root.collectionId?"collection":"repository",this.queries.ref=this.$route.path,e+"?"+qs.stringify(this.queries)):e},renderMetadata(e,t){let n=!(!e||null==e[t.slug])&&e[t.slug];return n?n.value_as_html:""},starSlideshowFromHere(e){this.$router.replace({query:{...this.$route.query,"slideshow-from":e}}).catch(e=>this.$console.log(e))}}},i,[function(){var e=this.$createElement,t=this._self._c||e;return t("nav",[t("span",{staticClass:"gr-prev"},[this._v("prev")]),this._v(" "),t("span",{staticClass:"gr-next"},[this._v("next")])])},function(){var e=this.$createElement,t=this._self._c||e;return t("div",{staticClass:"gr-caption"},[t("span",{staticClass:"gr-caption-close"},[this._v("x")])])}],!1,null,null,null);r.options.__file="extra-view-mode.vue";var s=r.exports;window.tainacan_extra_components=void 0!==window.tainacan_extra_components?window.tainacan_extra_components:{},window.tainacan_extra_components["view-mode-extra-test"]=s}]);