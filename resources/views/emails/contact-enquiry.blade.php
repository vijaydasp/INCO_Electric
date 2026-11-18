<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>New website enquiry</title>
</head>

<body style="margin:0;padding:0;background:#f4f1ec;font-family:Arial,Helvetica,sans-serif;color:#24262b;">
    <div style="width:100%;background:#f4f1ec;padding:26px 14px;">
        <div style="max-width:600px;margin:0 auto;background:#ffffff;border:1px solid #e6e1d9;border-radius:14px;overflow:hidden;">

            <div style="background:#101216;padding:24px 28px;">
                <div style="color:#ffffff;font-size:19px;font-weight:bold;letter-spacing:.02em;">
                    INDU COMPONENTS <span style="color:#d80c0c;">(INCO)</span>
                </div>
                <div style="margin-top:5px;color:#a8aab0;font-size:12px;letter-spacing:.08em;text-transform:uppercase;">
                    New website enquiry
                </div>
            </div>

            <div style="padding:28px;">
                <p style="margin:0 0 20px;font-size:15px;line-height:1.6;">
                    A new enquiry was submitted through the website contact form.
                </p>

                <table role="presentation" width="100%" cellpadding="0" cellspacing="0"
                    style="border-collapse:collapse;font-size:14px;line-height:1.6;">
                    <tr>
                        <td style="width:150px;padding:10px 0;border-bottom:1px solid #f0ede8;color:#8b8f97;font-size:12px;letter-spacing:.06em;text-transform:uppercase;">
                            Name
                        </td>
                        <td style="padding:10px 0;border-bottom:1px solid #f0ede8;font-weight:bold;">
                            {{ $data['name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0;border-bottom:1px solid #f0ede8;color:#8b8f97;font-size:12px;letter-spacing:.06em;text-transform:uppercase;">
                            Phone
                        </td>
                        <td style="padding:10px 0;border-bottom:1px solid #f0ede8;">
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $data['phone']) }}"
                                style="color:#24262b;text-decoration:none;">{{ $data['phone'] }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0;border-bottom:1px solid #f0ede8;color:#8b8f97;font-size:12px;letter-spacing:.06em;text-transform:uppercase;">
                            Email
                        </td>
                        <td style="padding:10px 0;border-bottom:1px solid #f0ede8;">
                            <a href="mailto:{{ $data['email'] }}"
                                style="color:#d80c0c;text-decoration:none;">{{ $data['email'] }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0;border-bottom:1px solid #f0ede8;color:#8b8f97;font-size:12px;letter-spacing:.06em;text-transform:uppercase;">
                            Product interest
                        </td>
                        <td style="padding:10px 0;border-bottom:1px solid #f0ede8;">
                            {{ $data['product'] ?: 'Not specified' }}
                        </td>
                    </tr>
                </table>

                <div style="margin-top:24px;">
                    <div style="color:#8b8f97;font-size:12px;letter-spacing:.06em;text-transform:uppercase;">
                        Requirement
                    </div>
                    <p style="margin:8px 0 0;padding:16px 18px;background:#faf8f5;border-left:3px solid #d80c0c;border-radius:0 8px 8px 0;font-size:14px;line-height:1.7;white-space:pre-line;">{{ $data['message'] }}</p>
                </div>

                <div style="margin-top:26px;">
                    <a href="mailto:{{ $data['email'] }}?subject={{ rawurlencode('Re: your INCO enquiry') }}"
                        style="display:inline-block;background:#d80c0c;color:#ffffff;font-size:14px;font-weight:bold;text-decoration:none;padding:12px 22px;border-radius:999px;">
                        Reply to {{ $data['name'] }}
                    </a>
                </div>
            </div>

            <div style="padding:16px 28px;background:#faf8f5;border-top:1px solid #f0ede8;color:#8b8f97;font-size:12px;line-height:1.6;">
                Sent from the Indu Components website on
                {{ now()->timezone(config('app.timezone'))->format('d M Y, g:i A') }}.
            </div>
        </div>
    </div>
</body>

</html>
