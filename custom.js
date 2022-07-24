	$(document).ready(function(){
	$(document).on('click', '.myButton', function(){
		var nomPro=$(this).val();
		var prixProd=$('#prixProd'+nomPro).text();
		var CodeFam=$('#CodeFam'+nomPro).text();
		var image=$('#imaGe'+nomPro).attr('src');
		var promotion=$('#promotion'+nomPro).text();
		var origine=$('#origine'+nomPro).val();
		console.log(image)
		$('#edit').modal('show');
        $('#myid').text(nomPro);
		$('#myprixProd').text('Prix:'+prixProd);
		$('#myCodeFam').text(CodeFam);
		$('#myimaGe').attr('src',image);
		$('#mypromotion').text('Promotion:'+promotion);
		$('#myorigine').text('Origine:'+origine);
	});
});

 function getProduit(str){
            var myrequest=new XMLHttpRequest();
                myrequest.onreadystatechange=function(){
                    if(this.readyState===4 && this.status===200){
						console.log(this.responseText);
                        document.getElementById('MyOwnProduct').innerHTML=this.responseText;
						console.log(responseText);
                    }
                }
                myrequest.open('GET','getProduit.php?nomCat='+str,true);
                myrequest.send();
            }
