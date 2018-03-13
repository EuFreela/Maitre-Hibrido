//-----------------------------------------------------  
 //FUNÇÃO: maskCurrent
 //Sinopse: Mascara de preenchimento de moeda corrente  
 //Parametro:  
 //   Objeto : O objeto propriamente dito
 //Retorno: string  
 //Uso: onkeyup
 //Autor: Grupo de desenvolvimento do Maitre   
 // 
//-----------------------------------------------------  
function maskCurrent($val){
	$object = $val.value;
	$object=$object.replace(/\D/g,"") // permite digitar apenas numero
	$object=$object.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
	$object=$object.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
	$object=$object.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
	$object=$object.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
	$object=$object.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca $objectirgula antes dos ultimos 2 digitos
	$val.value = $object;
}

//-----------------------------------------------------  
 //FUNÇÃO: maskIP
 //Sinopse: Mascara de preenchimento de moeda corrente  
 //Parametro:  
 //   Objeto : O objeto propriamente dito
 //Retorno: string  
 //Uso: onkeyup
 //Autor: Grupo de desenvolvimento do Maitre   
 // 
//-----------------------------------------------------  
function maskIP($obj){
	
}


//-----------------------------------------------------  
 //FUNÇÃO: uploadImageTumblr
 //Sinopse: Preview da imagem de upload (tumblr)  
 //Parametro:  
 //   Objeto : O objeto propriamente dito
 //Retorno: FileReader da imagem corrente  
 //Uso: onclick
 //Autor: Grupo de desensenvolvimento do Maitre   
 // 
//-----------------------------------------------------  
function uploadImageTumblr($object){
	$object.onchange = function () {
	    var reader = new FileReader();

	    reader.onload = function (e) {
	        // get loaded data and render thumbnail.
	        document.getElementById("image1").src = e.target.result;        
	        document.getElementById("image2").src = e.target.result;
	        document.getElementById("image3").src = e.target.result;
	    };

	    // read the image file as a data URL.
	    reader.readAsDataURL(this.files[0]);
	};
}


