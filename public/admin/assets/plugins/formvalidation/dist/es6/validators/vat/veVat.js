export default function t(t){let e=t;if(/^VE[VEJPG][0-9]{9}$/.test(e)){e=e.substr(2)}if(!/^[VEJPG][0-9]{9}$/.test(e)){return{meta:{},valid:false}}const r={E:8,G:20,J:12,P:16,V:4};const s=[3,2,7,6,5,4,3,2];let a=r[e.charAt(0)];for(let t=0;t<8;t++){a+=parseInt(e.charAt(t+1),10)*s[t]}a=11-a%11;if(a===11||a===10){a=0}return{meta:{},valid:`${a}`===e.substr(9,1)}}