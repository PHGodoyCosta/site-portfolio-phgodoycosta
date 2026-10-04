/*
 * <premium-texture mode="velvet" intensity="0.6"></premium-texture>
 * Textura animada em WebGL, exportada do PHGodoyCosta Design (artifact
 * "Landing page hero e navbar"). Mantida igual à fonte — alterações aqui
 * devem vir de uma nova exportação, não de ajustes manuais.
 * Cores vêm dos tokens --ground / --ice / --ink-muted.
 */
(function () {
  if (customElements.get('premium-texture')) return;

  const VERT = 'attribute vec2 a;void main(){gl_Position=vec4(a,0.,1.);}';
  const FRAG = `
precision highp float;
uniform vec2 uRes;uniform float uTime;uniform vec2 uMouse;uniform float uOn;uniform float uSpeed;
uniform float uInt;uniform float uMode;uniform vec3 uBase;uniform vec3 uTint;
float hash(vec2 p){p=fract(p*vec2(123.34,456.21));p+=dot(p,p+45.32);return fract(p.x*p.y);}
float noise(vec2 p){vec2 i=floor(p),f=fract(p);f=f*f*(3.-2.*f);
 return mix(mix(hash(i),hash(i+vec2(1,0)),f.x),mix(hash(i+vec2(0,1)),hash(i+vec2(1,1)),f.x),f.y);}
float fbm(vec2 p){float v=0.,a=.5;mat2 m=mat2(1.6,1.2,-1.2,1.6);for(int i=0;i<5;i++){v+=a*noise(p);p=m*p;a*=.5;}return v;}
float fbm3(vec2 p){float v=0.,a=.5;mat2 m=mat2(1.6,1.2,-1.2,1.6);for(int i=0;i<3;i++){v+=a*noise(p);p=m*p;a*=.5;}return v;}
float height(vec2 p,vec2 mp){
 float t=uTime;float h;
 if(uMode<.5){
  vec2 q=vec2(fbm(p+vec2(0.,t*.018)),fbm(p+vec2(5.2,1.3)-t*.014));
  h=fbm(p+1.7*q);
  vec2 d=p-mp;float r=length(d);
  h+=uOn*(.05+uSpeed*.5)*exp(-r*r*4.)*cos(r*11.-t*1.6);
 }else{
  vec2 q=vec2(fbm3(p*.6+t*.008),fbm3(p*.6+vec2(3.1,7.7)));
  h=.55*sin(p.x*1.9+p.y*.6+q.x*4.)+.35*sin(p.x*3.3-p.y*.9+q.y*5.)+.4*fbm3(p+2.*q);
  vec2 d=p-mp;float r=length(d);
  h-=uOn*(.25+uSpeed*.4)*exp(-r*r*2.5);
 }
 return h;}
void main(){
 vec2 uv=gl_FragCoord.xy/uRes;float asp=uRes.x/uRes.y;
 float sc=uMode<.5?1.5:2.1;
 vec2 p=vec2(uv.x*asp,uv.y)*sc;
 vec2 mp=vec2(uMouse.x*asp,uMouse.y)*sc;
 float e=.003;
 float h=height(p,mp);
 float hx=height(p+vec2(e,0.),mp)-h;float hy=height(p+vec2(0.,e),mp)-h;
 float k=uMode<.5?2.4:7.;
 vec3 N=normalize(vec3(-hx/e*k*.1,-hy/e*k*.1,1.));
 vec3 V=vec3(0.,0.,1.);
 vec2 lp=mix(vec2(.85*asp,1.05)*sc,mp,uOn);
 vec3 L=normalize(vec3(lp-p,uMode<.5?1.1:.7));
 float fall=exp(-dot(lp-p,lp-p)*(uMode<.5?.12:.08));
 vec3 col=uBase;
 if(uMode<.5){
  vec3 H=normalize(L+V);
  float spec=pow(max(dot(N,H),0.),70.);
  vec3 R=reflect(-V,N);
  float env=smoothstep(.15,.6,R.x*.6+R.y*.8)*smoothstep(.9,.4,R.x*.6+R.y*.8);
  float broad=pow(max(dot(N,H),0.),8.);
  col+=uTint*(spec*.55+env*.10+broad*.05)*fall*uInt*1.4;
  col*=.85+.15*h;
 }else{
  float diff=max(dot(N,L),0.);
  float rim=pow(1.-max(dot(N,V),0.),1.6);
  float fib=hash(gl_FragCoord.xy)*.6+hash(floor(gl_FragCoord.xy*.5)+7.)*.4;
  float sh=rim*(.25+.75*diff);
  vec3 sheen=uTint*(sh*.6+pow(diff,6.)*.04)*(.35+.65*fall)*uInt;
  col=col*(.55+.6*diff)+sheen*(.8+.4*fib);
  col+=(fib-.5)*.018*uInt;
 }
 float vig=smoothstep(1.25,.25,length((uv-vec2(.55,.6))*vec2(asp*.6,1.)));
 col=mix(uBase*.7,col,.55+.45*vig);
 gl_FragColor=vec4(col,1.);
}`;

  function cssColor(el, v, fb) {
    const s = document.createElement('span');
    s.style.color = 'var(' + v + ',' + fb + ')';
    el.appendChild(s);
    const m = getComputedStyle(s).color.match(/[\d.]+/g) || [0, 0, 0];
    s.remove();
    return [m[0] / 255, m[1] / 255, m[2] / 255];
  }

  class PremiumTexture extends HTMLElement {
    static get observedAttributes() { return ['mode', 'intensity']; }
    set mode(v) { this._mode = v; }
    get mode() { return this._mode || this.getAttribute('mode') || 'oil'; }
    set intensity(v) { this._int = v; }
    get intensity() { const v = this._int != null ? this._int : this.getAttribute('intensity'); const n = parseFloat(v); return isNaN(n) ? 0.6 : n; }
    connectedCallback() {
      Object.assign(this.style, { display: 'block', width: '100%', height: '100%', position: 'relative' });
      const c = document.createElement('canvas');
      Object.assign(c.style, { position: 'absolute', inset: '0', width: '100%', height: '100%', display: 'block' });
      this.appendChild(c);
      this.c = c;
      const gl = c.getContext('webgl', { antialias: false, premultipliedAlpha: false, preserveDrawingBuffer: true });
      if (!gl) return;
      this.gl = gl;
      const sh = (t, s) => { const o = gl.createShader(t); gl.shaderSource(o, s); gl.compileShader(o); if (!gl.getShaderParameter(o, gl.COMPILE_STATUS)) console.error(gl.getShaderInfoLog(o)); return o; };
      const pr = gl.createProgram();
      gl.attachShader(pr, sh(gl.VERTEX_SHADER, VERT)); gl.attachShader(pr, sh(gl.FRAGMENT_SHADER, FRAG)); gl.linkProgram(pr); gl.useProgram(pr);
      const b = gl.createBuffer(); gl.bindBuffer(gl.ARRAY_BUFFER, b);
      gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1, -1, 3, -1, -1, 3]), gl.STATIC_DRAW);
      const loc = gl.getAttribLocation(pr, 'a'); gl.enableVertexAttribArray(loc); gl.vertexAttribPointer(loc, 2, gl.FLOAT, false, 0, 0);
      this.u = {}; ['uRes', 'uTime', 'uMouse', 'uOn', 'uSpeed', 'uInt', 'uMode', 'uBase', 'uTint'].forEach(n => this.u[n] = gl.getUniformLocation(pr, n));
      this.base = cssColor(this, '--ground', '#0b0b0c');
      this.tintOil = cssColor(this, '--ice', '#b9d4e6');
      this.tintVel = cssColor(this, '--ink-muted', '#a3a3a3');
      this.m = { x: .7, y: .6, tx: .7, ty: .6, on: 0, ton: 0, sp: 0 };
      this.reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;
      this.onMove = (e) => {
        const r = this.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width, y = 1 - (e.clientY - r.top) / r.height;
        const inside = x >= 0 && x <= 1 && y >= 0 && y <= 1;
        this.m.ton = inside ? 1 : 0;
        if (inside) { this.m.sp = Math.min(1, this.m.sp + Math.hypot(x - this.m.tx, y - this.m.ty) * 3); this.m.tx = x; this.m.ty = y; }
        if (this.reduced) this.draw(0);
      };
      window.addEventListener('pointermove', this.onMove, { passive: true });
      this.ro = new ResizeObserver(() => { this.resize(); this.draw(this.t || 0); }); this.ro.observe(this);
      this.visible = true;
      this.io = new IntersectionObserver(([en]) => { this.visible = en.isIntersecting; }); this.io.observe(this);
      this.resize();
      const t0 = performance.now();
      const loop = (now) => { this.raf = requestAnimationFrame(loop); if (!this.visible || this.reduced) return; this.t = (now - t0) / 1000; this.draw(this.t); };
      this.raf = requestAnimationFrame(loop);
      if (this.reduced) this.draw(0);
    }
    resize() {
      const r = this.getBoundingClientRect();
      const s = Math.min(window.devicePixelRatio || 1, 1.5) * (this.mode === 'velvet' ? 0.9 : 0.6);
      this.c.width = Math.max(1, Math.round(r.width * s)); this.c.height = Math.max(1, Math.round(r.height * s));
      this.gl && this.gl.viewport(0, 0, this.c.width, this.c.height);
    }
    draw(t) {
      const gl = this.gl, u = this.u, m = this.m; if (!gl) return;
      const k = this.reduced ? 1 : 0.06;
      m.x += (m.tx - m.x) * k; m.y += (m.ty - m.y) * k; m.on += (m.ton - m.on) * (this.reduced ? 1 : 0.04); m.sp *= 0.96;
      const vel = this.mode === 'velvet';
      gl.uniform2f(u.uRes, this.c.width, this.c.height); gl.uniform1f(u.uTime, t);
      gl.uniform2f(u.uMouse, m.x, m.y); gl.uniform1f(u.uOn, m.on); gl.uniform1f(u.uSpeed, m.sp);
      gl.uniform1f(u.uInt, this.intensity); gl.uniform1f(u.uMode, vel ? 1 : 0);
      gl.uniform3fv(u.uBase, this.base); gl.uniform3fv(u.uTint, vel ? this.tintVel : this.tintOil);
      gl.drawArrays(gl.TRIANGLES, 0, 3);
    }
    disconnectedCallback() {
      cancelAnimationFrame(this.raf); window.removeEventListener('pointermove', this.onMove);
      this.ro && this.ro.disconnect(); this.io && this.io.disconnect();
      if (this.c) this.c.remove();
    }
  }
  customElements.define('premium-texture', PremiumTexture);
})();
