$(document).ready(function(){
	$("#testar").on("click",function(){
		lista = $("#lista").val();
		if(lista == "" || lista == null || lista == undefined){
			alert("Insira uma lista valida");
		}else{
			testar(lista);
		}
	})
	$("#gerar").on("click",function(){
		qt = $("#qt").val();
		if(qt == "" || qt == null || qt == undefined || qt < 0 || qt == 0){
			alert("Insira uma quantidade valida");
		}else{
			gerar(qt);
		}
	})
})

function testar(lista){
	if(lista.includes("\n")){
		lista = lista.split("\n");
		lista.forEach(atual =>{
			go(atual);
			
		});
	}else{
		go(lista);
	}
}

function go(cpf){
	if(cpf != ""){
		$.ajax({
			method:"POST",
			url:"api.php",
			async:true,
			data:{
				cpf:cpf
			},
			success:function(d){
				if($("#lista").val().includes("\n")){
					$("#lista").val($("#lista").val().replace(cpf+"\n",""));
				}else{
					$("#lista").val($("#lista").val().replace(cpf,""));
				}
				resultado = JSON.parse(d);
				if(resultado.erroCode != undefined){
					if($("#g").prop("checked") == true){
						$("body").append("<strong style='color:red'>Reprovada: " + cpf + "|" + resultado.erroCode + "</strong>");
					}
				}else if(resultado.successCode != undefined){
					$("body").append("<strong style='color:green'>Aprovada: " + cpf + "|" + resultado.successCode + "</strong>");
				}
			}
		})
	}
}
function gerar(quantidade){
	for(i = 0; i < quantidade; i++){
		$.ajax({
			method:"GET",
			url:"cpf.php",
			async:true,
			success:function(d){
			    resultado = d.trim();
			    if(resultado != ""){
			    	lista = $("#lista").val();
			    	lista = lista + resultado + "\n";
			    	$("#lista").val(lista);
			    }
			}
		})
	}
}