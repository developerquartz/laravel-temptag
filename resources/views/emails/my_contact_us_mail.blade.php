<!DOCTYPE html>
<html>
<head>
    <title>temptag.abc.com</title>
</head>
    <body  bgcolor="#f5f5f" style="margin: 0px; padding: 0px;" data-gr-c-s-loaded="true">
        <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
            <tbody>
                <tr>
                    <td style="padding: 10px 0 30px 0;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                            <tbody>
                                <tr style="border-bottom: 6px solid #0050a6;">
                                    <td align="left" bgcolor="#fff" style="padding: 25px 0 25px 22px; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                        <img src="https://temptag.abc.com/assets/frontend/images/logo.jpg" alt="Creating Email Magic" style="display: block;">
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #000;">
                                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 18px;">
                                                        Hi Admin,
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 0px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;">
                                                        {!! html_entity_decode($details['message_detail']) !!}

                                                        <p><strong>Conatct Us Detail:</strong></p>
                                                        <p>Name: {{ $details['name'] }}</p>
                                                        <p>Email: {{ $details['email'] }}</p>
                                                        <p>Phone: {{ $details['phone'] }}</p>
                                                        <p>Message: {{ $details['message'] }}</p>
                                                        
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
            </tbody>
        </table>
    </body>
</html>