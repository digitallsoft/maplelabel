<?php

include(dirname(__FILE__) . '/../config/keys/keys.php');

function end_ebay_listings($item_code) {
    global $token;
    $site_id = 15;
    $post_data = '<?xml version="1.0" encoding="utf-8"?>
				  <EndFixedPriceItemRequest xmlns="urn:ebay:apis:eBLBaseComponents">
				 <ItemID>' . $item_code . '</ItemID>
				<EndingReason>Incorrect</EndingReason>
				<RequesterCredentials>
			    <eBayAuthToken>' . $token . '</eBayAuthToken>
				</RequesterCredentials>
				<WarningLevel>High</WarningLevel>
				</EndFixedPriceItemRequest>​';

    $body = callapi($post_data, "EndFixedPriceItem", $site_id);
    return $body; 
}

function getorder($page, $days) {
    global $token;
    $site_id = 15;
    $post_data = '<?xml version="1.0" encoding="utf-8"?>
					<GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">
 				 	<RequesterCredentials>
  					<eBayAuthToken>' . $token . '</eBayAuthToken>
  					</RequesterCredentials>
					<Pagination> 
					  <PageNumber>' . $page . '</PageNumber>   
					  <EntriesPerPage>100</EntriesPerPage> 
					</Pagination>
					<NumberOfDays>' . $days . '</NumberOfDays>
  					<OrderRole>Seller</OrderRole>
					</GetOrdersRequest>​';


    $body = callapi($post_data, "GetOrders", $site_id);
    return $body;
}

function callapi($post_data, $call_name) {
    global $COMPATIBILITYLEVEL, $DEVNAME, $APPNAME, $CERTNAME, $SiteId, $eBayAPIURL;
    $ebayapiheader = array(
        "X-EBAY-API-COMPATIBILITY-LEVEL: $COMPATIBILITYLEVEL",
        "X-EBAY-API-DEV-NAME: $DEVNAME",
        "X-EBAY-API-APP-NAME: $APPNAME",
        "X-EBAY-API-CERT-NAME: $CERTNAME",
        "X-EBAY-API-SITEID: $SiteId",
        "X-EBAY-API-CALL-NAME: " . $call_name);

    $ch = curl_init();
    $res = curl_setopt($ch, CURLOPT_URL, $eBayAPIURL);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HEADER, 0); // 0 = Don't give me the return header 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $ebayapiheader); // Set this for eBayAPI 
    curl_setopt($ch, CURLOPT_POST, 1); // POST Method 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); //My XML Request 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $body = curl_exec($ch); //Send the request 

    curl_close($ch); // Close the connection
    return $body;
}


function getTimestampFromEbay($ebaytime) {
    $date = new DateTime($ebaytime);
    $date->add(new DateInterval('P0DT0H1M4S'));
    return $date->getTimestamp();

}


function getDatetimeFromEbay($ebaytime) {
    $date = new DateTime($ebaytime);
    $date->add(new DateInterval('P0DT0H1M4S'));
    return  $date->format("Y-m-d H:i:s");;
}


function completeSaleRequest($orderId, $user_token) {

    //global $token;

    $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>
                    <CompleteSaleRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                        <OrderID>' . $orderId . '</OrderID>
                        <Shipped>true</Shipped>
                        <RequesterCredentials>
                          <eBayAuthToken>' . $user_token . '</eBayAuthToken>
                        </RequesterCredentials>
                        <WarningLevel>High</WarningLevel>
                    </CompleteSaleRequest>';

    $response = callapi($requestXmlBody, "CompleteSale");
    return $response;
}

function getItemsAwaitingFeedbackRequest($page, $user_token) {

    //global $token;

    $requestXmlBody = '<?xml version="1.0" encoding="utf-8"?>
                        <GetItemsAwaitingFeedbackRequest xmlns="urn:ebay:apis:eBLBaseComponents">
                            <Pagination>
                               <EntriesPerPage>200</EntriesPerPage>
                               <PageNumber>' . $page . '</PageNumber>
                            </Pagination>
                            <RequesterCredentials>
                              <eBayAuthToken>' . $user_token . '</eBayAuthToken>
                            </RequesterCredentials>
                            <WarningLevel>High</WarningLevel>
                        </GetItemsAwaitingFeedbackRequest>';

    $response = callapi($requestXmlBody, "GetItemsAwaitingFeedback");
    return $response;
}


function getshipping($orderId, $user_token) {
    $site_id = 15;
    $post_data = '<?xml version="1.0" encoding="utf-8"?>
					<GetOrdersRequest xmlns="urn:ebay:apis:eBLBaseComponents">
					  <RequesterCredentials>
					    <eBayAuthToken>' . $user_token . '</eBayAuthToken>
					  </RequesterCredentials>
						<ErrorLanguage>en_US</ErrorLanguage>
						<WarningLevel>High</WarningLevel>
					  <OrderIDArray>
					      <!--Enter the OrderIDs (from-to) -->
					    <OrderID>'.$orderId.'</OrderID>
					  </OrderIDArray>
					  <OrderRole>Seller</OrderRole>
					</GetOrdersRequest>';


    $body = callapi($post_data, "GetOrders", $site_id);
    return $body;
}

?>
