jQuery(document).ready(function($) {
	var $table = $(".state-db-tables");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"fnRowCallback": function (nRow, aData, iDisplayIndex) {
    					if(aData[0] == "Consensus") {
    							  $(nRow).css('font-weight', '900');
    							  $(nRow).css('font-size', '125%');
   									 }
								},

					"bAutoWidth"   : false ,
					"bFilter" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bPaginate" : false,
					"bSort" : false,
					"bSortClasses":false,
					"aoColumnDefs" : [

						{"sWidth":"18%","sClass":"left", "aTargets" : [0]},
						{"sWidth":"16.4%","sClass":"center", "aTargets" : [1]},
						{"sWidth":"16.4%","sClass":"center", "aTargets" : [2]},
						{"sWidth":"16.4%","sClass":"center", "aTargets" : [3]},
						{"sWidth":"16.4%","sClass":"center", "aTargets" : [4]},
						{"sWidth":"16.4%","sClass":"center", "aTargets" : [5]}
					],
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					}
	   });
	$table.show();
});


jQuery(document).ready(function($) {
	var $table = $(".forecaster-list");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"fnRowCallback": function (nRow, aData, iDisplayIndex) {
    					if(aData[0] == "Consensus") {
    							  $(nRow).css('font-weight', '900');
    							  $(nRow).css('font-size', '125%');
   									 }
								},

					"bAutoWidth"   : false ,
					"bFilter" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bSort" : false,
					"bPaginate" : false,
					"bSortClasses":false,
					"aoColumnDefs" : [

						{"sWidth":"25.5%","sClass":"left", "aTargets" : [0]},
						{"sClass":"center", "aTargets" : [1]},
						{"sClass":"center", "aTargets" : [2]},
						{"sClass":"center", "aTargets" : [3]},
						{"sClass":"center", "aTargets" : [4]},
						{"sClass":"center", "aTargets" : [5]},
						{"sClass":"center", "aTargets" : [6]}
					],
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					}
	   });
	$table.show();
});

jQuery(document).ready(function($) {
	var $table = $(".job-historical-tables");
	$table.dataTable({
					"iDisplayLength": 51,
					"fnRowCallback": function (nRow, aData, iDisplayIndex) {
    					if(aData[0] == "Consensus") {
    							  $(nRow).css('font-weight', '900');
    							  $(nRow).css('font-size', '125%');
   									 }
								},

					"bAutoWidth"   : false ,
					"bFilter" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bSort" : false,
					"bPaginate" : false,
					"bSortClasses":false,
					"aoColumnDefs":[
					 {"sWidth" : "20%",  "sClass" : "left", "aTargets" : [0]},
					 {"sWidth" : "20%", "sClass" : "center", "aTargets" : [1]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [2]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [3]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [4]}
					],
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					}
	   });
	$table.show();
});


jQuery(document).ready(function($) {
	var $table = $(".mt-states-data");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"fnRowCallback": function (nRow, aData, iDisplayIndex) {
    					if(aData[0] == "Consensus") {
    							  $(nRow).css('font-weight', '900');
    							  $(nRow).css('font-size', '125%');
   									 }
								},
					"bAutoWidth"   : true ,
					"bFilter" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bSort" : false,
					"bPaginate" : false,
					"bSortClasses":false,
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					},
					"aoColumnDefs":[
					 {"sWidth":"7.5%", "sClass" : "left", "aTargets" : [0]},
					 {"sWidth":"23.125%", "sClass" : "center", "aTargets" : [1]},
					 {"sWidth":"23.125%", "sClass" : "center", "aTargets" : [2]},
					 {"sWidth":"23.125%", "sClass" : "center", "aTargets" : [3]},
					 {"sWidth":"23.125%", "sClass" : "center", "aTargets" : [4]},
					 {"sClass" : "center", "aTargets" : [3]},
					 {"sClass" : "center", "aTargets" : [4]}
					]
				});
	$table.show();
});


