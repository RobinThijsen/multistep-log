<?php
return [
    'picklist' => [
        'plans' => [
            '1' => 'Arcade',
            '2' => 'Advanced',
            '3' => 'Pro',
        ],
        'planRecurrences' => [
            '1' => 'Monthly',
            '2' => 'Yearly',
        ],
        'planAddons' => [
            '1' => [
                'title' => 'Online Service',
                'description' => 'Access to multiplayer games',
            ],
            '2' => [
                'title' => 'Larger Storage',
                'description' => 'Extra 1TB of cloud save',
            ],
            '3' => [
                'title' => 'Customizable Profile',
                'description' => 'Custom theme on your profile',
            ],
        ],
    ],
    'buttons' => [
        'back' => [
            'title' => 'Go back',
            'content' => 'Go Back',
        ],
        'next' => [
            'title' => 'Next step',
            'content' => 'Next Step',
        ],
        'submit' => [
            'title' => 'Submit',
            'content' => 'Submit',
        ],
        'change' => [
            'title' => 'Change plan',
            'content' => 'Change',
        ],
        'dashboard' => [
            'title' => 'Go to dashboard',
            'content' => 'Go to Dashboard',
        ],
        'register' => [
            'title' => 'Register',
            'content' => 'Register',
        ],
        'login' => [
            'title' => 'Login',
            'content' => 'Login',
        ],
        'logout' => [
            'title' => 'Logout',
            'content' => 'Logout',
        ],
    ],
    'steps' => [
        'informations' => [
            'title' => 'Personal info',
            'description' => 'Please provide your name, email address, and phone number.',
        ],
        'plans' => [
            'title' => 'Select your plan',
            'description' => 'You have the option of monthly or yearly billing.',
        ],
        'addons' => [
            'title' => 'Pick add-ons',
            'description' => 'Add-ons help enhance your gaming experience.',
        ],
        'summary' => [
            'title' => 'Finishing Up',
            'description' => 'Double-check everything looks OK before confirming.',
            'empty' => 'No add-ons selected',
            'total' => 'Total (:recurrence)',
        ],
        'feedback' => [
            'title' => 'Thank you!',
            'description' => 'Thanks for confirming your subscription! We hope you have fun using this multistep login. If you ever need support, please feel free to email us at support@loremgaming.com.',
        ],
    ],
    'fields' => [
        'optional' => '(Optional)',
        'name' => [
            'label' => 'Name',
            'placeholder' => 'e.g. John Doe',
            'attribute' => 'name',
        ],
        'email' => [
            'label' => 'Email Address',
            'placeholder' => 'e.g. johndoe@gmail.com',
            'attribute' => 'email',
        ],
        'phone' => [
            'label' => 'Phone Number',
            'placeholder' => 'e.g. +1 234 567 890',
            'attribute' => 'phone number',
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => '********',
            'attribute' => 'password',
        ],
    ],
    'login' => [
        'title' => 'Sign in',
        'subTitle' => 'Welcome back! Please sign in to your account.',
    ],
];
