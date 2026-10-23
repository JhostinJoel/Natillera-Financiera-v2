(function(){
  function load(){
    if(window.Swal)return;
    var s=document.createElement('script');s.src='https://cdn.jsdelivr.net/npm/sweetalert2@11';s.defer=true;document.head.appendChild(s);
  }
  load();
  document.addEventListener('submit',function(e){
    var form=e.target;if(!form.matches('form')||form.dataset.confirmed==='1')return;
    var action=form.querySelector('[name=action]')?.value||'';
    var messages={contribution:['Guardar aporte','El aporte del mes quedará registrado.'],reset_contribution:['Reiniciar aporte','El aporte de este mes volverá a cero.'],participant_update:['Guardar cambios','Los datos del participante serán actualizados.'],participant_delete:['Eliminar participante','Esta acción eliminará al participante y su historial.'],participant_toggle:['Cambiar estado','El estado del participante será actualizado.'],installment:['Registrar pago','El abono quedará registrado en el plan.']};
    if(!messages[action])return;
    e.preventDefault();form.dataset.confirmed='1';var title=messages[action][0],text=messages[action][1];var submit=function(){form.submit()};var cancel=function(){delete form.dataset.confirmed};
    if(window.Swal){Swal.fire({title:'¿'+title+'?',text:text,icon:'question',showCancelButton:true,confirmButtonText:'Confirmar',cancelButtonText:'Cancelar',reverseButtons:true}).then(function(r){r.isConfirmed?submit():cancel()})}else if(window.confirm('¿'+title+'?\n'+text))submit();else cancel();
  });
})();