jQuery(document).ready(function($) {
	var $table = $(".consensus-state-db-tables");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"fnRowCallback": function (nRow, aData, iDisplayIndex) {
    					if(aData[0] == "Consensus") {
    							  $(nRow).css('font-weight', '900');
    							  $(nRow).css('font-size', '125%');
   									 }
								},
					"bAutoWidth"   : false ,
					"bFilter" : false,
					"bLengthChange": false,
					"bPaginate" : false,
					"bInfo" : false,
					"bSort" : false,
					"bSortClasses":false,
					"aoColumnDefs" : [

						{"sWidth" : "30%", "sClass":"left", "aTargets" : [0]},
						{"sWidth" : "14%", "sClass":"center", "aTargets" : [1]},
						{"sWidth" : "14%", "sClass":"center", "aTargets" : [2]},
						{"sWidth" : "14%", "sClass":"center", "aTargets" : [3]},
						{"sWidth" : "14%", "sClass":"center", "aTargets" : [4]}
					],
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					}
				});
	$table.show();
});



jQuery(document).ready(function($) {
	var $table = $(".historical-state-db-tables");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"bAutoWidth"   : true ,
					"bFilter" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bPaginate" : false,
					"bSort" : false,
					"bSortClasses":false,
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					},
					"aoColumnDefs":[
					 {"sWidth":"7.5%", "sClass" : "left", "aTargets" : [0]},
					 {"sWidth":"25%", "sClass" : "center", "aTargets" : [1]},
					 {"sWidth":"20%", "sClass" : "center", "aTargets" : [2]},
					 {"sClass" : "center", "aTargets" : [3]},
					 {"sClass" : "center", "aTargets" : [4]},
					 {"sClass" : "center", "aTargets" : [5]}
					]
				});
	$table.show();
});

jQuery(document).ready(function($) {
	var $table = $(".historical-state-db-tables-gpbc");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"bAutoWidth"   : true ,
					"bFilter" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bPaginate" : false,
					"bSort" : false,
					"bSortClasses":false,
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					},
					"aoColumnDefs":[
					 {"sWidth":"7%", "sClass" : "left", "aTargets" : [0]},
					 {"sWidth":"13.5%", "sClass" : "center", "aTargets" : [1]},
					 {"sWidth":"13.5%", "sClass" : "center", "aTargets" : [2]},
					 {"sWidth":"13.5%", "sClass" : "center", "aTargets" : [3]},
					 {"sWidth":"13.5%", "sClass" : "center", "aTargets" : [4]},
					 {"sWidth":"13.5%", "sClass" : "center", "aTargets" : [5]},
					 {"sWidth":"13.5%", "sClass" : "center", "aTargets" : [6]},
					 {"sWidth":"13.5%", "sClass" : "center", "aTargets" : [7]}
					]
				});
	$table.show();
});



jQuery(document).ready(function($) {
	var $table = $(".historical-state-db-tables-idaho-montana-wyoming");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"bAutoWidth"   : true ,
					"bFilter" : false,
					"bPaginate" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bSort" : false,
					"bSortClasses":false,
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					},
					"aoColumnDefs":[
					 {"sWidth":"7.5%", "sClass" : "left", "aTargets" : [0]},
					 {"sWidth":"25%", "sClass" : "center", "aTargets" : [1]},
					 {"sWidth":"20%", "sClass" : "center", "aTargets" : [2]},
					 {"sClass" : "center", "aTargets" : [3]},
					 {"sClass" : "center", "aTargets" : [4]}
					]
				});
	$table.show();
});




