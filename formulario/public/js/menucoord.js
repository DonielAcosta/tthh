function menuPrincipal(){
    /* menus in toolbars work pretty much the same way as menu
     * buttons
     */	
    new Jx.Toolbar({parent: 'menu'}).add(
        new Jx.Button({
            label:'Principal',
      		onClick: function() {
				abrirEnlace('principal','');
    		  } 	            	
        }),
        new Jx.Button({
        	label:'Comunicación',
        	onClick: function() {
        	abrirEnlace('comunicacion','');
//        	window.location = 	dominioJS;
        } 	            	
        }),
        new Jx.Button({
        	label:'Deuda',
        	onClick: function() {
        	abrirEnlace('deuda','');
//        	window.location = 	dominioJS;
        } 	            	
        }),
        new Jx.Menu({label: 'Reportes'}).add([
                                                  new Jx.Menu.Item({
                                                	  label: 'Seminarios',
                                                	  onClick: function() {
                                                	  abrirEnlace('seminario');
                                                  }
                                                  }),
                                                  new Jx.Menu.Item({
                                                	  label: 'Trabajos',
                                                	  onClick: function() {
                                                	  abrirEnlace('trabajo');
                                                  }
                                                  }),
                                                  new Jx.Menu.Item({
                                                	  label: 'Clases',
                                                	  onClick: function() {
                                                	  abrirEnlace('clase');
                                                  }
                                                  }),
                                                  new Jx.Menu.Separator(),
                                                  new Jx.Menu.Item({
                                                	  label: 'Tesis',
                                                	  onClick: function() {
                                                	  abrirEnlace('tesi');
                                                  }
                                                  })
                                                  ]
        ),
        new Jx.Menu({label: 'Ajustes'}).add([
                                             new Jx.Menu.Item({
                                            	 label: 'Usuarios',
                                            	 onClick: function() {
                                            	 abrirEnlace('usuario');
                                             }
                                             }),
                                             new Jx.Menu.Item({
                                            	 label: 'Cargos',
                                            	 onClick: function() {
                                            	 abrirEnlace('cargo');
                                             }
                                             }),
                                             new Jx.Menu.Item({
                                            	 label: 'Tipo de Personal',
                                            	 onClick: function() {
                                            	 abrirEnlace('tipopersonal');
                                             }
                                             }),
                                             new Jx.Menu.Item({
                                            	 label: 'Forma de Pago',
                                            	 onClick: function() {
                                            	 abrirEnlace('formapago');
                                             }
                                             }),
                                             new Jx.Menu.Item({
                                            	 label: 'Motivos',
                                            	 onClick: function() {
                                            	 abrirEnlace('motivo');
                                             }
                                             }),
                                             new Jx.Menu.Separator(),
                                             new Jx.Menu.Item({
                                            	 label: 'Operativo',
                                            	 onClick: function() {
                                            	 abrirEnlace('tesi');
                                             }
                                             })
                                             ]
        ),
//        new Jx.Menu({label: 'Persona'}).add([
//                                             new Jx.Menu.Item({
//                                            	 label: 'Ingresar',
//                                            	 onClick: function() {
//                                            		 abrirEnlace('persona','','ingresar');
//                                            	 }
//                                             }),
//                                             new Jx.Menu.Separator(),
//                                             new Jx.Menu.Item({
//                                            	 label: 'Consultar',
//                                            	 onClick: function() {
//                                            		 abrirEnlace('persona');
//                                            	 }
//                                             })
//                                             ]
//        ),
//        new Jx.Menu({label: 'Usuario'}).add([
//                                              new Jx.Menu.Item({
//                                            	  label: 'Crear',
//                                            	  onClick: function() {
//                                            		  abrirEnlace('usuario','','ingresar');
//                                            	  }
//                                              }),
//                                              new Jx.Menu.Separator(),
//                                              new Jx.Menu.Item({
//                                            	  label: 'Consultar',
//                                            	  onClick: function() {
//                                            		  abrirEnlace('usuario');
//                                            	  }
//                                              })
//                                              ]
//        ),
//        new Jx.Menu({label: 'Configuración'}).add([
//                                                 
//			new Jx.Menu.Item({
//			    label: 'Estado Civil',
//			    onClick: function() {
//					abrirEnlace('estadoCivil');
//			//		abrirEnlace('estadoCivil','','listarEstadoCivil');
//			    }
//			}),  
//            new Jx.Menu.Item({
//                label: 'Genero',
//                onClick: function() {
//            		abrirEnlace('genero');
////            		abrirEnlace('tipoEstudio','','listarTipoEstudio');
//                }
//            }),
//            new Jx.Menu.Separator(),
//            new Jx.Menu.Item({
//            	label: 'Grupo1',
//            	onClick: function() {
//            	abrirEnlace('grupo1');
//            }
//            }),
//            new Jx.Menu.Item({
//                label: 'Grupo2',
//                onClick: function() {
//            		abrirEnlace('grupo2');
//                }
//            }),
//            new Jx.Menu.Item({
//                label: 'Intervención',
//                onClick: function() {
//            		abrirEnlace('intervencion');
//                }
//            })
//            ]
//        ),
        new Jx.Button({
        	label:'Mis Datos',
        	onClick: function() {
        	abrirEnlace('persona','consultar');
//        	window.location = 	dominioJS;
        } 	            	
        }),
        new Jx.Button({
            label:'Salir',
      		onClick: function() {
				//abrirEnlace('dependencia','dependencia');
				window.location = 	dominioJS;
    		  } 	            	
        }),
        new Jx.Button({
            label:'Ayuda',
      		onClick: function() {
				abrirEnlace('ayuda','ayuda');
    		  } 	            	
        })                   
    );
}
function crearMenu(opcion){
	n = opcion.length
	for (i=0;i<n;i++){
    	aux = opcion[i].split(",");
    	if(aux=='subitem'){
    		menu = crearItem(opcion[i]);
    	}else{
    		menu = crearSubItem(opcion[i]);
    	}
	} 
	return menu;
}

