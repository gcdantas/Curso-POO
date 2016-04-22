<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Projeto POO</title>
	

    <!-- Bootstrap -->
    <link href="js/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="js/DataTables-1.10.11/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
	<div>
        <table id="projeto_poo" class="display" width="50%" cellspacing="0">
        <thead>
            <tr>
                <th>Detalhes</th>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Tipo</th>
                <th>Endereço</th>
				<th>Email</th>               
            </tr>
        </thead>
 
        <tfoot>
            <tr>
            	<th></th>
                <th></th>
                <th></th>
                <th></th>
				<th></th>
				<th></th>                
            </tr>
        </tfoot>
    </table>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf8" src="js/DataTables-1.10.11/media/js/jquery.dataTables.js"></script>
	
	<script type="text/javascript">

	function format ( d ) {
		var codigo;
		
		if (typeof d.cpf !== 'undefined') {
			codigo = d.cpf;			
		} else {
			codigo = d.cnpj;
		}
		
	    // `d` is the original data object for the row
	    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
	        '<tr>'+
	            '<td>Nome:</td>'+
	            '<td>'+d.nome+'</td>'+
	        '</tr>'+
	        '<tr>'+
	            '<td>CPF/CNPJ:</td>'+
	            '<td>'+codigo+'</td>'+
	        '</tr>'+
	        '<tr>'+
	            '<td>Cliente desde:</td>'+
	            '<td>'+d.clienteDesde+'</td>'+
	        '</tr>'+
	    '</table>';
	}

	$( document ).ready(function() {

		var table = $('#projeto_poo').DataTable({
					 "bProcessing": true,
					 "sAjaxSource": "response.php",
					 "columns": [
							{
							    "className":      'details-control',
							    "orderable":      false,
							    "data":           null,
							    "defaultContent": '<a>detalhes</a>'
							},
							{ data: 'nome' } ,							
							{"data": null, 
								"render": function (data) { 
									if (typeof data.cpf !== 'undefined') return data.cpf+''; 
									else return data.cnpj+'';
								} 
							},
							{"data": null, 
								"render": function (data) { 
									if (typeof data.cpf !== 'undefined') return 'Pessoa Física'; 
									else return 'Pessoa Jurídica';
								} 
							},
							{ data: 'endereco' },
							{ data: 'email' }
					]
		});   

		// Add event listener for opening and closing details
	    $('#projeto_poo tbody').on('click', 'td.details-control', function () {

	        var tr = $(this).closest('tr');     
	        var row = table.row( tr );
	        
	        if ( row.child.isShown() ) {
	            // This row is already open - close it
	            row.child.hide();	            
	        }
	        else {
	            // Open this row
	            row.child( format(row.data()) ).show();	            
	        }
	    } );
	});
	</script>
    
  </body>
</html>