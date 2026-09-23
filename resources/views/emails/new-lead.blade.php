<!doctype html>
<html>
<body style="font-family: Arial, sans-serif; color:#102d4e;">
    <h2 style="margin-bottom:4px;">{{ $subjectLine }}</h2>
    <p style="color:#5c6b88; margin-top:0;">SAY Kurumsal web sitesi üzerinden yeni bir kayıt alındı.</p>
    <table cellpadding="6" style="border-collapse:collapse; width:100%; max-width:520px;">
        @foreach ($lines as $label => $value)
            <tr style="border-bottom:1px solid #e5ebf0;">
                <td style="color:#5c6b88; width:160px;"><strong>{{ $label }}</strong></td>
                <td>{{ $value ?: '—' }}</td>
            </tr>
        @endforeach
    </table>
    <p style="margin-top:20px;"><a href="{{ url('/admin') }}">Yönetim panelinde görüntüle →</a></p>
</body>
</html>
