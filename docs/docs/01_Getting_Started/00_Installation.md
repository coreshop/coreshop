# CoreShop Installation

You need a running instance of Pimcore on your system before you can install CoreShop. 

You can setup your own example:
 - Install with composer ```composer require coreshop/core-shop ^3.0```
 - Enable the bundle in `config/bundles.php`
      ```
      <?php
      
      return [
         ...
          \CoreShop\Bundle\CoreBundle\CoreShopCoreBundle::class => ['all' => true],
      ];
      ```
 - Update `config/packages/security.yaml` to allow access to the CoreShop Backend.
    - Add the CoreShop Frontend parameter:
      ```
      parameters:
          coreshop.security.frontend_regex: "^/(?!admin)[^/]*
      ```
    - Add the Authentication Provider:
      ```
       providers:
         coreshop_user:
             id: CoreShop\Bundle\CoreBundle\Security\ObjectUserProvider
      ```
    - Add the Firewall Config:
      ```
       firewalls:
         coreshop_frontend:
             provider: coreshop_user
             pattern: '%coreshop.security.frontend_regex%'
             context: shop
             form_login:
                 login_path: coreshop_login
                 check_path: coreshop_login_check
                 provider: coreshop_user
                 failure_path: coreshop_login
                 default_target_path: coreshop_index
                 use_forward: false
                 use_referer: true
             remember_me:
                 secret: "%secret%"
                 name: APP_CORESHOP_REMEMBER_ME
                 lifetime: 31536000
                 remember_me_parameter: _remember_me
             logout:
                 path: coreshop_logout
                 target: coreshop_login
                 invalidate_session: false
      ```
    - Add the Access Control:
      ```
       access_control:
         - { path: "%coreshop.security.frontend_regex%/_partial", role: IS_AUTHENTICATED_ANONYMOUSLY, ips: [127.0.0.1, ::1] }
         - { path: "%coreshop.security.frontend_regex%/_partial", role: ROLE_NO_ACCESS }
      ```
 - Run Install Command
    `php bin/console coreshop:install`
 - Optional: Install Demo Data `php bin/console coreshop:install:demo`

## Messenger
CoreShop also uses Symfony Messenger for async tasks like sending E-Mails or Processing DataObjects for the Index. Please run these 2 transports to process the data
```
bin/console messenger:consume coreshop_notification coreshop_index --time-limit=300
```

## Payment
CoreShop uses Payum for Payment. Checkout Payums Documentation on how to add payment providers.

Payment providers are implemented as Pimcore Plugin. They can be installed using composer. Here you can find all available payment modules via composer

[Payum Documentation](https://github.com/Payum/Payum/blob/master/docs/index.md#symfony-payum-bundle)