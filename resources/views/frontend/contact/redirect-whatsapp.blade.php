<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Redirection WhatsApp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #25D366;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #128C3E;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const whatsappUrl = "{{ $whatsappUrl }}";
            let popupWindow = null;

            try {
                // Essai d'ouverture automatique
                popupWindow = window.open(whatsappUrl, '_blank');

                // Si bloqué, afficher bouton
                if (!popupWindow || popupWindow.closed || typeof popupWindow.closed === 'undefined') {
                    document.getElementById("manualRedirect").style.display = 'block';
                }

                // Revenir en arrière après 2 secondes
                setTimeout(() => {
                    window.location.href = "{{ url()->previous() }}";
                }, 4000);
            } catch (e) {
                console.error("Erreur lors de l'ouverture automatique de WhatsApp :", e);
                document.getElementById("manualRedirect").style.display = 'block';
            }
        });
    </script>
</head>
<body>
    <h2>Redirection vers WhatsApp en cours...</h2>
    <p>Veuillez patienter. Si rien ne se passe, cliquez sur le bouton ci-dessous :</p>

    <div id="manualRedirect" style="display: none; margin-top: 20px;">
        <a href="{{ $whatsappUrl }}" target="_blank" class="btn">Ouvrir WhatsApp</a>
    </div>
</body>
</html>
