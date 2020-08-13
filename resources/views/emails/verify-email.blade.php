@extends('emails.layout');

@section('content')
    <tr>
        <td style="padding-left:20px; padding-right:20px; padding-top:30px; padding-bottom:5px; border-radius: 5px 5px 0 0;"
            bgcolor="#FFFFFF">
            <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                            <tr>
                                <td style="padding-top:1px; padding-bottom:7px; font-family: 'Montserrat', sans-serif !important; color:#000000; font-size:15px; line-height:24px; font-weight: 600; text-transform: capitalize;">
                                    Hello <?php echo isset($data['display_name'])?ucwords($data['display_name']):'User';?>,
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif !important; font-size:14px; padding-top:10px;  color:#000000; line-height:24px; padding-bottom:30px;"
                                    class="para1">
                                    <p>Thank you for choosing us with successfully created new  <b>Recipe Online</b> account.</p>
                                    <p>Please click to below link & verify your email address to get access your account</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 20px;">
                                    <table style="background-color: #f54a52; border: 1px solid #EF5A2F; border-radius: 4px;"
                                           cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td style="padding-left: 15px; padding-right: 15px; text-align: center; cursor: pointer"
                                                valign="middle" height="45" width="164">
                                                <a href="{{ URL::to('/verify-email?token='.(isset($data['token'])?$data['token']:'') ) }}" target="_blank"
                                                   style="display: block; font-family: 'Montserrat', sans-serif !important; border-radius: 4px; font-size: 14px; line-height: 14px; color: #fff; text-decoration: none; font-weight: 500;">
                                                    <span>Verify your email</span>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family: 'Montserrat', sans-serif !important; font-size:14px; padding-top:10px;  color:#000000; line-height:24px; padding-bottom:30px;"
                                    class="para1">
                                    <p>If you are not able to click link copy & paste this link : {{ URL::to('/verify-email?token='.(isset($data['token'])?$data['token']:'') ) }}</p>
                                    <p>
                                        We will be here to help you with any step along the way.you can find answers to most questions and get
                                        in touch with us at <a href="{{ URL::to('/') }}">Recipe Online</a>.
                                    </p>
                                    <p>
                                        If you do not force to request it then please <a href="{{ URL::to('/contact-us') }}">contact us</a> or ignore this email.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top:0; padding-bottom:0; font-family: 'Montserrat', sans-serif !important; color:#000000; font-size:14px; line-height:24px; font-weight: 600;">
                                    Regards,
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top:0; padding-bottom:0; font-family: 'Montserrat', sans-serif !important; color:#000000; font-size:14px; line-height:24px;">
                                    Recipe Online Team
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection
