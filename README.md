#MatiCore | Sandbox

[![Latest Stable Version](https://poser.pugx.org/mati-core/sandbox/v)](//packagist.org/packages/mati-core/sandbox)
[![Total Downloads](https://poser.pugx.org/mati-core/sandbox/downloads)](//packagist.org/packages/mati-core/sandbox)
![Integrity check](https://github.com/mati-core/sandbox/workflows/Integrity%20check/badge.svg)
[![Latest Unstable Version](https://poser.pugx.org/mati-core/sandbox/v/unstable)](//packagist.org/packages/mati-core/sandbox)
[![License](https://poser.pugx.org/mati-core/sandbox/license)](//packagist.org/packages/mati-core/sandbox)

Install
-------

**Creating project**
```bash
composer create-project mati-core/sandbox <destination>
```

**Setup config in app/config/common.neon**

```neon
parameters:
	mjml:
		applicationID: ''   # your application ID for https://mjml.io/api 
		publicKey: ''       # your public key for https://mjml.io/api 
		secretKey: ''       # your secret key for https://mjml.io/api 
	mail:
		smtp: true          # use smtp server 
		host: ''            # smtp server address
		port: 465           # smtp server port
		username: ''        # smtp server login
		password: ''        # smtp server password
		secure: ssl         # smtp server encrypt (ssl/tls)
```

**Install CMS super admin account**

```bash
php www/index.php app:user:init <login> <password>
```

**Administration URL**

```bash
/admin
```