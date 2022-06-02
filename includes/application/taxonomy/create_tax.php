<?php

	function WSL_Create_Taxonomies() {

		/*$theTax = new ezt_Taxonomy_Builder();

		$country_category = $theTax->setID( 'country_categories' )
									->setCPTs( array('pais') )
									->setLabels()
										->setName( __( 'Country Category', TEXT_DOMAIN ) )
										->setMenuName( __( 'Country Category' , TEXT_DOMAIN ) )
										->setPlural( __( 'Country Categories' , TEXT_DOMAIN ) )
										->setSingular( __( 'Country Category', TEXT_DOMAIN ) );
		$country_category->taxonomy->create();*/

	}

	add_action( 'init' , 'WSL_Create_Taxonomies' , 0 );