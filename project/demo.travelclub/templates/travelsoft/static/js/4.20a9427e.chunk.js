(this.webpackJsonpavia=this.webpackJsonpavia||[]).push([[4],{147:function(e,t,a){"use strict";a.r(t);var n=a(3),c=a(4),s=a(0),r=a.n(s),i=a(20);t.default=function(){var e=Object(s.useState)(!1),t=Object(c.a)(e,2),a=t[0],l=t[1],o=Object(s.useState)(!1),u=Object(c.a)(o,2),f=u[0],h=u[1],d=i.a;Object(s.useEffect)((function(){document.addEventListener("dispatchResetSort",(function(){console.log("RESET"),l(!1),h(!1)}))}));Object(s.useEffect)((function(){window.history.pushState(Object(n.a)({},window.history.state,{sort:{by:"duration",order:a?"asc":"desc"}}),"title",""),d("dispatchNewData")({sortDuration:a})}),[a]);return Object(s.useEffect)((function(){window.history.pushState(Object(n.a)({},window.history.state,{sort:{by:"price",order:f?"asc":"desc"}}),"title",""),d("dispatchNewData")({sortPrice:f})}),[f]),r.a.createElement("div",{className:"theme-search-results-sort _mob-h clearfix"},r.a.createElement("ul",{className:"theme-search-results-sort-list"},r.a.createElement("li",null,r.a.createElement("a",{href:"#",onClick:function(e){e.preventDefault(),h(!f)}},"\u0426\u0435\u043d\u0430",f?r.a.createElement("span",null,"\u0412\u044b\u0441\u043e\u043a\u0430\u044f \u2192 \u041d\u0438\u0437\u043a\u0430\u044f"):r.a.createElement("span",null,"\u041d\u0438\u0437\u043a\u0430\u044f \u2192 \u0412\u044b\u0441\u043e\u043a\u0430\u044f"))),r.a.createElement("li",{onClick:function(e){e.preventDefault(),l(!a)}},r.a.createElement("a",{href:"#"},"\u041f\u0440\u043e\u0434\u043e\u043b\u0436\u0438\u0442\u0435\u043b\u044c\u043d\u043e\u0441\u0442\u044c",a?r.a.createElement("span",null,"\u0414\u043e\u043b\u0433\u043e \u2192 \u041a\u043e\u0440\u043e\u0442\u043a\u043e"):r.a.createElement("span",null,"\u041a\u043e\u0440\u043e\u0442\u043a\u043e \u2192 \u0414\u043e\u043b\u0433\u043e")))))}}}]);
//# sourceMappingURL=4.20a9427e.chunk.js.map