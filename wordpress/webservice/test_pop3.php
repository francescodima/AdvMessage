<?php
/*
 * test_pop3.php
 *
 * @(#) $Header: /opt2/ena/metal/pop3/test_pop3.php,v 1.7 2006/06/11 14:52:09 mlemos Exp $
 *
 */

?><HTML>
<HEAD>
<TITLE>Test for Manuel Lemos's PHP POP3 class</TITLE>
</HEAD>
<BODY>
<?php

	require("pop3.php");
	require_once('connessione.php');

  /* Uncomment when using SASL authentication mechanisms */
	/*
	require("sasl.php");
	*/

	$pop3=new pop3_class;
	$pop3->hostname="pop.gmail.com";             /* POP 3 server host name                      */
	$pop3->port=995;                         /* POP 3 server host port,
	                                            usually 110 but some servers use other ports
	                                            Gmail uses 995                              */
	$pop3->tls=1;                            /* Establish secure connections using TLS      */
	$user="webdevelopernola@gmail.com";                        /* Authentication user name                    */
	$password="Pubblicitario2015";                    /* Authentication password                     */
	$pop3->realm="";                         /* Authentication realm or domain              */
	$pop3->workstation="";                   /* Workstation for NTLM authentication         */
	$apop=0;                                 /* Use APOP authentication                     */
	$pop3->authentication_mechanism="USER";  /* SASL authentication mechanism               */
	$pop3->debug=0;                          /* Output debug information                    */
	$pop3->html_debug=0;                     /* Debug information is in HTML                */
	$pop3->join_continuation_header_lines=1; /* Concatenate headers split in multiple lines */

	if(($error=$pop3->Open())=="")
	{
		// echo "<PRE>Connected to the POP3 server &quot;".$pop3->hostname."&quot;.</PRE>\n";
		if(($error=$pop3->Login($user,$password,$apop))=="")
		{
			// echo "<PRE>User &quot;$user&quot; logged in.</PRE>\n";
			if(($error=$pop3->Statistics($messages,$size))=="")
			{
				// echo "<PRE>There are $messages messages in the mail box with a total of $size bytes.</PRE>\n";
				$result=$pop3->ListMessages("",0);
				if(GetType($result)=="array")
				{
					// for(Reset($result),$message=0;$message<count($result);Next($result),$message++)
					// 	echo "<PRE>Message ",Key($result)," - ",$result[Key($result)]," bytes.</PRE>\n";
					$result=$pop3->ListMessages("",1);
					if(GetType($result)=="array")
					{
						// for(Reset($result),$message=0;$message<count($result);Next($result),$message++)
						// 	echo "<PRE>Message ",Key($result),", Unique ID - \"",$result[Key($result)],"\"</PRE>\n";
						if($messages>0)
						{

						

						for ($i=count($result); $i > 0 ; $i--) { 
						
							if(($error=$pop3->RetrieveMessage($i,$headers,$body,2))=="")
							{
								$oggetto = null;
								for($line=0;$line<count($headers);$line++){
									//controllo se nella riga è presente subject:
									if (strstr($headers[$line], "Subject:")) {
										$oggetto = HtmlSpecialChars($headers[$line]);
										break;
									}
								}

								if($oggetto){
									//rimuovo la parola subject:
									$oggetto = str_replace("Subject:", "", $oggetto);

									//inserisco nel db		
									$sql = "INSERT INTO `pubblicitario_db`.`msgm_list` (`id`, `moderato`, `data_pubb`, `testo_mess`) VALUES (NULL, '0', NULL, '$oggetto');";
									$result = $connessione->query($sql);
									
									//echo "<br /><br />Inserisco: ".$oggetto;
									
									if(($error=$pop3->DeleteMessage($i))=="")
									{
										//echo "<br />Cancello: ".$oggetto;
									}
									
									
								}
							}

						}




						}
						if($error==""
						&& ($error=$pop3->Close())=="")
							echo "";
						
					}
					else
						$error=$result;
				}
				else
					$error=$result;
			}
		}
	}
	if($error!="")
		echo "<H2>Error: ",HtmlSpecialChars($error),"</H2>";
?>

</BODY>
</HTML>
