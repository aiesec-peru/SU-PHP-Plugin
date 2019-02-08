<?php
if(intval($_POST['Ciudad']) != ''){
    //Piura[2], [[Chiclayo[8], Trujillo[9], Huancayo[11], Cajamarca[16]]], Ica[12], URP[14]
    if (intval($user_ciudades) == 1 {
      //Combox universidades == "Arequipa"
      load_ciudad(1, 'Arequipa');
    }else if (intval($user_ciudades) == 2 {
      //Combox universidades == "Cajamarca"
      load_ciudad(2, 'Cajamarca');
    }else if (intval($user_ciudades) == 3 {
      //Combox universidades == "Chiclayo"  
      load_ciudad(3, 'Cajamarca');   
    }else if (intval($user_ciudades) == 4 {
      //Combox universidades == "Cusco" 
      load_ciudad(4, 'Cusco');    
    }else if (intval($user_ciudades) == 5 {
      //Combox universidades == "Huancayo" 
      load_ciudad(5, 'Huancayo');    
    }else if (intval($user_ciudades) == 6 {
      //Combox universidades == "Trujillo"
      load_ciudad(6, 'Trujillo');     
    }else if (intval($user_ciudades) == 7 {
      //Combox universidades == "Ica"   
      load_ciudad(7, 'Ica');  
    }else if (intval($user_ciudades) == 8 {
      //Combox universidades == "Lima"|| "Catolica"||"Pacifico"||"San Marcos"||"USMP"||"URP"  
      load_ciudad(8, 'Lima');   
    }else if (intval($user_ciudades) == 9 {
      //Combox universidades == Otros   
      load_ciudad(9, 'PERU'); 
    }else if (intval($user_ciudades) == 10 {
      //Combox universidades == "Piura"
      load_ciudad(10, 'Piura');  
    }else if (intval($user_ciudades) == 11 {
      //Combox universidades == "Puno"  
      load_ciudad(11, 'Puno');   
    }else if (intval($user_ciudades) == 12 {
      //Combox universidades == "Tacna"     
      load_ciudad(12, 'Tacna');
    }else if (intval($user_ciudades) == 13 {
      //Combox universidades == "Tarapoto" 
      load_ciudad(13, 'Tarapoto');    
    }else if (intval($user_ciudades) == 14 {
      //Combox universidades == "Trujillo" 
      load_ciudad(14, 'Trujillo');    
    }
    
  }

  function load_ciudad(id,name)
  {
    var html_code = '';
    $.getJSON('ciudades.json', function(data){
     html_code += '<option value="">Select '+id+'</option>';
     $.each(data, function(key, value){
      if(id == 'ciudad')
      {
       if(value.id == '0')
       {
        html_code += '<option value="'+value.id+'">'+value.name+'</option>';
       }
      }
      else
      {
       if(value.id == id)
       {
        html_code += '<option value="'+value.id+'">'+value.name+'</option>';
       }
      }
     });
     $('#'+id).html(html_code); 
  }
?>