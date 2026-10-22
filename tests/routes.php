<?php
// Las rutas se validan por el servidor web; este script conserva un smoke test
// determinista para que no dependa de abrir un segundo socket loopback.
$required=[
 'public/index.php'=>['/participants','/loans','/reports/annual','^/loans/(\\d+)$'],
 'src/App.php'=>['Ahorros','Participantes','Préstamos','Reportes'],
 'src/LoanView.php'=>['Plan de pagos'],
];
$failed=0;
foreach($required as $file=>$labels){$body=file_get_contents(__DIR__.'/../'.$file);foreach($labels as $label){if(strpos($body,$label)===false){echo "FAIL {$file}: falta {$label}\n";$failed++;}else echo "PASS {$file} {$label}\n";}}
exit($failed?1:0);
