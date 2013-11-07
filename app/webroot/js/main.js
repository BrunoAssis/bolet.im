$(document).ready(function() {
   $(".comofunciona h3").each(function() {
		var tis = $(this), state = false, answer = tis.next("div.answer").slideUp();
		tis.click(function() {
			state = !state;
			answer.slideToggle(state);
			tis.toggleClass("active",state);
		});
	});
	
    $("tbody").delegate('tr', 'mouseover', function() {
    	$(this).addClass("tr-over");
    });
    
    $("tbody").delegate('tr', 'mouseout', function() {
    	$(this).removeClass("tr-over");
    });
    
     //cache nav
	var nav = $(".menu");
	//add indicators and hovers to submenu parents
	nav.find("li").each(function() {
		if ($(this).find("ul").length > 0) {
			//show subnav on hover
			$(this).mouseenter(function() {
				$(this).find("ul").stop(true, true).slideDown();
			});
			
			//hide submenus on exit
			$(this).mouseleave(function() {
				$(this).find("ul").stop(true, true).slideUp();
			});
		}
	}); 
        
        
	$.datepicker.regional['pt-BR'] = {
		closeText: 'Fechar',
		prevText: '&#x3c;Anterior',
		nextText: 'Pr&oacute;ximo&#x3e;',
		currentText: 'Hoje',
		monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
		'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
		'Jul','Ago','Set','Out','Nov','Dez'],
		dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','S&aacute;bado'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S&aacute;b'],
		dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','S&aacute;b'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: '',
		changeMonth: true,
		changeYear: true,
		yearRange: 'c-60:c+5'
	};
	
	$.datepicker.setDefaults($.datepicker.regional['pt-BR']);
});

$.extend(true, $.fn.dataTable.defaults, {
	bJQueryUI: true,
	sDom: '<"H"fr>t<"F"ip>',
    oLanguage: {
    	/*oAria:{
    		sSortAscending: '',
    		sSortDescending: ''
    	},*/
		oPaginate:{
			sFirst: 'Primeira',
			sLast: '&Uacute;ltima',
			sNext: 'Próxima',
			sPrevious: 'Anterior'
		},
		sEmptyTable: 'Sem registros',
		sInfo: 'Mostrando de _START_ a _END_ de _TOTAL_ registros',
		sInfoEmpty: 'Sem registros',
		//sInfoFiltered: '',
		//sInfoPostFix: '',
		//sInfoThousands: '',
		sLengthMenu: 'Quantidade de registros',
		sLoadingRecords: 'Carregando registros...',
		sProcessing: 'Processando...',
		sSearch: 'Pesquisar',
		sZeroRecords: 'Sem registros.'
	}
});

;(function ( $, window, document, undefined ) {
    var pluginName = "altFieldDatePicker",
        defaults = {
			altFormat: 'yy-mm-dd'
        };

    function Plugin( element, options ) {
        this.element = element;
		
        this.options = $.extend( {}, defaults, options );

        this._defaults = defaults;
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype = {

        init: function() {
            var $element = $(this.element),
            	$altField = $('<input type="text">').attr({id: '__'+this.element.id}),
            	initDate = $.datepicker.parseDate( this.options.altFormat, $element.val() );
            	
            $element.after($altField).hide();
			
			$altField.datepicker({
				altField: $element,
				altFormat: this.options.altFormat
			}).datepicker( 'setDate', initDate ).mask('99/99/9999');
        }
    };

    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin( this, options ));
            }
        });
    };

})( jQuery, window, document );

$.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
{
	if ( typeof sNewSource != 'undefined' && sNewSource != null ) {
		oSettings.sAjaxSource = sNewSource;
	}

	// Server-side processing should just call fnDraw
	if ( oSettings.oFeatures.bServerSide ) {
		this.fnDraw();
		return;
	}

	this.oApi._fnProcessingDisplay( oSettings, true );
	var that = this;
	var iStart = oSettings._iDisplayStart;
	var aData = [];
 
	this.oApi._fnServerParams( oSettings, aData );

	oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
		/* Clear the old information from the table */
		that.oApi._fnClearTable( oSettings );

		/* Got the data - add it to the table */
		var aData =  (oSettings.sAjaxDataProp !== "") ?
			that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;

		for ( var i=0 ; i<aData.length ; i++ )
		{
			that.oApi._fnAddData( oSettings, aData[i] );
		}

		oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();

		if ( typeof bStandingRedraw != 'undefined' && bStandingRedraw === true )
		{
			oSettings._iDisplayStart = iStart;
			that.fnDraw( false );
		}
		else
		{
			that.fnDraw();
		}

		that.oApi._fnProcessingDisplay( oSettings, false );

		/* Callback user function - for event handlers etc */
		if ( typeof fnCallback == 'function' && fnCallback != null )
		{
			fnCallback( oSettings );
		}
	}, oSettings );
};

$.nota = new Object;
$.nota.formataNumero = function(v, dec, minNota, maxNota){
	
	v = ( v ? v : '');
	if ( typeof v == 'number' ) {
		v = v.toString();
	}
	
	v = v.replace(/[^0-9,.]+/g,'')
		 .replace(/[.]+/g,',')
		 .replace(/[,+]+/g,',');
	
	var av = v.split(',', 2);
	
	if(av[1] && av[1].length > 0 && dec > 0){
		if(dec < av[1].length){
			av[1] = av[1].substr(0 , dec);
		}
		v = av[0] + ',' + av[1];
	}else{
		if(v.indexOf(',') != -1 && dec > 0){
			v = av[0]+',';
		}else{
			v = av[0];
		}
	}
	
	n = v.replace(',', '.')*1;

	if(n > maxNota || n < minNota){
		v = '';
	}
	
	return v;
}