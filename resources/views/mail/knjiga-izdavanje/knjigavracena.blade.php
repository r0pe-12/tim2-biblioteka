<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">

            <tbody><tr><td width="100%" align="center" valign="top" bgcolor="#eeeeee" height="20"></td></tr>
                <tr>
                    <td bgcolor="#eeeeee" align="center" style="padding:0px 15px 0px 15px" class="m_2113659865872709336section-padding">
                        <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px" class="m_2113659865872709336responsive-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="padding:40px 40px 0px 40px">
                                                        <a href="https://tim2.ictcortex.me" target="_blank">
                                                            <img src="{{ $message->embed(public_path('img/bookmail.png')) }}" width="70" border="0" style="vertical-align:middle" class="CToWUd" data-bit="iit">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="font-size:18px;color:#0e0e0f;font-weight:700;font-family:Verdana;line-height:28px;vertical-align:top;text-align:center;padding:35px 40px 0px 40px">
                                                        <strong>Knjiga uspješno {{ strtolower($borrow->status()->name) }}</strong>
                                                        <p style="font-size: 15px; margin-bottom: 0">ID - {{ $borrow->id }}</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td align="center" bgcolor="#ffffff" height="1" style="padding:40px 40px 5px" valign="top" width="100%">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td style="border-top:1px solid #e4e4e4">
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="m_2113659865872709336content" style="font:16px/22px 'Helvetica Neue',Arial,'sans-serif';text-align:left;color:#555555;padding:40px 40px 0 40px">
                                                        <p> Zdravo {{ $borrow->student->name }}, </p>
                                                        <p> Ovo je potvrda da je knjiga <b>"{{ $borrow->book->title }}"</b> uspjesno {{ strtolower($borrow->status()->name) }} dana {{ \App\Models\Carbon::parse($borrow->status()->datum)->format('d.m.Y.') }} </p>
                                                        <p> Ukupno zadržavanje knjige je: <b><x-date-diff :zapis="$borrow" :holded="true"/></b> </p>
                                                        @if($borrow->status()->id == \App\Models\BookStatus::RETURNED1 || $borrow->status()->id == \App\Models\BookStatus::FAILED)
                                                            <p> Prekoračenje u danima: <b><x-date-diff :zapis="$borrow" :failed="true"/></b> </p>
                                                        @endif
                                                        <p> Hvala na korišćenju školske biblioteke. </p>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td width="100%" align="center" valign="top" bgcolor="#ffffff" height="45"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#eeeeee" align="center" style="padding:20px 0">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:600px" class="m_2113659865872709336responsive-table">
                            <tbody>
                                <tr>  </tr>
                                <tr>
                                    <td bgcolor="#eeeeee" align="center">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:600px" class="m_2113659865872709336responsive-table">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="text-align:center;padding:10px 10px 10px 10px">
                                                        <a href="https://tim2.ictcortex.me" style="display:inline-block;margin:2px" target="_blank"><img height="40" src="https://ci5.googleusercontent.com/proxy/yYP0rjaWftmo0bWJ1YgorXadxfH0V6o6UUrolY3NA1Inw5j1Kp3B4G9047D3UGr-cUI8rH4yQtFW0va6gN6CcbKnwcWtBHoVi2ya4D6VKic93YHI1NMm3zCEeLvBqcIJbGsvvPlDBxy0vNZiIyM=s0-d-e1-ft#https://fiverr-res.cloudinary.com/q_auto,f_auto/v1/general_assets/system_emails/Twitter.png" width="40" class="CToWUd" data-bit="iit"></a>

                                                        <a href="https://tim2.ictcortex.me" style="display:inline-block;margin:2px" target="_blank"><img height="40" src="https://ci6.googleusercontent.com/proxy/SornkRnO4GrQZT0iSa-UgV18FNwPYEDGyUlt6-xoqW--lnyPbZyfjUGk-JRQ-IR_cdgOQI7TJKVEHnZGeGC3uyrhaw3LUS_U4x-JJJcemfwQmDGKsARlqE9-DW_XOZ-P5rOjhubjjq_xsYcZBtSu=s0-d-e1-ft#https://fiverr-res.cloudinary.com/q_auto,f_auto/v1/general_assets/system_emails/Facebook.png" width="40" class="CToWUd" data-bit="iit"></a>

                                                        <a href="https://tim2.ictcortex.me" style="display:inline-block;margin:2px" target="_blank"><img height="40" src="https://ci4.googleusercontent.com/proxy/UbWh6Hak5WTIBnE-zjbtwRNAwlHVbgSRA-RIkqLJUnFaRuyj4nNY41TGXwUncBQCgN5C02P2iep5OS2NVD7ONx6KXEXg3jojyPIpXVcNg-Q9gLa9d-WUeZALl9eHKn6x-LJLUQrmwgKiQ7AbTRebYA=s0-d-e1-ft#https://fiverr-res.cloudinary.com/q_auto,f_auto/v1/general_assets/system_emails/Pinterest.png" width="40" class="CToWUd" data-bit="iit"></a>

                                                        <a href="https://tim2.ictcortex.me" style="display:inline-block;margin:2px" target="_blank"><img height="40" src="https://ci6.googleusercontent.com/proxy/jaoIW25H-JLwQ_pH8nRfoFh86yBmMuXGoJWOT4Wj_YcM9tgGuhPzy3Yfc6Wbj38HYHnMEKmYdWWhxIFhOsX8QdcRf9fIp3ONZ-zvlc4z5gTeshSONbwdWwu7v-6CWyYC3IPIwj1RMWSZc_5mk5eo=s0-d-e1-ft#https://fiverr-res.cloudinary.com/q_auto,f_auto/v1/general_assets/system_emails/LinkedIn.png" width="40" class="CToWUd" data-bit="iit"></a>

                                                        <a href="https://tim2.ictcortex.me" style="display:inline-block;margin:2px" target="_blank"><img height="40" src="https://ci3.googleusercontent.com/proxy/LjzXeoCp_o0AZnQQR1R9LK_YM9W_H_aFgIvVOnagU1PzJKdS2aX_q84El48dBC4jgGZY-qFgSOgUgF5np5xGunT5qt-QJVflsuJ1gOFqwgK_BCCCz9gnuHpib2ZM-Z3VjtKnBuGdLFsFSZaQEmwtQg=s0-d-e1-ft#https://fiverr-res.cloudinary.com/q_auto,f_auto/v1/general_assets/system_emails/Instagram.png" width="40" class="CToWUd" data-bit="iit"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#999999;font-size:12px;line-height:16px;text-align:center">
                                                        <br> © Tim 2 ICT Cortex

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="text-align:center;padding:10px 10px 20px 10px">
                                                        <a href="https://tim2.ictcortex.me" style="display:inline-block;margin:5px" target="_blank"><img src="https://ci6.googleusercontent.com/proxy/mTBdBzeoashF6zjTzyi3juJxiAuUb9X6OGB4RikZbsQdKVpRXOJUs_UTz9jiBnSrpqC3VSAAry81V7_qO7WFxN-OCfazJey4lTEKcgi6eK2ki81K-qu-W4XJWB_nMr3vHL6JsPlyap5PN-f36TGBbcc=s0-d-e1-ft#https://fiverr-res.cloudinary.com/q_auto,f_auto/v1/general_assets/system_emails/AppleStore.png" width="135" class="CToWUd" data-bit="iit"></a>

                                                        <a href="https://tim2.ictcortex.me" style="display:inline-block;margin:5px" target="_blank"><img src="https://ci4.googleusercontent.com/proxy/9XuTgTpaseep519r6MCmPpsRS4v6FL-0RHR1IVhOuxUeqsVmJAKjJ8-6toZgQvHNfM2W9P04W3r6pqa-HqTGfAYbfvLimPRykpSGT6irVAHwuNTJFmNX_B_-fxaxEvTzE_Haoh-zBWfcadRH3-O9ugVF=s0-d-e1-ft#https://fiverr-res.cloudinary.com/q_auto,f_auto/v1/general_assets/system_emails/GoogleStore.png" width="135" class="CToWUd" data-bit="iit"></a>
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
