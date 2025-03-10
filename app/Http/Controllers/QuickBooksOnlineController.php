<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\QuickBooksOnline\src\Core\ServiceContext;
// use App\QuickBooksOnline\src\DataService\DataService;
// use App\QuickBooksOnline\src\PlatformService\PlatformService;
// use App\QuickBooksOnline\src\Core\Http\Serialization\XmlObjectSerializer;
// use App\QuickBooksOnline\src\Data\IPPCreditCardPaymentTxn;
// use App\QuickBooksOnline\src\Data\IPPReferenceType;
// use QuickBooksOnline\API\DataService\DataService;

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Data\IPPCreditCardPaymentTxn;
use QuickBooksOnline\API\Data\IPPReferenceType;
use QuickBooksOnline\API\Facades\Item;

// include(App\QuickBooksOnline\src\.'config.php');

// use QuickBooksOnline\API\Core\ServiceContext;
// use QuickBooksOnline\API\DataService\DataService;
// use QuickBooksOnline\API\PlatformService\PlatformService;
// use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;

class QuickBooksOnlineController extends Controller
{
    //charges
    public function create_charge(Request $request)
    {
        /*$request_id  ='4620816365208439210';
        $url='https://sandbox.api.intuit.com/quickbooks/v4/payments/charges';
        $host = '';
        $request_headers = array(
                        "request-id:" . $request_id,
                        // "X-Mashape-Host:" . $host
                    );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);

        $season_data = curl_exec($ch);

        if (curl_errno($ch)) {
            print "Error: " . curl_error($ch);
            exit();
        }

        // Show me the result
        curl_close($ch);
        // $json= json_decode($season_data, true);
        // return response()->json($season_data);*/

        // $postdata = $request;
        // $postdata = json_encode($request);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://sandbox.api.intuit.com/quickbooks/v4/payments/charges");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$request);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            // 'companyId: 4620816365208439210',
            'request-id: 4620816365208439210',
            'Content-Type: application/json',
            ':authority: sandbox.api.intuit.com',
            ':method: POST',
            ':path: /quickbooks/v4/payments/charges',
            'authorization: Intuit_APIKey intuit_apikey=sandboxakyresbLHh6aoAw3CwMztg4c6AoF67bIt,intuit_apikey_version=1.0, intuit_requestId=4620816365208439210',
            'intuit-company-id: 4620816365208439210',
            'origin: https://developer.intuit.com',
            'referer: https://developer.intuit.com/'
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        // print  $server_output ;

        // return response()->json($server_output);
        return $server_output;
        //return response()->json($request);
    }


