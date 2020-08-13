<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
    <title>Welcome to Recipe Portal</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,100%,700&display=swap");

        @media only screen and (max-width:600px) {
            td[class=head-title] {
                font-size: 24px !important;
                padding-bottom: 10px !important;
                line-height: 32px !important;
            }

            div[class=mb_View] {
                width: 96% !important;
                padding-left: 2%;
                padding-right: 2%;
            }
        }

        @media only screen and (max-width:480px) {
            td[class=head-title] {
                font-size: 18px !important;
            }

            img[class=logo_img] {
                width: 200px !important;
            }
        }

    </style>
</head>

<body style="margin:0; padding:0; font-family: 'Montserrat', sans-serif !important; color:#333;" bgcolor="#f4f4f4">
    <table align="center" cellpadding="0" cellspacing="0" border="0" style="margin-top: 21px; margin-bottom: 20px;">
        <tr>
            <td>
                <div class="mb_View" style="background-color: #f4f4f4 !important; max-width:600px; margin: 0 auto;">
                    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td>
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="logo_block" bgcolor=""
                                            style="padding-top:25px; padding-bottom:25px; text-align: center; background-color: #ffffff;">
                                            <a href="{{ URL::to('/home') }}" target="_blank" target="_blank">
                                                <img src="<?= URL::to('/logo.png') ?>" width="193px" class="logo_img"
                                                    alt="Logo">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" cellpadding="0" cellspacing="0" align="center" bgcolor="#fff">

                                    @yield('content')

                                    <tr>
                                        <td style="padding-top:10px; padding-bottom:10px;">
                                            <div class="cstm-seprator"
                                                 style="margin: 5px 0; border-bottom: 1px solid #E7E7E7;"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top:10px; padding-bottom:5px; color:#000000; font-size:20px; text-align:center; font-family: 'Montserrat', sans-serif !important;">
                                            <img border="0" style="width:190px;" src="{{ URL::to('/email/need-help.png') }}"
                                                 alt="Need some help">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top:10px; padding-bottom:25px; font-family:'Montserrat', sans-serif !important; text-align:center; color:#000000; font-size:15px; line-height:24px;">
                                            Our team is here for you and ready to answer any questions you may have.
                                        </td>
                                    </tr>
                                </table>
                                </table>
                                <table width="100%" bgcolor="#fff" style="padding-bottom: 10px;">
                                    <tbody>
                                        <tr>
                                            <td width="" class="cstm-phone-decrease-w" style="text-align:center;"></td>
                                            <td width="24%" class="cstm-phone-increase-w" style="text-align:center;">
                                                <a style="text-decoration:none;" href="{{ URL::to('/faq') }}" target="_blank">
                                                    <img width="50" height="50" border="0"
                                                        style="text-align:center width:auto;" src="{{ URL::to('/email/faq.png') }}"
                                                        alt="FAQs">
                                                    <p
                                                        style="margin-top:4px; font-family: 'Montserrat', sans-serif !important; color:#000000; line-height:24px; font-size:14px;">
                                                        FAQs
                                                    </p>
                                                </a>
                                            </td>
                                            <td width="24%" class="cstm-phone-increase-w" style="text-align:center;">
                                                <a style="text-decoration:none;" href="{{ URL::to('/contact-us') }}" target="_blank">
                                                    <img width="50" height="50" border="0"
                                                        style="text-align:center width:auto;" src="{{ URL::to('/email/mail.png') }}"
                                                        alt="Email">
                                                    <p
                                                        style="margin-top:4px; font-family: 'Montserrat', sans-serif !important; color:#000000; line-height:24px; font-size:14px;">
                                                        Email us
                                                    </p>
                                                </a>
                                            </td>
                                            <td width="" class="cstm-phone-decrease-w"
                                                style="text-align:center; padding-bottom:20px;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#141414"
                                style="padding-left:11px; padding-right:10px; padding-top:15px; padding-bottom:15px; border-radius: 0 0 5px 5px;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="text-align:center; font-size:13px; font-family: 'Montserrat', sans-serif !important; color:#fff; line-height:23px; font-weight: 500;">
                                                ©{{ date('Y') }} <i>Recipe Online</i>  all rights reserved. </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
        </tr>
        </td>
    </table>
</body>

</html>
