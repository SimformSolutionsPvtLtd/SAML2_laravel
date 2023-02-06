<p align="center"></p><p align="center"><a href="https://laravel.com" target="_blank"><img src="https://bookstack.soffid.com/uploads/images/gallery/2021-09/0dNsaml-logo.png" width="200" alt="Laravel Logo"></a></p><p align="center"></p>

## About SAML2-POC 
``
Author: Mritunjay Singh Khichi
``
 
Hola! Before jumping into the technical jargon, let's look at an example.You just started working at a Simform and You have given a work email id. Once you sign in to outlook, you're allowed to access keka, lunch app & more external services that simform provides using Single Sign-On.

You click on the keka icon, some magic happens in the background, and before you know it, you're signed into Keka without ever entering any credentials! As you might have guessed, the "magic" was actually SAML in action. 

So i have took the pain out of development & explored multiple saml2 pacakages available on internet till date & choose the best to be used and created this ready to go solution by easing integration for any laravel projects.

- Light Saml
- SP based on OneLogin-toolkit
- Auth0 SDK / OneLogin SDK

## LightSaml SP bundle integration

The primary SAML use case is called Web Browser Single Sign-On (SSO). A user utilizes a browser to request a web resource protected by a SAML service provider. The SP, wishing to know the identity of the requesting user, issues an authentication request to a SAML IDP through the browser.

``https://idp.domain.com/SAML2/SSO/Redirect?SAMLRequest=request``


It begins with the user requests a target login url, so for that we create auth request xml then serialize the same xml and redirects the user to the SSO Service at the identity provider basically the user agent issues a GET request to the SSO service at the URL. The SSO service processes the **AuthnRequest** (sent via the SAMLRequest URL query parameter) and performs a security check. SAML messages are send using one of the bindings as LightSAML supports both HTTP-Redirect and HTTP-POST bindings. We have used the redirect binding here. `authRequest() method defined for AuthnRequest and bindRequest() method for redirect binding in LightSamlController`

We need to provide metadata to IDP so for that we will create **Entity Descriptor**, which is a document that describes features of a SAML entity. It’s a way through which a party reveals it’s own id (entityID), roles, exact locations it communicates trough, it’s certificate which other parties use to verify it’s message signatures and for encryption, as well as some other details. `entityDescriptor() method defined for SP EntityDescriptor in LightSamlController`


To decrypt a SAML Assertion from the Response with encrypted Assertion you would need your key pair the Assertion was encrypted for. The sender encrypted the SAML Assertion having your public key which you gave to then trough certificate in your metadata XML.First you deserialize the XML into the Response data model object. Then you create a Credential with your key pair. Finally you decrypt the SAML Assertion with that credential and get the decrypted Assertion.
 
### .env
For e.g. to configure IDP using LightSaml following variables are required:
```env
LIGHT_SAML_ACS_URL = ""
LIGHT_SAML_ISSUER = ""
LIGHT_SAML_LOGIN = ""
LIGHT_SAML_KEY = ""
```

Following routes are created:
```
 lightsaml/auth - for AuthnRequest xml
 lightsaml/metadata - for EntityDescriptor metadata xml
 lightsaml/login - for redirect binding
 api/callback - for receiving SAML response
```
 
## Multiple SP integration based on onelogin toolkit
 
#### Define the IDPs
Define names of all the IDPs you want to configure in `saml2_settings.php`. The name of the IDP will show up in the URL used by the Saml2 routes as well as in the filename for each IDP's config.

**config/saml2_settings.php**
```php
    'idpNames' => ['auth0', 'test', 'myidp2'],
```

#### Configure to know about each IDP

You will need to create a separate configuration file for each IDP under `app/config/saml2/` folder. For e.g. you can use `auth0_idp_settings.php` as the starting point.

If you don't specify URLs in the corresponding IDP config optional values, this provides defaults values and creates the `metadata`, `acs`, and `sls` routes for each IDP. If you want to optionally define values in ENV vars instead of the `{idpName}_idp_settings` file, one should follow standard naming pattern for ENV values. 

For example, it can be (**.env**):
```env
SAML2_auth0_SP_x509="..."
SAML2_auth0_SP_PRIVATEKEY="..."
```

Following routes will be automatically created for each IDP:
```
 {routesPrefix}/{idpName}/logout
 {routesPrefix}/{idpName}/login
 {routesPrefix}/{idpName}/metadata
 {routesPrefix}/{idpName}/acs
 {routesPrefix}/{idpName}/sls
```

For login requests that come through redirects to the login route, `{routesPrefix}/{idp}/login`, After login is called, the user will be redirected to the IDP login page. Then the IDP, which you have configured with an endpoint will call back, e.g. `/{routesPrefix}/{idp}/acs`. That will process the response and one can read and use the attributes as required.


### LogOut
Now there are two ways the user can log out.
 + 1 - By logging out in your app: In this case you 'should' notify the IDP first so it closes global session.
 + 2 - By logging out of the global SSO Session. In this case the IDP will notify you on `/{idp}/slo` endpoint (already provided), if the IDP supports SLO
 
### .env
For e.g. to configure IDP following variables are required:
```env
SAML2_auth0_SP_ACS =  ""
SAML2_auth0_IDP_ENTITYID = ""
SAML2_auth0_IDP_SSO_URL = ""
SAML2_auth0_IDP_x509 = ""
```

## Auth0 SDK

Sign up for Auth0, Create a new application and get the required details from the Application Settings section in the Auth0 dashboard.

```
Domain
Client ID
Client Secret
```

Configure callback URL where Auth0 redirects the user after they have authenticated. let's begin configuring our Auth0 integration by adding options to the .env file in our project's root directory. Finally enter the login url and you will redirect to response page once its authenticated.


```
http://127.0.0.1:8000/login
```

```
Cheers !!! We're all set our new application is live and waiting for us. 
```