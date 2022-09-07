<x-email-layout>
    <div style="background-color:#ffffff; padding: 45px 0 34px 0; border-radius: 24px; margin:40px auto; max-width: 600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" height="auto" style="border-collapse:collapse">
            <tbody>
                <tr>
                    <td align="center" valign="center" style="text-align:center; padding-bottom: 10px">
                        <!--begin:Email content-->
                        <div style="text-align:center; margin:0 15px 34px 15px">
                            <!--begin:Logo-->
                            <div style="margin-bottom: 10px">
                                <a href="https://yadaekidanta.com" rel="noopener" target="_blank">
                                    <img alt="Logo" src="{{asset('img/icon.png')}}" style="height: 35px" />
                                </a>
                            </div>
                            <!--end:Logo-->
                            <!--begin:Media-->
                            <div style="margin-bottom: 15px">
                                <img alt="Logo" src="{{asset('keenthemes/media/email/icon-positive-vote-1.svg')}}" />
                            </div>
                            <!--end:Media-->
                            <!--begin:Text-->
                            <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                                <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Hey {{$notifiable->name}},</p>
                                <p style="margin-bottom:2px; color:#7E8299">Your password was just changed. </p>
                                <p style="margin-bottom:2px; color:#7E8299">If you didn't change your password, please contact our support team. Your security is very important to us!</p>
                            </div>
                            <!--end:Text-->
                        </div>
                        <!--end:Email content-->
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="center" style="font-size: 13px; text-align:center; padding: 0 10px 10px 10px; font-weight: 500; color: #A1A5B7; font-family:Arial,Helvetica,sans-serif">
                        <p style="color:#181C32; font-size: 16px; font-weight: 600; margin-bottom:9px">It’s all about customers!</p>
                        <p style="margin-bottom:2px">Call our customer care number: +62 818 694 745 </p>
                        <p style="margin-bottom:4px">You may reach us at
                        <a href="https://yadaekidanta.com" rel="noopener" target="_blank" style="font-weight: 600">hello@yadaekidanta.com</a>.</p>
                        <p>We serve Mon-Fri, 8AM-5PM</p>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="center" style="text-align:center; padding-bottom: 20px;">
                        <a href="https://linkedin.com/company/yada-ekidanta" target="_blank" style="margin-right:10px">
                            <img alt="Logo" src="{{asset('keenthemes/media/email/icon-linkedin.svg')}}" />
                        </a>
                        <a href="https://facebook.com/YadaEkidanta" target="_blank" style="margin-right:10px">
                            <img alt="Logo" src="{{asset('keenthemes/media/email/icon-facebook.svg')}}" />
                        </a>
                        <a href="https://twitter.com/YadaEkidanta" target="_blank">
                            <img alt="Logo" src="{{asset('keenthemes/media/email/icon-twitter.svg')}}" />
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="center" style="font-size: 13px; padding:0 15px; text-align:center; font-weight: 500; color: #A1A5B7;font-family:Arial,Helvetica,sans-serif">
                        <p>&copy; Copyright 2021 {{config('app.name')}}.
                            {{-- <a href="https://yadaekidanta.com" rel="noopener" target="_blank" style="font-weight: 600;font-family:Arial,Helvetica,sans-serif">Unsubscribe</a>&nbsp; from newsletter. --}}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-email-layout>