!function(e){var t={};function r(a){if(t[a])return t[a].exports;var n=t[a]={i:a,l:!1,exports:{}};return e[a].call(n.exports,n,n.exports,r),n.l=!0,n.exports}r.m=e,r.c=t,r.d=function(e,t,a){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)r.d(a,n,function(t){return e[t]}.bind(null,n));return a},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=5)}([function(e,t,r){"use strict";var a=String.prototype.replace,n=/%20/g,i="RFC1738",o="RFC3986";e.exports={default:o,formatters:{RFC1738:function(e){return a.call(e,n,"+")},RFC3986:function(e){return String(e)}},RFC1738:i,RFC3986:o}},function(e,t,r){"use strict";var a=r(0),n=Object.prototype.hasOwnProperty,i=Array.isArray,o=function(){for(var e=[],t=0;t<256;++t)e.push("%"+((t<16?"0":"")+t.toString(16)).toUpperCase());return e}(),s=function(e,t){for(var r=t&&t.plainObjects?Object.create(null):{},a=0;a<e.length;++a)void 0!==e[a]&&(r[a]=e[a]);return r};e.exports={arrayToObject:s,assign:function(e,t){return Object.keys(t).reduce((function(e,r){return e[r]=t[r],e}),e)},combine:function(e,t){return[].concat(e,t)},compact:function(e){for(var t=[{obj:{o:e},prop:"o"}],r=[],a=0;a<t.length;++a)for(var n=t[a],o=n.obj[n.prop],s=Object.keys(o),l=0;l<s.length;++l){var c=s[l],u=o[c];"object"==typeof u&&null!==u&&-1===r.indexOf(u)&&(t.push({obj:o,prop:c}),r.push(u))}return function(e){for(;e.length>1;){var t=e.pop(),r=t.obj[t.prop];if(i(r)){for(var a=[],n=0;n<r.length;++n)void 0!==r[n]&&a.push(r[n]);t.obj[t.prop]=a}}}(t),e},decode:function(e,t,r){var a=e.replace(/\+/g," ");if("iso-8859-1"===r)return a.replace(/%[0-9a-f]{2}/gi,unescape);try{return decodeURIComponent(a)}catch(e){return a}},encode:function(e,t,r,n,i){if(0===e.length)return e;var s=e;if("symbol"==typeof e?s=Symbol.prototype.toString.call(e):"string"!=typeof e&&(s=String(e)),"iso-8859-1"===r)return escape(s).replace(/%u[0-9a-f]{4}/gi,(function(e){return"%26%23"+parseInt(e.slice(2),16)+"%3B"}));for(var l="",c=0;c<s.length;++c){var u=s.charCodeAt(c);45===u||46===u||95===u||126===u||u>=48&&u<=57||u>=65&&u<=90||u>=97&&u<=122||i===a.RFC1738&&(40===u||41===u)?l+=s.charAt(c):u<128?l+=o[u]:u<2048?l+=o[192|u>>6]+o[128|63&u]:u<55296||u>=57344?l+=o[224|u>>12]+o[128|u>>6&63]+o[128|63&u]:(c+=1,u=65536+((1023&u)<<10|1023&s.charCodeAt(c)),l+=o[240|u>>18]+o[128|u>>12&63]+o[128|u>>6&63]+o[128|63&u])}return l},isBuffer:function(e){return!(!e||"object"!=typeof e)&&!!(e.constructor&&e.constructor.isBuffer&&e.constructor.isBuffer(e))},isRegExp:function(e){return"[object RegExp]"===Object.prototype.toString.call(e)},maybeMap:function(e,t){if(i(e)){for(var r=[],a=0;a<e.length;a+=1)r.push(t(e[a]));return r}return t(e)},merge:function e(t,r,a){if(!r)return t;if("object"!=typeof r){if(i(t))t.push(r);else{if(!t||"object"!=typeof t)return[t,r];(a&&(a.plainObjects||a.allowPrototypes)||!n.call(Object.prototype,r))&&(t[r]=!0)}return t}if(!t||"object"!=typeof t)return[t].concat(r);var o=t;return i(t)&&!i(r)&&(o=s(t,a)),i(t)&&i(r)?(r.forEach((function(r,i){if(n.call(t,i)){var o=t[i];o&&"object"==typeof o&&r&&"object"==typeof r?t[i]=e(o,r,a):t.push(r)}else t[i]=r})),t):Object.keys(r).reduce((function(t,i){var o=r[i];return n.call(t,i)?t[i]=e(t[i],o,a):t[i]=o,t}),o)}}},function(e,t,r){"use strict";var a=r(3),n=r(4),i=r(0);e.exports={formats:i,parse:n,stringify:a}},function(e,t,r){"use strict";var a=r(1),n=r(0),i=Object.prototype.hasOwnProperty,o={brackets:function(e){return e+"[]"},comma:"comma",indices:function(e,t){return e+"["+t+"]"},repeat:function(e){return e}},s=Array.isArray,l=Array.prototype.push,c=function(e,t){l.apply(e,s(t)?t:[t])},u=Date.prototype.toISOString,d=n.default,p={addQueryPrefix:!1,allowDots:!1,charset:"utf-8",charsetSentinel:!1,delimiter:"&",encode:!0,encoder:a.encode,encodeValuesOnly:!1,format:d,formatter:n.formatters[d],indices:!1,serializeDate:function(e){return u.call(e)},skipNulls:!1,strictNullHandling:!1},f=function e(t,r,n,i,o,l,u,d,f,m,y,h,_,v){var b,g=t;if("function"==typeof u?g=u(r,g):g instanceof Date?g=m(g):"comma"===n&&s(g)&&(g=a.maybeMap(g,(function(e){return e instanceof Date?m(e):e}))),null===g){if(i)return l&&!_?l(r,p.encoder,v,"key",y):r;g=""}if("string"==typeof(b=g)||"number"==typeof b||"boolean"==typeof b||"symbol"==typeof b||"bigint"==typeof b||a.isBuffer(g))return l?[h(_?r:l(r,p.encoder,v,"key",y))+"="+h(l(g,p.encoder,v,"value",y))]:[h(r)+"="+h(String(g))];var w,j=[];if(void 0===g)return j;if("comma"===n&&s(g))w=[{value:g.length>0?g.join(",")||null:void 0}];else if(s(u))w=u;else{var x=Object.keys(g);w=d?x.sort(d):x}for(var O=0;O<w.length;++O){var M=w[O],C="object"==typeof M&&void 0!==M.value?M.value:g[M];if(!o||null!==C){var P=s(g)?"function"==typeof n?n(r,M):r:r+(f?"."+M:"["+M+"]");c(j,e(C,P,n,i,o,l,u,d,f,m,y,h,_,v))}}return j};e.exports=function(e,t){var r,a=e,l=function(e){if(!e)return p;if(null!==e.encoder&&void 0!==e.encoder&&"function"!=typeof e.encoder)throw new TypeError("Encoder has to be a function.");var t=e.charset||p.charset;if(void 0!==e.charset&&"utf-8"!==e.charset&&"iso-8859-1"!==e.charset)throw new TypeError("The charset option must be either utf-8, iso-8859-1, or undefined");var r=n.default;if(void 0!==e.format){if(!i.call(n.formatters,e.format))throw new TypeError("Unknown format option provided.");r=e.format}var a=n.formatters[r],o=p.filter;return("function"==typeof e.filter||s(e.filter))&&(o=e.filter),{addQueryPrefix:"boolean"==typeof e.addQueryPrefix?e.addQueryPrefix:p.addQueryPrefix,allowDots:void 0===e.allowDots?p.allowDots:!!e.allowDots,charset:t,charsetSentinel:"boolean"==typeof e.charsetSentinel?e.charsetSentinel:p.charsetSentinel,delimiter:void 0===e.delimiter?p.delimiter:e.delimiter,encode:"boolean"==typeof e.encode?e.encode:p.encode,encoder:"function"==typeof e.encoder?e.encoder:p.encoder,encodeValuesOnly:"boolean"==typeof e.encodeValuesOnly?e.encodeValuesOnly:p.encodeValuesOnly,filter:o,format:r,formatter:a,serializeDate:"function"==typeof e.serializeDate?e.serializeDate:p.serializeDate,skipNulls:"boolean"==typeof e.skipNulls?e.skipNulls:p.skipNulls,sort:"function"==typeof e.sort?e.sort:null,strictNullHandling:"boolean"==typeof e.strictNullHandling?e.strictNullHandling:p.strictNullHandling}}(t);"function"==typeof l.filter?a=(0,l.filter)("",a):s(l.filter)&&(r=l.filter);var u,d=[];if("object"!=typeof a||null===a)return"";u=t&&t.arrayFormat in o?t.arrayFormat:t&&"indices"in t?t.indices?"indices":"repeat":"indices";var m=o[u];r||(r=Object.keys(a)),l.sort&&r.sort(l.sort);for(var y=0;y<r.length;++y){var h=r[y];l.skipNulls&&null===a[h]||c(d,f(a[h],h,m,l.strictNullHandling,l.skipNulls,l.encode?l.encoder:null,l.filter,l.sort,l.allowDots,l.serializeDate,l.format,l.formatter,l.encodeValuesOnly,l.charset))}var _=d.join(l.delimiter),v=!0===l.addQueryPrefix?"?":"";return l.charsetSentinel&&("iso-8859-1"===l.charset?v+="utf8=%26%2310003%3B&":v+="utf8=%E2%9C%93&"),_.length>0?v+_:""}},function(e,t,r){"use strict";var a=r(1),n=Object.prototype.hasOwnProperty,i=Array.isArray,o={allowDots:!1,allowPrototypes:!1,arrayLimit:20,charset:"utf-8",charsetSentinel:!1,comma:!1,decoder:a.decode,delimiter:"&",depth:5,ignoreQueryPrefix:!1,interpretNumericEntities:!1,parameterLimit:1e3,parseArrays:!0,plainObjects:!1,strictNullHandling:!1},s=function(e){return e.replace(/&#(\d+);/g,(function(e,t){return String.fromCharCode(parseInt(t,10))}))},l=function(e,t){return e&&"string"==typeof e&&t.comma&&e.indexOf(",")>-1?e.split(","):e},c=function(e,t,r,a){if(e){var i=r.allowDots?e.replace(/\.([^.[]+)/g,"[$1]"):e,o=/(\[[^[\]]*])/g,s=r.depth>0&&/(\[[^[\]]*])/.exec(i),c=s?i.slice(0,s.index):i,u=[];if(c){if(!r.plainObjects&&n.call(Object.prototype,c)&&!r.allowPrototypes)return;u.push(c)}for(var d=0;r.depth>0&&null!==(s=o.exec(i))&&d<r.depth;){if(d+=1,!r.plainObjects&&n.call(Object.prototype,s[1].slice(1,-1))&&!r.allowPrototypes)return;u.push(s[1])}return s&&u.push("["+i.slice(s.index)+"]"),function(e,t,r,a){for(var n=a?t:l(t,r),i=e.length-1;i>=0;--i){var o,s=e[i];if("[]"===s&&r.parseArrays)o=[].concat(n);else{o=r.plainObjects?Object.create(null):{};var c="["===s.charAt(0)&&"]"===s.charAt(s.length-1)?s.slice(1,-1):s,u=parseInt(c,10);r.parseArrays||""!==c?!isNaN(u)&&s!==c&&String(u)===c&&u>=0&&r.parseArrays&&u<=r.arrayLimit?(o=[])[u]=n:o[c]=n:o={0:n}}n=o}return n}(u,t,r,a)}};e.exports=function(e,t){var r=function(e){if(!e)return o;if(null!==e.decoder&&void 0!==e.decoder&&"function"!=typeof e.decoder)throw new TypeError("Decoder has to be a function.");if(void 0!==e.charset&&"utf-8"!==e.charset&&"iso-8859-1"!==e.charset)throw new TypeError("The charset option must be either utf-8, iso-8859-1, or undefined");var t=void 0===e.charset?o.charset:e.charset;return{allowDots:void 0===e.allowDots?o.allowDots:!!e.allowDots,allowPrototypes:"boolean"==typeof e.allowPrototypes?e.allowPrototypes:o.allowPrototypes,arrayLimit:"number"==typeof e.arrayLimit?e.arrayLimit:o.arrayLimit,charset:t,charsetSentinel:"boolean"==typeof e.charsetSentinel?e.charsetSentinel:o.charsetSentinel,comma:"boolean"==typeof e.comma?e.comma:o.comma,decoder:"function"==typeof e.decoder?e.decoder:o.decoder,delimiter:"string"==typeof e.delimiter||a.isRegExp(e.delimiter)?e.delimiter:o.delimiter,depth:"number"==typeof e.depth||!1===e.depth?+e.depth:o.depth,ignoreQueryPrefix:!0===e.ignoreQueryPrefix,interpretNumericEntities:"boolean"==typeof e.interpretNumericEntities?e.interpretNumericEntities:o.interpretNumericEntities,parameterLimit:"number"==typeof e.parameterLimit?e.parameterLimit:o.parameterLimit,parseArrays:!1!==e.parseArrays,plainObjects:"boolean"==typeof e.plainObjects?e.plainObjects:o.plainObjects,strictNullHandling:"boolean"==typeof e.strictNullHandling?e.strictNullHandling:o.strictNullHandling}}(t);if(""===e||null==e)return r.plainObjects?Object.create(null):{};for(var u="string"==typeof e?function(e,t){var r,c={},u=t.ignoreQueryPrefix?e.replace(/^\?/,""):e,d=t.parameterLimit===1/0?void 0:t.parameterLimit,p=u.split(t.delimiter,d),f=-1,m=t.charset;if(t.charsetSentinel)for(r=0;r<p.length;++r)0===p[r].indexOf("utf8=")&&("utf8=%E2%9C%93"===p[r]?m="utf-8":"utf8=%26%2310003%3B"===p[r]&&(m="iso-8859-1"),f=r,r=p.length);for(r=0;r<p.length;++r)if(r!==f){var y,h,_=p[r],v=_.indexOf("]="),b=-1===v?_.indexOf("="):v+1;-1===b?(y=t.decoder(_,o.decoder,m,"key"),h=t.strictNullHandling?null:""):(y=t.decoder(_.slice(0,b),o.decoder,m,"key"),h=a.maybeMap(l(_.slice(b+1),t),(function(e){return t.decoder(e,o.decoder,m,"value")}))),h&&t.interpretNumericEntities&&"iso-8859-1"===m&&(h=s(h)),_.indexOf("[]=")>-1&&(h=i(h)?[h]:h),n.call(c,y)?c[y]=a.combine(c[y],h):c[y]=h}return c}(e,r):e,d=r.plainObjects?Object.create(null):{},p=Object.keys(u),f=0;f<p.length;++f){var m=p[f],y=c(m,u[m],r,"string"==typeof e);d=a.merge(d,y,r)}return a.compact(d)}},function(e,t,r){"use strict";r.r(t);var a=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("div",{ref:"grid-gallery",staticClass:"test-item-view-mode grid-gallery",attrs:{id:"grid-gallery"}},[r("section",{staticClass:"grid-wrap"},[!e.isLoading&&e.items.length<=0?r("section",{staticClass:"section"},[r("div",{staticClass:"content has-text-gray4 has-text-centered"},[e._m(0),e._v(" "),r("p",[e._v(e._s("info_no_item_found"))])])]):e._e(),e._v(" "),e.isLoading?r("masonry",{staticClass:"tainacan-masonry-container",attrs:{cols:e.masonryCols,gutter:24}},e._l(12,(function(t){return r("div",{key:t,staticClass:"skeleton tainacan-masonry-item",style:{"min-height":e.randomHeightForMasonryItem()+"px"}})})),0):e._e(),e._v(" "),r("ul",{staticClass:"grid"},[r("li",{staticClass:"grid-sizer"}),e._v(" "),e._l(e.items,(function(t,a){return r("li",{key:a},[r("figure",[null!=t.thumbnail?r("img",{attrs:{alt:t.thumbnail_alt?t.thumbnail_alt:e.$i18n.get("label_thumbnail"),src:t.thumbnail["tainacan-medium-full"]?t.thumbnail["tainacan-medium-full"][0]:t.thumbnail.medium?t.thumbnail.medium[0]:e.thumbPlaceholderPath}}):e._e(),e._v(" "),r("figcaption",[r("h3",e._l(e.displayedMetadata,(function(a,n){return a.display&&null!=a.metadata_type_object&&"title"==a.metadata_type_object.related_mapped_prop?r("span",{key:n,domProps:{innerHTML:e._s(null!=t.metadata&&e.collectionId?e.renderMetadata(t.metadata,a):t.title?t.title:"<span class='has-text-gray3 is-italic'>"+e.$i18n.get("label_value_not_provided")+"</span>")}}):e._e()})),0),e._v(" "),r("div",e._l(e.displayedMetadata,(function(a,n){return a.display&&null!=a.metadata_type_object&&"description"==a.metadata_type_object.related_mapped_prop?r("p",{key:n,domProps:{innerHTML:e._s(null!=t.metadata&&e.collectionId?e.renderMetadata(t.metadata,a):t.description?t.description:"<span class='has-text-gray3 is-italic'>"+e.$i18n.get("label_value_not_provided")+"</span>")}}):e._e()})),0)])])])}))],2)],1),e._v(" "),r("section",{staticClass:"slideshow"},[r("ul",e._l(e.items,(function(t,a){return r("li",{key:a},[r("figure",[r("figcaption",[r("h3",e._l(e.displayedMetadata,(function(a,n){return a.display&&null!=a.metadata_type_object&&"title"==a.metadata_type_object.related_mapped_prop?r("span",{key:n,domProps:{innerHTML:e._s(null!=t.metadata&&e.collectionId?e.renderMetadata(t.metadata,a):t.title?t.title:"<span class='has-text-gray3 is-italic'>"+e.$i18n.get("label_value_not_provided")+"</span>")}}):e._e()})),0),e._v(" "),r("a",{attrs:{target:"_blank",href:e.getItemLink(t.url,a)}},[r("span",[e._v(e._s(e.__("View item on page","tainacan-extra-viewmodes")))]),e._v(" "),e._m(1,!0)])]),e._v(" "),null!=t.thumbnail?r("img",{attrs:{alt:t.thumbnail_alt?t.thumbnail_alt:e.$i18n.get("label_thumbnail"),src:t.thumbnail.full?t.thumbnail.full[0]:t.thumbnail.large?t.thumbnail.large[0]:e.thumbPlaceholderPath}}):e._e()]),e._v(" "),r("div",{staticClass:"list-metadata",class:e.showMetadataPanel?"expanded":"collapsed"},[r("div",{staticClass:"list-metadata__header",on:{click:function(t){e.showMetadataPanel=!e.showMetadataPanel}}},[r("span",{staticStyle:{cursor:"pointer"}},[e._v(e._s(e.showMetadataPanel?e.__("Hide metadata","tainacan-extra-viewmodes"):e.__("Show metadata","tainacan-extra-viewmodes")))]),e._v(" "),r("span",{staticClass:"icon"},[r("i",{staticClass:"tainacan-icon tainacan-icon-1-25em",class:e.showMetadataPanel?"tainacan-icon-arrowdown":"tainacan-icon-arrowup"})]),e._v(" "),e.isSlideshowViewModeEnabled?r("a",{on:{click:function(t){return t.preventDefault(),e.starSlideshowFromHere(a)}}},[r("span",[e._v(e._s(e.__("View Document on fullscreen","tainacan-extra-viewmodes")))]),e._v(" "),e._m(2,!0)]):e._e()]),e._v(" "),e._l(e.displayedMetadata,(function(a,n){return""!=e.renderMetadata(t.metadata,a)&&a.display&&"thumbnail"!=a.slug&&null!=a.metadata_type_object&&"title"!=a.metadata_type_object.related_mapped_prop?r("span",{key:n,class:{"metadata-type-textarea":"tainacan-textarea"==a.metadata_type_object.component}},[r("h3",{staticClass:"metadata-label"},[e._v(e._s(a.name))]),e._v(" "),r("p",{staticClass:"metadata-value",domProps:{innerHTML:e._s(e.renderMetadata(t.metadata,a))}})]):e._e()}))],2)])})),0),e._v(" "),e._m(3)])])};a._withStripped=!0;var n=r(2),i=r.n(n);var o=function(e,t,r,a,n,i,o,s){var l,c="function"==typeof e?e.options:e;if(t&&(c.render=t,c.staticRenderFns=r,c._compiled=!0),a&&(c.functional=!0),i&&(c._scopeId="data-v-"+i),o?(l=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),n&&n.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(o)},c._ssrRegister=l):n&&(l=s?function(){n.call(this,(c.functional?this.parent:this).$root.$options.shadowRoot)}:n),l)if(c.functional){c._injectStyles=l;var u=c.render;c.render=function(e,t){return l.call(t),u(e,t)}}else{var d=c.beforeCreate;c.beforeCreate=d?[].concat(d,l):[l]}return{exports:e,options:c}}({name:"ViewModeGallery",data:()=>({thumbPlaceholderPath:tainacan_plugin.base_url+"/assets/images/placeholder_square.png",isSlideshowViewModeEnabled:!1,showMetadataPanel:!1,masonryCols:{default:7,1600:6,1400:5,1200:4,960:3,560:2,344:1}}),props:{collectionId:Number,displayedMetadata:Array,items:{type:Array,default:()=>[],required:!0},isLoading:!1,totalItems:Number,isFiltersMenuCompressed:Boolean,enabledViewModes:Array},watch:{isFiltersMenuCompressed(){Masonry.currentMasonryInstance&&setTimeout(()=>{Masonry.currentMasonryInstance.layout()},1e3)},isLoading:{handler(e){!e&&this.$refs["grid-gallery"]&&(Masonry.currentMasonryInstance&&Masonry.currentMasonryInstance.destroy(),this.showMetadataPanel=!1,new CBPGridGallery(this.$refs["grid-gallery"]))},immediate:!0}},computed:{__:()=>wp.i18n?wp.i18n.__:(e,t)=>e,queries(){let e=JSON.parse(JSON.stringify(this.$route.query));return e&&(delete e.view_mode,delete e.fetch_only,delete e.fetch_only_meta),e}},mounted(){this.isSlideshowViewModeEnabled=this.enabledViewModes.findIndex(e=>"slideshow"==e)>=0},methods:{getItemLink(e,t){return this.queries?(this.queries.pos=(this.queries.paged-1)*this.queries.perpage+t,this.queries.source_list=this.$root.termId?"term":this.$root.collectionId&&"default"!=this.$root.collectionId?"collection":"repository",this.queries.ref=this.$route.path,e+"?"+i.a.stringify(this.queries)):e},renderMetadata(e,t){let r=!(!e||null==e[t.slug])&&e[t.slug];return r?r.value_as_html:""},randomHeightForMasonryItem:()=>Math.floor(261*Math.random()+120),starSlideshowFromHere(e){this.$router.replace({query:{...this.$route.query,"slideshow-from":e}}).catch(e=>this.$console.log(e))}},beforeDestroy(){Masonry.currentMasonryInstance&&Masonry.currentMasonryInstance.destroy()}},a,[function(){var e=this.$createElement,t=this._self._c||e;return t("p",[t("span",{staticClass:"icon is-large"},[t("i",{staticClass:"tainacan-icon tainacan-icon-36px tainacan-icon-items"})])])},function(){var e=this.$createElement,t=this._self._c||e;return t("span",{staticClass:"icon"},[t("i",{staticClass:"tainacan-icon tainacan-icon-1-125em tainacan-icon-see"})])},function(){var e=this.$createElement,t=this._self._c||e;return t("span",{staticClass:"icon"},[t("i",{staticClass:"tainacan-icon tainacan-icon-1-125em tainacan-icon-viewgallery"})])},function(){var e=this.$createElement,t=this._self._c||e;return t("nav",[t("span",{staticClass:"icon nav-prev"}),this._v(" "),t("span",{staticClass:"icon nav-next"}),this._v(" "),t("span",{staticClass:"icon nav-close"})])}],!1,null,null,null);o.options.__file="gallery-view-mode.vue";var s=o.exports;window.tainacan_extra_components=void 0!==window.tainacan_extra_components?window.tainacan_extra_components:{},window.tainacan_extra_components["view-mode-gallery"]=s}]);