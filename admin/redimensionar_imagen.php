<?php

function redimensionarImagen($imagen, $ancho_f, $alto_f){
	//Extraemos algunos atributos de la imagen
	list($ancho_i, $alto_i, $nroTipo)=getimagesize($imagen);

	//Creamos una variable imagen a partir de la imagen original según el tipo

	switch ($nroTipo) {
		case 2: $imagen_inicial=imagecreatefromjpeg($imagen);
			break;
		
		case 3: $imagen_inicial=imagecreatefrompng($imagen);
			break;

		default: echo "Tipo de archivo incorrector";
		break;	
	}

   //
   $ratio_ancho = $ancho_f / $ancho_i;
   $ratio_alto = $alto_f / $alto_i;


   //obtenemos maximo entre los RATIOS
   $ratio_max= max($ratio_ancho, $ratio_alto); // 1

   //Utilizamos el ratio maximo para calcular el nuevo ancho y alto de la imagen

   $nvo_ancho = $ancho_i * $ratio_max; //1000*1 = 1000
   $nvo_alto = $alto_i * $ratio_max; //500*1 = 500

   //calculamos recortes
   $cortar_ancho = $nvo_ancho - $ancho_f; //1000-500=500
   $cortar_alto = $nvo_alto - $alto_f;//500-5000=0

   //definimos el desplazamiento en 0.5 asi se recorta la parte central de la imagen
   //0 para ejes arriba - izquierda
   //1 para ejes arriba - derecha
   //0.5 centro
   $desplazamiento= 0.5;

   //creamos una imagen en blanco con los tamaños finales
   $nueva_img = imagecreatetruecolor($ancho_f, $alto_f);

   //copiamos la imagen original sobre la que acabamos de crear en blanco
   imagecopyresampled($nueva_img, $imagen_inicial, -$cortar_ancho * $desplazamiento, -$cortar_alto * $desplazamiento, 0,0, $ancho_f + $cortar_ancho, $alto_f + $cortar_alto, $ancho_i, $alto_i);

   //Se destruye variable $img_original para lioberar memoria 
   imagedestroy($imagen_inicial);

   //Definimos la calidad de la imagen final
   $calidad=65;
   
   //Definimos el nombre final de la imagen concatenando al nombre original
   //un identificador unico con la función time();

   $nombre_imagen=time()."_".$imagen;

   //Se crea la imagen final en el directorio indicado
   imagejpeg($nueva_img,"img/$nombre_imagen",$calidad);

   //retornamos el nombre de la nueva imagen
   return $nombre_imagen;
}