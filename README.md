# class.truewallet.php

$wallet = new TrueWallet('YOUR EMAIL','YOUR PASSWORD');


<h3>Login GetToken</h3>
<pre>
echo $wallet->GetToken();
</pre>
<h4>Response Success</h4>
<pre>
{
	"code": "20000",
	"namespace": "TMN-PRODUCT",
	"titleTh": "",
	"titleEn": "",
	"messageTh": "คุณสามารถเช็ครายการย้อนหลัง\nได้ที่เมนูประวัติการทำรายการ\n[APR-20000]",
	"messageEn": "คุณสามารถเช็ครายการย้อนหลัง\nได้ที่เมนูประวัติการทำรายการ\n[APR-20000]",
	"originalMessage": "",
	"developerMessage": "",
	"data": {
		"addressList": [

		],
		"occupation": "",
		"accessToken": "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx",
		"profileImageStatus": "",
		"tmnId": "",
		"lastnameEn": "",
		"currentBalance": "",
		"thaiId": "",
		"firstnameEn": ,
		"kycVerifyStatus": "",
		"hasPin": "",
		"title": "",
		"profileType": "",
		"forceKyc": "",
		"email": "",
		"birthdate": "",
		"mobileNumber": "",
		"hasPassword": "",
		"fullname": "",
		"imageURL": ""
	}
}
</pre>
<hr>
<h3>Get Profile</h3>
<pre>
$token = json_decode($wallet->GetToken(),true)['data']['accessToken']; 
echo $wallet->Profile($token);
</pre>
<h4>Response Success</h4>
<pre>
{
	"code": "20000",
	"namespace": "TMN-PRODUCT",
	"titleTh": "",
	"titleEn": "",
	"messageTh": "คุณสามารถเช็ครายการย้อนหลัง\nได้ที่เมนูประวัติการทำรายการ\n[APR-20000]",
	"messageEn": "คุณสามารถเช็ครายการย้อนหลัง\nได้ที่เมนูประวัติการทำรายการ\n[APR-20000]",
	"originalMessage": "",
	"developerMessage": "",
	"data": {
		"addressList": [],
		"occupation": "",
		"profileImageStatus": "",
		"tmnId": "",
		"lastnameEn": "",
		"currentBalance": "",
		"thaiId": "",
		"firstnameEn": "",
		"kycVerifyStatus": "",
		"hasPin": "",
		"title": "",
		"profileType": "",
		"forceKyc": ,
		"email": "",
		"birthdate": "",
		"mobileNumber": "",
		"hasPassword": "",
		"fullname": "",
		"imageURL": ""
	}
}
</pre>
<hr>
<h3>Topup</h3>
<pre>
$wallet = new TrueWallet('YOUR EMAIL','YOUR PASSWORD');
$token = json_decode($wallet->GetToken(),true)['data']['accessToken']; 
echo $wallet->Topup('เลขบบัตรทรูมั่นนี่',$token);
</pre>
<h4>Response Success</h4>
<pre>
{
	"amount": "",
	"serviceFee": "",
	"cashcardPin": "",
	"createDate": "",
	"sourceFee": "",
	"totalAmount": "",
	"transactionId": "",
	"remainingBalance": ""
}
</pre>
<hr>