document.addEventListener('DOMContentLoaded',function(){
  const panel=document.querySelector('.add-participant');
  if(!panel||document.querySelector('.participant-modal-trigger'))return;
  const trigger=document.createElement('button');
  trigger.type='button'; trigger.className='participant-modal-trigger'; trigger.textContent='+ Agregar participante';
  panel.parentNode.insertBefore(trigger,panel);
  const overlay=document.createElement('div'); overlay.className='participant-modal';
  overlay.innerHTML='<div class="participant-modal__dialog" role="dialog" aria-modal="true" aria-label="Agregar participante"><button type="button" class="participant-modal__close" aria-label="Cerrar">×</button></div>';
  document.body.appendChild(overlay);
  overlay.querySelector('.participant-modal__dialog').appendChild(panel);
  const close=()=>{overlay.classList.remove('is-open');document.body.classList.remove('modal-open')};
  trigger.addEventListener('click',()=>{overlay.classList.add('is-open');document.body.classList.add('modal-open');panel.querySelector('input')?.focus()});
  overlay.querySelector('.participant-modal__close').addEventListener('click',close);
  overlay.addEventListener('click',e=>{if(e.target===overlay)close()});
  document.addEventListener('keydown',e=>{if(e.key==='Escape')close()});
});
