<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use View;
use App\Foo;

class ElementsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $foo;
	public function __construct(Foo $foo)
	{		 
	   $this->foo = $foo;
    }
	

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
	 /**
     * Show the application buttons.
     *
     * @return \Illuminate\Http\Response
     */
	public function buttons(){
		return view('elements.buttons');
	}
	
	/**
     * Show the application dropdowns.
     *
     * @return \Illuminate\Http\Response
     */
	public function dropdowns(){
		return view('elements.dropdowns');
	}
	
	/**
     * Show the application icons.
     *
     * @return \Illuminate\Http\Response
     */
	public function icons(){
		return view('elements.icons');
	}
	
	/**
     * Show the application strokeIcon.
     *
     * @return \Illuminate\Http\Response
     */
	public function strokeIcon(){
		return view('elements.icons.7-stroke');
	}
	
	/**
     * Show the application brandIcons.
     *
     * @return \Illuminate\Http\Response
     */
	public function brandIcons(){
		return view('elements.icons.brand-icons');
	}

	
	/**
     * Show the application fontAwesome.
     *
     * @return \Illuminate\Http\Response
     */
	public function fontAwesome(){
		return view('elements.icons.font-awesome');
	}
	
		
	/**
     * Show the application glyphicons.
     *
     * @return \Illuminate\Http\Response
     */
	public function glyphicons(){
		return view('elements.icons.glyphicons');
	}
	
		
	/**
     * Show the application ionicons.
     *
     * @return \Illuminate\Http\Response
     */
	public function ionicons(){
		return view('elements.icons.ionicons');
	}
	
		
	/**
     * Show the application materialDesign.
     *
     * @return \Illuminate\Http\Response
     */
	public function materialDesign(){
		return view('elements.icons.material-design');
	}
	
		
	/**
     * Show the application mfglabs.
     *
     * @return \Illuminate\Http\Response
     */
	public function mfglabs(){
		return view('elements.icons.mfglabs');
	}
	
		
	/**
     * Show the application octicons.
     *
     * @return \Illuminate\Http\Response
     */
	public function octicons(){
		return view('elements.icons.octicons');
	}
	
		
	/**
     * Show the application openIconic.
     *
     * @return \Illuminate\Http\Response
     */
	public function openIconic(){
		return view('elements.icons.open-iconic');
	}
	
		
	/**
     * Show the application themify.
     *
     * @return \Illuminate\Http\Response
     */
	public function themify(){
		return view('elements.icons.themify');
	}
	
		
	/**
     * Show the application weatherIcons.
     *
     * @return \Illuminate\Http\Response
     */
	public function weatherIcons(){
		return view('elements.icons.weather-icons');
	}	
		
	/**
     * Show the application webIcons.
     *
     * @return \Illuminate\Http\Response
     */
	public function webIcons(){
		return view('elements.icons.web-icons');
	}
		
	/**
     * Show the application tooltip.
     *
     * @return \Illuminate\Http\Response
     */
	public function tooltip(){
		return view('elements.tooltip-popover');
	}
	
	/**
     * Show the application modals.
     *
     * @return \Illuminate\Http\Response
     */
	public function modals(){
		return view('elements.modals');
	}	
	
	/**
     * Show the application modals.
     *
     * @return \Illuminate\Http\Response
     */
	public function tabsAccordions(){
		return view('elements.tabs-accordions');
	}
	
	/**
     * Show the application images.
     *
     * @return \Illuminate\Http\Response
     */
	public function imagesDes(){
		return view('elements.images');
	}
	
	/**
     * Show the application badges-labels.
     *
     * @return \Illuminate\Http\Response
     */
	public function badgesLabels(){
		return view('elements.badges-labels');
	}
	
	/**
     * Show the application progress-bars
     *
     * @return \Illuminate\Http\Response
     */
	public function progressBars(){
		return view('elements.progress-bars');
	}
	
	/**
     * Show the application carousel
     *
     * @return \Illuminate\Http\Response
     */
	public function carousel(){
		return view('elements.carousel');
	}
	
	/**
     * Show the application typography
     *
     * @return \Illuminate\Http\Response
     */
	public function typography(){
		return view('elements.typography');
	}
	
	/**
     * Show the application colors
     *
     * @return \Illuminate\Http\Response
     */
	public function colors(){
		return view('elements.colors');
	}
	
	/**
     * Show the application animation
     *
     * @return \Illuminate\Http\Response
     */
	public function animation(){
		return view('elements.animation');
	}
	
	/**
     * Show the application lightbox
     *
     * @return \Illuminate\Http\Response
     */
	public function lightbox(){
		return view('elements.lightbox');
	}
	
	/**
     * Show the application scrollable
     *
     * @return \Illuminate\Http\Response
     */
	public function scrollable(){
		return view('elements.scrollable');
	}
	
	/**
     * Show the application rating
     *
     * @return \Illuminate\Http\Response
     */
	public function rating(){
		return view('elements.rating');
	}
	
	/**
     * Show the application toastr
     *
     * @return \Illuminate\Http\Response
     */
	public function toastr(){
		return view('elements.toastr');
	}
	
	/**
     * Show the application sortableNestable
     *
     * @return \Illuminate\Http\Response
     */
	public function sortableNestable(){
		return view('elements.sortable-nestable');
	}
	
	/**
     * Show the application bootboxSweetalert
     *
     * @return \Illuminate\Http\Response
     */
	public function bootboxSweetalert(){
		return view('elements.bootbox-sweetalert');
	}
	
	/**
     * Show the application alerts
     *
     * @return \Illuminate\Http\Response
     */
	public function alerts(){
		return view('elements.structure.alerts');
	}
	
	/**
     * Show the application alerts
     *
     * @return \Illuminate\Http\Response
     */
	public function ribbon(){
		return view('elements.structure.ribbon');
	}
	
	/**
     * Show the application pricingTables
     *
     * @return \Illuminate\Http\Response
     */
	public function pricingTables(){
		return view('elements.structure.pricing-tables');
	}
	/**
     * Show the application overlay
     *
     * @return \Illuminate\Http\Response
     */
	public function overlay(){
		return view('elements.structure.overlay');
	}
	
	/**
     * Show the application cover
     *
     * @return \Illuminate\Http\Response
     */
	public function cover(){
		return view('elements.structure.cover');
	}
	
	/**
     * Show the application timeline
     *
     * @return \Illuminate\Http\Response
     */
	public function timeline(){
		return view('elements.structure.timeline');
	}
	
	/**
     * Show the application step
     *
     * @return \Illuminate\Http\Response
     */
	public function step(){
		return view('elements.structure.step');
	}
	
	/**
     * Show the application chat
     *
     * @return \Illuminate\Http\Response
     */
	public function chat(){
		return view('elements.structure.chat');
	}
	
	/**
     * Show the application chart
     *
     * @return \Illuminate\Http\Response
     */
	public function chart(){
		return view('elements.widgets.chart');
	}
	
	/**
     * Show the application social
     *
     * @return \Illuminate\Http\Response
     */
	public function social(){
		return view('elements.widgets.social');
	}
	
	/**
     * Show the application general
     *
     * @return \Illuminate\Http\Response
     */
	public function general(){
		return view('elements.forms.general');
	}
	
	/**
     * Show the application material
     *
     * @return \Illuminate\Http\Response
     */
	public function material(){
		return view('elements.forms.material');
	}
	
	/**
     * Show the application layouts
     *
     * @return \Illuminate\Http\Response
     */
	public function layouts(){
		return view('elements.forms.layouts');
	}
	
	/**
     * Show the application wizard
     *
     * @return \Illuminate\Http\Response
     */
	public function wizard(){
		return view('elements.forms.wizard');
	}
	
	/**
     * Show the application validation
     *
     * @return \Illuminate\Http\Response
     */
	public function validation(){
		return view('elements.forms.validation');
	}
	
	/**
     * Show the application masks
     *
     * @return \Illuminate\Http\Response
     */
	public function masks(){
		return view('elements.forms.masks');
	}
	
	/**
     * Show the application imageCropping
     *
     * @return \Illuminate\Http\Response
     */
	public function imageCropping(){
		return view('elements.forms.image-cropping');
	}
	
	/**
     * Show the application fileUploads
     *
     * @return \Illuminate\Http\Response
     */
	public function fileUploads(){
		return view('elements.forms.file-uploads');
	}
	
	/**
     * Show the application basicTables
     *
     * @return \Illuminate\Http\Response
     */
	public function basicTables(){
		return view('elements.tables.basic-tables');
	}
	
	/**
     * Show the application responsiveTable
     *
     * @return \Illuminate\Http\Response
     */
	public function responsiveTable(){
		return view('elements.tables.responsive-table');
	}
	/**
     * Show the application editableTable
     *
     * @return \Illuminate\Http\Response
     */
	public function editableTable(){
		return view('elements.tables.editable-table');
	}
	
	/**
     * Show the application jsgrid
     *
     * @return \Illuminate\Http\Response
     */
	public function jsgrid(){
		return view('elements.tables.jsgrid');
	}
	
	/**
     * Show the application faq
     *
     * @return \Illuminate\Http\Response
     */
	public function faq(){
		return view('elements.pages.faq');
	}
	
	/**
     * Show the application gallery
     *
     * @return \Illuminate\Http\Response
     */
	public function gallery(){
		return view('elements.pages.gallery');
	}
	
	/**
     * Show the application searchResult
     *
     * @return \Illuminate\Http\Response
     */
	public function searchResult(){
		return view('elements.pages.search-result');
	}
	
	/**
     * Show the application invoice
     *
     * @return \Illuminate\Http\Response
     */
	public function invoice(){
		return view('elements.pages.invoice');
	}
	
	/**
     * Show the application profiledemo
     *
     * @return \Illuminate\Http\Response
     */
	public function profiledemo(){
		return view('elements.pages.profile');
	}
	
	/**
     * Show the application error400
     *
     * @return \Illuminate\Http\Response
     */
	public function error400(){
		return view('elements.pages.error-400');
	}
	
	/**
     * Show the application error500
     *
     * @return \Illuminate\Http\Response
     */
	public function error500(){
		return view('elements.pages.error-500');
	}
	
	
	
	
	
	
	
}
