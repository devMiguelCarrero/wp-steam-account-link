<?php

	$metaboxess = new WSL_Metabox_builder();
	$course_duration = $metaboxess->setID('simple-metabox-input')
								->setTitle( esc_attr__( 'Simple metabox input' , WSL_DOMAIN ) )
								->setCPT('examplecpt')
								->setPosition('side')
								->setPriority('high')
								->setFrontEnd()
									->setType('text')
									->setFunction('factory_Input')
								->setSave()
									->setFunction('factory_Save_metabox')
								->build();						
	$course_duration->init();

	$metaboxess = new WSL_Metabox_builder();
	$country_streaming = $metaboxess->setID('simple-metabox-react')
								->setTitle( esc_attr__( 'Simple metabox react' , WSL_DOMAIN ) )
								->setCPT('examplecpt')
								->setPosition('normal')
								->setPriority('high')
								->setFrontEnd()
									->setType('array')
									->setFunction('factory_single_react')
								->setSave()
									->setFunction('factory_Save_JSON_metabox')
								->build();
																	
	$country_streaming->init();