<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
</head>
<body style="margin:0; padding:0; background:#f9f9f9; font-family: Arial, sans-serif;">

    <!-- Header avec logo -->
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td style="background:#000; text-align:center; padding:30px;">
                <img src="https://boglo.shop/images/logo.png" alt="BOGLO Logo" style="height:70px;">
            </td>
        </tr>
    </table>

    <!-- Contenu principal -->
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td style="padding:40px; background:#ffffff; border-radius:12px; max-width:600px; margin:0 auto;">
                {{ $slot }} {{-- Ici Laravel injecte ton contenu --}}
            </td>
        </tr>
    </table>

    <!-- Footer -->
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="margin-top:30px;">
        <tr>
            <td style="background:#111; text-align:center; padding:25px; font-size:12px; color:#aaa;">
                © {{ date('Y') }} <strong style="color:#d4af37;">BOGLO SPIRITUALITÉ</strong>. Tous droits réservés.  
                <br><br>
                <a href="https://boglo.shop" style="color:#d4af37; text-decoration:none; font-weight:bold;">
                    🌐 Visitez notre site
                </a>
            </td>
        </tr>
    </table>

</body>
</html>
