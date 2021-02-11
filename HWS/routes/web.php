<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('register_public', function () {
    return view('register_public');
});


    Route::get('Customer_Dashboard', function () {
        return view('Customer_Dashboard');
    });

        /* Route::get('Customer_Request_Call_back', function () {
            return view('Customer_Request_Call_back');
        }); */
        
           /*  Route::get('Coordinator_generating_request', function () {
                return view('Coordinator_generating_request');
            }); */
            
                Route::get('Customer_viewing_New_requests', function () {
                    return view('Customer_viewing_New_requests');
                });
                
                    Route::get('New_request_detailed_view', function () {
                        return view('New_request_detailed_view');
                    });
                    
                        Route::get('Assigning_a_service_Engineer', function () {
                            return view('Assigning_a_service_Engineer');
                        });
                    
                            Route::get('Service_Engg_viewings_or_closing_Request', function () {
                                return view('Service_Engg_viewings_or_closing_Request');
                            });
                            
                                Route::get('UDashboard', function () {
                                    return view('UDashboard');
                                });
                                
                                    Route::get('Create_User_Request', function () {
                                        return view('Create_User_Request');
                                    });
                                
                                        Route::get('ticket_view_view_cust', function () {
                                            return view('ticket_view_view_cust');
                                        });
                                        
                                            Route::get('closed_ticket_view_view', function () {
                                                return view('closed_ticket_view_view');
                                            });
                                            
                                                Route::get('request_call_back', function () {
                                                    return view('request_call_back');
                                                });
                                    
                                                    Route::get('request_call_back_otp', function () {
                                                        return view('request_call_back_otp');
                                                    });
                                                    
                                                        Route::get('request_call_back_registration', function () {
                                                            return view('request_call_back_registration');
                                                        });
                                                    
                                                        
                                                    
                                                        Route::get('add_user', function () {
                                                            return view('add_user');
                                                        });
                                                    
                                                        Route::get('Coordinator_Dashboard', function () {
                                                            return view('Coordinator_Dashboard');
                                                        });
                                                        
                                                            Route::get('Coordinator_register_request', function () {
                                                                return view('Coordinator_register_request');
                                                            });
                                                            
                                                            
                                                                Route::get('Service_Engineer_Dashboard', function () {
                                                                    return view('Service_Engineer_Dashboard');
                                                                });
                                        
                                                                    Route::get('Service_Engineer_request', function () {
                                                                        return view('Service_Engineer_request');
                                                                    });
                                                        
                                    
                                                                Route::get('Dealer_Dashboard', function () {
                                                                    return view('Dealer_Dashboard');
                                                                });
                                                                
                                                                    Route::get('Dealer_register_request', function () {
                                                                        return view('Dealer_register_request');
                                                                    });
                                                                
                                                  Route::get('ticket_view_all', function () {
                                                  return view('ticket_view_all');
                                                  });
                                                  
                                                      Route::get('co_ticket_view_view', function () {
                                                          return view('co_ticket_view_view');
                                                      });
                                                  
                                                          Route::get('Add_Service_Engineer', function () {
                                                              return view('Add_Service_Engineer');
                                                          });
                                                          
                                                              Route::get('edit_service_eng_view', function () {
                                                                  return view('edit_service_eng_view');
                                                              });
                                                              
                                                                  Route::get('ticket_view_all_new', function () {
                                                                      return view('ticket_view_all_new');
                                                                  });
                                                                  
                                                                      Route::get('co_ticket_view_view_co_shipp', function () {
                                                                          return view('co_ticket_view_view_co_shipp');
                                                                      });
                                                                      
                                                                          Route::get('Shipper_Dashboard', function () {
                                                                              return view('Shipper_Dashboard');
                                                                          });
                                                              
                          Route::get('shipper_ticket_view_view', function () {
                          return view('shipper_ticket_view_view');
                          });
                          
                              Route::get('intransit_ticket_view_view', function () {
                                  return view('intransit_ticket_view_view');
                              });
                                  Route::get('service_eng_assing_view', function () {
                                      return view('service_eng_assing_view');
                                  });
                                  
                                      Route::get('service_eng_ticket_view', function () {
                                          return view('service_eng_ticket_view');
                                      });
                                      
                                          Route::get('ticket_app_rej_view', function () {
                                              return view('ticket_app_rej_view');
                                          });
                                          
                                              Route::get('se_ticket_close_view', function () {
                                                  return view('se_ticket_close_view');
                                              });
                                              
                                                  Route::get('shipper_deliver_dev_view', function () {
                                                      return view('shipper_deliver_dev_view');
                                                  });
                                                  
                                                      Route::get('co__del_ticket_view_view_co_shipp', function () {
                                                          return view('co__del_ticket_view_view_co_shipp');
                                                      });
                                                      
                                                          Route::get('add_dealers', function () {
                                                              return view('add_dealers');
                                                          });
                                                      
                                                              Route::get('dealer_request_view', function () {
                                                                  return view('dealer_request_view');
                                                              });
                                                              
                                                                  Route::get('del_ship_pickup_view_table', function () {
                                                                      return view('del_ship_pickup_view_table');
                                                                  });
                                                                  
           Route::get('dealer_request_view_pickup_view_view', function () {
            return view('dealer_request_view_pickup_view_view');
            });
           
               Route::get('sla_wise_report', function () {
                   return view('sla_wise_report');
               });
               
                   Route::get('Detailed_report', function () {
                       return view('Detailed_report');
                   });
                   
               
                                                                  
                                                                      
                                                                  
                                                              
                                                      
                                                          
                                              
                                                      
                                                  
                                              
                                          
                                  
                                      
                                  
                              
                                                                              
                                                                      
                                                      
                                                              
                                                          
                                                                    
                                                                
                                                                    
                                                                
                                                                    
                                                                
                        
                
                    
        
            
    
    
    Route::post('/register_pub', 'Controller@register_pub_back');
    
    Route::post('/user_request_back', 'Controller@user_request_back');
    Route::post('/call_back_user_request_back', 'Controller@cb_user_request_back');
    
    Route::get('ticket_view/{id}','Controller@ticket_view_b');
    Route::get('closed_ticket_view/{id}','Controller@closed_ticket_view_b');
    
    Route::post('/user_request_call_back_otp', 'Controller@user_request_call_back_otp_bac');
    
    Route::post('/user_request_call_back_sub', 'Controller@user_request_call_back_sub_bac');
    
    Route::post('/register_user', 'Controller@register_user_back');
    
    Route::post('/Coordinator_request_back', 'Controller@Coordinator_request_back_back');
    
    Route::post('/level1Eng_request_back', 'Controller@level1Eng_request_back_back');
    
    Route::get('ticket_view_co/{id}','Controller@ticket_view_back');
    Route::get('ticket_view_view_co/{id}','Controller@ticket_view_view_co_back');
    
    Route::post('/cordinator_request_tick', 'Controller@Coordinator_request_back_back');
    
    Route::post('/add_service_eng', 'Controller@add_service_eng_back');
    Route::get('edit_service_eng/{id}','Controller@edit_service_eng_bac');
    
    Route::post('/upd_service_eng', 'Controller@upd_service_eng_back');
    
    Route::get('ticket_view_co_new/{id}','Controller@ticket_view_back_new');
    Route::get('ticket_view_view_co_ship/{id}','Controller@ticket_view_view_co_ship_back');
    
    Route::get('ticket_view_view_co_ship_del/{id}','Controller@ticket_view_view_co_ship_del_back');
    
    
    Route::post('/assign_ticket_shipper', 'Controller@assign_ticket_shipper_back');
    
    Route::post('/assign_ticket_shipper_del', 'Controller@assign_ticket_shipper_del_back');
    
    Route::get('shipper_ticket_view/{id}','Controller@shipper_ticket_view_back');
    Route::post('/ticket_shipper_submit', 'Controller@ticket_shipper_submit_back');
    
    Route::get('intransit_view/{id}','Controller@intransit_view_back');
    Route::get('intransit_view_two/{id}','Controller@intransit_view_back_two');
    
    Route::post('/ticket_shipper_close', 'Controller@ticket_shipper_close_back');
    
    Route::post('/ticket_shipper_close_two', 'Controller@ticket_shipper_close_back_two');
    
    
    Route::get('service_eng_assing/{id}','Controller@service_eng_assing_back');
    
    Route::post('/service_eng_assigning', 'Controller@service_eng_assigning_back');
    Route::get('s_eng_ticket_view/{id}','Controller@s_eng_ticket_view_back');
    
    Route::post('/service_eng_update_issue', 'Controller@service_eng_update_issue_back');
    
    Route::get('ticket_app_rej/{id}','Controller@ticket_app_rej_back');
    Route::post('/ticket_approve_reject_cust', 'Controller@ticket_approve_reject_cust_back');
    Route::get('se_ticket_close/{id}','Controller@se_ticket_close_back');
    
    Route::post('/service_eng_close_issue', 'Controller@service_eng_close_issue_back');
    
    Route::get('service_eng_clo_upd_cor/{id}','Controller@service_eng_clo_upd_cor_back');
    
    Route::post('/assign_ticket_shipper_delivery', 'Controller@assign_ticket_shipper_delivery_back');
    Route::get('shipper_deliver_dev/{id}','Controller@shipper_deliver_dev_back');
    Route::post('/shipper_delivery_close', 'Controller@shipper_delivery_close_back');
    Route::post('/add_dealers', 'Controller@add_dealers_data');
    Route::get('del_tick_view_mul/{id}','Controller@del_tick_view_mul_back');
    Route::get('dealer_request_view/{id}', 'Controller@view_all_dealer_view');
    Route::get('del_ship_pickup_view/{id}', 'Controller@del_ship_pickup_view_back');
    Route::get('dealer_request_view_pickup_view/{id}', 'Controller@dealer_request_view_pickup_view_back');
    
    Route::post('/delaer_ship_req_sub', 'Controller@delaer_ship_req_sub_back');
    Route::post('/generate_sla_report', 'Controller@generate_sla_report_back');
    
    
    
    Route::get('sla_wise_report_view_view', function () {
        return view('sla_wise_report_view_view');
    });
    
       
        
    
    Route::get('customer_wise_report', function () {
        return view('customer_wise_report');
    });
        
        Route::get('dealer_wise_report', function () {
            return view('dealer_wise_report');
        });
            
            Route::get('service_eng_wise_report', function () {
                return view('service_eng_wise_report');
            });
                
                Route::get('shipper_wise_report', function () {
                    return view('shipper_wise_report');
                }); 
                

                    Route::get('customer_wise_report_view_view', function () {
                        return view('customer_wise_report_view_view');
                    });
                        
                  Route::get('dealer_wise_report_view_view', function () {
                  return view('dealer_wise_report_view_view');
                  });
                            
                  Route::get('shipper_wise_report_view_view', function () {
                  return view('shipper_wise_report_view_view');
                  });
                                
                  Route::get('service_eng_wise_report_view_view', function () {
                  return view('service_eng_wise_report_view_view');
                  });
                  
                      Route::post('/generate_customer_report', 'Controller@generate_customer_report_back');
                      
                      Route::post('/generate_dealer_report', 'Controller@generate_dealer_report_back');
                      
                      Route::post('/generate_service_eng_report', 'Controller@generate_service_eng_report_back');
                      
                      Route::post('/generate_shipper_report', 'Controller@generate_shipper_report_back');
                      
                      Route::post('/generate_detail_report', 'Controller@generate_detail_report_back');
                      
                      
                      Route::get('detail_wise_report_view_view', function () {
                          return view('detail_wise_report_view_view');
                      });
    
                      Route::get('payment-initate', function () {
                          return view('payment-initate');
                      });
                          // for Initiate the order
                          //Route::post('/payment-initiate-request','PaymentController@Initiate');
                          Route::post('/payment-initiate-request','Controller@Initiate');
                          // for Payment complete
                          //Route::post('/payment-complete','PaymentController@Complete');
                          Route::post('/payment-complete','Controller@Complete');
                          
                          Route::get('payment-success-page', function () {
                              return view('payment-success-page');
                          });
                              Route::get('payment-failed-page', function () {
                                  return view('payment-failed-page');
                              });
                          
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //Route::post('/gb_public', 'Controller@gbpublic');