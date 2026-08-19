document.addEventListener('DOMContentLoaded',()=>{
 const nic=document.querySelector('input[name="nic"]');
 if(nic){nic.required=false;const label=nic.closest('label');if(label)label.childNodes[0].textContent='NIC Number ';}
 const disabilitySelect=document.querySelector('select[name="disability_notes"]');
 if(disabilitySelect){const disabilityInput=document.createElement('input');disabilityInput.type='text';disabilityInput.name='disability_notes';disabilityInput.value=disabilitySelect.value;disabilityInput.maxLength=500;disabilityInput.required=true;disabilityInput.placeholder='Enter the nature of disability';disabilitySelect.replaceWith(disabilityInput);}
 const aidType=document.getElementById('item_id'),powerField=document.getElementById('power-field'),lensPower=document.getElementById('prescribed_power');
 const updateLensPower=()=>{if(!aidType||!powerField||!lensPower)return;const isLens=aidType.selectedOptions[0]?.dataset.lens==='1';powerField.hidden=!isLens;lensPower.required=isLens;if(!isLens)lensPower.value='';};
 aidType?.addEventListener('change',updateLensPower);updateLensPower();
 const district=document.getElementById('district_id'),ds=document.getElementById('ds_division_id'),gn=document.getElementById('gn_division_id'),dob=document.getElementById('date_of_birth'),age=document.getElementById('beneficiary-age');
 if(!district||!ds||!gn)return;
 const filter=(select,parent)=>{Array.from(select.options).forEach((option,index)=>{if(index===0)return;const visible=parent!==''&&option.dataset.parent===parent;option.hidden=!visible;option.disabled=!visible;});if(select.selectedOptions[0]?.disabled)select.value='';select.disabled=parent==='';};
 district.addEventListener('change',()=>{ds.value='';gn.value='';filter(ds,district.value);filter(gn,'');});
 ds.addEventListener('change',()=>{gn.value='';filter(gn,ds.value);});
 filter(ds,district.value);filter(gn,ds.value);
 dob?.addEventListener('change',()=>{if(!dob.value){age.textContent='Age: —';return;}const birth=new Date(dob.value),today=new Date();let years=today.getFullYear()-birth.getFullYear();if(today<new Date(today.getFullYear(),birth.getMonth(),birth.getDate()))years--;age.textContent=`Age: ${Math.max(0,years)}`;});
});
