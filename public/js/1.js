(window.webpackJsonp=window.webpackJsonp||[]).push([[1,16,19],{11:function(t,s,a){var e={"./bitbucket.svg":191,"./discord.svg":192,"./dribble.svg":193,"./email.svg":194,"./facebook.svg":195,"./github.svg":196,"./gitlab.svg":197,"./instagram.svg":198,"./linkedin.svg":199,"./logo.svg":200,"./medium.svg":201,"./phone.svg":202,"./pinterest.svg":203,"./reddit.svg":204,"./skype.svg":205,"./snapchat.svg":206,"./soundcloud.svg":207,"./spotify.svg":208,"./telegram.svg":209,"./tiktok.svg":210,"./tumblr.svg":211,"./twitch.svg":212,"./twitter.svg":213,"./viber.svg":214,"./vimeo.svg":215,"./vk.svg":216,"./website.svg":217,"./whatsapp.svg":218,"./youtube.svg":219};function i(t){var s=c(t);return a(s)}function c(t){if(!a.o(e,t)){var s=new Error("Cannot find module '"+t+"'");throw s.code="MODULE_NOT_FOUND",s}return e[t]}i.keys=function(){return Object.keys(e)},i.resolve=c,t.exports=i,i.id=11},16:function(t,s,a){"use strict";a.r(s);var e={extends:a(7).a,name:"VisitsChart",props:["chartData"],mounted:function(){this.renderChart({labels:this.getLabels(),datasets:[{label:"Visits",backgroundColor:"#fad9da",data:this.getData(),borderWidth:5,borderColor:["#f85752"],fill:!0}]},{legend:{display:!1},title:"Visits stats",responsive:!0,maintainAspectRatio:!1,scales:{yAxes:[{ticks:{display:!1,beginAtZero:!0,callback:function(t){if(t%1==0)return t},max:Math.max.apply(Math,this.getData())+1},gridLines:{display:!1}}],xAxes:[{ticks:{display:!1},gridLines:{display:!1}}]},layout:{padding:{bottom:-20,left:-10}}})},methods:{getLabels:function(){var t=[];return this.chartData.map((function(s){t.push(s.date)})),t},getData:function(){var t=[];return this.chartData.map((function(s){t.push(s.visits)})),t}}},i=a(1),c=Object(i.a)(e,void 0,void 0,!1,null,null,null);s.default=c.exports},191:function(t,s){t.exports="/images/bitbucket.svg?89d343f5efe6c351fcd6c00871221bb0"},192:function(t,s){t.exports="/images/discord.svg?fee2b0c7763cd68020f7d8fd9ea2c593"},193:function(t,s){t.exports="/images/dribble.svg?f47f43587ec131c9a510b2b742d6437d"},194:function(t,s){t.exports="/images/email.svg?3a49bb5efe3d406cc94e42b7b2f244f5"},195:function(t,s){t.exports="/images/facebook.svg?60f532b73b8720aba4a9f3fb2d39c56d"},196:function(t,s){t.exports="/images/github.svg?aac90947fcba994b3530d3ff120bfda2"},197:function(t,s){t.exports="/images/gitlab.svg?db66f1db8b42d15252ca0f283abc420c"},198:function(t,s){t.exports="/images/instagram.svg?825269601201a0ece278db25a848c8d3"},199:function(t,s){t.exports="/images/linkedin.svg?4b475fb3f54b3e35daa04295ec48df4c"},200:function(t,s){t.exports="/images/logo.svg?71256ab41197b98906345d8b02878119"},201:function(t,s){t.exports="/images/medium.svg?bad5a888d252fc08e4d77a10edbbc105"},202:function(t,s){t.exports="/images/phone.svg?5ebfa455397b1a579c3fcb180f94aeaf"},203:function(t,s){t.exports="/images/pinterest.svg?d8a44cc58536d5f706da07bea0dd7faa"},204:function(t,s){t.exports="/images/reddit.svg?fc79ce079da64ad3142465da62848597"},205:function(t,s){t.exports="/images/skype.svg?d45d32fa41d87042155762dc9f30bcae"},206:function(t,s){t.exports="/images/snapchat.svg?830fa7f3ccd1a1e67205a65cf7c29cd4"},207:function(t,s){t.exports="/images/soundcloud.svg?0b309ed60e3a8bd6e2bb8097209c8abc"},208:function(t,s){t.exports="/images/spotify.svg?74d9e294ebad9bf3dc2f4268db77b670"},209:function(t,s){t.exports="/images/telegram.svg?c55528d4703de7ee1676b1d86e92af68"},210:function(t,s){t.exports="/images/tiktok.svg?acc1c1a7cfd070fa838b381212a91d2e"},211:function(t,s){t.exports="/images/tumblr.svg?f832c382c60e73a28d2d1b37d4a8b4e5"},212:function(t,s){t.exports="/images/twitch.svg?e1f7813a81c4579705af8aec19b9aac0"},213:function(t,s){t.exports="/images/twitter.svg?c4f438fa6064cce71e3a97aae3d9684a"},214:function(t,s){t.exports="/images/viber.svg?99384e5805cd787c02d98b9869e14105"},215:function(t,s){t.exports="/images/vimeo.svg?a94f73209b5a70895ece832166f02331"},216:function(t,s){t.exports="/images/vk.svg?9eaa3aa7f4f9c1ae745d6649a0fbd8dc"},217:function(t,s){t.exports="/images/website.svg?82c43677d4e0c40659e07987ed1af959"},218:function(t,s){t.exports="/images/whatsapp.svg?8242a1532ce559c68370b20a10f7af56"},219:function(t,s){t.exports="/images/youtube.svg?7a8202a8aa5df17bb4ce198158886a80"},24:function(t,s,a){"use strict";a.r(s);var e=a(16),i={name:"DashboardIndex",components:{ClicksChart:a(9).default,VisitsChart:e.default}},c=a(1),r=Object(c.a)(i,(function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("dashboard",[t.$page.props.user.username?[e("v-card",{staticClass:"w-full flex flex-col md:flex-row items-center justify-between mb-5"},[e("div",{staticClass:"flex flex-col md:flex-row items-center mb-3 md:mb-0"},[e("v-avatar",{staticClass:"mb-2 md:mb-0 md:mr-5",attrs:{user:t.$page.props.user,size:"w-10 h-10 md:w-20 md:h-20",font:"text-md md:text-2xl",upload:""}}),t._v(" "),e("div",{staticClass:"flex flex-col justify-center"},[e("div",{staticClass:"text-sm sm:text-md md:text-lg font-bold mb-1 text-center"},[t._v(t._s(t.$page.props.user.name))]),t._v(" "),e("div",{staticClass:"text-xs sm:text-sm md:text-md font-bold text-gray-500"},[t._v("ibio.link/"+t._s(t.$page.props.user.username)+"\n                        "),e("fa-icon",{staticClass:"ml-1 cursor-pointer",attrs:{icon:["fas","pencil-alt"]},on:{click:function(s){t.$inertia.visit(t.route("page-settings.info"))}}})],1)])],1),t._v(" "),e("div",{staticClass:"flex items-center"},[e("v-button-copy",{attrs:{type:"secondary",small:"","copy-text":"ibio.link/"+t.$page.props.user.username}},[e("fa-icon",{staticClass:"mr-1 text-gray-700",attrs:{icon:["fas","link"]}}),t._v("\n                    Copy Link\n                ")],1)],1)]),t._v(" "),t.$page.props.hasVisits?[e("div",{staticClass:"grid grid-cols-1 md:grid-cols-2 gap-2 mb-5"},[e("v-card",{staticClass:"line-chart w-full mb-3 sm:mb-0",attrs:{padding:"0"}},[e("div",{staticClass:"flex items-center justify-between p-3 md:p-6"},[e("v-title",{staticClass:"p-0",attrs:{small:""}},[t._v("Visits")])],1),t._v(" "),e("visits-chart",{staticClass:"h-20",attrs:{"chart-data":t.$page.props.visits}})],1),t._v(" "),e("v-card",{staticClass:"line-chart w-full",attrs:{padding:"0"}},[e("div",{staticClass:"flex items-center justify-between mb-8 md:mb-0 p-3 md:p-6"},[e("v-title",{staticClass:"p-0",attrs:{small:""}},[t._v("Clicks")])],1),t._v(" "),e("clicks-chart",{staticClass:"h-20",attrs:{"chart-data":t.$page.props.clicks,"border-width":"5"}})],1)],1),t._v(" "),t.$page.props.recentClicks.length>0?e("v-card",{attrs:{padding:"0"}},[e("div",{staticClass:"flex items-center justify-between border-b-2 border-gray-100 p-3 md:p-6"},[e("v-title",{staticClass:"p-0",attrs:{small:""}},[t._v("Recent clicks")]),t._v(" "),e("v-button",{attrs:{type:"secondary",small:""},on:{click:function(s){t.$inertia.visit(t.route("stats.clicks"))}}},[e("fa-icon",{staticClass:"mr-2",attrs:{icon:["fas","chart-bar"]}}),t._v("\n                        View Stats\n                    ")],1)],1),t._v(" "),e("table",{staticClass:"min-w-full divide-y divide-gray-100"},[e("tbody",{staticClass:"bg-white divide-y divide-gray-100 text-gray-600"},t._l(t.$page.props.recentClicks,(function(s,i){return e("tr",{key:i,staticClass:"hover:bg-gray-50"},[e("td",{staticClass:"px-6 py-4 whitespace-nowrap flex items-center"},[["social","contact"].includes(s.statable.type)&&s.statable.title?e("img",{staticClass:"mr-1",attrs:{src:a(11)("./"+s.statable.title+".svg"),width:"20"}}):t._e(),t._v(" "),e("a",{staticClass:"text-gray-700",class:{capitalize:["social","contact"].includes(s.statable.type)},attrs:{href:s.statable.real_url,rel:"noreferrer",target:"_blank"}},[t._v(t._s(s.statable.title))])]),t._v(" "),e("td",{staticClass:"px-6 py-4 whitespace-nowrap"}),t._v(" "),e("td",{staticClass:"px-6 py-4 text-right whitespace-nowrap flex items-center justify-end"},[s.country&&"-"!==s.country?e("div",{staticClass:"flex items-center mr-2"},[e("img",{staticClass:"h-5",attrs:{src:"/static/images/country-flags/"+s.country+".svg",alt:""}})]):t._e(),t._v(" "),e("div",{staticClass:"flex items-center justify-center w-5"},[s.is_mobile?[e("fa-icon",{staticClass:"fa-w",attrs:{icon:["fas","mobile-alt"]}})]:t._e(),t._v(" "),s.is_desktop?[e("fa-icon",{staticClass:"fa-w",attrs:{icon:["fas","desktop"]}})]:t._e(),t._v(" "),s.is_tablet?[e("fa-icon",{staticClass:"fa-w",attrs:{icon:["fas","tablet-alt"]}})]:t._e()],2)])])})),0)])]):e("v-card",{staticClass:"text-center"},[e("p",{staticClass:"text-lg font-semibold mb-3"},[t._v("No one clicked on your links yet ☹️")]),t._v(" "),e("p",{staticClass:"text-gray-500 mb-3"},[t._v("Share your link with your friends")]),t._v(" "),e("v-button-copy",{attrs:{type:"secondary",small:"","copy-text":"ibio.link/"+t.$page.props.user.username}},[e("fa-icon",{staticClass:"mr-1 text-gray-700",attrs:{icon:["fas","link"]}}),t._v("\n                    Copy Link\n                ")],1)],1)]:e("v-card",{staticClass:"text-center"},[e("p",{staticClass:"text-lg font-semibold mb-3"},[t._v("You don't have any visitors yet ☹️")]),t._v(" "),e("p",{staticClass:"text-gray-500 mb-3"},[t._v("Share your link with your friends")]),t._v(" "),e("v-button-copy",{attrs:{type:"secondary",small:"","copy-text":"ibio.link/"+t.$page.props.user.username}},[e("fa-icon",{staticClass:"mr-1 text-gray-700",attrs:{icon:["fas","link"]}}),t._v("\n                Copy Link\n            ")],1)],1)]:[e("v-card",{staticClass:"mb-5 bg-yellow-50",attrs:{border:"border-yellow-200"}},[e("div",{staticClass:"flex items-center justify-between"},[e("p",{staticClass:"mr-3"},[t._v("You haven't set your username yet!")]),t._v(" "),e("v-button",{attrs:{type:"color",color:"yellow",small:""},on:{click:function(s){t.$inertia.visit(t.route("page-settings.info"))}}},[t._v("Set Now")])],1)])]],2)}),[],!1,null,null,null);s.default=r.exports},9:function(t,s,a){"use strict";a.r(s);var e={extends:a(7).a,name:"ClicksChart",props:["chartData","borderWidth","showDetail"],mounted:function(){this.renderChart({labels:this.getLabels(),datasets:[{label:"Clicks",backgroundColor:"#e9d3f6",data:this.getData(),borderWidth:this.borderWidth,borderColor:["#cb55ee"],fill:!0}]},{legend:{display:this.showDetail},title:"Views stats",responsive:!0,maintainAspectRatio:!1,scales:{yAxes:[{ticks:{display:this.showDetail,beginAtZero:!0,callback:function(t){if(t%1==0)return t},max:Math.max.apply(Math,this.getData())+1},gridLines:{display:this.showDetail}}],xAxes:[{ticks:{display:!1},gridLines:{display:!1}}]},layout:{padding:{bottom:this.showDetail?0:-20,left:this.showDetail?0:-10}}})},methods:{getLabels:function(){var t=[];return this.chartData.map((function(s){t.push(s.date)})),t},getData:function(){var t=[];return this.chartData.map((function(s){t.push(s.clicks)})),t}}},i=a(1),c=Object(i.a)(e,void 0,void 0,!1,null,null,null);s.default=c.exports}}]);