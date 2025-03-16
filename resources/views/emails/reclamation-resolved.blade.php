<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Réclamation résolue</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 5px; margin-bottom: 20px;">
        <h1 style="color: #0d6efd; margin-top: 0;">Votre réclamation a été résolue</h1>
    </div>
    
    <p>Bonjour {{ $reclamation->prenom }} {{ $reclamation->nom }},</p>
    
    <p>Nous sommes heureux de vous informer que votre réclamation a été traitée et résolue par notre équipe.</p>
    
    <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;">
        <p style="margin: 0;"><strong>Détails de votre réclamation :</strong></p>
        <p style="margin: 10px 0 0;"><strong>Type :</strong> {{ $reclamation->type }}</p>
        <p style="margin: 5px 0 0;"><strong>Message :</strong> {{ $reclamation->message }}</p>
        <p style="margin: 5px 0 0;"><strong>Date de soumission :</strong> {{ $reclamation->created_at->format('d/m/Y H:i') }}</p>
    </div>
    
    <p>Si vous avez d'autres questions ou préoccupations, n'hésitez pas à nous contacter.</p>
    
    <p>Cordialement,<br>L'équipe Mobilis</p>
    
    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #6c757d;">
        <p>Cet email a été envoyé automatiquement, merci de ne pas y répondre.</p>
    </div>
</body>
</html>