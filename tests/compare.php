<?php
$v2Base=getenv('V2_BASE_URL') ?: 'http://127.0.0.1:8080';
$cases=[
 ['/', ['Ahorros','Control de cuotas','Filtrar','Guardar']],
 ['/participants', ['Participantes','Editar','Activo','Desactivar']],
 ['/loans', ['Préstamos','Tasa','Estado']],
 ['/reports/annual', ['Reporte','Intereses','Total']],
];$fail=0;
foreach($cases as [$path,$labels]){$v1=@file_get_contents('http://127.0.0.1:5000'.$path);$v2=@file_get_contents($v2Base.$path);foreach($labels as $label){$a=$v1!==false&&stripos($v1,$label)!==false;$b=$v2!==false&&stripos($v2,$label)!==false;if(!$a||!$b){echo "MISSING {$path} {$label}: V1=".($a?'yes':'no')." V2=".($b?'yes':'no')."\n";$fail++;}}if(!$fail)echo "PASS {$path}\n";}
$report=@file_get_contents($v2Base.'/reports/annual');foreach(['method-toggle','¿Cómo se calcula?','manifest.webmanifest','sw.js'] as $label){if($report===false||stripos($report,$label)===false){echo "MISSING /reports/annual {$label}\n";$fail++;}}
echo $fail?"{$fail} comparison findings\n":"All comparison labels present\n";exit($fail?1:0);
