<?php
return [
    'picklist' => [
        'plans' => [
            '1' => 'Arcade',
            '2' => 'Avancé',
            '3' => 'Professionnel',
        ],
        'planRecurrences' => [
            '1' => 'Mensuel',
            '2' => 'Annuel',
        ],
        'planAddons' => [
            '1' => [
                'title' => 'Service en ligne',
                'description' => 'Accès aux jeux multijoueur',
            ],
            '2' => [
                'title' => 'Espace de stockage supplémentaire',
                'description' => '1TB de stockage supplémentaire en cloud',
            ],
            '3' => [
                'title' => 'Profil personnalisable',
                'description' => 'Thème customisé pour votre profil',
            ],
        ],
    ],
    'buttons' => [
        'back' => [
            'title' => 'Retour en arrière',
            'content' => 'Retour en Arrière',
        ],
        'next' => [
            'title' => 'Etape suivante',
            'content' => 'Etape Suivante',
        ],
        'submit' => [
            'title' => 'Envoyer',
            'content' => 'Envoyer',
        ],
        'change' => [
            'title' => 'Changer de plan',
            'content' => 'Changer',
        ],
        'dashboard' => [
            'title' => 'Aller vers le dashboard',
            'content' => 'Aller vers le Dashboard',
        ],
        'register' => [
            'title' => 'Inscription',
            'content' => 'Inscription',
        ],
        'login' => [
            'title' => 'Connexion',
            'content' => 'Connexion',
        ],
        'logout' => [
            'title' => 'Déconnexion',
            'content' => 'Déconnexion',
        ],
    ],
    'steps' => [
        'informations' => [
            'title' => 'Information personnelle',
            'description' => 'S\'il vous plait, renseigné votre nom complet, email et numéro de téléphone.',
        ],
        'plans' => [
            'title' => 'Selectionnez votre plan',
            'description' => 'Vous pouvez choisir un paiement mensuel ou annuel.',
        ],
        'addons' => [
            'title' => 'Choisissez vos add-ons',
            'description' => 'Les add-ons améliore l\'expérience de jeu.',
        ],
        'summary' => [
            'title' => 'Finalisation',
            'description' => 'Vérifiez bien vos informations avant de confirmer.',
            'empty' => 'Aucun add-ons sélectionné',
            'total' => 'Total (:recurrence)',
        ],
        'feedback' => [
            'title' => 'Merci!',
            'description' => 'Merci d\'avoir confirmé votre inscription! Nous espérons que vous avez apprécié le formulaire en plusieur étape. Si vous venez à avoir besoin d\'aide, s\'il vous plaitn contatez nous à support@loremgaming.com.',
        ],
    ],
    'fields' => [
        'optional' => '(Optionnel)',
        'name' => [
            'label' => 'Nom',
            'placeholder' => 'e.g. John Doe',
            'attribute' => 'nom',
        ],
        'email' => [
            'label' => 'Adresse Email',
            'placeholder' => 'e.g. johndoe@gmail.com',
            'attribute' => 'email',
        ],
        'phone' => [
            'label' => 'Numéro de téléphone',
            'placeholder' => 'e.g. +1 234 567 890',
            'attribute' => 'numéro de téléphone',
        ],
        'password' => [
            'label' => 'Mot de passe',
            'placeholder' => '********',
            'attribute' => 'mot de passe',
        ],
    ],
    'login' => [
        'title' => 'Connexion',
        'subTitle' => 'Re Bonjour! S\'il vous plait connectez-vous pour accèder à votre compte.',
    ],
];
