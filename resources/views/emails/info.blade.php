<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />

    <style>
        /* Reset styles */
        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            width: 100% !important;
            height: 100% !important;
        }

        body,
        table,
        td,
        div,
        p,
        a {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse !important;
            border-spacing: 0;
        }

        img {
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        /* Extra floater space for advanced mail clients only */
        @media all and (max-width: 600px) {
            .floater {
                width: 320px;
            }
        }

        /* Set color for auto links (addresses, dates, etc.) */
        a,
        a:hover {
            color: #127DB3;
        }

        .footer a,
        .footer a:hover {
            color: #999999;
        }
    </style>

    <!-- MESSAGE SUBJECT -->
    <title>Get this responsive email template</title>

</head>

<!-- BODY -->
<!-- Set message background color (twice) and text color (twice) -->

<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%"
    style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #FFFFFF;
	color: #000000;"
    bgcolor="#FFFFFF" text="#000000">

    <!-- SECTION / BACKGROUND -->
    <!-- Set section background color -->
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0"
        style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
        <tr>
            <td align="center" valign="top"
                style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#127DB3">

                <!-- WRAPPER -->
                <!-- Set wrapper width (twice) -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="600"
                    style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 600px;"
                    class="wrapper">

                    <!-- HEADER -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
			padding-top: 20px;
			color: #FFFFFF;
			font-family: sans-serif;"
                            class="header">
                            Hi {{ $info['firstname'] }}
                        </td>
                    </tr>

                    <!-- SUBHEADER -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
			padding-top: 5px;
			color: #FFFFFF;
			font-family: sans-serif;"
                            class="subheader">
                            These are your information
                        </td>
                    </tr>

                    <!-- PARAGRAPH -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 25px;
			color: #FFFFFF;
			font-family: sans-serif;"
                            class="paragraph">
                            <table>
                                <tr>
                                    <td align="right" style="padding:5px 10px;">First Name: </td>
                                    <td style="padding:5px 10px;">{{ $info['firstname'] }}</td>
                                </tr>
                                <tr>
                                    <td align="right" style="padding:5px 10px;">Last Name: </td>
                                    <td style="padding:5px 10px;">{{ $info['lastname'] }}</td>
                                </tr>
                                <tr>
                                    <td align="right" style="padding:5px 10px;">Email: </td>
                                    <td style="padding:5px 10px;">{{ $info['email'] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- PARAGRAPH -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
			padding-top: 25px;
			color: #FFFFFF;
			font-family: sans-serif;"
                            class="paragraph">
                            {{ $info['description'] }}
                        </td>
                    </tr>

                    <!-- FLOATERS -->
                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 10px; padding-right: 10px;"
                            class="floaters">
                            @foreach ($info['images'] as $image)
                            <table width="280" border="0" cellpadding="0" cellspacing="0" align="left"
                                valign="top"
                                style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0; margin: 0; padding: 0; display: inline-table; float: none;"
                                class="floater">
                                <tr>
                                    <td align="center" valign="top"
                                        style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 15px; padding-right: 15px; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 30px;
            font-family: sans-serif;
            color: #000000;">
                                        <a target="_blank"
                                            style="text-decoration: none;
            font-size: 17px; line-height: 160%;"
                                            href="#"><img border="0" vspace="0" hspace="0"
                                                src="{{ $message->embed($image) }}"
                                                width="250" height="142" alt="Image" title="Image"
                                                style="
            color: #000000; font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block; margin-bottom: 8px; object-fit: contain;" />

                                    </td>
                                </tr>
                            </table>
                            @endforeach

                        </td>
                    </tr>

                    <tr>
                        <td align="center" valign="top"
                            style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 30px;
			padding-bottom: 35px;">
                        </td>
                    </tr>
                    <!-- End of WRAPPER -->
                </table>
            </td>
        </tr>
    </table>

</body>

</html>
