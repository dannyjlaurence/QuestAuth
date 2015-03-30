<head>

	<title>@yield('title')</title>

	<!-- Bootstrap core CSS -->
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/fontawesome/css/font-awesome.min.css" rel="stylesheet" >
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
	    body {
	      padding-top: 50px;
	      padding-bottom: 20px;
	    }

	    body > .container {
	    	margin-top:30px;
	    }

	    .combobox {
	    	width:100%;
	    }

	    .form-search .combobox-container,
		.form-inline .combobox-container {
		  display: inline-block;
		  margin-bottom: 0;
		  vertical-align: top;
		}
		.form-search .combobox-container .input-group-addon,
		.form-inline .combobox-container .input-group-addon {
		  width: auto;
		}
		.combobox-selected .caret {
		  display: none;
		}
		/* :not doesn't work in IE8 */
		.combobox-container:not(.combobox-selected) .glyphicon-remove {
		  display: none;
		}
		.typeahead-long {
		  max-height: 300px;
		  overflow-y: auto;
		}
		.control-group.error .combobox-container .add-on {
		  color: #B94A48;
		  border-color: #B94A48;
		}
		.control-group.error .combobox-container .caret {
		  border-top-color: #B94A48;
		}
		.control-group.warning .combobox-container .add-on {
		  color: #C09853;
		  border-color: #C09853;
		}
		.control-group.warning .combobox-container .caret {
		  border-top-color: #C09853;
		}
		.control-group.success .combobox-container .add-on {
		  color: #468847;
		  border-color: #468847;
		}
		.control-group.success .combobox-container .caret {
		  border-top-color: #468847;
		}
	</style>

	@yield('custHeader')

</head>