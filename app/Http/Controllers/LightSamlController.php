<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class LightSamlController extends Controller
{

    public function authRequest()
    {
        $authnRequest = new \LightSaml\Model\Protocol\AuthnRequest();
        $authnRequest
            ->setAssertionConsumerServiceURL(env('LIGHT_SAML_ACS_URL'))
            ->setProtocolBinding(\LightSaml\SamlConstants::BINDING_SAML2_HTTP_POST)
            ->setID(\LightSaml\Helper::generateID())
            ->setIssueInstant(new \DateTime())
            ->setDestination(env('LIGHT_SAML_LOGIN'))
            ->setIssuer(new \LightSaml\Model\Assertion\Issuer(env('LIGHT_SAML_ISSUER')));

        $serializationContext = new \LightSaml\Model\Context\SerializationContext();
        $authnRequest->serialize($serializationContext->getDocument(), $serializationContext);
        $xml = $serializationContext->getDocument()->saveXML();
        return response($xml, 200)->header('Content-Type', config('responseType'));
    }

    public function entityDescriptor()
    {
        $entityDescriptor = new \LightSaml\Model\Metadata\EntityDescriptor();
        $entityDescriptor
            ->setID(\LightSaml\Helper::generateID())
            ->setEntityID(env('LIGHT_SAML_ISSUER'));

        $entityDescriptor->addItem(
            $spSsoDescriptor = (new \LightSaml\Model\Metadata\SpSsoDescriptor())
                ->setWantAssertionsSigned(true)
        );

        $spSsoDescriptor->addKeyDescriptor(
            (new \LightSaml\Model\Metadata\KeyDescriptor())
                ->setUse(\LightSaml\Model\Metadata\KeyDescriptor::USE_SIGNING)
                ->setCertificate(\LightSaml\Credential\X509Certificate::fromFile(storage_path(env('LIGHT_SAML_KEY'))))
        );

        $spSsoDescriptor->addAssertionConsumerService(
            (new \LightSaml\Model\Metadata\AssertionConsumerService())
                ->setBinding(\LightSaml\SamlConstants::BINDING_SAML2_HTTP_POST)
                ->setLocation(env('LIGHT_SAML_ACS_URL'))
        );

        $serializationContext = new \LightSaml\Model\Context\SerializationContext();
        $entityDescriptor->serialize($serializationContext->getDocument(), $serializationContext);
        $xml = $serializationContext->getDocument()->saveXML();
        return response($xml, 200)->header('Content-Type', config('responseType'));
    }

    public function bindRequest()
    {
        $authnRequest = new \LightSaml\Model\Protocol\AuthnRequest();
        $authnRequest->setDestination(env('LIGHT_SAML_LOGIN'));
        $bindingFactory = new \LightSaml\Binding\BindingFactory();
        $redirectBinding = $bindingFactory->create(\LightSaml\SamlConstants::BINDING_SAML2_HTTP_REDIRECT);
        $messageContext = new \LightSaml\Context\Profile\MessageContext();
        $messageContext->setMessage($authnRequest);
        /** @var \Symfony\Component\HttpFoundation\RedirectResponse $httpResponse */
        $httpResponse = $redirectBinding->send($messageContext);
        return Redirect::to($httpResponse->getTargetUrl());
    }
}
