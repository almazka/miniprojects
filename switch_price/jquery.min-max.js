jQuery(document).ready(function(){


/* слайдер цен */

jQuery("#slider").slider({
	min: 0,
	max: 200,
	values: [0,200],
	range: true,
	stop: function(event, ui) {
		value01 = jQuery("#slider").slider("values",0);
		value02 = jQuery("#slider").slider("values",1);
		
		if(value01 < 100){
			vL1 = value01*10;
			vL1 = Math.round(vL1/10) * 10; 
			jQuery("input#minCost").val(vL1);
		}
		else
		{
			R1 = value01 - 100;
			vR1 = 390*R1+1000;
			vR1 = Math.round(vR1/100) * 100;
			jQuery("input#minCost").val(vR1);
		};
		
		
		if(value02 < 100){
			vL1 = value02*10;
			vL1 = Math.round(vL1/10) * 10;
			jQuery("input#maxCost").val(vL1);
		}
		else
		{
			R1 = value02 - 100;
			vR1 = 390*R1+1000;
			vR1 = Math.round(vR1/100) * 100;
			jQuery("input#maxCost").val(vR1);
		};
	
    },
    slide: function(event, ui){
    	
		value01 = jQuery("#slider").slider("values",0);
		value02 = jQuery("#slider").slider("values",1);
		
		if(value01 < 100){
			vL1 = value01*10;
			vL1 = Math.round(vL1/10) * 10; 
			jQuery("input#minCost").val(vL1);
		}
		else
		{
			R1 = value01 - 100;
			vR1 = 390*R1+1000;
			vR1 = Math.round(vR1/100) * 100;
			jQuery("input#minCost").val(vR1);
		};
		
		
		if(value02 < 100){
			vL1 = value02*10;
			vL1 = Math.round(vL1/10) * 10;
			jQuery("input#maxCost").val(vL1);
		}
		else
		{
			R1 = value02 - 100;
			vR1 = 390*R1+1000;
			vR1 = Math.round(vR1/100) * 100;
			jQuery("input#maxCost").val(vR1);
		};
    }
});

jQuery("input#minCost").change(function(){
	var value1=jQuery("input#minCost").val();
	
	var value2 = jQuery("input#maxCost").val();

    if(parseInt(value1) > parseInt(value2)){
		value1 = value2;
		jQuery("input#minCost").val(value1);
	}

		if(value1 < 1000){
			vL1 = value1/10;
			jQuery("#slider").slider("values",0,vL1);
		}
		else
		{
			R1 = value1 - 1000;
			vR1 = Math.round(R1/390+100);
			jQuery("#slider").slider("values",0,vR1);
		};
	
	});

	
jQuery("input#maxCost").change(function(){
		
	var value1=jQuery("input#minCost").val();
	var value2=jQuery("input#maxCost").val();
	
	if (value2 > 40000) { value2 = 40000; jQuery("input#maxCost").val(40000)}

	if(parseInt(value1) > parseInt(value2)){
		value2 = value1;
		jQuery("input#maxCost").val(value2);
	}
	
		if(value2 < 1000){
			vL1 = value2/10;
			jQuery("#slider").slider("values",1,vL1);
		}
		else
		{
			R1 = value2 - 1000;
			vR1 = Math.round(R1/390+100);
			jQuery("#slider").slider("values",1,vR1);
		};
	

});



// фильтрация поля
	jQuery('.selectionForm input').keypress(function(event){
		var key, keyChar;
		if(!event) var event = window.event;
		
		if (event.keyCode) key = event.keyCode;
		else if(event.which) key = event.which;
	
		if(key==null || key==0 || key==8 || key==13 || key==9 || key==46 || key==37 || key==39 ) return true;
		keyChar=String.fromCharCode(key);
		
		if(!/\d/.test(keyChar))	return false;
	
	});


});



