<!doctype html>
<html>
<body style="margin:0; padding:24px 12px; background:#f4f7fb; font-family: Arial, sans-serif; color:#102d4e;">
    <table cellpadding="0" cellspacing="0" style="width:100%; max-width:600px; margin:0 auto; background:#ffffff; border-radius:10px; overflow:hidden;">
        <tr>
            <td style="background:#031946; padding:22px 28px;">
                <img src="{{ asset('images/logo-beyaz.png') }}" alt="SAYGI Hizmet Grup" height="48" style="height:48px; width:auto; display:block;">
            </td>
        </tr>
        <tr>
            <td style="padding:28px;">
                <h2 style="margin:0 0 4px;">{{ $subjectLine }}</h2>
                <p style="color:#5c6b88; margin:0 0 18px;">Web sitesi üzerinden yeni bir kayıt alındı.</p>
                <table cellpadding="8" cellspacing="0" style="border-collapse:collapse; width:100%;">
                    @foreach ($lines as $label => $value)
                        <tr style="border-bottom:1px solid #e5ebf0;">
                            <td style="color:#5c6b88; width:150px; vertical-align:top;"><strong>{{ $label }}</strong></td>
                            <td style="white-space:pre-line;">{{ $value ?: '—' }}</td>
                        </tr>
                    @endforeach
                </table>
                <p style="margin:24px 0 0;">
                    <a href="{{ url('/admin') }}" style="display:inline-block; background:#ff620f; color:#ffffff; text-decoration:none; font-weight:bold; padding:12px 20px; border-radius:24px;">Yönetim panelinde görüntüle →</a>
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
