<?php

function getGCalendarUrl($event){
$titulo = urlencode($event['titulo']);
$descripcion = urlencode($event['descripcion']);
$localizacion = urlencode($event['localizacion']);
$start=new DateTime($event['fecha_inicio'].' '.$event['hora_inicio'].' '.date_default_timezone_get());
$end=new DateTime($event['fecha_fin'].' '.$event['hora_fin'].' '.date_default_timezone_get()); $dates = urlencode($start->format("Ymd\THis")) . "/" . urlencode($end->format("Ymd\THis"));
$name = urlencode($event['nombre']);
$url = urlencode($event['url']);
$gCalUrl = "http://www.google.com/calendar/event?action=TEMPLATE&amp;text=$titulo&amp;dates=$dates&amp;details=$descripcion&amp;location=$localizacion&amp;trp=false&amp;sprop=$url&amp;sprop=name:$name";
return ($gCalUrl);
}
// array asociativo con los parametros mecesarios.
$evento = array(
  'titulo' => 'Mi evento de prueba',
  'descripcion' => 'Conferencia título,',
  'localizacion' => 'Aqui ponemos la dirección donde se celebra el evento',
  'fecha_inicio' => '2021-10-05', // Fecha de inicio de evento en formato AAAA-MM-DD
'hora_inicio'=>'17:30', // Hora Inicio del evento
'fecha_fin'=>'2021-10-08', // Fecha de fin de evento en formato AAAA-MM-DD
'hora_fin'=>'19:00', // Hora final del evento
'nombre'=>'Congreso Parques', // Nombre del sitio
'url'=>'www.congresoparques.com' // Url de la página
);
?>
<a href="<?php echo getGCalendarUrl($evento); ?>"><img src="http://www.google.com/calendar/images/ext/gc_button6_es.gif" border="0"></a>
