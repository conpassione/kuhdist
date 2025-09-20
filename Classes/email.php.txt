<?php

$email = GeneralUtility::makeInstance(FluidEmail::class);
$email
    ->to('contact@acme.com')
    ->from(new Address('jeremy@acme.com', 'Jeremy'))
    ->subject('TYPO3 loves you - here is why')
    ->format(FluidEmail::FORMAT_BOTH)
    ->setTemplate('TipsAndTricks')
    ->assign('mySecretIngredient', 'Tomato and TypoScript');
GeneralUtility::makeInstance(MailerInterface::class)->send($email);



<f:section name="Subject">New Login at "{typo3.sitename}"</f:section>

$email = GeneralUtility::makeInstance(FluidEmail::class);
$email
    ->to('contact@acme.com')
    ->assign('language', 'de');


YAML....
finishers:
  -
  identifier: EmailToSender
    options:
      subject: 'Your message'
      recipientAddress: '{email}'
      recipientName: '{lastname}'
      senderAddress: your.company@example.com
      senderName: 'Your Company name'
      replyToAddress: ''
      carbonCopyAddress: ''
      blindCarbonCopyAddress: ''
      format: html
      attachUploads: true
      # The following part enables us to use the customized template:
      templateName: '{@format}.html'
      templateRootPaths:
        20: 'EXT:form_examples/Resources/Private/Forms/CustomHtmlMailExample/Sender/'