    public function quickbooks_test(){
        


        /*$dataService = DataService::Configure(array(
          'auth_mode'       => 'oauth2',
          'ClientID'        => "ABwyAZdHUJJU6L2JD5GN4MgPmrmyN8OeUuo5yvWsmJCSs81kv5",
          'ClientSecret'    => "r8EfARYvBX1JC752DWAltsIdlJVVmTLS1eP7L2rk",
          'accessTokenKey'  => "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..39TCFuDIbgTYLWcUQtPnkA.kufu09uVCmtUa8vZd5OhrhQEnZOrsjpGGpLRhAlD2qFE3Dn_To1p6BMSuPljlnKlH-aIMnREnkT3wJaOIewxKkmxAmOi7LdftPeNQjmIxffyX9ytCrVOTDsf2sIlgqF6HoJxJxqHlyJU968dRlZfzPtknEtri0SQSO3haD5XCjMFzIjNtkagqRIJMA5B_gizWRGZYCA6UfqSdwZ8vLcLHzP7QD68DtK7NutbHjrHuOrImz6RnKXd7WMNbh6fgCLnsK8msl_7kaAsDtLNAJywoQ-FVead2Ai-aqs21IEmhDsPhRrKj9RdBJduKK1atPdcAL_RJukRGhcJA-90HMeeNXeO6BGw-7jBq-RwPPouKylz8Ns-vxVYEln-Cr5Nu2q73zzb84W4XajtKLUDYmmXPj5VMcYMruZGjSdWddDOuZF09CgGjIwQSTGte73uZ8i9menh1_GTphh2j540uNzKNx652rgAu-KqpnunGwQldqtKnrEUxmrGDvFRGCarXdjtHa7SgXwG4ogbhb1PtR0WngM3c16pvIS5_jMrUMeGWkG7af0VgNC9LtvRk4TebGwrfqPXYFhdSnFa0o0FPtae6l2NcSCVKg8D5Q1W7Ct0uwJo2T_oCeFYr4X2mIxMPGwFyvnrGRpXV4O4pJ4xEVizTYnZQkJDgPaMTQqQw1UYM2lZARSvZ1dv6SPxFEzqQX95dWhzeXbHQ8jnGlUWQSfUGjsww7irlaVnCjRYayqE84fy7xLogxhdrSwEwNgcG2Oda878pTizv8aeQDFebe7f_r-27BlUXHp7qYTU5nuKP0zJaaLUWJ4mYVcO1hRilnENFgGvWKK5OB2dOIzoPTujTWyQdAOn8JzJAiEQ6tV4uFf15nOyfCjny76lw7sbBMDINZNmIeEYxg5zVBypmRgR1g.62_WWlY62MpoqZx3lUN40A",
          'refreshTokenKey' => 'AB11648962184W2ztyymBix5nVNeoIhBKSVvdWxQJ4hik5pINg',
          'QBORealmID'      => "4620816365207903540",
          'baseUrl'         => "development"
        ));

        $dataService->setLogLocation("/Users/bsivalingam/Desktop/newFolderForLog");


        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

        $accessToken = $OAuth2LoginHelper->refreshToken();
        $error = $OAuth2LoginHelper->getLastError();
        if ($error) {
            // echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
            // echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
            // echo "The Response message is: " . $error->getResponseBody() . "\n";
            // return;
            return 'hello';
        }
        $dataService->updateOAuth2Token($accessToken);


        $dataService->setLogLocation("/Users/bsivalingam/Desktop/newFolderForLog");

        // Iterate through all Accounts, even if it takes multiple pages
        $i = 1;
        while (1) {

          $ccp = new IPPCreditCardPaymentTxn();
          $ccp->TxnDate = "2021-12-22";

          $BankAccountRef = new IPPReferenceType();
          $BankAccountRef->value = "35";
          $BankAccountRef->name = "null";
          $ccp->BankAccountRef = $BankAccountRef;

          $CreditCardAccountRef = new IPPReferenceType();
          $CreditCardAccountRef->value = "41";
          $CreditCardAccountRef->name = "null";
          $ccp->CreditCardAccountRef = $CreditCardAccountRef;

          $ccp->Amount = 102;

          $result = $dataService->add($ccp);

          // return $result;

          // echo "\n Result id is: " .$result->Id . "\n \n";
          $error = $dataService->getLastError();
        if ($error) {
            // echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
            // echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
            // echo "The Response message is: " . $error->getResponseBody() . "\n";
            return $error;
        } else {
            // var_dump($result);
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            // echo "=========================================";
            return $result;
        }
          exit;  
        }*/
    


        /*$dataService = DataService::Configure(array(
          'auth_mode' => 'oauth2',
          'ClientID' => "ABwyAZdHUJJU6L2JD5GN4MgPmrmyN8OeUuo5yvWsmJCSs81kv5",
          'ClientSecret' => "r8EfARYvBX1JC752DWAltsIdlJVVmTLS1eP7L2rk",
          'RedirectURI' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
          'scope' => "com.intuit.quickbooks.accounting, com.intuit.quickbooks.payment, openid, profile, email, phone, address",
          'baseUrl' => "development"
        ));
        $dataService->setLogLocation("/Users/bsivalingam/Desktop/newFolderForLog");

        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
        $OAuth2LoginHelper->setLogForOAuthCalls(true, false, "/Users/bsivalingam/Desktop/newFolderForLog");

        $url = $OAuth2LoginHelper->getAuthorizationCodeURL();
        //It will return something like:https://b200efd8.ngrok.io/OAuth2_c/OAuth_2/OAuth2PHPExample.php?state=RandomState&code=Q0115106996168Bqap6xVrWS65f2iXDpsePOvB99moLCdcUwHq&realmId=193514538214074
        //get the Code and realmID, use for the exchangeAuthorizationCodeForToken
        $accessToken = $OAuth2LoginHelper->exchangeAuthorizationCodeForToken("AB11648962184W2ztyymBix5nVNeoIhBKSVvdWxQJ4hik5pINg", "4620816365207903540");
        $dataService->updateOAuth2Token($accessToken);
        $dataService->throwExceptionOnError(true);
        $CompanyInfo = $dataService->getCompanyInfo();
        $nameOfCompany = $CompanyInfo->CompanyName;
        // echo "Test for OAuth Complete. Company Name is {$nameOfCompany}. Returned response body:\n\n";
        $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($CompanyInfo, $somevalue);
        // echo $xmlBody . "\n";
        return response()->json( $xmlBody);*/

        $dataService = DataService::Configure(array(
          'auth_mode'       => 'oauth2',
          'ClientID'        => "ABwyAZdHUJJU6L2JD5GN4MgPmrmyN8OeUuo5yvWsmJCSs81kv5",
          'ClientSecret'    => "r8EfARYvBX1JC752DWAltsIdlJVVmTLS1eP7L2rk",
          'accessTokenKey'  => "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..t-viiem7EQHYr3tVyFacmQ.LBG8odMiWi7uvUkpYYVNz9IAvmT0cM1txS9KcZKGML1ewDploMcE9R-xCnfOHRqhgy6ohVumP-s4QIvwrSVjZtBmG9IkPkrT6ZNywseX_szVcgnjT1k5emh85U9T3ovRqtZeYScXKuojhaDmsQLwbLAdcwON2A6XDTIBLj662mCu6OZM2FPtjXlkcwXDcAneUYQW8JaL37-leEruXZqp7xlgzzReCYz-2WuViPaVpjQbmKRd14u4st1jqzC5mxpbcSK_tj3F8zdxFmMU1ckRyvhOAIpQP5WK9k9z5EpIENZk550LZuxr_gwQTgHzRZ1iULSyra2RFJ740pkcMtP3p1_aHIgbQWdX5s8-aMZt0jNwL-FcZpSjuOEHwRVD_FaUqARmI7SWxP8rZGS9I_dHxs2bI-XcVOsH9Dcs9wOas2scgsgO2LDHXiB8wKIr34wF3YehvNImsSZ0PNofUlp4LYMc46e2-FFmAsPNzFrQ7ajDnZ80f3TfGrrTVTBQIsLqhSYy03UBZHQK-dax4oa3uub6rUHb_sutQUFQOt2u15cWIhvbfpxpK71QRth6l_y2xTP5dfq4CTNvA3J7u5BxoMS4su8tAMH-eXkUdr5fTgcuDe70lHKhtLz3D6oDYnONi5LeGSwoO-yXY1lnkzLOlCogQhQnBLvqPWTPqFmCMFl-W2-y9_P_3MyGHKEuhxkO2OumIMLXjk5t1MMIUfJY7nxkgRhaNIETCdQ7IB2zey9oA2lHNFpswB_v4LDIq65MAoKW2VEpkyCHOEh2eAwhjDa9ShdJ5sgI4QSNyTPji3L-_4fBvv7aFdgJ1wHSGMFzFzBAx_2K_Hf66c0jiBxqmXGWIw-TPlk_esMtNTRPxHxpnX8_PnmS8T2d_jKDu5KB5GlW_Hg1_psckX3toQlglQ.N3JZD2DHhCd-BOTJCG42Yg",
          'refreshTokenKey' => 'AB11648962184W2ztyymBix5nVNeoIhBKSVvdWxQJ4hik5pINg',
          'QBORealmID'      => "4620816365207903540",
          'baseUrl'         => "development"
        ));

        $dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");


        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

        $accessToken = $OAuth2LoginHelper->refreshToken();
        
        $error = $OAuth2LoginHelper->getLastError();
        if ($error != null) {
            echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
            echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
            echo "The Response message is: " . $error->getResponseBody() . "\n";
            return;
        }
        $dataService->updateOAuth2Token($accessToken);

        $dateTime = new \DateTime('NOW');
        $Item = Item::create([
              "Name" => "Office Supplies3",
              "Description" => "This is the sales description.",
              "Active" => true,
              "FullyQualifiedName" => "Office Supplies",
              "Taxable" => true,
              "UnitPrice" => 25,
              "Type" => "Inventory",
              "IncomeAccountRef"=> [
                "value"=> 208,
                "name" => "Sales of Product Income"
              ],
              "PurchaseDesc"=> "This is the purchasing description.",
              "PurchaseCost"=> 35,
              "ExpenseAccountRef"=> [
                "value"=> 209,
                "name"=> "Cost of Goods Sold"
              ],
              "AssetAccountRef"=> [
                "value"=> 210,
                "name"=> "Other Current Asset"
              ],
              "TrackQtyOnHand" => true,
              "QtyOnHand"=> 100,
              "InvStartDate"=> $dateTime
        ]);


        $resultingObj = $dataService->Add($Item);
        // return $resultingObj;
        $error = $dataService->getLastError();
        if ($error) {
            // echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
            // echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
            // echo "The Response message is: " . $error->getResponseBody() . "\n";
            // return $error;
            return response()->json($error->getResponseBody());
            // return response()->json($error);
        }
        else {
            // echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
            $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
            // echo $xmlBody . "\n";
            // return $xmlBody;
            // return response()->json($xmlBody);
            return response()->json($xmlBody);
        }
    }
}
