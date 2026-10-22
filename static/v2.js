(function(){
  function load(){
    if(window.Swal)return;
    var s=document.createElement('script');s.src='https://cdn.jsdelivr.net/npm/sweetalert2@11';s.defer=true;document.head.appendChild(s);
  }
  load();
  document.addEventListener('submit',function(e){
    var form=e.target;if(!form.matches('form'))return;
    var action=form.querySelector('[name=action]')?.value||'';
    if(['participant_delete','participant_toggle','installment'].includes(action)&&!form.dataset.confirmed){e.preventDefault();form.dataset.confirmed='1';if(window.Swal){Swal.fire({title:'¿Confirmar acción?',text:'El cambio quedará registrado en el sistema.',icon:'question',showCancelButton:true,confirmButtonText:'Confirmar',cancelButtonText:'Cancelar'}).then(function(r){if(r.isConfirmed)form.submit();else delete form.dataset.confirmed})}else if(confirm('¿Confirmar acción?'))form.submit();else delete form.dataset.confirmed;}
  });
})();