function opcionesMenu(){
	opcion = new Array();
	opcion[0] = "item,principal";
	opcion[1] = "item,Solicitud";
	opcion[2] = "item,Dependencia";
	opcion[3] = "subitem,Escuela";
	crearMenu(opcion);
}
/*
function menuPrincipal(){
	new Jx.Layout('menu');
	var toolbar = new Jx.Toolbar();
    toolbar.add(
		        new Jx.Button({
		            label:'Principal',
	          		onClick: function() {
	          			abrirEnlace('principal','principal');
	        		  } 	            	
		        }), 
		        new Jx.Menu({label: 'Constancias'}).add(
		        		new Jx.Menu.Item({
		        			label: 'Generar Constancias',
		        			onClick: function() {
		        				abrirEnlace('expediente','listarexpediente');
		        			}
		        		}),                        
		        		new Jx.Menu.Item({
		        			label: 'Validar Constancias',
		        			onClick: function() {
		        				abrirEnlace('vconst','vconst','');
		        			}
		        		}),                        
		        		new Jx.Menu.Item({
		        			label: 'Reporte de Constancias Generadas',
		        			onClick: function() {
		        				abrirEnlace('estad','listarestad','');
		        			}
		        		})                          
		        ),
            	new Jx.Menu({label: 'Configuración'}).add(
            			new Jx.Menu.Item({
            				label: 'Enalce no existente',
            				onClick: function() {
            					abrirEnlace('cargadatos','listarcargadatos');
            				}
            			}),                        
                        new Jx.Menu.Item({
                        	label: 'Enalce no permitido',
                        	onClick: function() {
                        		abrirEnlace('reporte','listarreporte','');
                        	}
                        }),                        
                        new Jx.Menu.Item({
                        	label: 'Configurar Constancias',
                          	onClick: function() {
                          		abrirEnlace('reporte','listarreporte','');
                          	}
                        }),                        
                        new Jx.Menu.Item({
                        	label: 'Gestión de Usuarios',
                          	onClick: function() {
                          		abrirEnlace('usuario','listarusuario','');
                          	}
                          })                          
            	),
		        new Jx.Button({
		            label:'Requerimiento',
                  	onClick: function() {
                  		abrirEnlace('observacion','listarobservacion','');
                  	}
		        })	,
		        new Jx.Button({
		            label:'Salir',
	          		onClick: function() {
	    				salir();
	        		  } 	            	
		        })		        
    );	
    toolbar.addTo('menu');
}
function crearMenu(opcion){
	n = opcion.length
	for (i=0;i<n;i++){
    	aux = opcion[i].split(",");
    	if(aux=='subitem'){
    		menu = crearItem(opcion[i])
    	}else{
    		menu = crearSubItem(opcion[i])
    	}
	} 
	return menu;
}

function opcionesMenu(){
	opcion = new Array();
	opcion[0] = "item,principal";
	opcion[1] = "item,Solicitud";
	opcion[2] = "item,Dependencia";
	opcion[3] = "subitem,Escuela";
	crearMenu(opcion);
}
*/