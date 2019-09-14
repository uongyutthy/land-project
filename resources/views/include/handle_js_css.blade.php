@php

    $_jscss = '';

    $_lib = [
        'hint'		    => '<link rel="stylesheet" type="text/css" href="/css/hint.css" />',
        'grid'          => '<link rel="stylesheet" type="text/css" href="/vendor/leantony/grid/css/grid.css" />'.
                            '<script src="/vendor/leantony/grid/js/grid.js"></script>'.
                            '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>',
        'datepicker'    => '<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>'.
                            '<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>',
        'repeater'        => '<script src="/js/jquery.repeater.js"></script>'
    ];

    $_libmap = [
        'project.index'	        => $_lib['hint'].$_lib['grid'].$_lib['datepicker'],
        'issue_purpose.index'	=> $_lib['grid'].$_lib['datepicker'],
        'boq_purpose.index'	    => $_lib['grid'].$_lib['datepicker'],
        'house_type.index'	    => $_lib['grid'].$_lib['datepicker'],
        'house.index'	        => $_lib['grid'].$_lib['datepicker'],
        'house_block.index'	    => $_lib['grid'].$_lib['datepicker'],
        'uom.index'	            => $_lib['grid'].$_lib['datepicker'],
        'department.index'	    => $_lib['grid'].$_lib['datepicker'],
        'staff.index'	        => $_lib['grid'].$_lib['datepicker'],
        'location.index'        => $_lib['grid'].$_lib['datepicker'],
        'item_category.index'   => $_lib['grid'],
        'item.index'            => $_lib['grid'],
        'item.create'           => $_lib['repeater'],
        'item.edit'             => $_lib['repeater'],
        'gin.index'            => $_lib['grid'],
        'gin.create'            => $_lib['repeater'],
        'gin.edit'              => $_lib['repeater'],
        'gtn.create'              => $_lib['repeater'],
        'staff_position.index'  => $_lib['grid'].$_lib['datepicker'],
        'boq.index'            => $_lib['grid'],
        'boq.create'            => $_lib['repeater'],
        'boq.edit'              => $_lib['repeater'],
        'boq.detail'            => $_lib['repeater'],
    ];

    if( isset($_libmap[\Request::route()->getName()]) ){
        $_jscss				= $_libmap[\Request::route()->getName()];
    }
    echo $_jscss;
@endphp