<?php

//use Illuminate\Support\Facades\DB
use Illuminate\Database\Seeder;

class ApptranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		        \DB::connection('translationsDB')->table('apptranslatecontent')->insert([
				                    'menu_template_id'=>'apperror',
				                    'languageID'=>1,
				                    'menu_text'=>'Sorry, request error occurred while connecting.Try again later.'
				                ]);
		        \DB::connection('translationsDB')->table('apptranslatecontent')->insert([
				                    'menu_template_id'=>'servererror',
				                    'languageID'=>1,
				                    'menu_text'=>'Sorry, the service is temporarily unavailable'
				                ]);
		        \DB::connection('translationsDB')->table('apptranslatecontent')->insert([
				                    'menu_template_id'=>'unknownerror',
				                    'languageID'=>1,
				                    'menu_text'=>'Sorry, Incorrect PIN'
				                ]);

         		\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error53' , 'languageID'=>1, 'menu_text'=>"Sorry, PIN is empty"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error54' , 'languageID'=>1, 'menu_text'=>"Sorry, PIN character length must be"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error55' , 'languageID'=>1, 'menu_text'=>"Sorry, PIN must be numeric"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error56' , 'languageID'=>1, 'menu_text'=>"Sorry, phone number is empty"]);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert([
				'menu_template_id'=> 'error57' , 'languageID'=>1, 'menu_text'=>"Sorry, phone number length must be 10"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error58' , 'languageID'=>1, 'menu_text'=>"Sorry, phone number length must be 10"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error59' , 'languageID'=>1, 'menu_text'=>"Sorry, phone number must start with 07"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error60' , 'languageID'=>1, 'menu_text'=>"Sorry, phone number must be numeric"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error61' , 'languageID'=>1, 'menu_text'=>"Sorry, Confirm PIN is empty"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error62' , 'languageID'=>1, 'menu_text'=>"Sorry, PIN and Confirm PIN do not match"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error63' , 'languageID'=>1, 'menu_text'=>"Sorry, you cannot participate in this transaction as payee."]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error64' , 'languageID'=>1, 'menu_text'=>"Please enter amount"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error65' , 'languageID'=>1, 'menu_text'=>"Sorry, amount must be numeric"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error66' , 'languageID'=>1, 'menu_text'=>"Please enter agent number"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error67' , 'languageID'=>1, 'menu_text'=>"Sorry, minimum agent number length is"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error68' , 'languageID'=>1, 'menu_text'=>"Sorry, maximum agent number length is"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error69' , 'languageID'=>1, 'menu_text'=>"Sorry,agent number must be numeric"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error70' , 'languageID'=>1, 'menu_text'=>"Please enter biller number"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error71' , 'languageID'=>1, 'menu_text'=>"Sorry, biller number length must be"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error72' , 'languageID'=>1, 'menu_text'=>"Sorry, biller number must be numeric"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error73' , 'languageID'=>1, 'menu_text'=>"Please enter biller account number"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error74' , 'languageID'=>1, 'menu_text'=>"Please enter number of months"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error75' , 'languageID'=>1, 'menu_text'=>"Sorry, no. of months must not be less than"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error76' , 'languageID'=>1, 'menu_text'=>"Sorry, no. of months must not be more than"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error77' , 'languageID'=>1, 'menu_text'=>"Sorry, no. of months must be numeric"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error78' , 'languageID'=>1, 'menu_text'=>"Please enter your current PIN"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error79' , 'languageID'=>1, 'menu_text'=>"Please enter your new PIN"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error80' , 'languageID'=>1, 'menu_text'=>"Please confirm your new PIN"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error81' , 'languageID'=>1, 'menu_text'=>"New PIN and confirm new PIN fields do not match"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error82' , 'languageID'=>1, 'menu_text'=>"Please select new language"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error83' , 'languageID'=>1, 'menu_text'=>"Logged out successfully"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error84' , 'languageID'=>1, 'menu_text'=>"Please enter customer's first name"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error85' , 'languageID'=>1, 'menu_text'=>"Please enter customer's last name"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error86' , 'languageID'=>1, 'menu_text'=>"Please enter customer's middle name"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error87' , 'languageID'=>1, 'menu_text'=>"Please enter customer's ID number"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error88' , 'languageID'=>1, 'menu_text'=>"Sorry, ID number must be numeric"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error89' , 'languageID'=>1, 'menu_text'=>"Please enter customer's preferred username"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error90' , 'languageID'=>1, 'menu_text'=>"Please enter customer's email address"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error91' , 'languageID'=>1, 'menu_text'=>"Please enter a valid email address"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error92' , 'languageID'=>1, 'menu_text'=>"Please select customer's preferred language"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error93' , 'languageID'=>1, 'menu_text'=>"Please select county"]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error87' , 'languageID'=>1, 'menu_text'=>"Please enter customer's ID number"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error88' , 'languageID'=>1, 'menu_text'=>"Sorry, ID number must be numeric"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error189' , 'languageID'=>1, 'menu_text'=>"We are currently experiencing some technical issues. We shall advice once the issue is resolved."]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error190' , 'languageID'=>1, 'menu_text'=>"Sorry, Invalid ID Number."]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error191' , 'languageID'=>1, 'menu_text'=>"Error while validating ID number"]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error192' , 'languageID'=>1, 'menu_text'=>"Please verify your phone number..."]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error193' , 'languageID'=>1, 'menu_text'=>"Phone number is not activated"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error194' , 'languageID'=>1, 'menu_text'=>"Error occurred while verifying phone number"]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'level236' , 'languageID'=>1, 'menu_text'=>"Phone verification was successful"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error195' , 'languageID'=>1, 'menu_text'=>"Select disbursement excel file"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error196' , 'languageID'=>1, 'menu_text'=>"Invalid disbursement file, select excel file."]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error197' , 'languageID'=>1, 'menu_text'=>"Sorry, disbursement title is empty"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error198' , 'languageID'=>1, 'menu_text'=>"Disbursement error, check file and data format"]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error199' , 'languageID'=>1, 'menu_text'=>"Sorry, error occurred while cancelling disbursement"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error200' , 'languageID'=>1, 'menu_text'=>"Sorry, error occurred while disbursing"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error201' , 'languageID'=>1, 'menu_text'=>"Sorry, you have insufficient balance"]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error202' , 'languageID'=>1, 'menu_text'=>"Please enter till number"]);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error203' , 'languageID'=>1, 'menu_text'=>"Sorry, till number must be 6 characters"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'error204' , 'languageID'=>1, 'menu_text'=>"Sorry, till number must be numeric"]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'level237' , 'languageID'=>1, 'menu_text'=>"Your disbursement was successfully"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'level238' , 'languageID'=>1, 'menu_text'=>"Disbursement was cancelled successfully"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'level239' , 'languageID'=>1, 'menu_text'=>"Identification was successful"]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'appname' , 'languageID'=>1, 'menu_text'=>"Bweza"]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'appdescription' , 'languageID'=>1, 'menu_text'=>"Bweza is a mobile money service that leverages the convenience and mobility of the mobile handset. With Bweza, you have increased access to your finances, anytime, anywhere."]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'filetouploadtitle' , 'languageID'=>1, 'menu_text'=>"Uploading..."]);


				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=> 'errorinternet' , 'languageID'=>1, 'menu_text'=>"Please put data connection on"]);
					//Start Constants
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id' => 'bwezaversiontext', 'languageID'=>1,'menu_text'=>'English Demo Version']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezawaittext', 'languageID' =>1, 'menu_text'=> 'Please wait...']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezacaretext', 'languageID' =>1, 'menu_text'=> 'For help, please visit the nearest Pesatel Agent or call +254 020 2325599']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezathanktext', 'languageID' =>1, 'menu_text'=> 'Thank you for your interest in our service!']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezapin', 'languageID' =>1, 'menu_text'=> 'Enter PIN']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezaphonenumber = 07..Enter Phone Number']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezaamount', 'languageID' =>1, 'menu_text'=> 'Enter Amount (Ksh.)']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezaagentnumber', 'languageID' =>1, 'menu_text'=> 'Enter Agent Number']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezabillernumber', 'languageID' =>1, 'menu_text'=> 'Enter Biller Number']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezareferencenumbe', 'languageID' =>1, 'menu_text'=> ' Enter Reference Number']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatillnumber', 'languageID' =>1, 'menu_text'=> 'Enter Till Number']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezanomonths', 'languageID' =>1, 'menu_text'=> 'Number of Months']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezacurrentpin', 'languageID' =>1, 'menu_text'=> 'Enter Current PIN']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezanewpin', 'languageID' =>1, 'menu_text'=> 'Enter New PIN']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezaconfirmpin','languageID'=>1, 'menu_text'=> 'Re-Enter New PIN']);
				
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezaidnumber','languageID'=>1, 'menu_text'=> 'Enter ID Number']);
			//End constants
			    \DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezacontinuetext','languageID'=>1,'menu_text' => 'Continue']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatellfriend','languageID'=>1,'menu_text' => 'Tell a friend']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext1','languageID'=>1,'menu_text' => 'Login']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext2','languageID'=>1,'menu_text' => 'Create Account?']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext3','languageID'=>1,'menu_text' => 'Forgot Pin?']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext4','languageID'=>1,'menu_text' => 'Set PIN']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext5','languageID'=>1,'menu_text' => 'Set PIN']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext6','languageID'=>1,'menu_text' => 'Creat New Account!']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext7','languageID'=>1,'menu_text' => 'Create Account']);
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext9','languageID'=>1,'menu_text' => 'Activate Account!']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext10','languageID'=>1,'menu_text' => 'Yes']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext11','languageID'=>1,'menu_text' => 'No']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext12','languageID'=>1,'menu_text' => 'Close']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext13','languageID'=>1,'menu_text' => 'Identification']);
				
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext15','languageID'=>1,'menu_text' => 'Verification']);
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext17','languageID'=>1,'menu_text' => 'Registration!']);
			
				
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext25','languageID'=>1,'menu_text' => 'Send Money']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext26','languageID'=>1,'menu_text' => 'Withdraw Cash']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext27','languageID'=>1,'menu_text' => 'Buy Airtime']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext28','languageID'=>1,'menu_text' => 'Payments']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext29','languageID'=>1,'menu_text' => 'View Balance']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext30','languageID'=>1,'menu_text' => 'My Account']);
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext39','languageID'=>1,'menu_text' => 'Airtime Services']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext40','languageID'=>1,'menu_text' => 'Airtime for Self']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext41','languageID'=>1,'menu_text' => 'Buy airtime for yourself']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext42','languageID'=>1,'menu_text' => 'Airtime for Other']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext43','languageID'=>1,'menu_text' => 'Buy airtime for someone']);
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext45','languageID'=>1,'menu_text' => 'PayBill']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext46','languageID'=>1,'menu_text' => 'Pay a Bill']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext47','languageID'=>1,'menu_text' => 'Buy Goods and Services']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext48','languageID'=>1,'menu_text' => 'Pay for Goods and Services']);
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext50','languageID'=>1,'menu_text' => 'Account Balance']);
				
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext52','languageID'=>1,'menu_text' => 'Manage Account']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext53','languageID'=>1,'menu_text' => 'Mini Statement']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext54','languageID'=>1,'menu_text' => 'Transactions History']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext55','languageID'=>1,'menu_text' => 'Full Statement']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext56','languageID'=>1,'menu_text' => 'Get Full Statement']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext57','languageID'=>1,'menu_text' => 'Change PIN']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext58','languageID'=>1,'menu_text' => 'Change Account PIN']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext59','languageID'=>1,'menu_text' => 'Change Language']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext60','languageID'=>1,'menu_text' => 'Change Service Language']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext61','languageID'=>1,'menu_text' => 'Transfer Float']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext62','languageID'=>1,'menu_text' => 'Sell Airtime']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext63','languageID'=>1,'menu_text' => 'Register Customer']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext64','languageID'=>1,'menu_text' => 'Consumer Deposit']);
			
					
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext72','languageID'=>1,'menu_text' => 'Send to Agent']);
				
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext75','languageID'=>1,'menu_text' => 'Sell Airtime to Customer']);
			
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext78','languageID'=>1,'menu_text' => 'Step 1']);
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext80','languageID'=>1,'menu_text' => 'Step 2']);
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext82','languageID'=>1,'menu_text' => 'Step 3']);
			
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext84','languageID'=>1,'menu_text' => 'Deposit to Customer']);
			
					
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext105','languageID'=>1,'menu_text' => 'Customer Services']);
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext106','languageID'=>1,'menu_text' => 'Agent Services']);
						
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezatext112','languageID'=>1,'menu_text' => 'Biller Services']);
			
				
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezasetremypin' ,'menu_text'=>'Re-Enter PIN' ,'languageID'=>1]);
				
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezafirstname','menu_text'=>'Enter First Name','languageID'=>1]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezamiddlename','menu_text'=>'Enter Middle Name','languageID'=>1]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezalastname','menu_text'=>'Enter Last Name','languageID'=>1]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezausername','menu_text'=>'Enter Username','languageID'=>1]);

				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'bwezaemailaddress','menu_text'=>'Enter Email Address','languageID'=>1]);
				
				\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'error721' ,'menu_text'=> "Sorry, minimum amount is",'languageID'=>1]);

	  			\DB::connection('translationsDB')->table('apptranslatecontent')->insert(['menu_template_id'=>'error722' ,'menu_text'=> "Sorry, maximum amount is",'languageID'=>1]);

   

		  
   
   
    }
}
