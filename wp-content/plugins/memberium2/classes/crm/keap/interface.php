<?php
/**
 * Copyright (c) 2018-2024 David J Bullock
 * Web Power and Light
 */

 class_exists( 'm4is_pms8y' ) || die();
 m4is_ho3l::m4is_ju94();
 final 
class m4is_ho3l {  private static $m4is_bnd6ti;
 private static $m4is_zq0k;
 private static $m4is_l4ig;
 private static $m4is_j_xo4w;
 private static $m4is_aj4h;
 private static $m4is_vl0ruk;
 public static 
function m4is_ju94() { self::$m4is_bnd6ti = m4is_pms8y::m4is_e5l8a9();
 self::$m4is_zq0k = self::$m4is_bnd6ti->m4is_d14zr( 'appname' );
 self::$m4is_j_xo4w = self::$m4is_bnd6ti->m4is_zw_n();
 self::$m4is_aj4h = 1000;
 self::$m4is_vl0ruk = self::m4is_j295a();
 self::$m4is_l4ig = self::m4is_ahty();
 } private static 
function m4is_j295a() : array { return [ 'affiliate' => -3, 'company' => -6, 'contact' => -1, 'contactaction' => -5, 'job' => -9, 'productinterest' => -4, 'recurringorder' => -10 ];
 } private static 
function m4is_ahty() : array { return [ 'actionsequence' => 'Id,TemplateName,VisibleToTheseUsers', 'affiliate' => 'AffCode,AffName,ContactId,DefCommissionType,Id,LeadAmt,LeadCookieFor,LeadPercent,NotifyLead,NotifySale,ParentId,Password,PayoutType,SaleAmt,SalePercent,Status', 'campaign' => 'Id,Name,Status', 'campaignee' => 'Campaign,CampaignId,ContactId,Status', 'campaignstep' => 'CampaignId,Id,StepStatus,StepTitle,TemplateId', 'ccharge' => 'Amt,ApprCode,CCId,Id,MerchantId,OrderNum,PaymentId,RefNum', 'company' => 'AccountId,Address1Type,Address2Street1,Address2Street2,Address2Type,Address3Street1,Address3Street2,Address3Type,Anniversary,AssistantName,AssistantPhone,BillingInformation,Birthday,City,City2,City3,Company,CompanyID,ContactNotes,ContactType,Country,Country2,Country3,CreatedBy,DateCreated,Email,EmailAddress2,EmailAddress3,Fax1,Fax1Type,Fax2,Fax2Type,FirstName,Groups,Id,JobTitle,LastName,LastUpdated,LastUpdatedBy,Leadsource,LeadSourceId,MiddleName,Nickname,OwnerID,Password,Phone1,Phone1Ext,Phone1Type,Phone2,Phone2Ext,Phone2Type,Phone3,Phone3Ext,Phone3Type,Phone4,Phone4Ext,Phone4Type,Phone5,Phone5Ext,Phone5Type,PostalCode,PostalCode2,PostalCode3,ReferralCode,SpouseName,State,State2,State3,StreetAddress1,StreetAddress2,Suffix,Title,Username,Validated,Website,ZipFour1,ZipFour2,ZipFour3', 'contact' => 'AccountId,Address1Type,Address2Street1,Address2Street2,Address2Type,Address3Street1,Address3Street2,Address3Type,Anniversary,AssistantName,AssistantPhone,BillingInformation,Birthday,City,City2,City3,Company,CompanyID,ContactNotes,ContactType,Country,Country2,Country3,CreatedBy,DateCreated,Email,EmailAddress2,EmailAddress3,Fax1,Fax1Type,Fax2,Fax2Type,FirstName,Groups,Id,JobTitle,Language,LastName,LastUpdated,LastUpdatedBy,Leadsource,LeadSourceId,MiddleName,Nickname,OwnerID,Password,Phone1,Phone1Ext,Phone1Type,Phone2,Phone2Ext,Phone2Type,Phone3,Phone3Ext,Phone3Type,Phone4,Phone4Ext,Phone4Type,Phone5,Phone5Ext,Phone5Type,PostalCode,PostalCode2,PostalCode3,ReferralCode,SpouseName,State,State2,State3,StreetAddress1,StreetAddress2,Suffix,TimeZone,Title,Username,Validated,Website,ZipFour1,ZipFour2,ZipFour3', 'contactaction' => 'Accepted,ActionDate,ActionDescription,ActionType,CompletionDate,ContactId,CreatedBy,CreationDate,CreationNotes,EndDate,Id,IsAppointment,LastUpdated,LastUpdatedBy,OpportunityId,PopupDate,Priority,UserID', 'contactgroup' => 'GroupCategoryId,GroupDescription,GroupName,Id', 'contactgroupassign' => 'ContactGroup,ContactId,DateCreated,GroupId', 'contactgroupcategory' => 'CategoryDescription,CategoryName,Id', 'cprogram' => 'Active,BillingType,DefaultCycle,DefaultFrequency,DefaultPrice,Description,Family,HideInStore,Id,LargeImage,ProductId,ProgramName,ShortDescription,Sku,Status,Taxable', 'creditcard' => 'BillAddress1,BillAddress2,BillCity,BillCountry,BillName,BillState,BillZip,CardType,ContactId,Email,ExpirationMonth,ExpirationYear,FirstName,Id,Last4,LastName,MaestroIssueNumber,NameOnCard,PhoneNumber,ShipAddress1,ShipAddress2,ShipCity,ShipCompanyName,ShipCountry,ShipFirstName,ShipLastName,ShipMiddleName,ShipName,ShipPhoneNumber,ShipState,ShipZip,StartDateMonth,StartDateYear,Status',  'dataformfield' => 'DataType,DefaultValue,FormId,GroupId,Id,Label,ListRows,Name,Values', 'dataformgroup' => 'Id,Name,TabId', 'dataformtab' => 'Id,FormId,TabName', 'emailaddstatus' => 'DateCreated,Email,Id,LastClickDate,LastOpenDate,LastSentDate,Type', 'expense' => 'ContactId,DateIncurred,ExpenseAmt,ExpenseType,Id,TypeId', 'filebox' => 'ContactId,Extension,FileName,FileSize,Id,Public', 'groupassign' => 'Admin,GroupId,Id,UserId', 'invoice' => 'AffiliateId,ContactId,CreditStatus,DateCreated,Description,Id,InvoiceTotal,InvoiceType,JobId,LeadAffiliateId,PayPlanStatus,PayStatus,ProductSold,PromoCode,RefundStatus,Synced,TotalDue,TotalPaid', 'invoiceitem' => 'CommissionStatus,DateCreated,Description,Discount,Id,InvoiceAmt,InvoiceId,OrderItemId', 'invoicepayment' => 'Amt,Id,InvoiceId,PayDate,PaymentId,PayStatus,SkipCommission', 'job' => 'ContactId,DateCreated,DueDate,Id,JobNotes,JobRecurringId,JobStatus,JobTitle,OrderStatus,OrderType,ProductId,ShipCity,ShipCompany,ShipCountry,ShipFirstName,ShipLastName,ShipMiddleName,ShipPhone,ShipState,ShipStreet1,ShipStreet2,ShipZip,StartDate', 'jobrecurringinstance' => 'AutoCharge,DateCreated,Description,EndDate,Id,InvoiceItemId,RecurringId,StartDate,Status', 'lead' => 'AffiliateId,ContactID,CreatedBy,DateCreated,EstimatedCloseDate,Id,LastUpdated,LastUpdatedBy,Leadsource,NextActionDate,NextActionNotes,Objection,OpportunityNotes,OpportunityTitle,ProjectedRevenueHigh,ProjectedRevenueLow,StageID,StatusID,UserID', 'leadsource' => 'CostPerLead,Description,EndDate,Id,LeadSourceCategoryId,Medium,Message,Name,StartDate,Status,Vendor', 'leadsourcecategory' => 'Description,Id,Name', 'leadsourceexpense' => 'Amount,DateIncurred,Id,LeadSourceId,LeadSourceRecurringExpenseId,Notes,Title', 'leadsourcerecurringexpense' => 'Amount,EndDate,Id,LeadSourceId,NextExpenseDate,Notes,StartDate,Title', 'linkedcontacttype' => 'Id,MaxLinked,TypeName', 'orderitem' => 'CPU,Id,ItemDescription,ItemName,ItemType,Notes,OrderId,PPU,ProductId,Qty,SubscriptionPlanId', 'payment' => 'ChargeId,Commission,ContactId,Id,InvoiceId,PayAmt,PayDate,PayNote,PayType,RefundId,Synced,UserId', 'payplan' => 'AmtDue,DateDue,FirstPayAmt,Id,InitDate,InvoiceId,StartDate,Type', 'payplanitem' => 'AmtDue,AmtPaid,DateDue,Id,PayPlanId,Status', 'product' => 'BottomHTML,CityTaxable,CountryTaxable,Description,HideInStore,Id,InventoryLimit,InventoryNotifiee,IsPackage,LargeImage,NeedsDigitalDelivery,ProductName,ProductPrice,Shippable,ShippingTime,ShortDescription,Sku,StateTaxable,Status,Taxable,TopHTML,Weight', 'productcategory' => 'CategoryDisplayName,CategoryImage,CategoryOrder,Id,ParentId', 'productcategoryassign' => 'Id,ProductCategoryId,ProductId', 'productinterest' => 'DiscountPercent,Id,ObjectId,ObjType,ProductId,ProductType,Qty', 'productinterestbundle' => 'BundleName,Description,Id', 'recurringorder' => 'AffiliateId,AutoCharge,BillingAmt,BillingCycle,CC1,CC2,ContactId,EndDate,Frequency,Id,LastBillDate,LeadAffiliateId,MaxRetry,MerchantAccountId,NextBillDate,NumDaysBetweenRetry,OriginatingOrderId,PaidThruDate,ProductId,ProgramId,PromoCode,Qty,ReasonStopped,ShippingOptionId,StartDate,Status,SubscriptionPlanId', 'referral' => 'AffiliateId,ContactId,DateExpires,DateSet,Id,Info,IPAddress,Source,Type', 'savedfilter' => 'FilterName,Id,ReportStoredName,UserId', 'socialaccount' => 'Id,AccountName,AccountType,ContactId,DateCreated,LastUpdated', 'stage' => 'Id,StageName,StageOrder,TargetNumDays', 'stagemove' => 'CreatedBy,DateCreated,Id,MoveDate,MoveFromStage,MoveToStage,OpportunityId,PrevStageMoveDate,UserId', 'subscriptionplan' => 'Active,Cycle,Frequency,Id,PlanPrice,PreAuthorizeAmount,ProductId,Prorate', 'template' => 'Categories,Id,PieceTitle,PieceType', 'user' => 'City,Email,EmailAddress2,EmailAddress3,FirstName,GlobalUserId,HTMLSignature,Id,LastName,MiddleName,Nickname,Partner,Phone1,Phone1Ext,Phone1Type,Phone2,Phone2Ext,Phone2Type,PostalCode,Signature,SpouseName,State,StreetAddress1,StreetAddress2,Suffix,Title,ZipFour1', ];
 }  static 
function m4is_epr341() : bool { $m4is_up85 = self::$m4is_bnd6ti->get_i2sdk_options();
 return isset( $m4is_up85['server_verified'] ) ? (bool) $m4is_up85['server_verified'] : false;
 }     static 
function m4is_kjedy2( string $m4is_aw4k6, bool $m4is_agt62d = false, array $m4is_x5wxyr = [] ) : array { $m4is_aw4k6 = strtolower( trim( $m4is_aw4k6 ) );
 $m4is_su4qk = 0;
 $m4is_wrnxfy = [];
 $m4is_w_8g = array_key_exists( $m4is_aw4k6, self::$m4is_l4ig ) ? array_filter( explode( ',', self::$m4is_l4ig[ $m4is_aw4k6 ] ) ) : [];
 $m4is_su4qk = array_key_exists( $m4is_aw4k6, self::$m4is_vl0ruk ) ? self::$m4is_vl0ruk[ $m4is_aw4k6 ] : 0;
 if ( $m4is_su4qk !== 0 ) { $m4is_w_8g = array_merge( $m4is_w_8g, m4is_a8iaym::m4is_e_prox( (int) $m4is_su4qk ) );
 }  if (! empty( $m4is_x5wxyr ) ) { $m4is_w_8g = array_diff( $m4is_w_8g, $m4is_x5wxyr );
 } if ( $m4is_agt62d ) { if ( $m4is_aw4k6 == 'contact' ) { $m4is_wrnxfy = array_filter( explode( ',', self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_contact_fields', '' ) ) );
 } elseif ( $m4is_aw4k6 == 'affiliate' ) { $m4is_wrnxfy = array_filter( explode( ',', self::$m4is_bnd6ti->m4is_oiewvu( 'settings', 'ignore_affiliate_fields', '' ) ) );
 } $m4is_w_8g = array_diff( $m4is_w_8g, $m4is_wrnxfy );
 } $m4is_w_8g = array_filter( $m4is_w_8g );
 $m4is_w_8g = apply_filters( 'memberium/infusionsoft/tables/fieldlist', $m4is_w_8g, $m4is_aw4k6 );
 $m4is_w_8g = apply_filters( 'memberium/keap/tables/fieldlist', $m4is_w_8g, $m4is_aw4k6 );
 return array_values( $m4is_w_8g );
 } static 
function m4is_o6zj4m( int $m4is_xi5w = -1 ) : array { global $wpdb;
  $m4is_w_8g = [];
 if ( $m4is_w_8g == -1 ) { $m4is_w_8g = [ 'Anniversary' => 13, 'Birthday' => 13, 'Email' => 5, 'EmailAddress2' => 5, 'EmailAddress3' => 5, ];
 } $m4is_pepibr = m4is_a8iaym::m4is_avtk57();
 $m4is_tovizk = "SELECT concat('_', name) as `name`, `datatype` as `type` FROM `{$m4is_pepibr}` WHERE `appname` =  %s AND formid = %d";
 $m4is_tovizk = $wpdb->prepare( $m4is_tovizk, self::$m4is_zq0k, (int) $m4is_xi5w );
 $m4is_hpn9y = $wpdb->get_results( $m4is_tovizk, ARRAY_A );
 foreach( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_w_8g[$m4is_ke_fr['name']] = $m4is_ke_fr['type'];
 } if ( $m4is_xi5w == -1 ) { $m4is_w_8g['Birthday'] = 13;
 $m4is_w_8g['Anniversary'] = 13;
 $m4is_w_8g['DateCreated'] = 14;
 $m4is_w_8g['LastUpdated'] = 14;
 } return $m4is_w_8g;
 } static 
function m4is_u9tc1( string $m4is_dj_2, string $m4is_iqdn, string $m4is__47wig, int $m4is_kzb82 ) { $m4is_iqdn = trim( $m4is_iqdn );
 return self::$m4is_j_xo4w->addCustomField( $m4is_dj_2, $m4is_iqdn, $m4is__47wig, $m4is_kzb82 );
 }  static 
function m4is_xy3j( int $m4is_e2kg, string $m4is_xf9b, string $m4is_h5fp = '' ) { $m4is_xf9b = trim( $m4is_xf9b );
 if ( ! empty( $m4is_xf9b ) && ! empty( $m4is_e2kg ) ) { if ( empty( $m4is_h5fp ) ) { $m4is_kneg6 = preg_split( "/[^[:alnum:]]/", $m4is_xf9b );
 if ( count( $m4is_kneg6 ) == 2 ) { $m4is_xf9b = trim( $m4is_kneg6[0] );
 $m4is_h5fp = empty( $m4is_kneg6[1] ) ? $m4is_h5fp : trim( $m4is_kneg6[1] );
 } } $m4is_h5fp = empty( $m4is_h5fp ) ? self::$m4is_zq0k : $m4is_h5fp;
 return self::$m4is_j_xo4w->achieveGoal( $m4is_h5fp, $m4is_xf9b, $m4is_e2kg );
 } }     static 
function m4is_btu_( string $m4is_dj_2, int $m4is_j5sy07, array $m4is_w_8g ) { return self::$m4is_j_xo4w->dsUpdate( $m4is_dj_2, $m4is_j5sy07, $m4is_w_8g );
 }  static 
function m4is_l6wj( string $m4is_dj_2, array $m4is_w_8g ) { return self::$m4is_j_xo4w->dsAdd( $m4is_dj_2, $m4is_w_8g );
 }  static 
function m4is_mg4uyc( string $m4is_dj_2, int $m4is_a0pejg = 0, int $m4is_couz = 0, array $m4is_jo8fb = [], array $m4is_w_8g = [] ) { $m4is_a0pejg = empty( $m4is_a0pejg ) ? self::$m4is_aj4h : $m4is_a0pejg;
 if ( empty( $m4is_w_8g ) ) { $m4is_w_8g = m4is_ho3l::m4is_kjedy2( $m4is_dj_2, true );
 } $m4is_d71ub = self::$m4is_j_xo4w->dsQuery( $m4is_dj_2, $m4is_a0pejg, $m4is_couz, $m4is_jo8fb, $m4is_w_8g );
 if ( is_string( $m4is_d71ub ) ) { error_log( 'Memberium Error: Data Query API: ' . $m4is_dj_2 . "\n" . 'Return Fields: ' . implode( ', ', $m4is_w_8g ) . "\n" . 'Query: ' . implode( ', ', $m4is_jo8fb) . "\n" . 'Page: ' . $m4is_couz . ' / Size: ' . $m4is_a0pejg . "\n" . 'Sort By: ' . $m4is_dk520 . ' / Ascending: ' . (int) $m4is_f8qb1a . "\n" . ' - ' . $m4is_d71ub);
 $m4is_d71ub = [];
 } if ( is_a($m4is_d71ub, 'WP_Error' ) ) { error_log( 'Memberium Error: Data Query API: ' . $m4is_dj_2 . "\n" . 'Return Fields: ' . implode( ', ', $m4is_w_8g ) . "\n" . 'Query: ' . implode( ',', $m4is_jo8fb) . "\n" . 'Page: ' . $m4is_couz . ' / Size: ' . $m4is_a0pejg . "\n" . 'Sort By: ' . $m4is_dk520 . ' / Ascending: ' . (int) $m4is_f8qb1a );
 $m4is_d71ub = [];
 } return $m4is_d71ub;
 }  static 
function m4is_mlhu4( string $m4is_dj_2, int $m4is_a0pejg = 0, int $m4is_couz = 0, array $m4is_jo8fb = [], array $m4is_w_8g = [], string $m4is_dk520 = 'Id', bool $m4is_f8qb1a = true) { $m4is_a0pejg = empty( $m4is_a0pejg ) ? self::$m4is_aj4h : $m4is_a0pejg;
 if ( empty( $m4is_w_8g ) ) { $m4is_w_8g = self::m4is_kjedy2( $m4is_dj_2, true );
 } $m4is_d71ub = self::$m4is_j_xo4w->dsQueryOrderBy( $m4is_dj_2, $m4is_a0pejg, $m4is_couz, $m4is_jo8fb, $m4is_w_8g, $m4is_dk520, $m4is_f8qb1a );
 if ( is_string( $m4is_d71ub ) ) { error_log( 'Memberium Sorted Data Query API Error: ' . $m4is_dj_2 . "\n" . 'Return Fields: ' . implode( ', ', $m4is_w_8g ) . "\n" . 'Query: ' . implode( ',', $m4is_jo8fb) . "\n" . 'Page: ' . $m4is_couz . ' / Size: ' . $m4is_a0pejg . "\n" . 'Sort By: ' . $m4is_dk520 . ' / Ascending: ' . (int) $m4is_f8qb1a . "\n" . ' - ' . $m4is_d71ub);
 $m4is_d71ub = [];
 } if ( is_a($m4is_d71ub, 'WP_Error' ) ) { error_log( 'Memberium Sorted Data Query API Error: ' . $m4is_dj_2 . "\n" . 'Return Fields: ' . implode( ', ', $m4is_w_8g ) . "\n" . 'Query: ' . implode( ',', $m4is_jo8fb) . "\n" . 'Page: ' . $m4is_couz . ' / Size: ' . $m4is_a0pejg . "\n" . 'Sort By: ' . $m4is_dk520 . ' / Ascending: ' . (int) $m4is_f8qb1a );
 $m4is_d71ub = [];
 } return $m4is_d71ub;
 }   static 
function m4is_kjosf7( string $m4is_aw4k6, int $m4is_j5sy07, array $m4is_w_8g = [] ) { $m4is_w_8g = empty( $m4is_w_8g ) ? self::m4is_kjedy2( $m4is_aw4k6, false ) : $m4is_w_8g;
 $m4is_ereh = self::$m4is_j_xo4w->dsLoad( $m4is_aw4k6, $m4is_j5sy07, $m4is_w_8g);
 $m4is_ereh = is_array( $m4is_ereh ) ? self::$m4is_bnd6ti->m4is_mgdfhw( $m4is_ereh ) : $m4is_ereh;
 return $m4is_ereh;
 }     static 
function m4is_bi7s( string $m4is_u23rl = '%', string $m4is_bj1eqc = '' ) { global $wpdb;
 $m4is_aw4k6 = 'SavedFilter';
 $m4is__u5v = self::m4is_kjedy2( $m4is_aw4k6, false );
 $m4is_jo8fb = [ 'ReportStoredName' => $m4is_u23rl ];
 $m4is_w65zmb = self::$m4is_j_xo4w->dsQuery( $m4is_aw4k6, 1000, 0, $m4is_jo8fb, $m4is__u5v );
 if ( $m4is_u23rl == '%' && is_array( $m4is_w65zmb ) ) { update_option( 'memberium_saved_searches', $m4is_w65zmb, false );
 } return $m4is_w65zmb;
 }     static 
function m4is_cpacu( $m4is_ereh ) { return is_string( $m4is_ereh) && stripos( $m4is__b5x37, '[RecordNotFound]' ) !== false ;
 }  static 
function m4is_u0vcs8( array $m4is_hpn9y, string $m4is_s2ge5 = 'fieldname', string $m4is_w_o7al = 'value' ) : array { $m4is_ereh = [];
 foreach ( $m4is_hpn9y as $m4is_ke_fr ) { $m4is_ereh[$m4is_ke_fr[$m4is_s2ge5]] = $m4is_ke_fr[$m4is_w_o7al];
 } return $m4is_ereh;
 } }

