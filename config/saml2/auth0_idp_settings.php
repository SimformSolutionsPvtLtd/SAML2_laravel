<?php

$this_idp_env_id = 'auth0';

$idp_host = env('SAML2_' . $this_idp_env_id . '_IDP_HOST', 'http://localhost:8000');

return $settings = array(

    'strict' => true,

    'debug' => env('APP_DEBUG', false),

    'sp' => array(

        'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',

        'x509cert' => env('SAML2_' . $this_idp_env_id . '_SP_x509', ''),
        'privateKey' => env('SAML2_' . $this_idp_env_id . '_SP_PRIVATEKEY', ''),

        'entityId' => env('SAML2_' . $this_idp_env_id . '_SP_ENTITYID', ''),

        'assertionConsumerService' => array(

            'url' => env('SAML2_auth0_SP_ACS'),
        ),

        'singleLogoutService' => array(

            'url' => '',
        ),
    ),

    'idp' => array(

        'entityId' => env('SAML2_' . $this_idp_env_id . '_IDP_ENTITYID', $idp_host . ''),

        'singleSignOnService' => array(

            'url' => env('SAML2_' . $this_idp_env_id . '_IDP_SSO_URL', $idp_host . ''),
        ),

        'singleLogoutService' => array(

            'url' => env('SAML2_' . $this_idp_env_id . '_IDP_SL_URL', $idp_host . ''),
        ),

        'x509cert' => storage_path(env('SAML2_auth0_IDP_x509')),

    ),

    'security' => array(

        'nameIdEncrypted' => false,

        'authnRequestsSigned' => false,

        'logoutRequestSigned' => false,

        'logoutResponseSigned' => false,

        'signMetadata' => false,

        'wantMessagesSigned' => false,

        'wantAssertionsSigned' => false,

        'wantNameIdEncrypted' => false,

        'requestedAuthnContext' => true,
    ),

);