jQuery(document).ready(function($) {
	var $table = $(".historical-state-db-tables-montana-wyoming");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"bAutoWidth"   : true ,
					"bFilter" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"bPaginate" : false,
					"bSort" : false,
					"bSortClasses":false,
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					},
					"aoColumnDefs":[
					 {"sWidth":"7.5%", "sClass" : "left", "aTargets" : [0]},
					 {"sWidth":"25%", "sClass" : "center", "aTargets" : [1]},
					 {"sWidth":"20%", "sClass" : "center", "aTargets" : [2]},
					 {"sClass" : "center", "aTargets" : [3]},
					 {"sClass" : "center", "aTargets" : [4]}
					]
				});
	$table.show();
});


//<script type="text/javascript" src="dataTables.dataSourcePlugins.js"></script>

jQuery(document).ready(function($) {
	var $table = $(".job-growth");
	$table.hide();
	$table.dataTable({
					"columnDefs" : [
					{"type": "numeric-comma", targets : 4}
					],
					"iDisplayLength": 51,
					"fnInitComplete" : function() {
							$(".job-growth").show();
					},
					"bAutoWidth"   : false,
					"bFilter" : false,
					"bPaginate" : false,
					"bLengthChange": false,
					"bInfo" : false,
					"pagingType": "simple",
					"bSortClasses":false,
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					},
					"aoColumnDefs":[
					 {"sWidth" : "20%",  "sClass" : "left", "aTargets" : [0]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [1]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [2]},
					 {"sWidth" : "20%",  "sClass" : "center", "aTargets" : [3]},
					 {"sWidth" : "20%", "sClass" : "center", "aTargets" : [4]}
					]
				});
});


// jQuery(document).ready(function($) {
// 	var $table = $(".job-growth-msa");
// 	$table.dataTable({
// 					"iDisplayLength": 51,
// 					"columnDefs" : [
// 					{"type": "numeric-comma", targets : 5}
// 					],
// 					"bAutoWidth"   : false,
// 					"bFilter" : false,
// 					"bPaginate" : false,
// 					"bLengthChange": false,
// 					"bInfo" : false,
// 					"sDom": 't',
// 					"bSortClasses":false,
// 					"oLanguage":{
// 						"oPaginate": {
// 							"sNext" : "",
// 							"sPrevious" : "",
// 						}
// 					},
// 					"aoColumnDefs":[
// 					 {"sWidth":"35%", "sClass" : "left", "aTargets" : [0]},
// 					 {"sWidth":"16.25%", "sClass" : "center", "aTargets" : [1]},
// 					 {"sWidth":"16.25%", "sClass" : "center", "aTargets" : [2]},
// 					 { "sWidth":"16.25%", "sClass" : "center", "aTargets" : [3]},
// 					 { "sWidth":"16.25%", "sClass" : "center", "aTargets" : [4]}
// 					]
// 				});
// });


jQuery(document).ready(function($) {
	var $table = $(".gpcb-tables");
	$table.hide();
	$table.dataTable({
					"iDisplayLength": 51,
					"bAutoWidth"   : true ,
					"bFilter" : false,
					"bLengthChange": false,
					"bPaginate" : false,
					"bInfo" : false,
					"bSort" : false,
					"bSortClasses":false,
					"oLanguage":{
						"oPaginate": {
							"sNext" : "",
							"sPrevious" : "",
						}
					},
					"aoColumnDefs":[
					 {"sWidth":"17.5%", "sClass" : "left", "aTargets" : [0]},
					 {"sClass" : "center", "aTargets" : [1]},
					 {"sClass" : "center", "aTargets" : [2]},
					 {"sClass" : "center", "aTargets" : [3]},
					 {"sClass" : "center", "aTargets" : [4]},
					 {"sClass" : "center", "aTargets" : [5]},
					 {"sClass" : "center", "aTargets" : [6]}
					]
				});
	$table.show();
});



// ,
// 					"fnRowCallback": function (nRow, aData, iDisplayIndex) {
//     					if(aData[50] == "United States") {
//     							  $(nRow).css('font-weight', '900');
//     							  $(nRow).css('font-size', '125%');
//    									 },