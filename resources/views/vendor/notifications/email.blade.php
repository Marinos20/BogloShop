@component('mail::message')
{{-- Logo centré --}}
<div style="text-align:center; margin-bottom:20px;">
    <img src="https://boglo.shop/images/logo.png" alt="BOGLO Logo" style="max-width:150px; width:100%; height:auto;">
</div>

{{-- Titre --}}
# Bonjour !

Merci de vous être inscrit sur **BOGLO SHOP ** la plateforme de haute spiritualité 🌟.  
Pour activer votre compte, cliquez sur le bouton ci-dessous :

{{-- Bouton principal --}}
@component('mail::button', ['url' => $actionUrl, 'color' => 'primary'])
✅ Vérifier mon adresse email
@endcomponent

{{-- Lien de secours --}}
---

📩 Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :  
[{{ $actionUrl }}]({{ $actionUrl }})

Merci pour votre confiance 🙏  
L’équipe **BOGLO SPIRITUALITÉ**

{{-- Footer personnalisé --}}
@slot('footer')
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="margin-top:20px;">
    <tr>
        <td class="content-cell" align="center" style="font-size:12px; color:#666; font-family:Arial, sans-serif; line-height:1.4;">
            © {{ date('Y') }} <strong>Boglo Spiritualité</strong>. Tous droits réservés.  
            <br>
            <a href="https://boglo.shop" style="color:#d4af37; text-decoration:none;">Visitez notre site</a>
        </td>
    </tr>
</table>
@endslot

@endcomponent
