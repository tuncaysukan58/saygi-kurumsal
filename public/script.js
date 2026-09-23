const h=document.querySelector('.hamb'),n=document.querySelector('header nav');
if(h&&n){
  h.addEventListener('click',()=>{
    const open=n.classList.toggle('open');
    h.setAttribute('aria-expanded',open?'true':'false');
    h.textContent=open?'✕':'☰';
    if(!open)n.querySelectorAll('.hasdrop.open').forEach(d=>d.classList.remove('open'));
  });
  n.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{
    if(!a.closest('.hasdrop')&&n.classList.contains('open')){
      n.classList.remove('open');h.setAttribute('aria-expanded','false');h.textContent='☰';
    }
  }));
  n.querySelectorAll('.dropToggle').forEach(btn=>btn.addEventListener('click',()=>{
    const item=btn.closest('.hasdrop'),open=item.classList.toggle('open');
    btn.setAttribute('aria-expanded',open?'true':'false');
  }));
  document.addEventListener('click',e=>{
    if(window.innerWidth>900&&!e.target.closest('header nav')&&!e.target.closest('.hamb')){
      n.querySelectorAll('.hasdrop.open').forEach(d=>d.classList.remove('open'));
    }
  });
}
document.querySelectorAll('.ajax-form').forEach(form=>form.addEventListener('submit',async e=>{e.preventDefault();const btn=form.querySelector('button[type="submit"],button:not([type])'),status=form.querySelector('.form-status');if(btn){btn.disabled=true;btn.dataset.t=btn.textContent;btn.textContent='Gönderiliyor…'}try{const r=await fetch(form.action,{method:'POST',body:new FormData(form),headers:{'Accept':'application/json'}});const j=await r.json();status.className='form-status '+(r.ok?'ok':'err');status.textContent=j.message||'İşlem tamamlandı.';if(r.ok)form.reset()}catch(_){status.className='form-status err';status.textContent='Form gönderilemedi. Lütfen telefon veya e-posta ile bize ulaşın.'}finally{if(btn){btn.disabled=false;btn.textContent=btn.dataset.t}}}));

// Accordion: only one FAQ item open at a time (strengthened with summary click intercept)
document.querySelectorAll('.accord').forEach(acc=>{
  const dets=[...acc.querySelectorAll('details')];
  dets.forEach(det=>{
    det.addEventListener('toggle',()=>{
      if(det.open){dets.forEach(other=>{if(other!==det&&other.open)other.open=false});}
    });
    const sum=det.querySelector('summary');
    if(sum)sum.addEventListener('click',()=>{
      if(!det.open){dets.forEach(other=>{if(other!==det)other.open=false});}
    });
  });
});

// Dropdown menus: reduced close-delay to 120ms for faster response
document.querySelectorAll('.hasdrop').forEach(item=>{
  let closeTimer=null;
  item.addEventListener('mouseenter',()=>{clearTimeout(closeTimer);item.classList.add('js-open')});
  item.addEventListener('mouseleave',()=>{closeTimer=setTimeout(()=>item.classList.remove('js-open'),120)});
});

// Same-page tabs: sidebar navigation that swaps visible content (no page scroll)
document.querySelectorAll('[data-tabs]').forEach(container=>{
  const links=[...container.querySelectorAll('.tab-link')];
  const panels=[...container.querySelectorAll('.tab-panel')];
  if(!links.length||!panels.length)return;
  function activate(id){
    panels.forEach(p=>p.classList.toggle('active',p.id===id));
    links.forEach(l=>l.classList.toggle('active',l.getAttribute('href')==='#'+id));
  }
  const hashId=location.hash?location.hash.slice(1):null;
  const initial=(hashId&&panels.some(p=>p.id===hashId))?hashId:panels[0].id;
  activate(initial);
  links.forEach(l=>l.addEventListener('click',e=>{
    e.preventDefault();
    const id=l.getAttribute('href').slice(1);
    activate(id);
    history.replaceState(null,'','#'+id);
  }));
});

// Homepage hero slider: autoplay + arrows + dots + fade transition
document.querySelectorAll('.hero').forEach(hero=>{
  const slides=[...hero.querySelectorAll('.heroSlide')];
  if(slides.length<2)return;
  const dots=[...hero.querySelectorAll('.heroDot')];
  const prevBtn=hero.querySelector('.heroArrow.prev');
  const nextBtn=hero.querySelector('.heroArrow.next');
  let idx=slides.findIndex(s=>s.classList.contains('active'));
  if(idx<0)idx=0;
  let timer=null;
  function show(i){
    slides[idx].classList.remove('active');
    dots[idx]&&dots[idx].classList.remove('active');
    idx=(i+slides.length)%slides.length;
    slides[idx].classList.add('active');
    dots[idx]&&dots[idx].classList.add('active');
  }
  function next(){show(idx+1)}
  function prev(){show(idx-1)}
  function restart(){clearInterval(timer);timer=setInterval(next,6000)}
  nextBtn&&nextBtn.addEventListener('click',()=>{next();restart()});
  prevBtn&&prevBtn.addEventListener('click',()=>{prev();restart()});
  dots.forEach((d,i)=>d.addEventListener('click',()=>{show(i);restart()}));
  hero.addEventListener('mouseenter',()=>clearInterval(timer));
  hero.addEventListener('mouseleave',restart);
  restart();
});
