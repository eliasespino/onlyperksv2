<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
    <head>
        <meta charset="utf-8">
		<meta name="x-apple-disable-message-reformatting" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
        <title>Email</title>
		
		<!-- Web Font / @font-face : BEGIN -->
		<!-- NOTE: If web fonts are not required, lines 10 - 27 can be safely removed. -->

		<!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
		<!--[if mso]>
			<style>
				* {
					font-family: sans-serif !important;
				}
			</style>
		<![endif]-->

		<!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
		<!--[if !mso]><!-->
		<!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<!--<![endif]-->

		<!-- Web Font / @font-face : END -->
		
		<!-- CSS Reset : BEGIN -->
        <style>
            /* Reset styles */
			/* What it does: Remove spaces around the email design added by some email clients. */
			/* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
			html,
			body {
				margin: 0 auto !important;
				padding: 0 !important;
				height: 100% !important;
				width: 100% !important;
			}

			/* What it does: Stops email clients resizing small text. */
			/* What it does: Font stack */
			* {
				-ms-text-size-adjust: 100%;
				-webkit-text-size-adjust: 100%;
				font-family: 'Open Sans', 'Roboto', 'Segoe UI', Arial, sans-serif;
			}
			
			/* What it does: Centers email on Android 4.4 */
			div[style*="margin: 16px 0"] {
				margin: 0 !important;
			}
			
			/* What it does: forces Samsung Android mail clients to use the entire viewport */
			#MessageViewBody,
			#MessageWebViewDiv {
				width: 100% !important;
			}
			
            .ReadMsgBody {
                width: 100%; background-color: #ffffff;
            }
            
            .ExternalClass {
                width: 100%; background-color: #ffffff;
            }
            
            .ExternalClass,
			.ExternalClass p,
			.ExternalClass span,
			.ExternalClass font,
			.ExternalClass td,
			.ExternalClass div {
                line-height:100%;
            }
			
			/* What it does: Stops Outlook from adding extra spacing to tables. */
			table,
			td {
				mso-table-lspace: 0pt !important;
				mso-table-rspace: 0pt !important;
			}

			/* What it does: Replaces default bold style. */
			th {
				font-weight: normal;
			}
            
            /* What it does: Fixes webkit padding issue. */
			table {
				border-spacing: 0 !important;
				border-collapse: collapse !important;
				table-layout: fixed !important;
				margin: 0 auto !important;
			}
            
            table td {
                border-spacing: 0 !important;
                border-collapse: collapse !important;
            }
            
            .yshortcuts a {
                border-bottom: none !important;
            }
			
			/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
			a,
			body.footer a,
			a:visited {
				text-decoration: none;
				color: #5FB0E4 !important;
				background: transparent;
				border-bottom: 0 !important;
				cursor: pointer !important;
				text-decoration: none !important;
				font-family: inherit !important;
				line-height: inherit !important;
			}
			
			/* What it does: Uses a better rendering method when resizing images in IE. */
			img {
				-ms-interpolation-mode:bicubic;
			}
            
            img {
                border: 0;
				height: auto;
				line-height: 100%;
				outline: none;
				text-decoration: none;
            }
			
			/* What it does: A work-around for email clients meddling in triggered links. */
			a[x-apple-data-detectors],  /* iOS */
			.unstyle-auto-detected-links a,
			.aBn,
			h1>a {
				border-bottom: 0 !important;
				cursor: pointer !important;
				color: inherit !important;
				text-decoration: none !important;
				font-size: inherit !important;
				font-family: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
			}
            
            /* What it does: Prevents Gmail from changing the text color in conversation threads. */
			.im {
				color: inherit !important;
			}

			/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
			.a6S {
			   display: none !important;
			   opacity: 0.01 !important;
			}
			/* If the above doesn't work, add a .g-img class to any image in question. */
			img.g-img + div {
			   display: none !important;
			}

			/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
			/* Create one of these media queries for each additional viewport size you'd like to fix */

			/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
			@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
				u ~ div .email-container {
					min-width: 320px !important;
				}
			}
			/* iPhone 6, 6S, 7, 8, and X */
			@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
				u ~ div .email-container {
					min-width: 375px !important;
				}
			}
			/* iPhone 6+, 7+, and 8+ */
			@media only screen and (min-device-width: 414px) {
				u ~ div .email-container {
					min-width: 414px !important;
				}
			}
			
			.bordered {
				border-radius: 10px;
			}
			
			.hidden-md {
				display: none !important;
			}
			
			.visible-md {
				display: block !important;
			}
        
            /* Responsive styles */
            @media screen and (max-width: 600px) {
                .full-width {
                    width: 100% !important;
                }
                
                .stack-column-top {
                    display: block !important;
                    width: 100% !important;
                    padding-bottom: 20px !important;
                }
                
                .stack-column-bottom {
                    display: block !important;
                    width: 100% !important;
                }
                
                .hidden-xs {
                    display: none !important;
                }
				
				.visible-xs {
                    display: block !important;
                }
				
				.text-xs-center {
					text-align: center !important;
				}
				
				.no-lateral-pad {
					padding-right: 0!important;
					padding-left: 0!important;
				}
				
				.no-padding-top {
					padding-top: 0!important;
				}
				
				.no-padding-bottom {
					padding-bottom: 0!important;
				}
				
				.bordered {
					border-radius: 0;
				}
            }
        </style>
		
		<!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
		<!--[if gte mso 9]>
		<xml>
			<o:OfficeDocumentSettings>
				<o:AllowPNG/>
				<o:PixelsPerInch>96</o:PixelsPerInch>
			</o:OfficeDocumentSettings>
		</xml>
		<![endif]-->

		<!-- CSS Reset : END -->
    </head>
	
	<!--
		The email background color (#f5f5f5) is defined in three places:
		1. body tag: for most email clients
		2. center tag: for Gmail and Inbox mobile apps and web versions of Gmail, GSuite, Inbox, Yahoo, AOL, Libero, Comcast, freenet, Mail.ru, Orange.fr
		3. mso conditional: For Windows 10 Mail
	-->
	<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f5f5;" id="body">
		<center style="width: 100%; background-color: #f5f5f5;">
		<!--[if mso | IE]>
		<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f5f5f5;">
		<tr>
		<td>
		<![endif]-->
			<!-- Email Body : BEGIN -->
			<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;" class="full-width main">
				<!-- Email Header : BEGIN -->
				<tr>
					<td style="text-align: center;" valign="middle">
						<img src="cid:<?php echo $cid;?>" style="display: block; max-width: 600px;" width="600" border="0" class="full-width" alt="">
					</td>
				</tr>
				<!-- Email Header : END -->
				<!-- Email Inner Body : BEGIN -->
				<tr>
					<td bgcolor="#ffffff" style="padding-top: 40px; padding-bottom: 40px; padding-right: 40px; padding-left: 40px;  background-color: #ffffff;">
						<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;" class="full-width">
	<!-- 1 Column Text : BEGIN -->
	<tr>
		<td style="padding-bottom: 40px; font-family: 'Open Sans', 'Roboto', 'Segoe UI', Arial, sans-serif; text-align: center" class="text-xs-center">
			<h3 style="margin: 0; font-size: 18px; line-height: 30px; color: #696969; font-weight: 300; white-space: normal; word-break: break-word;">
			<?php echo $name;?>
			</h3>
		</td>
	</tr>
	<!-- 1 Column Text : END -->
	<!-- 1 Column Text : BEGIN -->
	<tr>
		<td style="padding-bottom: 40px; font-family: 'Open Sans', 'Roboto', 'Segoe UI', Arial, sans-serif; text-align: center;" class="text-xs-center">
			<h1 style="margin: 0 0 30px; font-size: 24px; line-height: 40px; color: #4b4b4b; font-weight: 700; white-space: normal; word-break: break-word;">Reset Password</h1>
			<p style="margin: 0; font-size: 14px; line-height: 24px; color: #696969; font-weight: 300;">Click on the button below, enter your new password twice and press "Save". The system will then redirect you into the platform.</p>
		</td>
	</tr>
	<!-- 1 Column Text : END -->
	<!-- Button : BEGIN -->
	<tr>
		<td>
			<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td align="center">
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="center" style="border-radius: 6px; font-family: 'Open Sans', 'Roboto', 'Segoe UI', Arial, sans-serif;" bgcolor="#ff7a06" valign="middle">
									<a href="<?php echo $url; ?>" target="_blank" style="font-size: 14px; line-height: 24px; font-weight: bold; color: #ffffff !important; text-decoration: none; border-radius: 6px; padding: 10px; border: 2px solid #ff7a06; display: inline-block; white-space: normal; word-break: break-word;">Click here to reset the password</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<!-- Button : END -->
</table>
					</td>
				</tr>
				<!-- Email Inner Body : END -->
				<!-- 1 Column Text : BEGIN -->
				<tr>
					<td style="background-color: #f5f5f5; padding-top: 40px; padding-bottom: 40px;" class="footer">
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td style="padding-left: 20px; padding-right: 20px; padding-bottom: 40px; font-family: 'Open Sans', 'Roboto', 'Segoe UI', Arial, sans-serif; font-size: 12px; text-align: center; line-height: 20px; color: #666666;">
								
								</td>
							</tr>
							<tr>
								<td style="padding-left: 20px; padding-right: 20px; font-family: 'Open Sans', 'Roboto', 'Segoe UI', Arial, sans-serif; font-size: 12px; text-align: center; line-height: 20px; color: #666666;">
									
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<!-- 1 Column Text : END -->
			</table>
		<!--[if mso | IE]>
		</td>
		</tr>
		</table>
		<![endif]-->
		</center>
    </body>
</html>